<?php

namespace NicklasW\PkmGoApi\Authenticators\Google\Support;

use phpseclib\Crypt\RSA;
use phpseclib\Math\BigInteger;

class Signature {

    /**
     * @var string The public key
     */
    protected static $PUBLIC_KEY = 'AAAAgMom/1a/v0lblO2Ubrt60J2gcuXSljGFQXgcyZWveWLEwo6prwgi3iJIZdodyhKZQrNWp5nKJ3srRXcUW+F1BD3baEVGcmEgqaLZUNBjm057pKRI16kB0YppeGx5qIQ5QjKzsR8ETQbKLNWgRY0QRNVz34kMJR3P/LgHax/6rmf5AAAAAwEAAQ==';

    /**
     * Generates a signature.
     *
     * @param string $email    The email
     * @param string $password The password
     * @return string
     */
    public static function create($email, $password)
    {
        // Retrieve the binary key
        $binaryKey = bin2hex(base64_decode(self::$PUBLIC_KEY));

        // Retrieve the modulus
        $modulus = self::modulus($binaryKey);

        // Retrieve the exponent
        $exponent = self::exponent($binaryKey);

        // Retrieve the signature
        $signature = self::signature();

        // Retrieve the encrypted key
        $encrypted = self::encrypt($email, $password, $modulus, $exponent);

        $output = hex2bin($signature . $encrypted);

        $b64EncryptedPasswd = str_replace(array("+", "/"), array("-", "_"), mb_convert_encoding(base64_encode($output), "US-ASCII"));

        return $b64EncryptedPasswd;
    }

    /**
     * Returns the modulus key.
     */
    protected static function modulus($binaryKey)
    {
        $half = substr($binaryKey, 8, 256);

        return new BigInteger(hex2bin($half), 256);
    }

    /**
     * Returns the exponent key.
     */
    protected static function exponent($binaryKey)
    {
        $half = substr($binaryKey, 272, 6);

        return new BigInteger(hex2bin($half), 256);
    }

    /**
     * Returns the signature.
     */
    protected static function signature()
    {
        $sha1 = sha1(base64_decode(self::$PUBLIC_KEY), true);

        return '00' . bin2hex(substr($sha1, 0, 4));
    }

    /**
     * Returns the encrypted key.
     *
     * @param string     $email
     * @param string     $password
     * @param BigInteger $modulus
     * @param BigInteger $exponent
     * @return
     */
    protected static function encrypt($email, $password, $modulus, $exponent)
    {
        $rsa = new RSA();

        $rsa->setPublicKeyFormat("CRYPT_RSA_PUBLIC_FORMAT_RAW");
        $rsa->setEncryptionMode("CRYPT_RSA_ENCRYPTION_OAEP");
        $rsa->loadKey(array('n' => $modulus, 'e' => $exponent));

        $rsa->setPublicKey();

        $plain = "{$email}\x00{$password}";

        return bin2hex($rsa->encrypt($plain));
    }

}
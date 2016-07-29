<?php
/****
 * PHP Protocol Buffer Parser
 * https://github.com/bramp/protoc-gen-php
 * Licence (Simplified BSD License)
 * --------------------------------
 * Copyright (c) 2010-2016, Andrew Brampton
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright notice, this
 *    list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

if (PHP_INT_SIZE !== 8) {
	echo 'For now we only support PHP on 64bit platforms \n';

    die();
}

function checkArgument($exp, $message)
{
    if (!$exp) {
        throw new InvalidArgumentException($message);
    }
}

abstract class ProtobufIO {

    public static function toStream($in, &$limit = PHP_INT_MAX)
    {
        // If the input is a string, turn it into a stream and decode it
        if (is_string($in)) {
            $limit = min($limit, strlen($in));
            $fp = fopen('php://temp', 'w+b');
            fwrite($fp, $in, $limit);
            rewind($fp);
            return $fp;
        }

        checkArgument(get_resource_type($in) === 'stream', 'fp must be a string or file resource');
        return $in;
    }
}

abstract class ProtobufEnum {

    public static function toString($value)
    {
        checkArgument(is_int($value), 'value must be a integer');

        if (array_key_exists($value, self::$_values))
            return self::$_values[$value];

        return 'UNKNOWN';
    }
}

abstract class ProtobufMessage {

    private $_unknown;

    function __construct($fp = null, &$limit = PHP_INT_MAX)
    {
        // Zero arguments, so construct a empty one
        if ($fp === null) {
            return;
        }

        // Decode
        $this->read($fp, $limit);
    }

    // Reads the protobuf
    public function read($in, &$limit = PHP_INT_MAX)
    {
        $fp = ProtobufIO::toStream($in, $limit);
        while (!feof($fp) && $limit > 0) {
            $tag = self::read_varint($fp, $limit);
            if ($tag === false) break;
            $wire = $tag & 0x07;
            $field = $tag >> 3;

            $field_idx = $field . '-' . self::get_wiretype($wire);
            $this->_unknown[$field_idx][] = self::read_field($fp, $wire, $limit);
        }
    }

    abstract public function write($fp);

    abstract public function size();


    // TODO Rename this
    public function toProtobuf()
    {
        $fp = fopen('php://temp', 'w+b');
        $this->write($fp);
        rewind($fp);
        return stream_get_contents($fp);
    }
}

/**
 * Class to aid in the parsing and creating of Protocol Buffer Messages
 * This class should be included by the developer before they use a
 * generated protobuf class.
 *
 * @author Andrew Brampton
 */
abstract class Protobuf {

    const TYPE_DOUBLE = 1;   // double, exactly eight bytes on the wire.

    const TYPE_FLOAT = 2;   // float, exactly four bytes on the wire.

    const TYPE_INT64 = 3;   // int64, varint on the wire.  Negative numbers

    // take 10 bytes.  Use TYPE_SINT64 if negative
    // values are likely.
    const TYPE_UINT64 = 4;   // uint64, varint on the wire.

    const TYPE_INT32 = 5;   // int32, varint on the wire.  Negative numbers

    // take 10 bytes.  Use TYPE_SINT32 if negative
    // values are likely.
    const TYPE_FIXED64 = 6;   // uint64, exactly eight bytes on the wire.

    const TYPE_FIXED32 = 7;   // uint32, exactly four bytes on the wire.

    const TYPE_BOOL = 8;   // bool, varint on the wire.

    const TYPE_STRING = 9;   // UTF-8 text.

    const TYPE_GROUP = 10;  // Tag-delimited message.  Deprecated.

    const TYPE_MESSAGE = 11;  // Length-delimited message.

    const TYPE_BYTES = 12;  // Arbitrary byte array.

    const TYPE_UINT32 = 13;  // uint32, varint on the wire

    const TYPE_ENUM = 14;  // Enum, varint on the wire

    const TYPE_SFIXED32 = 15;  // int32, exactly four bytes on the wire

    const TYPE_SFIXED64 = 16;  // int64, exactly eight bytes on the wire

    const TYPE_SINT32 = 17;  // int32, ZigZag-encoded varint on the wire

    const TYPE_SINT64 = 18;  // int64, ZigZag-encoded varint on the wire

    const MIN_INT32 = -2147483648;

    const MAX_INT32 = 2147483647;

    const MIN_UINT32 = 0;

    const MAX_UINT32 = 4294967296;

    const MIN_INT64 = -9223372036854775808;

    const MAX_INT64 = 9223372036854775807;

    const MIN_UINT64 = 0;

    const MAX_UINT64 = 18446744073709551616;

    const MAX_VARINT_LEN = 10;

    const MAX_PHP_INT_VARINT_LEN = 9; // The length of the longest varint that represents a valid PHP int

    /**
     * Returns a string representing this wiretype
     * // TODO Rename to something enum related
     */
    public static function get_wiretype($wire_type)
    {
        checkArgument(is_int($wire_type), 'wire_type must be a integer');

        switch ($wire_type) {
            case 0:
                return '(0) varint';
            case 1:
                return '(1) 64-bit';
            case 2:
                return '(2) length-delimited';
            case 3:
                return '(3) group start';
            case 4:
                return '(4) group end';
            case 5:
                return '(5) 32-bit';
            default:
                return 'unknown';
        }
    }


    /**
     * Returns how big (in bytes) this number would be as a varint
     */
    public static function size_varint($value)
    {
        // TODO Assert 64bit doubles
        checkArgument(is_int($value) || is_float($value), 'value must be a integer or float');

        // TODO Rearrange to make a binary search
        if ($value < 0) return self::MAX_VARINT_LEN; // Negitive numbers are signed extended and always take 10 bytes
        if ($value < 0x80) return 1; // 2^7
        if ($value < 0x4000) return 2; // 2^14
        if ($value < 0x200000) return 3; // 2^21
        if ($value < 0x10000000) return 4; // 2^28
        if ($value < 0x800000000) return 5; // 2^35
        if ($value < 0x40000000000) return 6; // 2^42
        if ($value < 0x2000000000000) return 7; // 2^49
        if ($value < 0x100000000000000) return 8; // 2^56

        if (is_int($value)) {
            // A PHP int can't be compared to 2^63, so compare to 2^63-1
            if ($value <= 0x7FFFFFFFFFFFFFFF) return 9;
        } else {
            // However, a float can't exactly represent 2^63-1, so in that case compare to 2^63 (which it can represent)
            if ($value < 0x8000000000000000) return 9;
        }

        return self::MAX_VARINT_LEN;
    }

    /**
     * Parses the raw bytes of a varint, and returns the number it represents
     *
     * @param value the raw bytes int to decode
     * @returns the decoded int
     */
    public static function decode_varint($encoded)
    {
        checkArgument(is_string($encoded), 'encoded value must be a string of bytes');

        $len = strlen($encoded);
        if ($len <= self::MAX_PHP_INT_VARINT_LEN) { // TODO lower this on PHP32.
            return self::decode_varint_int($encoded, $len);
        } else {
            return self::decode_varint_float($encoded, $len);
        }
    }

    public static function decode_signed_varint($encoded)
    {
        checkArgument(is_string($encoded), 'encoded value must be a string of bytes');
        checkArgument($encoded !== '', 'encoded value contains no bytes');

        $len = strlen($encoded);
        if ($len === self::MAX_VARINT_LEN) {
            // Negative number
            // Because PHP only has signed types, there is no native way to do
            // signed extension. To help maintain a accuracy we do it manually
            // over the bytes of the varint, by flipping the bits and adding one.

            $len--;
            for ($i = 0; $i < $len; $i++) {
                $encoded[$i] = chr(~(ord($encoded[$i]) & 0x7F));
            }

            // Drop the last digit as it's above 64bit and not used
            $encoded = substr($encoded, 0, $len);
            $encoded = rtrim($encoded, "\x80"); // TODO change this to rtrim(\xff) and move above the loop

            return -self::decode_varint($encoded) - 1;
        } else {
            return self::decode_varint($encoded);
        }
    }


    public static function decode_varint_int($encoded, $len)
    {
        $result = 0;
        $shift = 0;
        for ($i = 0; $i < $len; $i++) {
            $result |= ((ord($encoded[$i]) & 0x7F) << $shift);
            $shift += 7;
        }

        return $result;
    }

    /**
     * Slower implementation that uses math instead of bit operators (as they don't work on floats)
     */
    public static function decode_varint_float($encoded, $len)
    {
        $result = 0.0;
        $shift = 1.0;
        for ($i = 0; $i < $len; $i++) {
            $result += (ord($encoded[$i]) & 0x7F) * $shift;
            $shift *= 128;
        }

        return $result;
    }

    public static function decode_varint_bc($encoded, $len)
    {
        $result = 0;
        $shift = 1;
        for ($i = 0; $i < $len; $i++) {
            $result = bcadd($result, bcmul(ord($encoded[$i]) & 0x7F, $shift));
            $shift = bcmul($shift, 128);
        }
        return $result;
    }

    public static function decode_varint_gmp($encoded, $len)
    {
        $i128 = gmp_init(128);
        $result = gmp_init(0);
        $shift = gmp_init(1);
        for ($i = 0; $i < $len; $i++) {
            $result = gmp_add($result, gmp_mul(ord($encoded[$i]) & 0x7F, $shift));
            $shift = gmp_mul($shift, $i128);
        }
        return gmp_strval($result);
    }

    public static function read_bytes($fp, $len, &$limit = PHP_INT_MAX)
    {

        if ($len <= 0) {
            return;
        }

        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');
        checkArgument(is_integer($len) && $len >= 0, 'len must be a postitive integer');
        checkArgument(is_integer($limit) && $limit >= 0, 'limit must be a postitive integer');

        if ($limit < $len) {
            throw new Exception('read_bytes(): Unexpected end of stream');
        }

        $bytes = fread($fp, $len);
        if ($bytes === '' && feof($fp)) {
            return false;
        }

        if ($bytes === false) {
            throw new Exception('read_bytes(): Error reading byte');
        }

        if (strlen($bytes) !== $len) {
            throw new Exception('read_bytes(): Unexpected end of stream');
        }

        $limit -= $len;
        return $bytes;
    }

    /**
     * Reads a varint but does not decode.
     *
     * @param  resource $fp    Resource stream to read from
     * @param  int      $limit Max bytes to read, passed by reference and will be decremented by the number of read bytes
     * @return string|bool Returns the read varint bytes, or false on EOF.
     * @throws exception if stream error occurs
     */
    public static function read_varint_bytes($fp, &$limit = PHP_INT_MAX)
    {
        $value = '';
        do { // Keep reading until we find the last byte
            $b = self::read_bytes($fp, 1, $limit);
            if ($b === false) {
                return false;
            }

            $value .= $b;
        } while ($b >= "\x80");

        return $value;
    }

    /**
     * Tries to read a varint from $fp.
     *
     * @returns the decoded varint in the range [0,2^64-1] from the stream, or false if the stream has reached eof.
     * @throws exception if stream error occurs
     */
    public static function read_varint($fp, &$limit = PHP_INT_MAX)
    {
        $value = self::read_varint_bytes($fp, $limit);
        if ($value === false) {
            return false;
        }
        return self::decode_varint($value);
    }

    public static function read_signed_varint($fp, &$limit = PHP_INT_MAX)
    {
        $value = self::read_varint_bytes($fp, $limit);
        if ($value === false) {
            return false;
        }
        return self::decode_signed_varint($value);
    }

    /**
     * @returns a integer as specified by the pack variable.
     * On EOF false is returned, otherwise Exception is thrown on stream error or invalid argument.
     */
    protected static function read_unpack($fp, $len, $pack, &$limit = PHP_INT_MAX)
    {
        checkArgument(is_string($pack), 'pack must be a valid string');

        $bytes = self::read_bytes($fp, $len, $limit);
        if ($bytes === false) {
            return false;
        }

        return unpack($pack, $bytes)[1];
    }

    public static function read_float($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 4, 'f', $limit);
    } // BUG We need to convert from little order to machine order first

    public static function read_double($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 8, 'd', $limit);
    } // BUG We need to convert from little order to machine order first

    public static function read_int32($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 4, 'l', $limit);
    } // BUG We need to convert from little order to machine order first

    public static function read_uint32($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 4, 'V', $limit);
    }

    // unpack 'q' and 'P' are only supported since PHP 5.6.3
    public static function read_int64($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 8, 'q', $limit);
    } // BUG We need to convert from little order to machine order first

    public static function read_uint64($fp, &$limit = PHP_INT_MAX)
    {
        return self::read_unpack($fp, 8, 'P', $limit);
    }

    public static function read_zint32($fp, &$limit = PHP_INT_MAX)
    {
        $i = self::read_varint($fp, $limit);
        if ($i === false) {
            return false;
        }

        return (!($i & 0x1) ? ($i >> 1) : (($i >> 1) ^ (~0)));
    }

    public static function read_zint64($fp, &$limit = PHP_INT_MAX)
    {
        $i = self::read_varint($fp, $limit);
        if ($i === false) {
            return false;
        }

        return (!($i & 0x1) ? ($i >> 1) : (($i >> 1) ^ (~0)));
    }

    /**
     * Read a unknown field from the stream and decodes the value if possible.
     */
    public static function read_field($fp, $wire_type, &$limit = PHP_INT_MAX)
    {
        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');
        checkArgument(is_integer($limit) && $limit >= 0, 'limit must be a postitive integer');

        switch ($wire_type) {
            case 0: // varint
                return self::read_varint_bytes($fp, $limit);

            case 1: // 64bit
                return self::read_bytes($fp, 8, $limit);

            case 2: // length delimited
                $len = self::read_varint($fp, $limit);
                if ($len <= 0) {
                    throw new Exception('read_field(' . self::get_wiretype($wire_type) . '): Invalid length: $len it must be >= 0');
                }
                return self::read_bytes($fp, $len, $limit);

            //case 3: // Start group TODO we must keep looping until we find the closing end grou
            //case 4: // End group - We should never skip a end group!
            //	return 0; // Do nothing

            case 5: // 32bit
                return self::read_bytes($fp, 4, $limit);

            default:
                throw new Exception('read_field(' . self::get_wiretype($wire_type) . '): Unsupported wire_type');
        }
    }

    /**
     * Varint encodes a integer, using a loop-less bitwise method.
     *
     * @param int|float $value The number to encode
     * @return string the bytes of the encoded value
     */
    public static function encode_varint_slide($value)
    {
        checkArgument(is_int($value), 'value must be a integer');
        checkArgument($value >= 0, 'value must be positive');

        // Code adapted from CodedOutputStream::WriteVarint64ToArrayInline in
        // coded_stream.cc original protobuf source
        $target = "\0\0\0\0\0\0\0\0\0\0";

        $part0 = $value & 0xffffffff;
        $part1 = ($value >> 28) & 0xffffffff;
        $part2 = ($value >> 56) & 0xffffffff;

        if ($part2 === 0) {
            if ($part1 === 0) {
                if ($part0 < (1 << 14)) {
                    if ($part0 < (1 << 7)) {
                        $size = 1;
                        goto size1;
                    } else {
                        $size = 2;
                        goto size2;
                    }
                } else {
                    if ($part0 < (1 << 21)) {
                        $size = 3;
                        goto size3;
                    } else {
                        $size = 4;
                        goto size4;
                    }
                }
            } else {
                if ($part1 < (1 << 14)) {
                    if ($part1 < (1 << 7)) {
                        $size = 5;
                        goto size5;
                    } else {
                        $size = 6;
                        goto size6;
                    }
                } else {
                    if ($part1 < (1 << 21)) {
                        $size = 7;
                        goto size7;
                    } else {
                        $size = 8;
                        goto size8;
                    }
                }
            }
        } else {
            if ($part2 < (1 << 7)) {
                $size = 9;
                goto size9;
            } else {
                $size = 10;
                goto size10;
            }
        }

        assert(false, 'reached a line we should never get to');

        // Slide
        size10:
        $target[9] = chr(($part2 >> 7) | 0x80);
        size9 :
        $target[8] = chr(($part2) | 0x80);
        size8 :
        $target[7] = chr(($part1 >> 21) | 0x80);
        size7 :
        $target[6] = chr(($part1 >> 14) | 0x80);
        size6 :
        $target[5] = chr(($part1 >> 7) | 0x80);
        size5 :
        $target[4] = chr(($part1) | 0x80);
        size4 :
        $target[3] = chr(($part0 >> 21) | 0x80);
        size3 :
        $target[2] = chr(($part0 >> 14) | 0x80);
        size2 :
        $target[1] = chr(($part0 >> 7) | 0x80);
        size1 :
        $target[0] = chr(($part0) | 0x80);

        $target[$size - 1] = chr(ord($target[$size - 1]) & 0x7F);

        return substr($target, 0, $size);
    }

    /**
     * Varint encodes a integer, using a bitwise method.
     *
     * @param int|float $value The number to encode
     * @return string the bytes of the encoded value
     */
    public static function encode_varint_int($value)
    {
        checkArgument(is_int($value), 'value must be a integer');
        checkArgument($value >= 0, 'value must be positive');

        $buf = '';
        while ($value > 0x7F) {
            $buf .= chr(($value & 0x7F) | 0x80);
            $value = $value >> 7;
        }
        return $buf . chr($value & 0x7F);
    }

    /**
     * Varint encodes a float, using a arithmetic method.
     *
     * @param int|float $value The number to encode
     * @return string the bytes of the encoded value
     */
    public static function encode_varint_float($value)
    {
        checkArgument(is_int($value) || is_float($value), 'value must be a integer or float');
        checkArgument($value >= 0 && $value <= self::MAX_UINT64, 'value must be in the range [0, 2^64-1]');

        $buf = '';
        while ($value > 0x7F) {
            $buf .= chr(($value & 0x7F) | 0x80); // TODO Test if mod/+ is faster than and/or
            $value = floor($value / 128.0); // TODO Test if ($a - $a % $b) / $b; is faster
        }
        return $buf . chr($value & 0x7F);
    }

    public static function encode_varint_bc($value)
    {
        checkArgument(is_numeric($value), 'value must be numeric');
        checkArgument(bccomp($value, 0) >= 0 && bccomp($value, "18446744073709551615") <= 0, 'value must be in the range [0, 2^64-1]');

        $buf = '';
        while (bccomp($value, 128) >= 0) {
            $buf .= chr(bcadd(bcmod($value, 128), 128));
            $value = bcdiv($value, 128, 0);
        }

        return $buf . chr(bcmod($value, 128));
    }

    public static function encode_varint_gmp($value)
    {
        checkArgument(is_numeric($value), 'value must be numeric');

        $value = gmp_init($value);
        checkArgument(gmp_cmp($value, 0) >= 0 && gmp_cmp($value, "18446744073709551615") <= 0, 'value must be in the range [0, 2^64-1]');

        $i128 = gmp_init(128);

        $buf = '';
        while (gmp_cmp($value, $i128) >= 0) {
            $buf .= chr(gmp_intval(gmp_add(gmp_mod($value, $i128), $i128)));
            $value = gmp_div($value, $i128, GMP_ROUND_ZERO); // TODO Consider changing to gmp_div_qr so we can avoid a mod
        }

        return $buf . chr(gmp_intval(gmp_mod($value, $i128)));
    }

    /**
     * Varint encodes a number.
     * Depending on the type of value, either the the bitwise or
     * arithmetic method is used. Typically bitwise is faster, but
     * only works with ints, thus to encode floats a arithmetic method
     * is used instead.
     *
     * @param int|float $value The number to encode
     * @return string the bytes of the encoded value
     * @throws InvalidArgumentException if the $value is not a integer of float
     */
    public static function encode_varint($value)
    {

        if ($value < 0) {
            $value = -($value + 1);
            $negative = true;
        } else {
            $negative = false;
        }

        if (is_int($value)) {
            $encoded = self::encode_varint_int($value);
        } elseif (is_float($value)) {
            $encoded = self::encode_varint_float($value);
        } else {
            throw new InvalidArgumentException('value must be a integer or float');
        }

        if ($negative) {
            $len = strlen($encoded);
            for ($i = $len - 1; $i >= 0; $i--) {
                $encoded[$i] = chr(~(ord($encoded[$i])) | 0x80);
            }

            // Now sign extend
            $encoded = str_pad($encoded, 9, "\xff", STR_PAD_RIGHT) . "\x01";
        }

        return $encoded;
    }

    /**
     * Writes a unsigned varint to $fp
     * returns the number of bytes written
     *
     * @param $fp
     * @param $value The int to encode and write
     * @return The number of bytes written
     */
    public static function write_varint($fp, $value)
    {
        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');

        $buf = self::encode_varint($value);
        $len = strlen($buf);

        if (fwrite($fp, $buf) !== $len)
            throw new Exception('write_varint(): Error writing byte');

        return $len;
    }

    /**
     * Writes a packed value to $fp
     * returns the number of bytes written
     *
     * @param $fp
     * @param $value The int to encode and write
     * @param $pack  The pack format
     * @return The number of bytes written
     */
    protected static function write_pack($fp, $value, $pack)
    {
        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');
        checkArgument(is_integer($value) || is_float($value), 'value must be numeric');
        checkArgument(is_string($pack), 'pack must be a valid string');

        $encoded = pack($pack, $value);
        $len = strlen($encoded);

        $wrote = fwrite($fp, $encoded, $len);
        if ($wrote === false || $wrote !== $len) {
            throw new Exception('write_pack(): Error writing byte');
        }

        return $len;
    }

    public static function write_float($fp, $f)
    {
        return self::write_pack($fp, $f, 'f');
    } // BUG We need to convert from machine order to little order first

    public static function write_double($fp, $d)
    {
        return self::write_pack($fp, $d, 'd');
    } // BUG We need to convert from machine order to little order first

    public static function write_int32($fp, $i)
    {
        return self::write_pack($fp, $i, 'l');
    } // BUG We need to convert from machine order to little order first

    public static function write_uint32($fp, $i)
    {
        return self::write_pack($fp, $i, 'V');
    }

    // unpack 'q' and 'P' are only supported since PHP 5.6.3
    public static function write_int64($fp, $i)
    {
        return self::write_pack($fp, $i, 'q');
    } // BUG We need to convert from machine order to little order first

    public static function write_uint64($fp, $i)
    {
        return self::write_pack($fp, $i, 'P');
    }

    public static function write_zint32($fp, $i)
    {
        return self::write_varint($fp, ($i >= 0 ? ($i << 1) : (($i << 1) ^ ~0)));
    }

    public static function write_zint64($fp, $i)
    {
        return self::write_varint($fp, ($i >= 0 ? ($i << 1) : (($i << 1) ^ ~0)));
    }

    /**
     * Seek past a varint
     */
    public static function skip_varint($fp)
    {
        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');

        $value = self::read_varint_bytes($fp);
        if ($value === false) {
            return false;
        }
    }

    /**
     * Seek past the current field
     * TODO Rewrite this to be safer
     */
    public static function skip_field($fp, $wire_type, &$limit = PHP_INT_MAX)
    {
        checkArgument(get_resource_type($fp) === 'stream', 'fp must be a file resource');
        checkArgument(is_int($wire_type), 'wire_type must be a integer');

        switch ($wire_type) {
            case 0: // varint
                $tmp = self::skip_varint($fp, $limit);
                if ($tmp === false) throw new \Exception('Protobuf::skip_varint returned false');

            case 1: // 64bit
                if (fseek($fp, 8, SEEK_CUR) === -1)
                    throw new Exception('skip(' . self::get_wiretype(1) . '): Error seeking');
                $limit -= 8;

            case 2: // length delimited
                $len = self::read_varint($fp, $limit);
                if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
                if (fseek($fp, $len, SEEK_CUR) === -1)
                    throw new Exception('skip(' . self::get_wiretype(2) . '): Error seeking');
                $limit -= $len;

            //case 3: // Start group TODO we must keep looping until we find the closing end grou
            //case 4: // End group - We should never skip a end group!
            //	return 0; // Do nothing

            case 5: // 32bit
//				if (fseek($fp, 4, SEEK_CUR) === -1)
//					throw new Exception('skip('. self::get_wiretype(5) . '): Error seeking');
//				$limit -= 4;

            default:
//				throw new Exception('skip('. self::get_wiretype($wire_type) . '): Unsupported wire_type');
        }
    }

    /**
     * TODO Decide to delete toString(). It used when printing unknown fields
     * Used to aid in pretty printing of Protobuf objects
     * TODO Decode enums
     */
    private static $print_depth = 0;

    private static $indent_char = "\t";

    private static $print_limit = 50;

    public static function toString($key, $value, $default = null)
    {
        if ($value === $default)
            return;

        $ret = str_repeat(self::$indent_char, self::$print_depth) . "$key=>";
        if (is_array($value)) {
            $ret .= "array(\n";
            self::$print_depth++;
            foreach ($value as $i => $v)
                $ret .= self::toString("[$i]", $v);
            self::$print_depth--;
            $ret .= str_repeat(self::$indent_char, self::$print_depth) . ")\n";

        } elseif (is_object($value)) {
            self::$print_depth++;
            $ret .= get_class($value) . "(\n";
            $ret .= $value->__toString() . "\n";
            self::$print_depth--;
            $ret .= str_repeat(self::$indent_char, self::$print_depth) . ")\n";

        } elseif (is_string($value)) {
            $safevalue = addcslashes($value, "\0..\37\177..\377");
            if (strlen($safevalue) > self::$print_limit) {
                $safevalue = substr($safevalue, 0, self::$print_limit) . '...';
            }

            $ret .= '"' . $safevalue . '" (' . strlen($value) . " bytes)\n";

        } elseif (is_bool($value)) {
            $ret .= ($value ? 'true' : 'false') . "\n";

        } else {
            $ret .= (string)$value . "\n";
        }
        return $ret;
    }
}

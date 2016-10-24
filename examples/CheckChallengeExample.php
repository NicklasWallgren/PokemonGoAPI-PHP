<?php
require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class CheckChallengeRequest {

    /**
     * Run the example.
     */
    public function run()
    {
        // Initialize the error string
        $error = null;

        // EXAMPLE Authentication via PTC user credentials
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_PTC);
        $config->setUser('');
        $config->setPassword('');

        // Create the authentication manager
        $manager = Factory::create($config);

        // Initialize the example application
        $application = new ApplicationKernel($manager);

        // Bookmarklet Config - load your own bookmarklet source to customize RECaptcha iframe injection logic
        $bookmarkletUrl = "https://aa2e9e20ba653c1903e8-f9a24a1a98160d8ae95f4a0da76ebd6d.ssl.cf1.rackcdn.com/js/pgo-captcha.js?v=1";
        $bookmarkletScript = "javascript:(function(){document.body.appendChild(document.createElement('script')).src='" . $bookmarkletUrl . "';})();";

        if ($application)
        {
            $pogoApi = $application->getPokemonGoApi();
            // Ensure api and user are not empty
            if ($pogoApi && $config->getUser())
            {
                $checkChallenge = $pogoApi->checkChallenge()->getData();
                if ($checkChallenge)
                {
                    // Convert showChallenge boolean to string equiv
                    $flagged = var_export($checkChallenge->getShowChallenge(), true);

                    // Get challengeUrl value - appears to return " " (space) when user is not flagged for captcha
                    $challengeUrl = $checkChallenge->getChallengeUrl();

                    // If challengeUrl empty, hide "SHOW CHALLANGE" html
                    $showUrl = empty(trim($challengeUrl)) ? 'hidden' : '';

                    echo <<<EOBODY
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Check Challenge Example</title>
        <meta name="referrer" content="no-referrer" />
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Check Challenge Example</h1>
            <pre>USER: {$config->getUser()} </pre>
            <pre>SHOW CHALLANGE: {$flagged} </pre>
            <pre class="{$showUrl}">CHALLENGE URL: <a target="_blank" rel="noreferrer" href="{$challengeUrl}">{$challengeUrl}</a></pre>
            <pre>BOOKMARKLET: <a class="btn btn-primary btn-lg" class="button" href="{$bookmarkletScript}">PGO-Captcha</a></pre>

            <div id="instructions">
                <h2>Instructions:</h2>
                <ol>
                    <li><b>Drag and Drop the [ PGO-Captcha ] bookmarklet</b> button above to your browser's bookmark toolbar.</li>
                    <li><b>Open the CHALLENGE URL</b> in a new tab.</li>
                    <li><b>Execute the PGO-Captcha bookmarklet</b> against the challenge page to display the modified captcha form.</li>
                    <li><b>Solve the captcha</b> that is displayed to generate a unique challenge token and copy it to your clipboard.</li>
                    <li><b>Post the challenge token back</b> through the api using the script @ <a href='VerifyChallengeExample.php' target=_blank>VerifyChallengeExample.php</a></li>
                </ol>

                <h3>Alternatively to the bookmarklet, execute this JS using your browser's developer tools:</h3>
                <pre>
function captchaResponse(challengeToken){
    var responseDiv=document.createElement('div');
    responseDiv.id='response';
    document.getElementsByTagName('body')[0].appendChild(responseDiv);
    document.getElementById('response').innerHTML=challengeToken;
}
var captchaHTML='&lt;form action="?" method="POST">&lt;div class="g-recaptcha" data-size="compact" data-sitekey="6LeeTScTAAAAADqvhqVMhPpr_vB9D364Ia-1dSgK" data-callback="captchaResponse">&lt;/form>';
document.body.parentElement.innerHTML=captchaHTML;
var script=document.createElement('script');
script.src='https://www.google.com/recaptcha/api.js?hl=en';
script.type='text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
                </pre>

            </div><!-- //END #instructions -->
        </div><!-- //END .container -->
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    </body>
</html>
EOBODY;
                    exit;
                }else
                    $error = "There was a problem with your checkChallenge() request!";
            }else
                $error = "Failed to initialize the PokemonGo API! Did you forget to set your credentials?";
        }else
            $error = "Failed to initialize the application kernel!";

        if ($error)
        {
            echo <<<EOERROR
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="alert alert-danger">{$error}</div>
    </body>
</html>
EOERROR;
        }

    }//END run()
}//END CheckChallengeRequestExample

$checkChallengeRequest = new CheckChallengeRequest();
$checkChallengeRequest->run();

?>
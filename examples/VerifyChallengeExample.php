<?php
require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class VerifyChallengeRequest {
    
    /**
     * Display the verifyChallenge html form.
     */
    public function showForm()
    {
        echo <<<EOFORM
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Verify Challenge Example</title>
        <meta name="referrer" content="no-referrer" />
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Verify Challenge Example</h1>
            <form id="challengeForm" role="form">
                <div class="form-group">
                    <label class="control-label" for="token">RECaptcha Challenge Token</label>
                    <textarea class="form-control" cols="40" id="token" name="token" rows="10"></textarea>
                    <p class="help-block">
                        The RECaptcha challenge token can be obtained by using the <a href="CheckChallengeExample.php" target="_blank">CheckChallengeExample.php</a> script and PGO-Captcha bookmarklet.
                    </p>
                    <small>
                        Ex POST: <code>\$_POST['token']</code><br/>
                        Ex Response: <code>"{\"user\":\"YOURUSERNAME\",\"success\":true}"</code>
                    </small>
                </div>
                <div class="form-group text-center">
                    <button id="form-submit" type="submit" class="btn btn-lg btn-success">SUBMIT</button>
                </div>
            </form>
            <div id="results"></div>
        </div>
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $("#challengeForm").submit(function(event){
                event.preventDefault();
                submitForm();
            });
            function submitForm(){
                var token = $("#token").val();
                $.ajax({
                    type: "POST",
                    url: "VerifyChallengeExample.php",
                    data: "token=" + token,
                    beforeSend: function(){
                        $("#results").html("<pre>... LOADING ...</pre>");
                    },
                    success : function(response){
                        if (response){
                            $("#results").html("<pre>" + JSON.stringify(response) + "</pre>");
                        }
                    }
                });
            }
        </script>
    </body>
</html>
EOFORM;
        exit;
    }
    
    /**
     * Submit the user supplied challenge token to API.
     */
    public function verifyChallenge($token)
    {
        // Initialize error string
        $error = null;
        
        // EXAMPLE Authentication via PTC user credentials
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_PTC);
        $config->setUser('');
        $config->setPassword('');

        // Create the authentication manager
        $manager = Factory::create($config);

        // Initialize the pokemon go application
        $application = new ApplicationKernel($manager);
        if ($application)
        {
            $pogoApi = $application->getPokemonGoApi();
            if ($pogoApi)
            {
                //Needs error checking??
                $success = $pogoApi->sendChallengeResponse($token);

                $challengeResponse = [
                    "user" => $config->getUser(),
                    "success" => $success,
                ];

                // return JSON encoded challengeResponse
                echo json_encode($challengeResponse);
                
            }else
                $error = "Failed to initialize the PokemonGo API!";
        }else
            $error = "Failed to initialize the application kernel!";
            
        if ($error) { echo json_encode(array("ERROR", $error)); }
        
    }//END sendToken()
    
}//END VerifyChallengeRequest

// Initialize VerifyChallengeRequest
$verifyChallengeRequest = new VerifyChallengeRequest();

// Sanatize User Supplied Post Input
$_POST = !empty($_POST) ? filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) : null;

// Check For Post
if(!$_POST) {
    // Display challengeForm if no postback detected
    $verifyChallengeRequest->showForm();
}else {
    // Check for challenge token
    if($_POST['token']) {
        // Pass challenge token to api
        $verifyChallengeRequest->verifyChallenge($_POST['token']);
    }
    else {
        // POST received but token not specified.
        echo json_encode(array("error", "POST detected but no valid TOKEN value supplied!"));
    }
}
?>
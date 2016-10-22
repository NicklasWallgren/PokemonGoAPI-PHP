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
        <title>Verify Challenge FORM</title>
    </head>
    <body>
        <div class="container">
            <form id="challengeForm" role="form">
                <div class="form-group">
                    <label class="control-label" for="token">TOKEN</label>
                    <textarea class="form-control" cols="40" id="token" name="token" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button id="form-submit" type="submit" class="btn btn-lg btn-success">SUBMIT</button>
                </div>
            </form>
            <div id="results"></div>
        </div>
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $("#challengeForm").submit(function(event){
                event.preventDefault(); submitForm();
            });
            function submitForm(){
                var token = $("#token").val();
                $.ajax({
                    type: "POST",
                    url: "VerifyChallengeExample.php",
                    data: "token=" + token,
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
     * Generate and display the ERROR html.
     */
    public function showError($error)
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head><title>Verify Challenge ERROR</title></head>';
        echo '<body>';
        echo '<div class="container">';
        echo '<div class="alert alert-danger">{$error}</div>';
        echo '</div>';
        echo '<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '</body></html>';
        exit;
    }
    
    /**
     * Submit the user supplied challenge token to API.
     */
    public function sendToken($token)
    {
        // EXAMPLE Authentication via PTC user credentials
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_PTC);
        $config->setUser('INPUT_USER');
        $config->setPassword('INPUT_PASSWORD');

        // Create the authentication manager
        $manager = Factory::create($config);

        // Initialize the pokemon go application
        $application = new ApplicationKernel($manager);
        
        // Initialize error object
        $error = null;
        
        if ($application)
        {
            $pokemonGoApi = $application->getPokemonGoApi();
            if ($pokemonGoApi)
            {
                //NOT YET IMPLEMENTED (Would we pass token to verifyChallenge directly or to setToken() method?)
                //$verifyChallenge = $pokemonGoApi->verifyChallenge($token);
                //$verifyChallenge = $pokemonGoApi->verifyChallenge()->setToken($token);
                
                //DEBUG - build dummy object - would be replaced with above
                $verifyChallenge = TRUE;
                
                if ($verifyChallenge)
                {
                    $challengeResponse = [
                        "user"		=>	$config->getUser(),
                        "token"		=>	$token,
                        "success"	=>	FALSE //DEBUG
                        //NOT YET IMPLEMENTED - would replace above.
                        //"success"	=>	$verifyChallenge->getSuccess()
                    ];
                    
                    // return JSON encoded challengeResponse
                    echo json_encode($challengeResponse);
                    
                }else
                    $error = "There is problem with your verifyChallenge request.";
            }else
                $error = "There is problem with PokemonGo API.";
        }else
            $error = "Cannot connect with PokemonGo servers.";
            
        if ($error) { self::showError($error); }
    }//END sendToken()
}//END VerifyChallengeRequest

// Initialize verifyChallengeRequest
$verifyChallengeRequest = new VerifyChallengeRequest();

// Process token submission if it was present in post, otherwise display challengeForm
$_POST = !empty($_POST) ? filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) : null;
if( !$_POST ) {
    $verifyChallengeRequest->showForm();
}else {
    if(	$_POST['token'] ) { $verifyChallengeRequest->sendToken($_POST['token']); }
    else { $verifyChallengeRequest->showError('ERROR: POST DETECTED but no valid TOKEN value supplied!'); }
}

?>
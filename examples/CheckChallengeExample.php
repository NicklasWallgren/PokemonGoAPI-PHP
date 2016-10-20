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
	// EXAMPLE Authentication via PTC user credentials
	$config = new Config();
	$config->setProvider(Factory::PROVIDER_PTC);
	$config->setUser('YOURUSERNAME');
	$config->setPassword('YOURPASSWORD');

	// Create the authentication manager
	$manager = Factory::create($config);

	// Initialize the pokemon go application
	$application = new ApplicationKernel($manager);

	$error = null;

	if ($application)
	{
        	$pokemonGoApi = $application->getPokemonGoApi();
        	if ($pokemonGoApi)
        	{
                	$checkChallenge = $pokemonGoApi->checkChallenge()->getData();
                	if ($checkChallenge)
                	{
				echo '<!DOCTYPE html><html><head><title>CheckChallenge Example</title></head><body>';
				echo '<pre>USER: ' . $config->getUser() . '</pre>';
				echo '<pre>SHOWCHALLANGE: ' . var_export($checkChallenge->getShowChallenge(), true) . '</pre>';
				//print_r( $checkChallenge );
				echo '<div id=checkChallenge style="text-align:center">';
				echo '<p>Step 1: <b>Drag and Drop</b> the bookmarklet button below to your browser\'s bookmark toolbar.</p>';
				echo '<p><a class="btn btn-primary btn-sm" class="button" href="javascript:(function(){document.body.appendChild(document.createElement(\'script\')).src=\'https://alertboxx.com/bookmarklet/pgo-captcha.js\';})();">PGO-Captcha</a></p>';
				echo '<p>Step 2: Open the below captcha link in a new tab, then execute the PGO-Captcha js bookmarklet you just added to your toolbar against that page.</p>';
				echo '<p><a target="_blank" href="' . $checkChallenge->getChallengeUrl() . '">' . $checkChallenge->getChallengeUrl() . "</a></p>";
				echo '<p>Step 3: Solve the captcha that is displayed to generate a token to verify the successful captcha completion.</p>';
				echo '</div>';
				//echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
				echo '<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">';
				echo '<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">';
				echo '</body></html>';
				exit;
                        }else 
				$error = "There is problem with your checkChallenge request.";
        	}else 
			$error = "There is problem with PokemonGo API.";
	}else 
		$error = "Cannot connect with PokemonGo servers.";

	if ($error)
	{
        ?>
        	<!doctype html>
        	<html lang="en">
        	<head>
                	<meta charset="UTF-8">
                	<meta name="Author" content="VOXX">
                	<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
                	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
        	</head>
        	<body>
        	<?php echo "<div class='alert alert-danger'>{$error}</div>"; ?>
        	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        	</html>
        <?php
	}

    }//END run()
}//END CheckChallengeRequestExample

$checkChallengeRequest = new CheckChallengeRequest();
$checkChallengeRequest->run();

?>

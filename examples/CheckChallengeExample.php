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

        // Bookmarklet Config - load your own bookmarklet for customizations to frame injection
        $bookmarkletUrl = "https://alertboxx.com/bookmarklet/pgo-captcha.js";
        $bookmarkletScript = "javascript:(function(){document.body.appendChild(document.createElement('script')).src='" . $bookmarkletUrl . "';})();";

	if ($application)
	{
        	$pokemonGoApi = $application->getPokemonGoApi();
        	if ($pokemonGoApi)
        	{
                	$checkChallenge = $pokemonGoApi->checkChallenge()->getData();
                	if ($checkChallenge)
                	{
				//print_r( $checkChallenge ); //DEBUG
				echo '<!DOCTYPE html><html><head><title>CheckChallenge Example</title></head><body>';

				echo '<pre>USER: ' . $config->getUser() . '</pre>';
				echo '<pre>SHOWCHALLANGE: ' . var_export($checkChallenge->getShowChallenge(), true) . '</pre>';
				echo '<pre>CHALLENGE URL: <a target=_blank href="' . $checkChallenge->getChallengeUrl() . '">'. $checkChallenge->getChallengeUrl() . '</a></pre>';
				echo '<pre>BOOKMARKLET: <a class="btn btn-primary btn-lg" class="button" href="' . $bookmarkletScript . '">PGO-Captcha</a></pre>';
	
				echo '<div id=instructions style="width:50%;margin:20px auto;">';
				echo '<ol><li><b>Drag and Drop the [ PGO-Captcha ] bookmarklet</b> button above to your browser\'s bookmark toolbar.</li>';
				echo '<li><b>Open the CHALLENGE URL</b> in a new tab.</li>';
				echo '<li><b>Execute the PGO-Captcha bookmarklet</b> against the challenge page to display the modified captcha form.</li>';
				echo '<li><b>Solve the captcha</b> that is displayed to generate a unique challenge token to verify the successful captcha completion.</li>';
				echo '</ol>';
						?>
						<span>Alternatively to the bookmarklet, execute this JS using your browser's developer tools:</span>
						<pre>function captchaResponse(challengeToken){
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
document.getElementsByTagName('head')[0].appendChild(script);</pre>
						<?php
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

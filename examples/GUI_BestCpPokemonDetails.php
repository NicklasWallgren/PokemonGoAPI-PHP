<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonFamilyId;
use POGOProtos\Enums\PokemonId;

$config = new Config();
$config->setProvider(Factory::PROVIDER_PTC);
$config->setUser('INSERT_USER');
$config->setPassword('INSERT_PASSWORD');

$manager = Factory::create($config);

$application = new ApplicationKernel($manager);

if ($application)
{
	$pokemonGoApi = $application->getPokemonGoApi();
	if ($pokemonGoApi)
	{
		$pokez = $pokemonGoApi->getInventory()->getPokeBank()->getPokemons();
		$pokes = $pokez->sortByCp(true);
		if ($pokes)
		{
			$best = $pokes->first();
			if ($best)
			{
				html_header();
				html_start();

				$perc = round($best->getStamina()/$best->getStaminaMax() * 100);
				$fname = normalize(PokemonFamilyId::toString($best->getFamilyId()));

				echo "<table class='table table-bordered'>";
				echo "<tr><td colspan='2' class='text-center'>";
				echo "<h3>Pokemon '{$best->getName()}' details</h3>";
				echo "<img src='http://veekun.com/dex/media/pokemon/main-sprites/omegaruby-alphasapphire/{$best->getPokemonId()}.png' title='{$fname}'>";
				echo "<div class='progress center-block' style='width:200px;'>";
				echo "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='{$best->getStamina()}' aria-valuemin='0' aria-valuemax='{$best->getStaminaMax()}' style='width: {$perc}%;'><div>{$best->getStamina()}/{$best->getStaminaMax()}</div></div>";
				echo "</div>";
				echo "</td></tr>";

				make_row("FamilyName", $fname);
				make_row("FamilyId", $best->getFamilyId());
				make_row("Name", $best->getName());
				make_row("Id", $best->getId());
				make_row("PokemonId", $best->getPokemonId());
				make_row("Type", normalize($best->getType1String()));
				make_row("Favorite", $best->getFavorite() ? "Yes" : "No");
				make_row("LVL", $best->getLevel());
				make_row("CP", $best->getCp());
				make_row("IV", number_format($best->getIvRatio()*100, 2)."%");
				make_row("HP", $best->getStamina()."/".$best->getStaminaMax());
				make_row("Attack 1", normalize($best->getMove1String()));
				make_row("Attack 2", normalize($best->getMove2String()));
				make_row("Height", number_format($best->getHeightM(), 2)." m");
				make_row("Weight", number_format($best->getWeightKg(), 2)." kg");
				make_row("Powerup cost", $best->getStardustCostsForPowerup()." stardust, ".$best->getCandyCostForPowerup()." candies");
				if ($best->getCandiesToEvolve() > 0)
					make_row("Evolve cost", $best->getCandiesToEvolve());
				else
					make_row("Evolve", "Cannot be evolved");

				echo "</table>";

				html_footer();
			}
			else
				$error = "There is problem with getting best Pokemon from PokeBank.";
		}
		else
			$error = "There is problem with your PokeBank.";
	}
	else
		$error = "There is problem with PokemonGo API.";
}
else
	$error = "Cannot connect with PokemonGo servers.";

if ($error)
{
	html_header();
	show_error($error);
	html_footer();
}

function normalize($text)
{
	return ucfirst(strtolower(str_replace("_", " ", str_replace(array("FAMILY_", "POKEMON_TYPE_"), "", $text))));
}

function make_row($k, $v)
{
	echo "\n<tr>\n<td>$k</td>\n<td>$v</td>\n</tr>\n";
}

function show_error($txt)
{
	echo "<div class='alert alert-danger'>{$txt}</div>";
}

function html_start()
{
	?>
	<div class="container">
		<div class="header clearfix"><h3 class="text-muted">PokemonGoAPI-PHP</h3></div>
	<?php
}

function html_stop()
{
	?>
	</div>
	<?php
}

function html_header()
{
	?>
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="Author" content="Gandaflux">
		<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<?php
}

function html_footer()
{
	?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
	</html>
	<?php
}

?>
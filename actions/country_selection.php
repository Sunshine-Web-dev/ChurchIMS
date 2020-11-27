<?php
include(SITE_PATH . 'classes/country_selection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){

 	$team_country_id		= $_POST['country_selection'];

				$objCountrySel = new CountrySel;
				$objCountrySel->setProperty("site_country", $team_country_id);
				$objCountrySel->setProperty("country_status", 1);
				$objCountrySel->setCountryMake();
				
				$link = Route::_('show=splash');
				redirect($link);
	}
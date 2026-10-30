<?php
defined('MYAAC') or die('Direct access not allowed!');

$configLanding = require PLUGINS . 'landing-page/config.php';

if(!isset($_COOKIE[$configLanding['cookie_name']])) {
	header('Location: ' . BASE_URL . 'landing/');
	exit();
}

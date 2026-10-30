<?php

if(!is_file(PLUGINS . 'landing-page/config.php')) {
	copy(
		PLUGINS . 'landing-page/config.php.dist',
		PLUGINS . 'landing-page/config.php'
	);
	success("Copied config.php.dist to config.php");
}

success("You can configure the script in following file: plugins/landing-page/config.php");

<?php
$config['menu_default_links_color'] = '#ffffff';

$config['server_save'] = '10:00:00';
$config['allow_menu_animated'] = true;
$config['logo_image'] = 'tibia-logo-artwork-string.gif';

// status bar
$config['status_bar'] = true;
$config['discord_link'] = 'teste'; // // link to join discord channel
$config['whatsapp_link'] = ''; // wa.me/5511912345678
$config['instagram_link'] = 'carlosdmoreira'; // www.instagram.com/profile
$config['facebook_link'] = ''; // www.facebook.com/page
$config['x_link'] = '';
$config['collapse_status'] = true;

// slide
$config['carousel_status'] = false;
$config['carousel'] = [
	'carousel_1' => 'runemaster_small.jpg',
	'carousel_2' => 'merrygarb_small.jpg',
	'carousel_3' => 'mothcape_small.jpg',
];

// banner home
$config['banner_status'] = false;
$config['banner_image'] = '500x660.png'; // templates->tibiacom->images->carousel
$config['banner_link'] = 'www.instagram.com';

$config['menu_categories'] = [
	MENU_CATEGORY_NEWS       => ['id' => 'news',           'name' => 'Latest News'],
	MENU_CATEGORY_ACCOUNT    => ['id' => 'account',        'name' => 'Account'],
	MENU_CATEGORY_COMMUNITY  => ['id' => 'community',      'name' => 'Community'],
	MENU_CATEGORY_FORUM      => ['id' => 'forum',          'name' => 'Forum'],
	MENU_CATEGORY_LIBRARY    => ['id' => 'library',        'name' => 'Library'],
	7 => ['id' => 'charactertrade', 'name' => 'Char Baazar'],
	MENU_CATEGORY_SHOP       => ['id' => 'shops',          'name' => 'Shop'],
];

$config['menus'] = require __DIR__ . '/menus.php';

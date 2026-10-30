<?php
/**
 * Automatic generator for MyAAC from the offer list of the server's offline store.
 *
 * @name      myaac-gesior-shop-system
 * @author    Slawkens <slawkens@gmail.com>
 * @author    Endless <walistonbelles1@gmail.com>
 */
defined('MYAAC') or die('Direct access not allowed!');

if(!tableExist('auction_system'))
{
	$db->query("
        CREATE TABLE `auction_system` (
        `id` int(11) NOT NULL auto_increment,
        `player` int(11),
        `item_id` int(11),
        `item_name` varchar(255),
        `count` int(11),
        `cost` int(11),
        `date` int(11),
        PRIMARY KEY  (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
	");
	success('Imported auction_system table to database.');
    $db->query("ALTER TABLE `players` ADD `auction_balance` INT( 11 ) NOT NULL DEFAULT '0';");
}

?>

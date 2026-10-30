<?php

if ($logged) {
    if ($action == '') {
        $main_content .= '<center>Here is the list of the current characters that are in the shop!</center>';
        $main_content .= '<BR>';
        $main_content .= '<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR=' . $config['site']['vdarkborder'] . '><TD CLASS=white width="64px"><CENTER><B>Name</B></CENTER></TD><TD CLASS=white width="64px"><CENTER><B>Vocation</B></CENTER></TD><TD CLASS=white width="64px"><CENTER><B>Level</B></CENTER></TD><TD CLASS=white width="64px"><CENTER><B>Price</B></CENTER></TD><TD CLASS=white width="64px"><CENTER><B>Buy it</B></CENTER></TD></TR>';
        $getall = $SQL->query('SELECT `id`, `name`, `price`, `status` FROM `sellchar` ORDER BY `id`');
        foreach ($getall as $tt) {
            $player_id = $tt['name'];
            $player = new OTS_Player();
            $player->load($player_id);

            if ($player->isLoaded()) {
                if ($player->getVocation() == 1) {
                    $vocation_name = 'Sorcerer';
                } elseif ($player->getVocation() == 2) {
                    $vocation_name = 'Druid';
                } elseif ($player->getVocation() == 3) {
                    $vocation_name = 'Paladin';
                } elseif ($player->getVocation() == 4) {
                    $vocation_name = 'Knight';
                } elseif ($player->getVocation() == 5) {
                    $vocation_name = 'Sorcerer';
                } elseif ($player->getVocation() == 6) {
                    $vocation_name = 'Druid';
                } elseif ($player->getVocation() == 7) {
                    $vocation_name = 'Paladin';
                } elseif ($player->getVocation() == 8) {
                    $vocation_name = 'Knight';
                }
                $main_content .= '<TR BGCOLOR=' . $config['site']['darkborder'] . '>
                <TD CLASS=black width="64px"><CENTER><B>
                <a href="index.php?subtopic=characters&name=' . $player->getName() . '">' . $player->getName() . '</a>
                </B></CENTER></TD>
                <TD CLASS=black width="64px"><CENTER><B>' . $vocation_name . '</B></CENTER></TD>
                <TD CLASS=black width="64px"><CENTER><B>' . $player->getLevel() . '</B></CENTER></TD>
                <TD CLASS=black width="64px"><CENTER><B>' . $tt['price'] . '</B></CENTER></TD>
                <TD CLASS=black width="64px"><CENTER><B>
                <form action="?subtopic=buychar&action=buy" method="POST">
                <input type="hidden" name="player_id" value="' . $player_id . '">
                <input type="submit" name="submit" value="Buy it"></form></B></CENTER></TD></TR>';
            }
        }
        $main_content .= '</TABLE>';
    } elseif ($action == 'buy') {
        $player_id = (int)$_POST['player_id'];
        $offer_info = $SQL->query("SELECT `id`, `price`, `oldid` FROM `sellchar` WHERE `name` = " . $player_id)->fetch();
        if ($offer_info) {
            $player = new OTS_Player();
            $player->load($player_id);

            if ($player->isLoaded()) {
                $offer_id = $offer_info['id'];
                $price = $offer_info['price'];
                $old_id = $offer_info['oldid'];

                $user_coins = $account_logged->getCustomField('coins');
                $user_id = $account_logged->getId();
                if ($user_coins >= $price) {
                    $main_content .= '<center>You bought<b> ' . $player->getName() . ' ( ' .
                        $player->getLevel() . ' ) </b>for  <b>' . $price . ' coins.</b><br></center>';
                    $main_content .= '<br>';
                    $main_content .= '<center><b>The character is in your account, have fun!</b></center>';
                    $SQL->query(
                        'UPDATE `accounts` SET `coins` = `coins` - ' . $price . ' WHERE `id` = ' . $user_id
                    );
                    $SQL->query(
                        'UPDATE `accounts` SET `coins` = `coins` + ' . $price . ' WHERE `id` = ' . $old_id
                    );
                    $SQL->query('UPDATE `players` SET `account_id` = ' . $user_id . ' WHERE `id` = ' . $player_id);

                    $SQL->query('DELETE FROM `sellchar` WHERE `id` = ' . $offer_id);
                } else {
                    $main_content .= '<center><b>You dont have enough coins</b></center>';
                }
            }
        } else {
            $main_content .= '<center><b>Character cannot be bought</b></center>';
        }
    }
} else {
    $main_content .= '<center>Please log in first!</center>';
}

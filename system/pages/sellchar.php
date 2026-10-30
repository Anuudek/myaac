<?php

if ($logged) {
    $main_content .= '<center><b>Here you can put your character on sale!</center></b><br>';
    $main_content .= 'If you put your character on sale anyone can buy it, you will lose acces to that character and you wont be able to log in with that character until someone buys it, you can also delete your offer by talking to an admin!<br><b>when someone buys your character you will get the price in points!</b>';
    $main_content .= '<br>';
    $main_content .= '<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR=' . $config['site']['vdarkborder'] . '><TD CLASS=white width="64px"><CENTER><B>Sell your characters</B></CENTER></TD></TR>';
    $main_content .= '<TR BGCOLOR=' . $config['site']['darkborder'] . '><TD CLASS=black width="64px"><B></B>';

    $players_from_logged_acc = $account_logged->getPlayersList();

    $players_from_logged_acc->orderBy('name');
    $main_content .= '<form action="" method="post"><select name="player_id">';
    // w option w 'value' ustawiam ID gracza, rozwiazuje to wiele problemow z nickiami gracza i ich szukaniem w bazie
    foreach ($players_from_logged_acc as $player) {
        $main_content .= '<option value="' . $player->getId() . '">' . $player->getName() . '</option>';
    }

    $main_content .= '</select>Select a character to sell<br>';
    $main_content .= '<input type="text" name="price" maxlength="5" size="4" >Select the price of the character<br>';
    $main_content .= '<input type="submit" name="submit" value="Sell character"></TD></TR>';
    $main_content .= '</form></table>';

    if (isset($_POST['submit'])) {
        // zmieniam zmienne w int, jesli ktos wpisal jakis tekst, to zamieni sie w liczbe 0
        $player_id = (int)$_POST['player_id'];
        $price = (int)$_POST['price'];

        // to znaczy, ze $player_id i $price nie są zerami
        if ($player_id && $price) {
            // cena musi byc dodatnia, inaczej ktos moze wystawic za -50 pkt, ktos to kupi i system da komus pkt. za darmo
            if ($price > 0) {
                $player = new OTS_Player();
                $player->load($player_id);

                // sprawdzamy czy gracz sie zaladowal = czy istnieje w bazie danych
                if ($player->isLoaded()) {
                    // sprawdzamy czy id konta gracza jest takie samo jak id konta zalogowanego
                    if ($player->getAccountId() == $account_logged->getId()) {
                        // sprawdzamy czy gracz nie jest online
                        if (!$player->isOnline()) {
                            $offer_info = $SQL->query("SELECT `price`, `oldid` FROM `sellchar` WHERE `name` = " . $player_id)->fetch();
                            if (!$offer_info) {
                                $vocation = $player->getVocation();
                                $old_id = $player->getAccountId();

                                $player->setAccountId(1);
                                $player->save();

                                // wszystkie zmienne sa 'int', wiec na pewno sa bezpieczne dla MySQL,
                                // nie trzeba uzywac $SQL->quote, zeby zabezpieczyc sie przez SQL Injection
                                $SQL->query(
                                    "INSERT INTO `sellchar` VALUES (NULL,'$player_id','$vocation','$price','1','$old_id')"
                                );

                                $main_content .= '<b><center>You added your character correctly, thanks!</b></center>';
                                header("Location: index.php?subtopic=buychar");
                            } else {
                                $main_content .= '<b><center>There is already sell offer for this character.</b></center>';
                            }
                        } else {
                            $main_content .= '<b><center>This character online! Logout first.</b></center>';
                        }
                    } else {
                        $main_content .= '<b><center>This character is not on your account!</b></center>';
                    }
                } else {
                    $main_content .= '<b><center>Character does not exist!</b></center>';
                }
            } else {
                $main_content .= '<b><center>Price must be higher than 0!</b></center>';
            }
        } else {
            $main_content .= '<b><center>Fill out all fields!</b></center>';
        }
    }
} else {
    $main_content .= '<b><center>Please log in first!</b></center>';
}

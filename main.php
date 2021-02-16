<?php

require_once "./deck.php";
require_once "./classes/dealer.php";
require_once "./classes/message.php";
require_once "./classes/player.php";


// $dealer = new Dealer;
// $player = new Player(10000);
$deck = new Deck($mark, $number);

echo "これからブラックジャックを始めます。\n";
echo "10000チップからスタートです\n";
echo $cards;

$dealer->firstDrawDealer($deck);
$player->firstDrawPlayer($deck);








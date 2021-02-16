<?php

require_once "./deck.php";
require_once "./classes/dealer.php";
require_once "./classes/message.php";
require_once "./classes/player.php";

$dealer = new Dealer;
$player = new Player(10000);

echo "これからブラックジャックを始めます。\n";
echo "あなたは10000チップからスタートです\n";

$dealer->firstDrawDealer($deck);
$player->firstDrawDealer($deck);






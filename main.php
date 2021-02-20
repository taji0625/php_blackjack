<?php

require_once "./deck.php";
require_once "./dealer.php";
require_once "./player.php";

$cards = [];
$mk = ["スペード", "ハート", "ダイア", "クラブ"];
$num = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q" ,"K"];

foreach ($mk as $mark) {
  foreach ($num as $number) {
    array_push($cards, new Deck($mark, $number));
  }
}

$dealer = new Dealer();

$dealerHand = $dealer->firstDrawDealer($cards);









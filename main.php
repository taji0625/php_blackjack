<?php

require_once "./deck.php";
require_once "./dealer.php";
require_once "./player.php";
require_once "./choices.php";



$deck = [];
$mk = ["♠️", "♡", "♦︎", "♣︎"];
$num = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q" ,"K"];

foreach ($mk as $mark) {
  foreach ($num as $number) {
    array_push($deck, new Deck($mark, $number));
  }
}

$dealer = new Dealer();
$player = new Player(10000);

$player->decideOnBet();
$dealerHand = $dealer->firstDrawDealer($deck);
$playerHand = $player->firstDrawPlayer($deck);
while (true) {
  $playerSelectedAction = $player->firstDecisionPlayer($playerHand, $choicesParams);
  if ($playerSelectedAction == 1) {
    $playerHand = $player->hit($playerHand, $deck);
  } else {
    break;
  }
}
$player->stand($playerHand);







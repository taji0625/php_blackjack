<?php

require_once "./deck.php";
require_once "./dealer.php";
require_once "./player.php";
require_once "./choices.php";
require_once "./judgment.php";



$deck = [];
$mk = ["♠️", "♡", "♦︎", "♣︎"];
$num = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q" ,"K"];

foreach ($mk as $mark) {
  foreach ($num as $number) {
    array_push($deck, new Deck($mark, $number, $calcNum));
  }
}

$dealer = new Dealer();
$player = new Player(10000);
$judgment = new Judgment();

$player->decideOnBet();
$dealerHand = $dealer->firstDrawDealer($deck);
$playerHand = $player->firstDrawPlayer($deck);
$player->numericCalc($playerHand);
while (true) {
  $playerSelectedAction = $player->DecisionPlayer($playerHand, $choicesParams);
  if ($playerSelectedAction == 1) {
    $playerHand = $player->hit($playerHand, $deck);
    $playerNumCalc = $player->numericCalc($playerHand);
    if ($playerNumCalc > 21) {
      echo "バースト！\n";
      break;
    }
  } else {
    $playerHand = $player->stand($playerHand);
    $playerNumCalc = $player->numericCalc($playerHand);
    break;
  }
}

$dealer->numericCalc($dealerHand);








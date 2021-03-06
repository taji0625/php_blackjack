<?php

class Dealer
{
  public function firstDrawDealer($deck)
  {
    echo "\nカードが二枚ずつ配られた\n\n";
    $dealerHand = [];
    shuffle($deck);
    $hitCard1 = array_shift($deck);
    $hitCard2 = array_shift($deck);
    array_push($dealerHand, $hitCard1, $hitCard2);
    echo "ディーラーのカード\n" . "[" . $dealerHand[0]->mark . " の" . $dealerHand[0]->number . "]\n[？？？]\n\n";
    return $dealerHand;
  }

  public function cardOpen($dealerHand)
  {
    echo "ディーラーのカードがオープン\n\n";
    echo "ディーラーのカード\n" . "[" . $dealerHand[0]->mark . " の" . $dealerHand[0]->number . "]\n[" . $dealerHand[1]->mark . " の" . $dealerHand[1]->number . "]\n\n";
  }

  public function numericCalc($dealerHand)
  {
    $numbers = [];
    foreach ($dealerHand as $dHand) {
      if ($dHand->number == "K" || $dHand->number == "Q" || $dHand->number == "J") {
        $dHand->calcNum = 10;
        array_push($numbers, $dHand->calcNum);
      } elseif ($dHand->number == "A") {
        if ($numbers <= 10) {
          $dHand->calcNum = 11;
          array_push($numbers, $dHand->calcNum);
        } else {
          $dHand->calcNum = 1;
          array_push($numbers, $dHand->calcNum);
        }
      } else {
        array_push($numbers, $dHand->number);
      }
    }
    $numCalc = array_sum($numbers);
    echo "ディーラーのカード合計【${numCalc}】\n";
    return $numCalc;
  }

  public function hit($dealerHand, $deck)
  {
    echo "\nディーラーがカードをヒット！\n";
    shuffle($deck);
    $hitCard = array_shift($deck);
    array_push($dealerHand, $hitCard);
    echo "ディーラーのカード\n";
    foreach ($dealerHand as $dealerCard) {
      echo "[" . $dealerCard->mark . " の" . $dealerCard->number . "]\n";
    }
    echo "\n";
    return $dealerHand;
  }
}
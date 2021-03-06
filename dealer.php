<?php

class Dealer
{
  public function firstDrawDealer($cards)
  {
    echo "\nカードが二枚ずつ配られた\n\n";
    $hand = [];
    shuffle($cards);
    $hitCard1 = array_shift($cards);
    $hitCard2 = array_shift($cards);
    array_push($hand, $hitCard1, $hitCard2);
    echo "ディーラーのカード\n" . "[" . $hand[0]->mark . " の" . $hand[0]->number . "]\n[？？？]\n\n";
    return $hand;
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
    echo "ディーラーのカード合計【${numCalc}】\n\n";
    return $numCalc;
  }
}
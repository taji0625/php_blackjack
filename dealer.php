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
}
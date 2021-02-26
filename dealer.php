<?php

class Dealer
{
  public function firstDrawDealer($cards)
  {
    echo "\nカードが二枚ずつ配られた\n\n";
    shuffle($cards);
    $hand = array_splice($cards, 0, 2);
    echo "ディーラーのカード\n" . "[" . $hand[0]->mark . " の" . $hand[0]->number . "]\n[？？？]\n\n";
    return $hand;
  }
}
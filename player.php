<?php

class Player
{
  private $tip;

  public function __construct($tip)
  {
    $this->tip = $tip;
  }

  public function firstDrawPlayer($cards)
  {
    echo "カードが二枚配られた\n\n";
    shuffle($cards);
    $hand = array_splice($cards, 0, 2);
    echo "あなたのカード\n" . "[" . $hand[0]->mark . "の" . $hand[0]->number . "]\n[" . $hand[1]->mark . "の" . $hand[1]->number . "]\n\n";
    return $hand;
  }
}
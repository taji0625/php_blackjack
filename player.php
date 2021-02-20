<?php

class Player
{
  private $tip;

  public function __construct($tip)
  {
    $this->tip = $tip;
  }

  public function firstDrawPlayer($deck)
  {
    $hand = [];
    shuffle($deck);
    $hand = array_rand($deck, 2);
    echo $hand[1] . "\n";
    echo "あなたのカード\n";
  }
}
<?php

class Dealer
{
  public function firstDrawDealer($cards)
  {
    shuffle($cards);
    $hand = array_splice($cards, 0, 2);
    return $hand;
  }
}
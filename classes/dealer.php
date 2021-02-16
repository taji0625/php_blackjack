<?php

class Dealer
{
  public function firstDrawDealer($deck)
  {
    $hand = array_splice($deck, 0, 51);
  }
}
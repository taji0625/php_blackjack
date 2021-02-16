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
    $hand = array_splice($deck, 0, 51);
  }
}
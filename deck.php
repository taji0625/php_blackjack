<?php

class deck
{
  public function __construct()
  {
    $cards = [];
    $mk = ["スペード", "ハート", "ダイア", "クラブ"];
    $num = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q" ,"K"];

    foreach ($mk as $mark) {
      foreach ($num as $number) {
        $card = new Deck($mark, $number);
        array_push($cards, $card);
      }
    }
    shuffle($cards);
  }
}
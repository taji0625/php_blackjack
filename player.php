<?php

class Player
{
  private $tip;

  public function __construct($tip)
  {
    $this->tip = $tip;
    echo "\nゲームを始めます\n";
  }

  public function getTip()
  {
    return $this->tip;
  }

  public function decideOnBet()
  {
    echo "あなたは" . $this->getTip() . "チップ持っています\n";
    echo "いくら掛けますか？\n";
    while(true) {
      echo "掛け金を入力してください\n";
      $bet = trim(fgets(STDIN));
      if(is_numeric($bet)) {
        $this->tip -= $bet;
        break;
      }
      echo "数字で入力してください！\n\n";
    }
  }

  public function firstDrawPlayer($cards)
  {
    shuffle($cards);
    $hand = array_splice($cards, 0, 2);
    echo "あなたのカード\n" . "[" . $hand[0]->mark . "の" . $hand[0]->number . "]\n[" . $hand[1]->mark . "の" . $hand[1]->number . "]\n\n";
    return $hand;
  }
}
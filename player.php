<?php

require_once "./choices.php";


class Player
{
  private $tip;

  public function __construct($tip)
  {
    $this->tip = $tip;
    echo "\nブラックジャックを始めます\n";
  }

  public function getTip()
  {
    return $this->tip;
  }

  public function decideOnBet()
  {
    echo "あなたは" . $this->getTip() . "チップ持っています\n";
    echo "いくら賭けますか？\n";
    while(true) {
      echo "賭け金を入力してください\n";
      $bet = trim(fgets(STDIN));
      if(is_numeric($bet)) {
        $this->tip -= $bet;
        echo "\n" . $bet . "チップを賭けた\n";
        break;
      }
      echo "数字で入力してください！\n\n";
    }
  }

  public function firstDrawPlayer($deck)
  {
    $hand = [];
    shuffle($deck);
    $hitCard1 = array_shift($deck);
    $hitCard2 = array_shift($deck);
    array_push($hand, $hitCard1, $hitCard2);
    echo "あなたのカード\n" . "[" . $hand[0]->mark . " の" . $hand[0]->number . "]\n[" . $hand[1]->mark . " の" . $hand[1]->number . "]\n\n";
    return $hand;
  }

  public function firstDecisionPlayer($playerHand, $choicesParams)
  {
    foreach ($choicesParams as $i => $choice) {
      $i++;
      echo $i . ". ". $choice . "\n";
    }
    echo "\n";
    while (true) {
      echo "ヒットかスタンドの番号を入力してください\n\n";
      $selectChoiceNum = trim(fgets(STDIN));
      if ($selectChoiceNum == 1 || $selectChoiceNum == 2) {
        break;
      }
      echo "1か2を入力してください！\n";
    }
    return $selectChoiceNum;
  }

  public function hit($playerHand, $deck)
  {
    echo "\nヒット！\n";
    echo "カードが一枚配られた\n\n";
    $hitCard = array_shift($deck);
    array_push($playerHand, $hitCard);
    echo "あなたのカード\n";
    foreach ($playerHand as $playerCard) {
      echo "[" . $playerCard->mark . " の" . $playerCard->number . "]\n";
    }
    echo "\n";
    return $playerHand;
  }

  public function stand($playerHand)
  {
    echo "\nスタンド！\n";
    return $playerHand;
  }
}
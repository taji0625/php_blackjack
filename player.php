<?php


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

  public function decideOnBet(): string
  {
    echo "\nあなたは" . $this->getTip() . "円持っています\n";
    echo "いくら賭けますか？\n";
    while(true) {
      echo "賭け金を入力してください\n";
      $bet = trim(fgets(STDIN));
      if (is_numeric($bet)) {
        if ($bet < $this->getTip()) {
          $this->tip -= $bet;
          echo "\n" . $bet . "円を賭けた\n";
          return $bet;
          break;
        } elseif ($bet == $this->getTip())  {
          $this->tip -= $bet;
          echo "\nオールイン！！\n";
          return $bet;
          break;
        } else {
          echo "\n所持金の範囲内で入力してください！\n\n";
        }
      } else {
        echo "数字で入力してください！\n\n";
      }
    }
  }

  public function firstDrawPlayer($deck): array
  {
    $hand = [];
    shuffle($deck);
    $hitCard1 = array_shift($deck);
    $hitCard2 = array_shift($deck);
    array_push($hand, $hitCard1, $hitCard2);
    echo "あなたのカード\n" . "[" . $hand[0]->mark . " の" . $hand[0]->number . "]\n[" . $hand[1]->mark . " の" . $hand[1]->number . "]\n\n";
    return $hand;
  }

  public function DecisionPlayer($playerHand, $choicesParams): string
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

  public function hit($playerHand, $deck): array
  {
    echo "\nヒット！\n";
    echo "カードが一枚配られた\n\n";
    shuffle($deck);
    $hitCard = array_shift($deck);
    array_push($playerHand, $hitCard);
    echo "あなたのカード\n";
    foreach ($playerHand as $playerCard) {
      echo "[" . $playerCard->mark . " の" . $playerCard->number . "]\n";
    }
    return $playerHand;
  }

  public function stand($playerHand): array
  {
    echo "\nスタンド！\n";
    return $playerHand;
  }

  public function numericCalc($playerHand): string
  {
    $numbers = [];
    foreach ($playerHand as $pHand) {
      switch ($pHand->number) {
        case 'K':
        case 'Q':
        case 'J':
          $pHand->calcNum = 10;
          array_push($numbers, $pHand->calcNum);
          break;
        case 'A':
          $provisionalNum = array_sum($numbers);
          if ($provisionalNum < 11 || empty($numbers)) {
            $pHand->calcNum = 11;
            array_push($numbers, $pHand->calcNum);
            break;
          } else {
            $pHand->calcNum = 1;
            array_push($numbers, $pHand->calcNum);
            break;
          }
        default:
          array_push($numbers, $pHand->number);
      }
    }
    $numCalc = array_sum($numbers);
    echo "あなたのカード合計【${numCalc}】\n\n";
    return $numCalc;
  }

  public function continue($continueParams)
  {
    echo "\nゲームを続けますか？\n";
    foreach ($continueParams as $i => $continueParam) {
      $i++;
      echo $i . ". " . $continueParam . "\n";
    }
    echo "\n";
    while (true) {
      echo "続けるかやめるかの番号を入力してください\n\n";
      $selectContinueNum = trim(fgets(STDIN));
      if ($selectContinueNum == 1 || $selectContinueNum == 2) {
        break;
      }
      echo "1か2を入力してください！\n\n";
    }
    return $selectContinueNum;
  }

  public function win($bet, $playerHand)
  {
    $includeA = in_array('A', array_column($playerHand, 'number'));
    $includeK = in_array('K', array_column($playerHand, 'number'));
    $includeQ = in_array('Q', array_column($playerHand, 'number'));
    $includeJ = in_array('J', array_column($playerHand, 'number'));
    $includeTen = in_array('10', array_column($playerHand, 'number'));
    if ($includeA && $includeK || $includeA && $includeQ || $includeA && $includeJ || $includeA && $includeTen) {
      echo "ブラックジャック！！\n";
      echo "\nあなたの勝ち\n";
      $brackjackWinningTip = $bet * 2.5;
      $this->tip += $brackjackWinningTip ;
      echo "所持金が" . $bet * 1.5 . "円増えた\n"; 
      echo "あなたの所持金" . $this->getTip() . "円\n";
    } else {
      echo "\nあなたの勝ち\n";
      $winningTip = $bet * 2;
      $this->tip += $winningTip;
      echo "所持金が" . $bet . "円増えた\n"; 
      echo "あなたの所持金" . $this->getTip() . "円\n";
    }
  }

  public function draw($bet)
  {
    echo "\n引き分け\n";
    $this->tip += $bet;
    echo "あなたの所持金" . $this->getTip() . "円\n";
  }

  public function lose($bet)
  {
    echo "\nあなたの負け\n";
    echo "あなたは" . $bet . "円を失った\n";
    echo "あなたの所持金" . $this->getTip() . "円\n";
  }
}
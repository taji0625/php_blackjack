<?php

class Judgment
{
  public function isBursting($playerNumCalc)
  {
    if ($playerNumCalc > 21) {
      echo "バースト！\n";
    }
  }
}
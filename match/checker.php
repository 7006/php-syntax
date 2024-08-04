<?php

class Checker {
  const DAILY = 'daily';
  const WEEKLY = 'weekly';
  const MONTHLY = 'monthly';
  const DAY = 'day';

  private $interval;

  public function __construct($interval) {
    $this->interval = $interval;
  }

  public function getDateInterval(): \DateInterval {
    return match ($this->interval) {
        self::DAILY, self::DAY => new \DateInterval('P1D'),
        self::WEEKLY => new \DateInterval('P1W'),
        self::MONTHLY => new \DateInterval('P1M'),
        default => throw new \RuntimeException('Invalid interval')
    };
  }
}

function main($interval) {
  $checker = new Checker($interval);
  $dateInterval = $checker->getDateInterval();
  echo $dateInterval->format('%d days');
}

main(interval: Checker::DAILY);
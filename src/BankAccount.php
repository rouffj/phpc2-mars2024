<?php

namespace App;

class BankAccount
{
    public function __construct(private float $amount = 0.0)
    {
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function deposit(float $depositAmount): void
    {
        $this->amount += $depositAmount;
    }

    public function withdraw(float $amount): void
    {
        $this->amount -= $amount;
    }
}
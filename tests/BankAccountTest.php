<?php

namespace Test;

use App\BankAccount;
use PHPUnit\Framework\TestCase;

class BankAccountTest extends TestCase
{
    private ?BankAccount $bankAccount = null;

    protected function setUp(): void
    {
        $this->bankAccount = new BankAccount();
    }

    public function testWhenBankAccountIsCreated()
    {
        $this->assertEquals(0, $this->bankAccount->getAmount());
    }

    public function testWhenDepositMoney()
    {
        $bankAccount = new BankAccount();

        $bankAccount->deposit(100.0);
        $this->assertEquals(100.0, $bankAccount->getAmount());
        $bankAccount->deposit(50.0);
        $this->assertEquals(150.0, $bankAccount->getAmount());
    }

    public function testWhenWithdrawMoney()
    {
        $bankAccount = new BankAccount(75.0);

        $bankAccount->withdraw(25.0);
        $this->assertSame(50.0, $bankAccount->getAmount());
    }
}
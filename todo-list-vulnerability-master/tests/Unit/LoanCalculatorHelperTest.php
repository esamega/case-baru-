<?php

namespace Tests\Unit;

use App\Helpers\LoanCalculatorHelper;
use PHPUnit\Framework\TestCase;

class LoanCalculatorHelperTest extends TestCase
{
    public function testCalculateMonthlyInstallment()
    {
        $monthly = LoanCalculatorHelper::calculateMonthlyInstallment(100_000_000, 10, 5);
        $this->assertEquals(2_124_704, round($monthly, 0));
    }

    public function testTotalInterestAndPayment()
    {
        $installment = LoanCalculatorHelper::calculateMonthlyInstallment(50_000_000, 12, 3);

        $interest = LoanCalculatorHelper::calculateTotalInterest($installment, 3, 50_000_000);
        $payment = LoanCalculatorHelper::calculateTotalPayment($installment, 3);

        $this->assertGreaterThan(0, $interest);
        $this->assertEquals($interest + 50_000_000, $payment);
    }
}

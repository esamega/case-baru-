<?php

namespace App\Http\Controllers;

use App\Helpers\LoanCalculatorHelper;
use Illuminate\Http\Request;

class LoanCalculatorController extends Controller
{
    public function index()
    {
        return view('loan');
    }

    public function calculate(Request $request)
    {
        // Validation
        $request->validate([
            'principal' => 'required|numeric|min:1000000',
            'interest' => 'required|numeric|min:0',
            'years' => 'required|integer|min:1'
        ]);

        // Get Data
        $principal = $request->input('principal');
        $interest = $request->input('interest');
        $years = $request->input('years');

        // Main Logic
        $installment = LoanCalculatorHelper::calculateMonthlyInstallment($principal, $interest, $years);
        $totalInterest = LoanCalculatorHelper::calculateTotalInterest($installment, $years, $principal);
        $totalPayment = LoanCalculatorHelper::calculateTotalPayment($installment, $years);

        return view('loan', compact('principal', 'interest', 'years', 'installment', 'totalInterest', 'totalPayment'));
    }
}

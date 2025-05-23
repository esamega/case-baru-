<?php

namespace App\Http\Controllers;

use App\Helpers\CalculatorHelper;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        // Validation Request
        $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'operation' => 'required|in:add,subtract',
        ]);

        // Mengambil data
        $a = $request->input('a');
        $b = $request->input('b');
        $operation = $request->input('operation');

        // Menghitung data
        $result = $operation === 'add'
            ? CalculatorHelper::add($a, $b)
            : CalculatorHelper::subtract($a, $b);

        // Return view
        return view('calculator', compact('a', 'b', 'operation', 'result'));
    }
}

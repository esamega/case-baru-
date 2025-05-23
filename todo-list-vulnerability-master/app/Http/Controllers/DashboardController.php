<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function view(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // SQL Injection vulnerability here
            $tasks = DB::select("SELECT * FROM tasks WHERE name LIKE '%$search%'");
        } else {
            $tasks = DB::select("SELECT * FROM tasks");
        }

        return view('dashboard', ['tasks' => $tasks]);
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $template = 'studentDashboard.addFund.index';
        return view('studentDashboard.dashboard.layout', compact(
            'template'));
    }

    public function addFunds(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $userId = Auth::id();

        $userBalance = UserBalance::firstOrCreate(['user_id' => $userId]);

        $userBalance->balance += $request->input('amount');
        $userBalance->save();

        return redirect()->route('cart.index')->with('success', 'Funds added successfully!');
    }
}

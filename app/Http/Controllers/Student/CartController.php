<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->where('status', 'pending')->get();
        $userBalance = UserBalance::where('user_id', $userId)->first();
        $balance = $userBalance ? $userBalance->balance : 0;

        $total = $cartItems->sum(function ($item) {
            return $item->total_price;
        });
        $template = 'studentDashboard.cart.index';
        return view('studentDashboard.dashboard.layout', compact(
            'cartItems', 'balance', 'total','template'));
    }

    public function addToCart(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            abort(404);
        }

        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->where('course_id', $id)->where('status', 'pending')->first();

        if (!$cart) {
            Cart::create([
                'user_id' => $userId,
                'course_id' => $course->id,
                'total_price' => $course->price,
                'status' => 'pending'
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Course added to cart successfully!');
    }

    public function removeFromCart($id)
    {
        $userId = Auth::id();
        Cart::where('user_id', $userId)->where('course_id', $id)->where('status', 'pending')->delete();

        return redirect()->route('cart.index')->with('success', 'Course removed from cart successfully!');
    }

    public function checkout(Request $request)
    {
        $userId = Auth::id();
        $userBalance = UserBalance::where('user_id', $userId)->first();
        $totalAmount = $request->input('total');

        if ($userBalance && $userBalance->balance >= $totalAmount) {
            $userBalance->balance -= $totalAmount;
            $userBalance->save();

            Cart::where('user_id', $userId)
                ->where('status', 'pending')
                ->update(['status' => 'paid', 'total_price' => $totalAmount]);

            return redirect()->route('student_dashboard.index')->with('success', 'Payment successful! Your courses have been purchased.');
        } else if ($userBalance && $userBalance->balance < $totalAmount) {
            return redirect()->route('cart.index')->with('error', 'Your balance is not enough!');
        }
        return redirect()->route('student_dashboard.index')->with('error', 'Insufficient balance to complete the purchase.');
    }

}

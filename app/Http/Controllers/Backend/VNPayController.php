<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $total = $request->input('total');

        // Ensure the total amount is within the valid range
        if ($total < 5000 || $total >= 1000000000) {
            return redirect()->route('cart.show')->with('error', 'Invalid transaction amount.');
        }

        $vnp_TmnCode = config('MS47YM63');
        $vnp_HashSecret = config('L27GOVUGKD5GXYJPINMC2DUZMGNI66OS');
        $vnp_Url = config('vnpay.vnp_Url');
        $vnp_Returnurl = config('https://learnx.dev/studentdashboard/index');
        $vnp_TxnRef = date("YmdHis");
        $vnp_OrderInfo = "Thanh toán đơn hàng #" . $vnp_TxnRef;
        $vnp_OrderType = "bill payment";
        $vnp_Amount = $total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "";
        $vnp_IpAddr = $request->ip();




        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => 'MS47YM63',
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => 'https://learnx.dev/studentdashboard/index',
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $hashdata = urldecode(http_build_query($inputData));
        $query = http_build_query($inputData);
        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url = $vnp_Url . "?" . $query . '&vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;


//        dd($inputData);


        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        Log::info('VNPay return data: ', $request->all());

        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashdata = urldecode(http_build_query($inputData));
        $secureHash = hash('sha256', $vnp_HashSecret . $hashdata);

        Log::info('Generated secure hash: ' . $secureHash);
        Log::info('VNPay secure hash: ' . $vnp_SecureHash);

        if ($secureHash == $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                // Payment success
                $cart = Cart::where('user_id', auth()->id())
                    ->where('status', 'pending')
                    ->first();
                $cart->status = 'paid';
                $cart->save();

                // Update the user balance
                $userBalance = UserBalance::where('user_id', auth()->id())->first();
                $userBalance->balance += $cart->total_price;
                $userBalance->save();

                return redirect()->route('cart.index')->with('success', 'Payment successful!');
            } else {
                return redirect()->route('cart.index')->with('error', 'Payment failed!');
            }
        } else {
            return redirect()->route('cart.index')->with('error', 'Invalid signature!');
        }
    }
}

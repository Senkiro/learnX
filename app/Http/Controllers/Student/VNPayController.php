<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class VNPayController extends Controller
{
    public function vnpay_payment(Request $request)
    {

        $total = $request->input('total');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://learnx.dev/payment/vnpay_return";
        $vnp_TmnCode = "8X4DW6U5";//Mã website tại VNPAY
        $vnp_HashSecret = "M5QPBZZ5Y9S19FC5L8ZWELB24QVAKEH6"; //Chuỗi bí mật

        $vnp_TxnRef = rand(1,100000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
        $vnp_OrderInfo = "THANH TOAN HOA DON";
        $vnp_OrderType = "Course";
        $vnp_Amount = $total * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,

    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo

    }

    public function vnpayReturn(Request $request)
    {
        Log::info('VNPay return data: ', $request->all());

        $vnp_HashSecret = "M5QPBZZ5Y9S19FC5L8ZWELB24QVAKEH6";
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

<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(protected PaymentService $paymentService) {}

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $payment = $this->paymentService->processPayment($request->order_id, $request->payment_method);

        if (!$payment) {
            return ApiResponse::error('Payment could not be processed', 500);
        }
        return ApiResponse::success($payment, 'Payment processed successfully', 200);
    }
}

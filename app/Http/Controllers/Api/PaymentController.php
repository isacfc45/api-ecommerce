<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(protected PaymentService $paymentService) {}

    public function index(Request $request)
    {
        return ApiResponse::success($this->paymentService->listPayments());
    }

    public function store(Request $request)
    {
        $payment = $this->paymentService->createPayment($request->all());
        return ApiResponse::success($payment, 'Payment created successfully', 201);
    }
}

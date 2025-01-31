<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentRepository
{
    public function createPayment($order, $paymentMethod)
    {
        return Payment::create([
            'order_id' => $order->id,
            'payment_method' => $paymentMethod,
            'amount' => $order->total_price,
            'transaction_id' => Str::uuid(),
            'status' => 'pending',
        ]);
    }

    public function updatePaymentStatus($payment, $status)
    {
        $payment->update(['status' => $status]);
        return $payment;
    }
}

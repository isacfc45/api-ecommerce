<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;

class PaymentService
{
    protected $paymentRepository;
    protected $orderRepository;

    public function __construct(PaymentRepository $paymentRepository, OrderRepository $orderRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->orderRepository = $orderRepository;
    }

    public function processPayment($orderId, $paymentMethod)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        if (!$order || $order->status !== 'pending') {
            return null;
        }

        $payment = $this->paymentRepository->createPayment($order, $paymentMethod);

        sleep(2);
        $status = 'approved';

        $this->paymentRepository->updatePaymentStatus($payment, $status);

        $this->orderRepository->updateOrderStatus($orderId, 'paid');

        return $payment;
    }
}

<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{
    public function __construct(protected PaymentRepository $paymentRepository) {}

    public function listPayments()
    {
        return $this->paymentRepository->all();
    }

    public function createPayment($data)
    {
        return $this->paymentRepository->store($data);
    }
}

<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;

class PaymentRepository
{
    public function store(array $data): Payment
    {
        return Payment::create($data);
    }

    public function all(): Collection
    {
        return Payment::all();
    }

    public function find(int $id): Payment
    {
        return Payment::findOrFail($id);
    }
}

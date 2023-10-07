<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory {
    protected $model = Transaction::class;

    public function definition(): array {
        return [
            'turn'    => 1,
            'round'   => 2,
            'amount'  => 3,
            'counted' => false,
        ];
    }
}

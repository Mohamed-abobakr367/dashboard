<?php

namespace Database\Seeders;


use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() == 0) {
            User::factory()->count(5)->create();
        }

        $statuses = [
            OrderStatusEnum::Pending,
            OrderStatusEnum::Confirmed,
            OrderStatusEnum::Canceled,
        ];

        for ($i = 1; $i <= 5; $i++) {
            Order::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'status' => Arr::random($statuses),
                'total' => rand(100, 1000),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            [
                'privacy_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra',
                'terms_conditions' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra',
                'refund_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra',
                'payment_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra',
                'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra',
                'return_process' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum, eos placeat ra'
            ]
        ];

        Policy::insert($policies);
    }
}

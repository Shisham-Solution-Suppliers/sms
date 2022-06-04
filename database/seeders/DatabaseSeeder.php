<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Shisham Chudal',
            'email' => 'shishamchudal61@gmail.com',
        ]);
        
        \App\Models\Operator::factory()->create([
            'name' => 'NTC',
        ]);

        \App\Models\Operator::factory()->create([
            'name' => 'Ncell',
        ]);

        \App\Models\Operator::factory()->create([
            'name' => 'Smart Cell',
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 1,
            'code' => 984,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 1,
            'code' => 985,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 1,
            'code' => 986,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 1,
            'code' => 974,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 1,
            'code' => 975,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 2,
            'code' => 980,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 2,
            'code' => 981,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 2,
            'code' => 982,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 3,
            'code' => 961,
        ]);

        \App\Models\OperatorDetail::factory()->create([
            'operator_id' => 3,
            'code' => 988,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'title' => '予算a',
                'amount' => 100000,
                'date' => '2024-04-01',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '予算b',
                'date' => '2024-04-10',
                'amount' => 200000,
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '予算c',
                'date' => '2024-04-20',
                'amount' => 300000,
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach($params as $param) {
            DB::table('budgets')->insert($param);
        }
    }
}

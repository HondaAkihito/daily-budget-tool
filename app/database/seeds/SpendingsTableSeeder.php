<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SpendingsTableSeeder extends Seeder
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
                'title' => 'タイトルa',
                'date' => '2024-04-01',
                'amount' => 1000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'タイトルb',
                'date' => '2024-04-05',
                'amount' => 2000,
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'タイトルc',
                'date' => '2024-04-10',
                'amount' => 3000,
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach($params as $param) {
            DB::table('spendings')->insert($param);
        }
    }
}

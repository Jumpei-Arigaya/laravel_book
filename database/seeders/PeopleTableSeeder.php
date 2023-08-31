<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => '12',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@filder.com',
            'age' => '22',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'sachilko',
            'mail' => 'sachiko@gmail.com',
            'age' => '32',
        ];
        DB::table('people')->insert($param);
    }
}

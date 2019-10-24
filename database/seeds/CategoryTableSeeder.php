<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => '病院',
            'delete_flag' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'メリット',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => 'デメリット',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => '年齢',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => '社会人',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => '学生',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => '食事',
            'delete_flag' => 0,
        ]);

        DB::table('categories')->insert([
            'category_name' => 'お金',
            'delete_flag' => 0,
        ]);

         DB::table('categories')->insert([
            'category_name' => ' 顔',
            'delete_flag' => 0,
        ]);
    }
}

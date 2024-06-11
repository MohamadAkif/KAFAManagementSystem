<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            ['class_name' => 'Class 1', 'teacher_id' => 1],
            ['class_name' => 'Class 2', 'teacher_id' => 2],
        ]);
    }
}

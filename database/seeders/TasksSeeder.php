<?php

namespace Database\Seeders;

use App\Models\TasksModel;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            TasksModel::create([
                'title' => 'task '.$i,
                'text' => 'text test '.$i,
                'status' => 'waiting',
            ]);
        }

    }
}

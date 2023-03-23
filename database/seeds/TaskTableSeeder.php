<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Task::class, 5)->create();
    }
}

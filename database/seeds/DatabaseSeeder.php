<?php

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
        factory(\App\User::class,5)->create();

        $task = new \App\Models\Task();
        $task->name = "牛乳を買いに行く";
        $task->priority = 1;
        $task->save();

        $task = new \App\Models\Task();
        $task->name = "借りた本を読み切る";
        $task->priority = 2;
        $task->save();

        $task = new \App\Models\Task();
        $task->name = "部屋の掃除をする";
        $task->priority = 3;
        $task->save();

        $task = new \App\Models\Task();
        $task->name = "ゼミの課題に着手する";
        $task->priority = 4;
        $task->save();

        $task = new \App\Models\Task();
        $task->name = "旅行の予定を立てる";
        $task->priority = 5;
        $task->save();


        // $this->call(UserSeeder::class);
    }
}

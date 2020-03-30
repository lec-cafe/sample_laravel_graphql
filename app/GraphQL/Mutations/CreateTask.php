<?php
namespace App\GraphQL\Mutations;

use App\Models\Task;

class CreateTask
{
    public function __invoke($rootValue, array $args)
    {
        $task = new Task();
        $task->name = "【{$args["name"]}】" ;
        $task->priority = $args["priority"];
        $task->save();

        $task->refresh();
        return $task;
    }
}

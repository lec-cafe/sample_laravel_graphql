<?php
namespace App\GraphQL\Mutations;

use App\Models\Task;

class DeleteTask
{
    public function __invoke($rootValue, array $args)
    {
        $task = Task::find($args["id"]);
        $task->delete();

        return $task;
    }
}

<?php
namespace App\GraphQL\Mutations;

use App\Models\Task;

class ArchieveTask
{
    public function __invoke($rootValue, array $args)
    {
        $task = Task::find($args["id"]);
        $task->has_done = true;
        $task->save();

        return $task;
    }
}

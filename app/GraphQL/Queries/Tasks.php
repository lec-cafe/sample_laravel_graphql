<?php
namespace App\GraphQL\Queries;

use App\Models\Task;

class Tasks
{
    public function __invoke($rootValue, array $args)
    {
        $tasks = Task::orderBy("priority","DESC")->get();

        return $tasks;
    }
}

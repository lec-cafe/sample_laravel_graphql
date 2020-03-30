<?php
namespace App\GraphQL\Mutations;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Nuwave\Lighthouse\Exceptions\ValidationException;

class CreateTasks
{
    public function __invoke($rootValue, array $args)
    {
        $rules = [
            "tasks" => ["required","array","max:5"],
            "tasks.*.name" => ["required","max:50"],
            "tasks.*.priority" => ["required",Rule::in(1,2,3,4,5)],
        ];
        $val = validator($args,$rules);
        assert($val instanceof Validator);
        if(!$val->passes()){
            throw new ValidationException($val);
        }

        $tasks = [];
        foreach ($args["tasks"] as $input) {
            $task = new Task();
            $task->name = "【{$input["name"]}】" ;
            $task->priority = $input["priority"];
            $task->save();
            $tasks[] = $task->refresh();
        }

        return $tasks;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TasksTable extends Component
{
    use WithPagination;
    public $checklist;
    protected $paginationTheme = 'bootstrap';

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::find($task['value'])->update(['position' => $task['order']]);
        }
    }

    public function task_up($task_id)
    {
        $task = Task::find($task_id);
        if ($task) {
            Task::whereNull('user_id')->where('position', $task->position - 1)->where('checklist_id', $task->checklist_id)->update(['position' => $task->position]);
            $task->update(['position' => $task->position - 1]);
        }
    }
    public function task_down($task_id)
    {
        $task = Task::find($task_id);
        if ($task) {
            Task::whereNull('user_id')->where('position', $task->position + 1)->where('checklist_id', $task->checklist_id)->update(['position' => $task->position]);
            $task->update(['position' => $task->position + 1]);
        }
    }

    public function render()
    {
        $tasks = $this->checklist->tasks()->where('user_id', NULL)->orderBy('position', 'asc')->paginate(5);
        return view('livewire.tasks-table', compact('tasks'));
    }
}

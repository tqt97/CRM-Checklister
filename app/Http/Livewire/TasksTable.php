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

    // public function mount($checklist)
    // {
    //     $this->checklist = $checklist;
    // }

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::find($task['value'])->update(['position' => $task['order']]);
        }
    }

    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position', 'asc')->paginate(5);
        return view('livewire.tasks-table', compact('tasks'));
    }
}

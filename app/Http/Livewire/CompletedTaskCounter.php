<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompletedTaskCounter extends Component
{
    public $completed_tasks = 0;
    public $tasks_count = 0;
    public $checklist_id;

    protected $listeners = [
        'task_completed' => 'recalculate_tasks',
    ];

    public function recalculate_tasks($task_id, $checklist_id)
    {
        if ($checklist_id == $this->checklist_id) {
            $this->completed_tasks++;
        }
    }

    public function render()
    {
        return view('livewire.completed-task-counter');
    }
}

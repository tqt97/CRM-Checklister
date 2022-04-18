<div class="card card-info card-outline">
    <div class="card-header">
        <h1 class="card-title">
            <i class="fas fa-tasks fa-small mr-2"></i>
            <b>{{ $checklist->name }}</b>
        </h1>
    </div>
    <div>
        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Task name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checklist->tasks->where('user_id', null) as $index => $task)
                        <tr>
                            <td>
                                <input wire:click="complete_task({{ $task->id }})" type="radio"
                                    @if (in_array($task->id, $completed_tasks)) checked  disabled @endif>
                            </td>
                            <td>
                                <a wire:click.prevent="toggle_task({{ $task->id }})"
                                    href="#">{{ $task->name }}</a>
                            </td>
                            <td wire:click="toggle_task({{ $task->id }})">
                                @if (in_array($task->id, $opened_tasks))
                                    <i class="fas fa-angle-up"></i>
                                @else
                                    <i class="fas fa-angle-down"></i>
                                @endif
                            </td>
                        </tr>
                        @if (in_array($task->id, $opened_tasks))
                            <tr class="shadow" style="z-index: 99">
                                <td></td>
                                <td colspan="2">{!! $task->description !!}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{-- {{ $checklist->tasks->links() }} --}}
        </div>
    </div>
</div>

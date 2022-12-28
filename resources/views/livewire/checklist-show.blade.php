<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $checklist->name }}
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tbody>
                        @foreach ($checklist->tasks->where('user_id', null) as $task)
                            <tr>
                                <td>
                                    <input type="radio" name="" id=""
                                        @if (in_array($task->id, $completed_task)) checked="checked" @endif
                                        wire:click="complete_task({{ $task->id }})">
                                </td>
                                <td wire:click="toggle_task({{ $task->id }})">
                                    {{ $task->name }}
                                </td>
                                <td wire:click="toggle_task({{ $task->id }})">
                                    @if (in_array($task->id, $opened_task))
                                        <svg width="20px" height="20px" class="nav-icon">
                                            <use
                                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-caret-top') }}">
                                            </use>
                                        </svg>
                                    @else
                                        <svg width="20px" height="20px" class="nav-icon">
                                            <use
                                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-caret-bottom') }}">
                                            </use>
                                        </svg>
                                    @endif
                                </td>
                            </tr>

                            @if (in_array($task->id, $opened_task))
                                <tr>
                                    <td></td>
                                    <td colspan="2">{!! $task->description !!}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

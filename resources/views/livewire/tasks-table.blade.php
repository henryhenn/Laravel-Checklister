<table class="table table-sm">
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>
                    {{-- @dd($task) --}}
                    @if ($task->positon > 1)
                        <a href="#" wire:click.prevent="task_up({{ $task->id }})">
                            &uarr;
                        </a>
                    @endif
                    @if ($task->position < $tasks->max('position'))
                        <a href="#" wire:click.prevent="task_down({{ $task->id }})">
                            &darr;
                        </a>
                    @endif
                </td>
                <td>{{ $task->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                            class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="post"
                            class="ms-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('{{ __('Are You Sure?') }}')"
                                class="btn btn-sm btn-danger text-white">{{ __('Delete ') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

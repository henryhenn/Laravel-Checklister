<table class="table table-sm" wire:sortable="updateTaskOrder">
    <tbody>
        @foreach ($tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
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

@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">
            <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="card-header">{{ __('Edit Checklist') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $checklist->name) }}"
                            class="form-control @error('name')
                                is-invalid
                            @enderror">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Save Checklist') }}</button>
                </div>
            </form>
        </div>

        <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
            method="post" class="mt-2 ms-3">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('{{ __('Are You Sure?') }}')"
                class="btn btn-danger text-white">{{ __('Delete This Checklist') }}</button>
        </form>

        <hr>

        <div class="card">
            <div class="card-header">{{ __('Lists of Tasks') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        @foreach ($checklist->tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                                            class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                            method="post" class="ms-3">
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
            </div>
        </div>

        @if ($errors->storetask->any())
            <div class="alert alert-danger">
                @foreach ($errors->storetask->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="card mt-3">
            <form action="{{ route('admin.checklists.tasks.store', $checklist) }}" method="post">
                @csrf
                <div class="card-header">{{ __('New Task') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input value="{{ old('name') }}" type="text" name="name" id="name"
                            class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}
                        </textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Save Task') }}</button>
                </div>
            </form>
        </div>

    </div>
@endsection

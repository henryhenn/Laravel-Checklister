@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">
            <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">{{ __('Edit Task') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}"
                            class="form-control @error('name')
                                is-invalid
                            @enderror">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}
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

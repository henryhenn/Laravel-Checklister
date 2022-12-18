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
                        <input type="text" name="name" id="name" value="{{ $checklist->name }}"
                            class="form-control @error('name')
                                is-invalid
                            @enderror">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
    </div>
@endsection

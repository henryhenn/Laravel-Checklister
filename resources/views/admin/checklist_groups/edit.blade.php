@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">
            <form action="{{ route('admin.checklist_groups.update', $checklistGroup) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">{{ __('Edit Checklist Group') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" value="{{ $checklistGroup->name }}" name="name" id="name"
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

        <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup) }}" method="post" class="mt-2 ms-3">
            @csrf
            @method('DELETE')
            <button onclick="return confirm({{ __('Are You Sure?') }})" type="submit"
                class="btn btn-danger text-white">{{ __('Delete This Checklist Group') }}</button>
        </form>
    </div>
@endsection

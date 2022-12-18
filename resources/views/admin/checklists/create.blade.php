@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">
            <form action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}" method="post">
                @csrf
                <div class="card-header">{{ __('New Checklist in ') }} <span class="fw-bold">{{ $checklistGroup->name }}
                    </span></div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" placeholder="{{ __('Checklist Name') }}"
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
    </div>
@endsection

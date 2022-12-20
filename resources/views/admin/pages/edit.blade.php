@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">

            <form action="{{ route('admin.pages.update', $page) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">{{ __('Edit Page') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                            class="form-control @error('title')
                                is-invalid
                            @enderror">

                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea name="content" id="task-textarea"
                            class="form-control @error('content')
                            is-invalid
                        @enderror">{{ old('content', $page->content) }}
                        </textarea>

                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Save Task') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#task-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

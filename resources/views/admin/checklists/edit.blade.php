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
                @livewire('tasks-table', ['checklist' => $checklist])
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
                        <textarea name="description" id="task-textarea"
                            class="form-control @error('description')
                            is-invalid
                        @enderror">
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

@section('scripts')
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', '{{ route('admin.images.store') }}', true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }

                    resolve({
                        default: response.url
                    });
                });

                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            _sendRequest(file) {
                const data = new FormDa ta();

                data.append('upload', file);

                this.xhr.send(data);
            }
        }

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        ClassicEditor
            .create(document.querySelector('#task-textarea'), {
                extraPlugins: [SimpleUploadAdapterPlugin]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

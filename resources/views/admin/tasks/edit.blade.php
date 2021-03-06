<x-admin-layout>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->storeTask->any())
                        <div class="py-1 mb-3 rounded alert-warning">
                            <ul class="mb-0">
                                @foreach ($errors->storeTask->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0"> {{ __('Edit tasks') }} </h5>
                        </div>
                        <form method="post"
                            action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Task name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea name="description" id="editor" class="form-control" rows="4">{!! $task->description !!}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    {{ __('Save changes') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @push('before-livewire-scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush --}}
    @push('before-livewire-scripts')
        @include('admin.partials.ckeditor')
    @endpush
</x-admin-layout>

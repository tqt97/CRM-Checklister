<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{ __('Edit checklist group') }}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ __('Edit Checklist group') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <form method="post"
                            action="{{ route('admin.checklist_groups.update', $checklistGroup->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value=" {{ $checklistGroup->name }}">
                                    @error('name')
                                        <div class="mt-1 text-red text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <div class="card-footer">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ?')"
                                    class="btn btn-danger">{{ __('Delete this Checklist group') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

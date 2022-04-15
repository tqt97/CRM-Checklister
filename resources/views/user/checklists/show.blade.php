<x-admin-layout>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('Checklist') }}</h3>
                        </div>
                        <div>
                            <div class="card-body">
                                {{ $checklist->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

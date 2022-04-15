<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="card card-primary card-outline">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('You are logged in!') }}

                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

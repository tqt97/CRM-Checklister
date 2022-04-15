<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('welcome') }}" class="brand-link">
        <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CRM Admin </span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('welcome') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <div class="form-inline nav-flat">
            <div class="input-group" data-widget="sidebar-search">
                <input class="w-100 form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                @if (auth()->user()->is_admin)
                    <li class="nav-header"> {{ __(' Manage Checklists') }} </li>
                    @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                        <li class="nav-item menu-open">
                            <a href="{{ route('admin.checklist_groups.edit', $group->id) }}" class="nav-link">
                                <i class="nav-icon fas fa-layer-group"></i>
                                {{-- <i class="nav-icon fas fa-list"></i> --}}
                                <p>
                                    {{ $group->name }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        {{-- <ul class="nav-item nav-treeview1"> --}}
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item ml-2">
                                <a href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-list fa-small"></i>
                                    <p>{{ $checklist->name }}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item ml-2">
                            <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-plus-circle fa-small"></i>
                                <p> {{ __('New checklist') }} </p>
                            </a>
                        </li>
                        {{-- </ul> --}}
                    @endforeach
                    <li class="nav-item">
                        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link bg-default">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p> {{ __('New checklist group') }} </p>
                        </a>
                    </li>
                    <li class="nav-header"> {{ __(' Pages') }} </li>
                    @foreach (\App\Models\Page::all() as $page)
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    {{ $page->title }}
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-header"> {{ __(' Manage data') }} </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link @if (request()->routeIs('admin.users.*')) active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p> {{ __('Users') }} </p>
                        </a>
                    </li>
                @else
                    @foreach (\App\Models\ChecklistGroup::with([
                                'checklists' => function ($query) {
                                    $query->whereNull('user_id');
                                },
                            ])->get()
                            as $group)
                        <li class="nav-header"> {{ $group->name }} </li>
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item ml-2">
                                <a href="{{ route('user.checklists.show', [$checklist]) }}" class="nav-link">
                                    <i class="nav-icon fas fa-list fa-small"></i>
                                    <p>{{ $checklist->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
        </nav>
    </div>
</aside>

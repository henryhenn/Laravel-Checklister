<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Dashboard') }}
            </a>
        </li>
        @if (auth()->user()->is_admin)
            <li class="nav-title">{{ __('Admin') }}</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> {{ __('Pages') }}
                </a>
            </li>
        @endif

        @if (auth()->user()->is_admin)
            <li class="nav-title">{{ __('Manage Checklists') }}</li>

            @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                <li class="nav-item nav-group show">
                    <a class="nav-link nav-group-toggle"
                        href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                        <i class="nav-icon cil-puzzle"></i> {{ $group->name }}
                    </a>
                    <ul class="nav-group-items">
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                                    <i class="nav-icon cil-puzzle"></i>
                                    {{ $checklist->name }}
                                </a>
                            </li>
                        @endforeach

                        <li class="nav-item">
                            <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}"
                                class="nav-link">{{ __('New Checklist') }}</a>
                        </li>
                    </ul>
                </li>
            @endforeach

            <li class="nav-item">
                <a href="{{ route('admin.checklist_groups.create') }}"
                    class="nav-link">{{ __('New Checklist Group') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> {{ __('Pages') }}
                </a>
            </li>
        @endif
    </ul>

    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

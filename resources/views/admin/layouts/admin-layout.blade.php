<ul id="menu" class="page-sidebar-menu">


    @if (Auth::user()->hasAnyPermission(['Create-Organization','ViewSettings','View-Organization']))
    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">spa</i>
            <span class="title">{{ __('sidebar.organization') }}</span>
            <span class="fa arrow"></span>
        </a>

        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-Organization'))

            <li>
                <a href="/organizations/create">
                    <i class="material-icons">keyboard_arrow_right</i>
                    AddNew
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-Organization'))

            <li>
                <a href="/organizations">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Organizations
                </a>
            </li>
            @endif
            @if ( Auth::user()->hasRole(8))

            <li>
                <a href="{{ route('organization.view', Auth::user()->id) }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    View
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings'))

            <li>

                <a href="#">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="title">Settings</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="/organizations/settings">
                            <i class="material-icons">keyboard_arrow_right</i>
                            General
                        </a>
                    </li>
                    <li>
                        <a href="/admin/age-groups">
                            <i class="material-icons">keyboard_arrow_right</i>
                            Age Group
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/main-events">
                            <i class="material-icons">keyboard_arrow_right</i>
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="/organizations/settings">
                            <i class="material-icons">keyboard_arrow_right</i>
                            Athletic Settings
                        </a>
                    </li>
                </ul>

            </li>
            @endif

        </ul>
    </li>
    @endif

    @if (Auth::user()->hasAnyPermission(['Create-Club','View-Club','ViewSettings-club']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">people</i>
            <span class="title">Clubs</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-Club'))
            <li>
                <a href="{{ URL::to('admin/form_examples') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-Club'))

            <li>
                <a href="{{ URL::to('admin/editor') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Clubs
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-club'))

            <li>
                <a href="{{ URL::to('admin/editor2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Create-season','View-season']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">assistant_photo</i>
            <span class="title">Leagues</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-season'))

            <li>
                <a href="/leagues/create">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-season'))

            <li>
                <a href="/leagues">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Leagues
                </a>
            </li>
            @endif

        </ul>
    </li>
    @endif
    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">event</i>
            <span class="title">Events</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">

            <li>
                <a href="/event/create">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @if (Auth::guard('web')->user()->can('View-event'))

            <li>
                <a href="{{ URL::to('admin/advanced_buttons') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Events
                </a>
            </li>
            @endif
            <li>
                <a href="/venues">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Venues
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/panels') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Calendar
                </a>
            </li>
            @if (Auth::guard('web')->user()->can('ViewSettings-event'))
            <li>
                <a href="{{ URL::to('admin/icon') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif

        </ul>
    </li>
    @if (Auth::user()->hasAnyPermission(['Create-team','View-team','ViewSettings-team']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">group_add</i>
            <span class="title">Teams</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-team'))

            <li>
                <a href="{{ URL::to('admin/general') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-team'))

            <li>
                <a href="{{ URL::to('admin/pickers') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Teams
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-team'))

            <li>
                <a href="{{ URL::to('admin/x-editable') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Create-player','View-player','ViewPositions','ViewSettings-player']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">directions_run</i>
            <span class="title">Players</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-player'))

            <li>
                <a href="{{ URL::to('admin/simple_table') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-player'))

            <li>
                <a href="{{ URL::to('admin/advanced_tables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Players
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewPositions'))

            <li>
                <a href="{{ URL::to('admin/advanced_tables2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Positions </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-player'))


            <li>
                <a href="{{ URL::to('admin/responsive_tables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Create-staff','View-staff']))


    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">account_circle</i>
            <span class="title">Staffs</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-staff'))

            <li>
                <a href="{{ URL::to('admin/inbox') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-staff'))

            <li>
                <a href="{{ URL::to('admin/compose') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Staffs </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('Create-staff'))

            <li>
                <a href="{{ URL::to('admin/view_mail') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Job Roles </a>
            </li>
            @endif
        </ul>
    </li>
    @endif

    @if (Auth::user()->hasAnyPermission(['Create-user','View-user','ViewSettings-user']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">person</i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-user'))

            <li>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-user'))

            <li>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    All Users
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-user'))

            <li>
                <a href="{{ URL::route('users.show',Auth::user()->id) }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif

        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['ViewFieldEvent-statistics','ViewTrackEvent-statistics','ViewSettings-statistics']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">show_chart</i>
            <span class="title">Statistics</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('ViewFieldEvent-statistics'))

            <li>
                <a href="{{ URL::to('admin/groups') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Field Events
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewTrackEvent-statistics'))

            <li>
                <a href="{{ URL::to('admin/groups/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Track Events
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-statistics'))

            <li>
                <a href="{{ URL::to('admin/groups/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['ViewDetails-payment','ViewMethods-payment','ViewSettings-payment']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">monetization_on</i>
            <span class="title">Payment</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('ViewDetails-payment'))

            <li>
                <a href="{{ URL::to('admin/googlemaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Payment Details
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewMethods-payment'))

            <li>
                <a href="{{ URL::to('admin/vectormaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Payment Methods
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewMethods-payment'))

            <li>
                <a href="{{ URL::to('admin/advancedmaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Payment Groups
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('ViewSettings-payment'))

            <li>
                <a href="{{ URL::to('admin/advancedmaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Settings
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Add-News','Drafted-news']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">insert_comment</i>
            <span class="title">News</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Add-News'))

            <li>
                <a href="{{ URL::to('admin/blogcategory') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Add New
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('Add-News'))

            <li>
                <a href="{{ URL::to('admin/blog') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Scheduled
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('Drafted-news'))

            <li>
                <a href="{{ URL::to('admin/blog/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Draft
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Membership','Registration']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">live_help</i>
            <span class="title">Inquaries</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Membership'))

            <li>
                <a href="{{ URL::to('admin/news') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Membership
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('Registration'))

            <li>
                <a href="{{ URL::to('admin/news_item') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Registration
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if (Auth::guard('web')->user()->can('GeneralSettings'))

    <li>

        <a href="/admin/settings">
            <i class="material-icons text-light leftsize">settings</i>
            <span class="title">Settings</span>
            <span class="fa arrow"></span>


        </a>
        <ul class="sub-menu">
            <li>
                <a href="/admin/general-setting">
                    <i class="material-icons">keyboard_arrow_right</i>
                    General
                </a>
            </li>
            <li>
                <a href="/admin/roles">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Roles & Permissions
                </a>
            </li>

            <li>
                <a href="/admin/seasons">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Seasons
                </a>
            </li>

        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Organizations','Clubs']))

    <li>
        <a href="#">
            <i class="material-icons text-light leftsize">report</i>
            <span class="title">Reports</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Organizations'))

            <li>
                <a href="">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Organizations
                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('Clubs'))

            <li>
                <a href="{{ URL::to('admin/invoice') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Clubs </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    <!-- Menus generated by CRUD generator -->
</ul>
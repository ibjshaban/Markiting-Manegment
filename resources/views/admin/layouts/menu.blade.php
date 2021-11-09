<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
    @if(Auth::guard('admin')->check())
        <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                {{ trans('admin.dashboard') }}
            </p>
        </a>
    @elseif(Auth::guard('marketer')->check())
        <a href="{{ url('marketer') }}" class="nav-link {{ active_link(null,'active') }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                {{ trans('admin.dashboard') }}
            </p>
        </a>
    @endif
</li>

@if(Auth::guard('admin')->check())


    @if(admin()->user()->role('settings_show'))
        <li class="nav-item">
            <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    {{ trans('admin.settings') }}
                </p>
            </a>
        </li>
    @endif
    @if(admin()->user()->role("admins_show"))
        <li class="nav-item {{ active_link('admins','menu-open') }}">
            <a href="#" class="nav-link  {{ active_link('admins','active') }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{trans('admin.admins')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{trans('admin.admins')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ aurl('admins/create') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{trans('admin.create')}}</p>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(admin()->user()->role("admingroups_show"))
        <li class="nav-item {{ active_link('admingroups','menu-open') }}">
            <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{trans('admin.admingroups')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{trans('admin.admingroups')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{trans('admin.create')}}</p>
                    </a>
                </li>
            </ul>
        </li>
    @endif


    <!--marketer_start_route-->
    @if(admin()->user()->role("marketer_show"))
        <li class="nav-item {{active_link('marketer','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('marketer','active')}}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    {{trans('admin.marketer')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{aurl('marketer')}}" class="nav-link  {{active_link('marketer','active')}}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{trans('admin.marketer')}} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ aurl('marketer/create') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{trans('admin.create')}} </p>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    <!--marketer_end_route-->

    <!--cleint_start_route-->
    @if(admin()->user()->role("cleint_show"))
        <li class="nav-item {{active_link('cleint','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('cleint','active')}}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    {{trans('admin.cleint')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{aurl('cleint')}}" class="nav-link  {{active_link('cleint','active')}}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{trans('admin.cleint')}} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ aurl('cleint/create') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{trans('admin.create')}} </p>
                    </a>
                </li>
            </ul>
        </li>
        <!--cleint_end_route-->
        <!--transaction_start_route-->
        @if(admin()->user()->role("transaction_show"))
            <li class="nav-item {{active_link('transaction','menu-open')}} ">
                <a href="#" class="nav-link {{active_link('transaction','active')}}">
                    <i class="nav-icon fa fa-money-check-alt"></i>
                    <p>
                        {{trans('admin.transaction')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{aurl('transaction')}}" class="nav-link  {{active_link('transaction','active')}}">
                            <i class="fa fa-money-check-alt nav-icon"></i>
                            <p>{{trans('admin.transaction')}} </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ aurl('transaction/create') }}" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{trans('admin.create')}} </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!--transaction_end_route-->

        <!--shipping_start_route-->
        @if(admin()->user()->role("shipping_show"))
            <li class="nav-item {{active_link('shipping','menu-open')}} ">
                <a href="#" class="nav-link {{active_link('shipping','active')}}">
                    <i class="nav-icon fa fa-truck-moving"></i>
                    <p>
                        {{trans('admin.shipping')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{aurl('shipping')}}" class="nav-link  {{active_link('shipping','active')}}">
                            <i class="fa fa-truck-moving nav-icon"></i>
                            <p>{{trans('admin.shipping')}} </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ aurl('shipping/create') }}" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{trans('admin.create')}} </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!--shipping_end_route-->

        <!--advertisement_start_route-->
        @if(admin()->user()->role("advertisement_show"))
            <li class="nav-item {{active_link('advertisement','menu-open')}} ">
                <a href="#" class="nav-link {{active_link('advertisement','active')}}">
                    <i class="nav-icon fab fa-adversal"></i>
                    <p>
                        {{trans('admin.advertisement')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{aurl('advertisement')}}" class="nav-link  {{active_link('advertisement','active')}}">
                            <i class="fab fa-adversal nav-icon"></i>
                            <p>{{trans('admin.advertisement')}} </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ aurl('advertisement/create') }}" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{trans('admin.create')}} </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!--advertisement_end_route-->


    @endif



@elseif(Auth::guard('marketer')->check())

    <!--cleint_start_route-->
        <li class="nav-item {{active_link('cleint','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('cleint','active')}}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    {{trans('admin.cleint')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('marketer/cleint')}}" class="nav-link  {{active_link('cleint','active')}}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{trans('admin.cleint')}} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('marketer/cleint/create') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{trans('admin.create')}} </p>
                    </a>
                </li>
            </ul>
        </li>
    <!--cleint_end_route-->
    <!--transaction_start_route-->
        <li class="nav-item {{active_link('transaction','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('transaction','active')}}">
                <i class="nav-icon fa fa-money-check-alt"></i>
                <p>
                    {{trans('admin.transaction')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('marketer/transaction')}}" class="nav-link  {{active_link('transaction','active')}}">
                        <i class="fa fa-money-check-alt nav-icon"></i>
                        <p>{{trans('admin.transaction')}} </p>
                    </a>
                </li>
            </ul>
        </li>
    <!--transaction_end_route-->

    <!--shipping_start_route-->
        <li class="nav-item {{active_link('shipping','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('shipping','active')}}">
                <i class="nav-icon fa fa-truck-moving"></i>
                <p>
                    {{trans('admin.shipping')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('marketer/shipping')}}" class="nav-link  {{active_link('shipping','active')}}">
                        <i class="fa fa-truck-moving nav-icon"></i>
                        <p>{{trans('admin.shipping')}} </p>
                    </a>
                </li>
            </ul>
        </li>
    <!--shipping_end_route-->

    <!--advertisement_start_route-->
        <li class="nav-item {{active_link('advertisement','menu-open')}} ">
            <a href="#" class="nav-link {{active_link('advertisement','active')}}">
                <i class="nav-icon fab fa-adversal"></i>
                <p>
                    {{trans('admin.advertisement')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('marketer/advertisement')}}" class="nav-link  {{active_link('advertisement','active')}}">
                        <i class="fab fa-adversal nav-icon"></i>
                        <p>{{trans('admin.advertisement')}} </p>
                    </a>
                </li>
            </ul>
        </li>
    <!--advertisement_end_route-->

@endif
<!--marketer_end_route-->





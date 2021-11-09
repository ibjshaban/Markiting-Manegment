@if(Auth::guard('admin')->check())


    <!--admingroups_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ App\Models\AdminGroup::count() }}</h3>
                <p>{{ trans('admin.admingroups') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ aurl('admingroups') }}" class="small-box-footer">{{ trans('admin.admingroups') }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--admingroups_end-->
    <!--admins_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ App\Models\Admin::count() }}</h3>
                <p>{{ trans('admin.admins') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ aurl('admins') }}" class="small-box-footer">{{ trans('admin.admins') }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--admins_end-->


    <!--marketer_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ mK(App\Models\Marketer::count()) }}</h3>
                <p>{{ trans("admin.marketer") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ aurl("marketer") }}" class="small-box-footer">{{ trans("admin.marketer") }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--marketer_end-->
    <!--cleint_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ mK(App\Models\Cleint::count()) }}</h3>
                <p>{{ trans("admin.cleint") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ aurl("cleint") }}" class="small-box-footer">{{ trans("admin.cleint") }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--cleint_end-->

    <!--transaction_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Transaction::count()) }}</h3>
        <p>{{ trans("admin.transaction") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-money-check-alt"></i>
      </div>
      <a href="{{ aurl("transaction") }}" class="small-box-footer">{{ trans("admin.transaction") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--transaction_end-->

@endif

@if(Auth::guard('marketer')->check())
    <!--cleint_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                {{--                <h3>{{ mK(App\Models\Cleint::count()) }}</h3>--}}
                <h3>{{ \App\Models\Cleint::all()->where('marketer_id', Auth::guard('marketer')->user()->id)->count() }}</h3>
                <p>{{ trans("admin.cleint") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url("marketer/cleint") }}" class="small-box-footer">{{ trans("admin.cleint") }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--cleint_end-->

    <!--Amount due_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                {{--                <h3>{{ mK(App\Models\Cleint::count()) }}</h3>--}}
                <h3>{{ Auth::guard('marketer')->user()->amount_due }}</h3>
                <p>{{ trans("admin.amount_due") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar-sign"></i>
            </div>
            <a href="{{ url("marketer/account") }}" class="small-box-footer">{{ trans("admin.account") }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--Amount due_end-->

    <!--Amount paid_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                {{--                <h3>{{ mK(App\Models\Cleint::count()) }}</h3>--}}
                <h3>{{ Auth::guard('marketer')->user()->amount_paid }}</h3>
                <p>{{ trans("admin.amount_paid") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar-sign"></i>
            </div>
            <a href="{{ url("marketer/account") }}" class="small-box-footer">{{ trans("admin.account") }} <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--Amount paid_end-->
    <!--transaction_start-->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
{{--
                <h3>{{ mK(App\Models\Transaction::count()) }}</h3>
--}}
                <h3>{{ \App\Models\Transaction::all()->where('marketer_id', Auth::guard('marketer')->user()->id)->count() }}</h3>
                <p>{{ trans("admin.transaction") }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-money-check-alt"></i>
            </div>
            <a href="{{ url("marketer/transaction") }}" class="small-box-footer">{{ trans("admin.transaction") }} <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!--transaction_end-->
@endif



<!--shipping_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Shipping::count()) }}</h3>
        <p>{{ trans("admin.shipping") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("shipping") }}" class="small-box-footer">{{ trans("admin.shipping") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--shipping_end-->
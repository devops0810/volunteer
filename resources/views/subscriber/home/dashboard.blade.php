@extends('layouts.account')
@section('pageTitle',__('saas.dashboard'))

@if(false)
@section('page-header')
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                            <span class="h2 font-weight-bold mb-0">350,897</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                            <span class="h2 font-weight-bold mb-0">924</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span class="text-nowrap">Since yesterday</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@section('content')
    @if($subscribed)
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">@lang('saas.info')</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($user->subscriber()->exists() && $user->subscriber->website->hostnames()->exists())
                        <h4 style="text-align: center">@lang('saas.app-url'): <a href="http://{{ $user->subscriber->website->hostnames()->latest()->first()->fqdn }}">{{ $user->subscriber->website->hostnames()->latest()->first()->fqdn }}</a></h4>
                        @endif

                    <div id="stats-box">
                        @lang('saas.loading')
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">@lang('saas.current-plan')</h6>
                            <h2 class="mb-0">{{ $user->subscriber->packageDuration->package->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="text-align: center">
                    <h1 style="text-align: center; font-size: 60px; margin-top: -30px;">@if(empty($user->subscriber->packageDuration->package->is_free)){!! clean( price($user->subscriber->packageDuration->price)) !!}@else @lang('saas.free') @endif</h1>
                    <div style="margin-bottom: 20px" ><small>
                            @if($user->subscriber->packageDuration->type=='m')
                            @lang('saas.monthly')
                                @else
                            @lang('saas.yearly')

                            @endif
                        </small>
                    <div>
                        <small>@lang('saas.expires'): {{ date('d/M/Y',$user->subscriber->expires) }}</small>
                    </div>
                    </div>


                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $user->subscriber->packageDuration->package->user_limit }} @lang('saas.users')</li>
                        <li class="list-group-item">{{ $user->subscriber->packageDuration->package->department_limit }} @lang('admin.departments')</li>
                        <li class="list-group-item">{{ $user->subscriber->packageDuration->package->storage_space }}{{ $user->subscriber->packageDuration->package->storage_unit }} @lang('saas.disk-space')</li>

                    </ul>

                </div>
            </div>
        </div>

    </div>
    @endif
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">@lang('saas.invoices')</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('user.billing.invoices') }}" class="btn btn-sm btn-primary">@lang('saas.view-all')</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>@lang('saas.item')</th>
                            <th>@lang('saas.amount')</th>
                            <th>@lang('saas.created-on')</th>
                            <th>@lang('saas.status')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->invoices()->latest()->limit(7)->get() as $invoice)
                            <tr>
                                <td>#{{ $invoice->id }}</td>
                                <td>{{ $invoice->invoicePurpose->purpose }}</td>
                                <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
                                <td>{{ $invoice->created_at }}</td>
                                <td>
                                    {{ ($invoice->paid==0)?__('saas.unpaid'):__('saas.paid') }}
                                </td>
                                <td>
                                    @if($invoice->paid==0)
                                        <a class="btn btn-success" href="{{ route('user.billing.pay',['invoice'=>$invoice->id]) }}"><i class="fa fa-money-check"></i> @lang('saas.pay-now')</a>
                                    @endif
                                    <a class="btn btn-primary" href="{{ route('user.billing.invoice',['invoice'=>$invoice->id]) }}"><i class="fa fa-eye"></i> @lang('saas.view')</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header  ">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">@lang('saas.domains')</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">

                        <tbody>
                        @foreach($user->subscriber->website->hostnames as $domain)
                        <tr>
                            <th scope="row">
                                <a href="http://{{ $domain->fqdn }}">{{ $domain->fqdn }}</a>
                            </th>

                        </tr>
                   @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer')
    <script>
        $('#stats-box').load('{{ route('user.get-stats') }}');
    </script>

@endsection
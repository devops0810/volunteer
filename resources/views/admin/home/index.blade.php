@extends('layouts.admin')

@section('search-form')
    <!-- Form -->
    <form  method="GET" action="{{ url('/admin/subscribers') }}"  class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input value="{{ request('search') }}" name="search"  class="form-control" placeholder="@lang('admin.search') @lang('saas.subscribers')" type="text">
            </div>
        </div>
    </form>
@endsection

@section('page-header')
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">@lang('saas.subscribers')</h5>
                            <span class="h2 font-weight-bold mb-0">{{ number_format($totalSubscribers) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-nowrap">@lang('saas.active-text')</span>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">@lang('saas.total-sales')</h5>
                            <span class="h2 font-weight-bold mb-0">{{ price($totalSales) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-nowrap">@lang('saas.sales-total')</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">@lang('saas.month-sales')</h5>
                            <span class="h2 font-weight-bold mb-0">{{ price($monthSales) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-nowrap">@lang('saas.sales-month')</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">@lang('saas.annual-sales')</h5>
                            <span class="h2 font-weight-bold mb-0">{{ price($yearSales) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fas fa-search-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-nowrap">@lang('saas.sales-annual')</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('content')
    <div class="row">
        <div class="col-xl-7 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">@lang('saas.stats')</h6>
                            <h2 class="text-white mb-0">@lang('saas.sales-value')</h2>
                        </div>
                        <div class="col">
                            @if(false)
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>

                            </ul>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales2" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">@lang('stats')</h6>
                            <h2 class="mb-0">@lang('saas.total-orders')</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-orders2" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">@lang('saas.recent-invoices')</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ url('/admin/invoices') }}" class="btn btn-sm btn-primary">@lang('saas.view-all')</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('saas.subscriber')</th>
                                <th>@lang('saas.item')</th>
                                <th>@lang('saas.amount')</th>
                                <th>@lang('saas.status')</th>
                                <th>@lang('saas.created-on')</th>
                                <th>@lang('saas.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recentInvoices as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ url('/admin/subscribers/' . $item->user_id) }}">{{ $item->user->name }}</a></td>
                                    <td>{{ $item->invoicePurpose->purpose }} - {{ $controller->getInvoiceItemName($item->id) }} </td>
                                    <td>{!! clean( price($item->amount)) !!}</td>
                                    <td>{{ ($item->paid==1)? __('saas.paid'):__('saas.unpaid') }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/M/Y') }}
                                    </td>
                                    <td>
                                        @if($item->paid==0)
                                            <a onclick="return confirm('@lang('saas.confirm-approve')')" class="btn btn-success btn-sm" href="{{ route('admin.invoices.approve',['invoice'=>$item->id]) }}"><i class="fa fa-thumbs-up"></i> @lang('saas.approve')</a>
                                        @endif
                                        <a href="{{ url('/admin/invoices/' . $item->id) }}" title="@lang('saas.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                        <a href="{{ url('/admin/invoices/' . $item->id . '/edit') }}" title="@lang('saas.edit')"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                                        <form method="POST" action="{{ url('/admin/invoices' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete')" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>

                 </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">@lang('saas.recent-subscribers')</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ url('/admin/subscribers') }}" class="btn btn-sm btn-primary">@lang('saas.view-all')</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th><th>@lang('saas.name')</th><th>@lang('saas.email')</th><th>@lang('saas.plan')</th>
                            <th>@lang('saas.expires')</th>
                            <th>@lang('saas.enabled')?</th>
                            <th>@lang('saas.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recentSubscribers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
                                <td>
                                    @if($item->subscriber()->exists())
                                        {{ $item->subscriber->packageDuration->package->name }} ({{ ($item->subscriber->packageDuration->type=='m')? __('saas.monthly'):__('saas.annual') }})
                                    @endif
                                </td>
                                <td>
                                    @if($item->subscriber()->exists())
                                        {{ date('d/M/Y g:i a',$item->subscriber->expires) }}
                                    @endif
                                </td>
                                <td>
                                    {{ boolToString($item->enabled) }}
                                </td>
                                <td>
                                    <a href="{{ url('/admin/subscribers/' . $item->id) }}" title="@lang('saas.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                    <a href="{{ url('/admin/subscribers/' . $item->id . '/edit') }}" title="@lang('saas.edit')"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>
                                    @if($item->subscriber()->exists())
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.hostnames.index',['website'=>$item->subscriber->website->id]) }}"><i class="fa fa-link" aria-hidden="true"></i> @lang('saas.manage-domains')</a>
                                    @endif
                                    <form method="POST" action="{{ url('/admin/subscribers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete')" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                    </form>
                                </td>
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

        //
        // Orders chart
        //

        var OrdersChart = (function() {

            //
            // Variables
            //

            var $chart = $('#chart-orders2');
            var $ordersSelect = $('[name="ordersSelect"]');


            //
            // Methods
            //

            // Init chart
            function initChart($chart) {

                // Create chart
                var ordersChart = new Chart($chart, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: '#dfe2e6',
                                    zeroLineColor: '#dfe2e6'
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            //return '$' + value + 'k'
                                            return value
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">' + yLabel + '</span>';

                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: {!! clean( $monthList ) !!},
                        datasets: [{
                            label: '@lang('saas.sales')',
                            data: {!! clean( $monthSaleCount) !!}
                        }]
                    }
                });

                // Save to jQuery object
                $chart.data('chart', ordersChart);
            }


            // Init chart
            if ($chart.length) {
                initChart($chart);
            }

        })();

        //
        // Charts
        //

        'use strict';

        //
        // Sales chart
        //

        var SalesChart = (function() {

            // Variables

            var $chart = $('#chart-sales2');


            // Methods

            function init($chart) {

                var salesChart = new Chart($chart, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    lineWidth: 1,
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return '{{ $currency }}' + value ;
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">{{ $currency }}' + yLabel + '</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: {!! clean( $monthList ) !!},
                        datasets: [{
                            label: '@lang('saas.sales')',
                            data: {!! clean( $monthSaleData) !!}
                        }]
                    }
                });

                // Save to jQuery object

                $chart.data('chart', salesChart);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        })();
    </script>


    @endsection
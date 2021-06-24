@extends('layouts.admin-page')

@section('pageTitle',__('saas.subscriber').' : '.$subscriber->name)
@section('page-title',__('saas.subscriber').' : '.$subscriber->name)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/subscribers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/subscribers/' . $subscriber->id . '/edit') }}" title="Edit subscriber"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>


                        <br/>
                        <br/>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">@lang('saas.info')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">@lang('saas.stats')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">@lang('saas.domains')</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="home" style="padding-top: 30px">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>@lang('saas.id')</th><td>{{ $subscriber->id }}</td>
                                        </tr>
                                        <tr><th> @lang('saas.name') </th><td> {{ $subscriber->name }} </td></tr>
                                        <tr><th> @lang('saas.email') </th><td> {{ $subscriber->email }} </td></tr>
                                        @if(setting('trial_enabled')==1)
                                        <tr><th> @lang('saas.trial') </th><td> {{ boolToString($subscriber->trial) }} </td></tr>
                                        @endif
                                        <tr><th> @lang('saas.enabled') </th><td> {{ boolToString($subscriber->enabled) }} </td></tr>
                                    @if($subscriber->subscriber()->exists())
                                        <tr><th> @lang('saas.plan') </th><td> {{ $subscriber->subscriber->packageDuration->package->name }} ({{ ($subscriber->subscriber->packageDuration->type=='m')? __('saas.monthly'):__('saas.annual') }}) </td></tr>
                                        <tr><th> @lang('saas.expires') </th><td> {{ date('d/M/Y g:i a',$subscriber->subscriber->expires) }} </td></tr>
                                        <tr><th> @lang('saas.currency') </th><td> {{ $subscriber->subscriber->currency->country->currency_name }} </td></tr>
                                        <tr><th> @lang('saas.website-id') </th><td> {{ $subscriber->subscriber->website_id }} </td></tr>

                                    @endif
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <div class="tab-pane container fade" id="menu1"  style="padding-top: 30px">
                            </div>

                            <div class="tab-pane container fade" id="menu2"  style="padding-top: 30px">
                                @if($subscriber->subscriber()->exists())
                                    <a class="btn btn-lg btn-primary" href="{{ route('admin.hostnames.index',['website'=>$subscriber->subscriber->website->id]) }}">@lang('saas.manage-domains')</a>
                                    <br/> <br/>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>@lang('saas.domains')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subscriber->subscriber->website->hostnames as $hostname)
                                                <tr>
                                                    <td><a href="http://{{ $hostname->fqdn }}">{{ $hostname->fqdn }}</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @endif
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $(function(){
           $('#menu1').load('{{ route('admin.subscribers.stats',['user'=>$subscriber->id])  }}');
        });
    </script>

@endsection

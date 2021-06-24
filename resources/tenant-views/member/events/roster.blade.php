@extends('layouts.member')
@section('pageTitle',__('admin.roster'))

@section('innerTitle')
    <h4>
        @if(empty($start) && empty($end))
            @lang('admin.upcoming-events')
        @else
            @lang('admin.roster')
            @if(Request::get('start'))
                 : {{ Request::get('start') }}
            @endif
            @if(Request::get('end'))
                @lang('to')   {{ Request::get('end') }}
            @endif
        @endif
    </h4>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.roster')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <div style="margin-bottom: 20px">
                        <form  method="GET" action="{{ route('member.events.roster') }}" >
                            <div class="row">
                                <div class="col-md-3">
                                    <input placeholder="@lang('admin.from')" class="form-control date" type="text" name="start" value="{{ $start }}"/>
                                </div>
                                <div class="col-md-3">
                                    <input placeholder="@lang('admin.to')" class="form-control date" type="text" name="end" value="{{ $end }}"/>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">@lang('admin.filter')</button>
                                    <a class="btn btn-default" href="{{ route('member.events.roster') }}">@lang('admin.reset')</a>
                                </div>
                            </div>
                        </form>
                        </div>

                        @if($events->count()==0)
                            <div class="well">
                                @lang('admin.no-results')
                            </div>

                        @endif

                        @foreach($events as $event)
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4 style="margin-top: 10px;margin-bottom: 10px;">{{ $event->name }} ({{ \Carbon\Carbon::parse($event->event_date)->format('D d/M/Y') }})</h4></div>
                                <div class="panel-body">
                                    <div class=" ">
                                        <ul id="myTabedu1" class="tab-review-design">
                                            <li class="active"><a href="#description{{ $event->id }}">@lang('admin.info')</a></li>
                                            <li><a href="#reviews{{ $event->id }}">@lang('admin.shifts')</a></li>
                                        </ul>
                                        <div id="myTabContent{{ $event->id }}" class="tab-content custom-product-edit">
                                            <div class="product-tab-list tab-pane fade active in" id="description{{ $event->id }}">
                                                <table class="table" style="margin-top: 10px">
                                                    <tbody>
                                                    <tr>
                                                        <td style="border-top: none"><strong>@lang('admin.starts'):</strong></td>
                                                        <td style="border-top: none">{{ \Carbon\Carbon::parse($event->event_date)->format('D d/M/Y') }} ({{ \Carbon\Carbon::parse($event->event_date)->diffForHumans() }})</td>
                                                    </tr>
                                                    @if(!empty($event->venue))
                                                        <tr>
                                                            <td><strong>@lang('admin.venue'):</strong></td>
                                                            <td>{{ $event->venue }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td><strong>@lang('admin.shifts'):</strong></td>
                                                        <td>{{ $event->shifts()->count() }}</td>
                                                    </tr>
                                                    <?php
                                                    $users = [];
                                                    ?>
                                                    @foreach($event->shifts as $shift)
                                                        @foreach($shift->users as $user)
                                                            <?php
                                                            $users[$user->id] = $user;
                                                            ?>
                                                        @endforeach
                                                    @endforeach
                                                    @if(!empty($users))
                                                    <tr>
                                                        <td><strong>@lang('admin.members'):</strong></td>
                                                        <td>

                                                            <ul class="comma-tags">
                                                                @foreach($users as $user)
                                                                <li>{{ $user->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td colspan="2">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                @if(!empty($event->description))
                                                    <div class="alert alert-success" role="alert">{!! clean( nl2br(clean($event->description))) !!}</div>
                                                @endif
                                            </div>
                                            <div class="product-tab-list tab-pane fade" id="reviews{{ $event->id }}">

                                                @foreach($event->shifts()->orderBy('starts')->get() as $shift)
                                                  <div style="border: solid 1px #CCCCCC; padding-left: 15px; padding-right: 15px; margin-bottom: 30px">
                                                    <h3 style="margin-top: 20px">{{ \Illuminate\Support\Carbon::parse($shift->starts)->format('h:i A') }} to {{ \Illuminate\Support\Carbon::parse($shift->ends)->format('h:i A') }} <span class="pull-right">{{ $shift->name }}</span></h3>

                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                        <th>@lang('admin.members')</th>
                                                        <th>@lang('admin.tasks')</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($shift->users()->orderBy('name')->get() as $user)
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->pivot->tasks }}</td>
                                                            </tr>

                                                            @endforeach
                                                        @if($shift->users()->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first())
                                                        <tr>
                                                            <td colspan="2">
                                                                <a style="color: white" class="btn btn-danger btn-lg" href="#"  data-toggle="modal" data-target="#myModal{{ $shift->id }}">@lang('admin.opt-out')</a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="myModal{{ $shift->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $shift->id }}">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form action="{{ route('member.events.opt-out',['shift'=>$shift->id]) }}" method="post">
                                                                            @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel{{ $shift->id }}">@lang('admin.shift') {{ \Illuminate\Support\Carbon::parse($shift->starts)->format('h:i A') }} to {{ \Illuminate\Support\Carbon::parse($shift->ends)->format('h:i A') }} ({{ $shift->name }}) @lang('admin.opt-out')</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                               <div class="form-group">
                                                                                   <label for="message">@lang('admin.reject-reason')</label>
                                                                                   <textarea required class="form-control"
                                                                                             name="message" id="message{{ $shift->id }}"
                                                                                             rows="4"></textarea>
                                                                               </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                                                                                <button type="submit" class="btn btn-danger">@lang('admin.opt-out')</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>

                                                                    </div>
                                                                </div>





                                                            </td>
                                                        </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    @if(!empty($shift->description))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ $shift->description }}
                                                        </div>
                                                    @endif
                                            </div>
                                                 @endforeach

                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </div>

                        @endforeach
                        <div class="custom-pagination">
                            {!! clean( $events->appends(['start' => Request::get('start'),'end'=> Request::get('end')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">


@endsection


@section('footer')
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.date').pickadate({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection

@extends('layouts.site')
@section('pageTitle',__('site.applications'))
@section('innerTitle',__('site.applications'))

@section('breadcrumb')
    <li><a href="{{ route('site.home') }}">@lang('site.home')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">{{ ucfirst(__('site.applications')) }}</span>
    </li>
@endsection

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">

        <div class="row" style="margin-left: 0px;margin-right: 0px; margin-bottom: 50px">

            <div class="col-md-10 col-md-offset-1">
                <div class="single-pro-review-area mt-t-30 mg-b-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-payment-inner-st">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('site.application-date')</th>
                                            <th>{{ ucfirst(__('site.department')) }}</th>
                                            <th>@lang('site.status')</th>
                                            <th>@lang('site.comment')</th>
                                            <th>@lang('site.actions')</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($applications as $application)
                                                <tr>
                                                    <td>{{ \Illuminate\Support\Carbon::parse($application->created_at)->format('d/M/Y') }}</td>
                                                    <td>{{ $application->department->name }}</td>
                                                    <td>
                                                        @if($application->status=='p')
                                                            @lang('site.pending')
                                                            @elseif($application->status=='a')
                                                                    @lang('site.approved')
                                                            @elseif($application->status=='d')
                                                                @lang('site.denied')
                                                        @endif

                                                    </td>
                                                    <td>{!! clean( nl2br($application->comment)) !!}</td>
                                                    <td>
                                                        @if($user->departmentFields()->where('department_id',$application->department_id)->count()>0)
                                                        <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#myModal{{ $application->id }}">@lang('site.view')</a>
                                                        @endif

                                                        <a class="btn btn-danger" onclick="return confirm('@lang('site.confirm-delete')')" href="{{ route('site.delete-application',['application'=>$application->id]) }}">@lang('site.delete')</a>

                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="myModal{{ $application->id }}Label">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModal{{ $application->id }}Label">{{ $application->department->name }}</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                            @foreach($user->departmentFields()->where('department_id',$application->department_id)->get() as $field)
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">{{ $field->name }}</div>
                                                                    <div class="panel-body">
                                                                       {!! clean( nl2br($field->pivot->value)) !!}
                                                                    </div>
                                                                </div>
                                                             @endforeach
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                        </tbody>

                                    </table>
                                    <div class="custom-pagination">
                                        {!! clean( $applications->render()) !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>


@endsection
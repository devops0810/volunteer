@extends('layouts.member')
@section('pageTitle',__('admin.application'))

@section('innerTitle')
    @lang('admin.application') : {{ $application->user->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('member.members.applications') }}">@lang('admin.applications')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.application')</span>
    </li>
@endsection

@section('content')


    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            @if(!empty($application->user->picture))
                                <img src="{{ asset($application->user->picture) }}"  />
                            @else
                                <img src="{{ avatar($application->user->gender) }}"   />
                            @endif
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>@lang('admin.name')</b><br /> {{ $application->user->name }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>@lang('admin.gender')</b><br /> @if($application->user->gender=='m')
                                                @lang('admin.male')
                                            @else
                                                @lang('admin.female')
                                            @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>@lang('admin.email')</b><br /> <a style="font-size: 15px;" href="mailto:{{ $application->user->email }}">{{ $application->user->email }}</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>@lang('admin.telephone')</b><br /> <a style="font-size: 15px;"  href="tel:{{ $application->user->telephone }}">{{ $application->user->telephone }}</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                        <a class="btn btn-success btn-block btn-lg" href="#"  data-toggle="modal" data-target="#myModalApprove">@lang('admin.approve')</a>

                                </div>
                                <div class="col-md-6">

                                        <a class="btn btn-danger btn-block btn-lg" href="#"  data-toggle="modal" data-target="#myModalReject">@lang('admin.reject')</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('admin.answers')</a></li>
                            @if(!empty($application->message))
                            <li ><a href="#message">@lang('admin.comment')</a></li>
                            @endif
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        @if($fields->count()==0)
                                            @lang('admin.no-records')
                                        @endif

                                        <div class="review-content-section" style="min-height: 300px">
                                            @foreach($fields as $field)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">{{ $field->name }}</div>
                                                    <div class="panel-body">
                                                        {!! clean( nl2br(clean($field->pivot->value))) !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(!empty($application->message))
                            <div class="product-tab-list tab-pane fade  in" id="message">
                                    {{ $application->message }}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- Modal -->
    <div class="modal fade" id="myModalApprove" tabindex="-1" role="dialog" aria-labelledby="myModalApproveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form" action="{{ route('member.members.update-application',['application'=>$application->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="a"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalApproveLabel">@lang('admin.approve')</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment">@lang('admin.comment') (@lang('admin.optional'))</label>
                        <textarea class="form-control" name="message" id="commenta" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                    <button type="submit" class="btn btn-success">@lang('admin.approve')</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModalReject" tabindex="-1" role="dialog" aria-labelledby="myModalRejectLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <form class="form" action="{{ route('member.members.update-application',['application'=>$application->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="d"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalRejectLabel">@lang('admin.reject')</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment">@lang('admin.comment') (@lang('admin.optional'))</label>
                        <textarea class="form-control" name="message" id="commentd" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                    <button type="submit" class="btn btn-danger">@lang('admin.reject')</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
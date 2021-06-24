@extends('layouts.site')
@section('pageTitle',$department->name)
@section('innerTitle',$department->name)

@section('breadcrumb')
    <li><a href="{{ route('site.home') }}">@lang('site.home')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('site.departments') }}">@lang('site.departments')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">{{ ucfirst(__('site.details')) }}</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            @if(!empty($department->picture) && file_exists($department->picture))
                            <img src="{{ asset($department->picture) }}"  />
                            @endif
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">

                                @if(setting('general_member_count')==1)
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>@lang('site.members')</b><br /> {{ $department->users()->count() }}</p>
                                    </div>
                                </div>
                                @endif

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>@lang('site.new-membership')</b><br /> @if($department->enroll_open==1) @lang('site.open') @else @lang('site.closed') @endif</p>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                @if($department->enroll_open==1)
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>@lang('site.enrollment')</b><br /> @if($department->approval_required==1)
                                                @lang('site.approval-required')
                                            @else
                                                @lang('site.instant')
                                            @endif</p>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div  >
                                        <p>@if($department->enroll_open==1)

                                                @if($department->approval_required==1)
                                                    <a class="btn btn-success btn-lg btn-block" href="{{ route('site.apply',['department'=>$department->id]) }}">@lang('site.apply')</a>
                                                @else
                                                    <a class="btn btn-success btn-lg btn-block" href="{{ route('site.join-department',['department'=>$department->id]) }}">@lang('site.join')</a>
                                                @endif

                                            @endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('site.about-us')</a></li>
                            <li><a href="#reviews"> @lang('site.gallery')</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section" style="min-height: 300px">
                                           {!! clean( $department->description) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="reviews">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section" style="min-height: 300px">
                                                <div class="row">
                                                    @foreach($gallery as $image)
                                                    <div class="col-md-3" style="text-align: center; height: 300px" >

                                                        <a data-toggle="modal" data-target="#myModal{{ $image->id }}" href="#"><img src="{{ asset($image->file_path) }}"  class="img-responsive img-thumbnail" style="max-height: 200px"></a>
                                                        <p>
                                                            {{ $image->name }}
                                                        </p>


                                                    </div>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $image->id }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel{{ $image->id }}">{{ $image->name }}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ asset($image->file_path) }}"  class="img-responsive" >
                                                                        @if(!empty($image->description))
                                                                            <br/>
                                                                        <div class="well">
                                                                            {!! clean( nl2br($image->description)) !!}
                                                                        </div>
                                                                            @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach



                                                </div>
                                            {{ $gallery->links() }}

                                        </div>
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
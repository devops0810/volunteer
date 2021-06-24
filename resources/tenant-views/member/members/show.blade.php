@extends('layouts.member')
@section('pageTitle',__('admin.member'))

@section('innerTitle')
     @lang('admin.member') : {{ $member->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/members') }}">@lang('admin.members')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.member')</span>
    </li>
@endsection

@section('content')


    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            @if(!empty($member->picture))
                                <img src="{{ asset($member->picture) }}"  />
                            @else
                                <img src="{{ avatar($member->gender) }}"   />
                            @endif
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>@lang('admin.name')</b><br /> {{ $member->name }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>@lang('admin.gender')</b><br /> @if($member->gender=='m')
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
                                        <p><b>@lang('admin.email')</b><br /> <a style="font-size: 15px;" href="mailto:{{ $member->email }}">{{ $member->email }}</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>@lang('admin.telephone')</b><br /> <a style="font-size: 15px;"  href="tel:{{ $member->telephone }}">{{ $member->telephone }}</a></p>
                                    </div>
                                </div>
                            </div>
                            @can('dept_allows','allow_members_communicate')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div  >
                                        <a class="btn btn-success btn-block btn-lg" href="{{ url('member/emails/create') }}?user={{ $member->id }}">@lang('admin.send-message')</a>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('admin.about')</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section" style="min-height: 300px">
                                            {!! clean( nl2br(clean($member->about))) !!}
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
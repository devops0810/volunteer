@extends('layouts.member')
@section('pageTitle','Teams')

@section('innerTitle')
     @lang('admin.team') : {{ $team->name }}
@endsection

@section('breadcrumb')

    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    @can('adminster')
    <li><a href="{{ url('/member/teams') }}">@lang('admin.teams')</a> <span class="bread-slash">/</span>
    </li>
    @else
        <li><a href="{{ url('/member/teams/my-teams') }}">@lang('admin.my-teams')</a> <span class="bread-slash">/</span>
        </li>
    @endcan
    <li><span class="bread-blod">@lang('admin.view') @lang('admin.team')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                   @can('administer')
                    <a href="{{ url('/member/teams') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>

                    <a href="{{ url('/member/teams/' . $team->id . '/edit') }}" title="@lang('admin.edit') team"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('member/teams' . '/' . $team->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') team" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    @endcan

                    @cannot('administer')
                        <a href="{{ url('/member/teams/my-teams') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>

                    @endcannot

                    <br/>

                        <div class="contacts-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach($team->users as $item)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <div class="student-inner-std res-mg-b-30">
                                                <div class="student-img imgv-box" style="height: 259px; overflow: hidden">
                                                    @if(!empty($item->picture))
                                                        <img src="{{ asset($item->picture) }}" class="img-responsive imgv" />
                                                    @else
                                                        <img src="{{ avatar($item->gender) }}" class="img-responsive imgv"   />
                                                    @endif
                                                </div>
                                                <div class="student-dtl">

                                                    <h2>
                                                        <div  class="i-checks " >
                                                            <label>
                                                                {{ $item->name }}


                                                            </label>
                                                        </div>
                                                    </h2>

                                                    <p class="dp">{{ gender($item->gender) }}</p>
                                                    <p class="dp-ag">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cogs" aria-hidden="true"></i>    @lang('admin.actions') <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">

                                                            <li><a href="{{ url('/member/members/' . $item->id) }}">@lang('admin.details')</a></li>
                                                            <li><a href="{{ url('member/emails/create') }}?user={{ $item->id }}">@lang('admin.email')</a></li>
                                                            @can('administer')
                                                            <li> <a href="{{ url('member/sms/create') }}?user={{ $item->id }}" >@lang('admin.sms')</a></li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>




                </div>
            </div>


            </div>
        </div>


    </div>
@endsection
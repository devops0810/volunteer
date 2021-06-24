@extends('layouts.member')
@section('pageTitle',__('admin.announcements'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/member/announcements') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.announcements')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>@lang('admin.announcements')
                        @if(Request::get('search'))
                             : {{ Request::get('search') }}
                            @endif
                        </h4>
                        @can('administer')
                        <div class="add-product">
                            <a  title="@lang('site.create-new') announcement" href="{{ url('/member/announcements/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($announcements as $item)
    <div class="blog-details-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 30px;">
                    <div class="blog-details-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="latest-blog-single blog-single-full-view">
                                    <div class="blog-image" style="margin-top: 30px;">

                                        <div class="blog-date">
                                            <p><span class="blog-day">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d') }}</span> {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('M') }}</p>
                                        </div>
                                    </div>
                                    <div class="blog-details blog-sig-details">
                                        <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                            <span><a href="#"><i class="fa fa-user"></i> <b>@lang('admin.created-by'):</b> {{ $item->user->name }}</a></span>
                                        </div>
                                        <h1><a class="blog-ht" href="#">{{ $item->title }}</a></h1>
                                        <p>{!! clean($item->content) !!}</p>
                                </div>
                                    @can('administer')
                                    <div style="text-align: right;" >
                                        <a href="{{ url('/member/announcements/' . $item->id) }}" title="@lang('site.view') announcement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                                        <a href="{{ url('/member/announcements/' . $item->id . '/edit') }}" title="@lang('site.edit') announcement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                        <form method="POST" action="{{ url('/member/announcements' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') announcement" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                        </form>
                                    </div>
                                    @endcan
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="blog-details-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="custom-pagination">
                        {!! clean( $announcements->appends(['search' => Request::get('search')])->render()) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
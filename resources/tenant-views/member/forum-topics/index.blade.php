@extends('layouts.member')
@section('pageTitle',__('admin.forum-topics'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/member/forum-topics') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.forum-topics')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>@lang('admin.forum-topics')
                        @if(Request::get('search'))
                             : {{ Request::get('search') }}
                            @endif
                        </h4>
                        @can('dept_allows','allow_members_create_topics')
                        <div class="add-product">
                            <a  title="@lang('site.create-new') forumTopic" href="{{ url('/member/forum-topics/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        @endcan
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>@lang('admin.added-on')</th><th>@lang('admin.topic')</th><th>@lang('admin.created-by')</th>  <th>@lang('admin.replies')</th> <th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($forumtopics as $item)
                                    <tr>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('D d/M/Y') }}
                                        </td>
                                        <td><a href="{{ url('/member/forum-topics/' . $item->id) }}">{{ $item->topic }}</a></td><td >
                                            {{ $item->user->name }}</td>

                                        <td>
                                            {{ $item->forumThreads()->count() -1 }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/member/forum-topics/' . $item->id) }}" title="@lang('site.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>

                                            @if(\Illuminate\Support\Facades\Auth::user()->id==$item->user_id || isDeptAdmin(\Illuminate\Support\Facades\Auth::user()))
                                            <form method="POST" action="{{ url('/member/forum-topics' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $forumtopics->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
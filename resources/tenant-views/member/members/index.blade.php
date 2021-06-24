@extends('layouts.member')
@section('pageTitle',__('admin.members'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/member/members') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a> 
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.members')</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-8">
                    <h4>@if($deptName) {{ $deptName }} @endif @lang('admin.members') ({{ $members->count() }}) @if(Request::get('search'))
                            : {{ Request::get('search') }}
                        @endif</h4>
                </div>

                <div class="col-md-3">
                    <form  method="POST" action="{{ route('member.members.export') }}" >
                        @csrf
                        <input name="search" value="{{ request('search') }}" type="hidden"  >
                        <button class="btn btn-primary"><i class="fa fa-download"></i> @lang('admin.export')</button>

                    </form>
                </div>

                @can('administer')
                <div class="col-md-1">
                    <div class="add-product_">
                        <a class="btn btn-primary pull-right" title="@lang('site.create-new')  @lang('site.member')" href="{{ url('/member/members/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                    </div>

                </div>
                @endcan

            </div>
            <div class="">


                <div class="card">
                    <div class="card-body">


                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">@lang('admin.current-members') ({{ $total }})</a></li>
                                <li><a href="#admins"> @lang('admin.administrators') ({{ $admins->count() }})</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">


                                        <div class="contacts-area mg-b-15">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    @foreach($members as $item)
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="student-inner-std res-mg-b-30">
                                                                <div class="student-img imgv-box" style="height: 259px; overflow: hidden">
                                                                    <a href="{{ url('/member/members/' . $item->id) }}">
                                                                    @if(!empty($item->picture))
                                                                        <img src="{{ asset($item->picture) }}" class="img-responsive imgv" />
                                                                    @else
                                                                        <img src="{{ avatar($item->gender) }}" class="img-responsive imgv"   />
                                                                    @endif
                                                                    </a>
                                                                </div>
                                                                <div class="student-dtl">

                                                                    <h2>
                                                                        <div  class="i-checks " >
                                                                            <label>
                                                                                {{ $item->name }}
                                                                                @if($item->pivot->department_admin==1)
                                                                                    <span style="color: green">(@lang('admin.admin'))</span>
                                                                                @endif

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
                                                                            <li><a href="{{ route('member.members.remove',['id'=>$item->id]) }}" onclick="return confirm('@lang('admin.delete-prompt')')">@lang('admin.remove')</a></li>
                                                                            @if($item->pivot->department_admin==0)
                                                                                <li><a href="{{ route('member.members.set-admin',['user'=>$item->id,'mode'=>1]) }}">@lang('admin.make-admin')</a></li>
                                                                            @else
                                                                                <li><a href="{{ route('member.members.set-admin',['user'=>$item->id,'mode'=>0]) }}">@lang('admin.remove-admin')</a></li>

                                                                            @endif
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
                                            <div class="custom-pagination">
                                                {!! clean( $members->appends(['search' => Request::get('search')])->render()) !!}
                                            </div>
                                </div>

                                <div class="product-tab-list tab-pane fade in" id="admins">
                                    <div class="contacts-area mg-b-15">
                                        <div class="container-fluid">
                                            <div class="row">
                                                @foreach($admins as $item)
                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="student-inner-std res-mg-b-30">
                                                            <div class="student-img imgv-box" style="height: 259px; overflow: hidden">
                                                                <a href="{{ url('/member/members/' . $item->id) }}">
                                                                    @if(!empty($item->picture))
                                                                        <img src="{{ asset($item->picture) }}" class="img-responsive imgv" />
                                                                    @else
                                                                        <img src="{{ avatar($item->gender) }}" class="img-responsive imgv"   />
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="student-dtl">

                                                                <h2>
                                                                    <div  class="i-checks " >
                                                                        <label>
                                                                            {{ $item->name }}
                                                                            @if($item->pivot->department_admin==1)
                                                                                <span style="color: green">(@lang('admin.admin'))</span>
                                                                            @endif

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
                                                                        <li><a href="{{ route('member.members.remove',['id'=>$item->id]) }}" onclick="return confirm('@lang('admin.delete-prompt')')">@lang('admin.remove')</a></li>
                                                                        @if($item->pivot->department_admin==0)
                                                                            <li><a href="{{ route('member.members.set-admin',['user'=>$item->id,'mode'=>1]) }}">@lang('admin.make-admin')</a></li>
                                                                        @else
                                                                            <li><a href="{{ route('member.members.set-admin',['user'=>$item->id,'mode'=>0]) }}">@lang('admin.remove-admin')</a></li>

                                                                        @endif
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
        </div>

        </div>
    </div>










@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('select').select2();
        });
    </script>
@endsection


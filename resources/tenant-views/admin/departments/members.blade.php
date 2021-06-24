@extends('layouts.admin')
@section('pageTitle',__('admin.manage-members').' : '.$department->name)

@section('innerTitle')
    @lang('admin.manage-members') : {{ $department->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/departments') }}">@lang('admin.departments')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.manage-members')</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('admin.current-members') ({{ $total }})</a></li>
                            <li><a href="#reviews"> @lang('admin.add-members')</a></li>
                            <li><a href="#admins"> @lang('admin.administrators') ({{ $admins->count() }})</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
<div class="row">
    <div class="col-md-6">
        <form style="margin-bottom: 20px" id="nav-search" method="GET" action="{{ route('dept.members',['department'=>$department->id]) }}" role="search" class="sr-input-func form-inline">
            <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">


        </form>
    </div>
    <div class="col-md-2">
        <label><input type="checkbox" id="memberCheckAll"/> @lang('admin.check-all')</label>
    </div>
    <div class="col-md-4">
        <button type="button" onclick="$('#member-form').submit()" class="btn btn-danger pull-right"><i class="fa fa-minus"></i> @lang('admin.remove-selected')</button>

    </div>
</div>

                                <form id="member-form" action="{{ route('dept.remove-members',['department'=>$department->id]) }}" method="post">
                                @csrf
                               <div class="contacts-area mg-b-15">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($members as $item)
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
                                                                <input type="checkbox" name="{{ $item->id }}" value="{{ $item->id }}" > {{ $item->name }}
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
                                                                @if($item->pivot->department_admin==0)
                                                                <li><a href="{{ route('dept.set-admin',['department'=>$department->id,'user'=>$item->id,'mode'=>1]) }}">@lang('admin.make-admin')</a></li>
                                                                @else
                                                                    <li><a href="{{ route('dept.set-admin',['department'=>$department->id,'user'=>$item->id,'mode'=>0]) }}">@lang('admin.remove-admin')</a></li>

                                                                @endif
                                                                <li><a href="{{ url('/admin/members/' . $item->id) }}">@lang('admin.details')</a></li>
                                                                <li> <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" title="@lang('site.edit') @lang('admin.member')"> @lang('site.edit')</a></li>
                                                                    <li><a href="{{ url('admin/emails/create') }}?user={{ $item->id }}">@lang('admin.email')</a></li>
                                                                    <li> <a href="{{ url('admin/sms/create') }}?user={{ $item->id }}" >@lang('admin.sms')</a></li>
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
                                </form>
                                {!! clean( $members->appends(['search' => Request::get('search')])->render()) !!}
                            </div>
                            <div class="product-tab-list tab-pane fade" id="reviews">

                            </div>
                            <div class="product-tab-list tab-pane fade" id="admins">
                                <div class="contacts-area mg-b-15">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($admins as $item)
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
                                                                         {{ $item->name }}  </label>
                                                                </div>
                                                            </h2>

                                                            <p class="dp">{{ gender($item->gender) }}</p>
                                                            <p class="dp-ag">

                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-cogs" aria-hidden="true"></i>    @lang('admin.actions') <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    @if($item->pivot->department_admin==0)
                                                                        <li><a href="{{ route('dept.set-admin',['department'=>$department->id,'user'=>$item->id,'mode'=>1]) }}">@lang('admin.make-admin')</a></li>
                                                                    @else
                                                                        <li><a href="{{ route('dept.set-admin',['department'=>$department->id,'user'=>$item->id,'mode'=>0]) }}">@lang('admin.remove-admin')</a></li>

                                                                    @endif
                                                                    <li><a href="{{ url('/admin/members/' . $item->id) }}">@lang('admin.details')</a></li>
                                                                    <li> <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" title="@lang('site.edit') @lang('admin.member')"> @lang('site.edit')</a></li>
                                                                        <li><a href="{{ url('admin/emails/create') }}?user={{ $item->id }}">@lang('admin.email')</a></li>
                                                                        <li> <a href="{{ url('admin/sms/create') }}?user={{ $item->id }}" >@lang('admin.sms')</a></li>
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

@endsection

@section('footer')
    <script>
        $(function(){
            $('#reviews').load('{{ route('dept.all-members',['department'=>$department->id]) }}');
            $(document).on('click','.ajax-links a',function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $('#reviews').html('Loading...');
                $('#reviews').load(url,function(){
                    $("body,html").animate(
                            {
                                scrollTop: $("#myTabedu1").offset().top
                            },
                            800 //speed
                    );
                });

            });

            $(document).on('submit','.ajax-form',function(e){
                e.preventDefault();
                var url = $(this).attr('action')+'?'+$(this).serialize();
                console.log(url);
                $('#reviews').html('Loading...');
                $('#reviews').load(url);

            });

            $("#memberCheckAll").change(function () {
                console.log('checking');
                $("#member-form input:checkbox").prop('checked', $(this).prop("checked"));
            });

            $(document).on('change','#allCheckAll',function(){
                $("#add-form input:checkbox").prop('checked', $(this).prop("checked"));
            })
        });
    </script>

@endsection
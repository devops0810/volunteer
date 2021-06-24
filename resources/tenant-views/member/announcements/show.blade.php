@extends('layouts.member')
@section('pageTitle',__('admin.announcements'))

@section('innerTitle')
     @lang('admin.announcement') : {{ $announcement->title }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/announcements') }}">@lang('admin.announcements')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.announcement')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/member/announcements') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/member/announcements/' . $announcement->id . '/edit') }}" title="@lang('admin.edit') announcement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('member/announcements' . '/' . $announcement->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') announcement" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.id')</th><td>{{ $announcement->id }}</td>
                            </tr>
                            <tr><th> @lang('admin.title') </th><td> {{ $announcement->title }} </td></tr><tr><th> @lang('admin.content') </th><td> {!! clean($announcement->content) !!} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection
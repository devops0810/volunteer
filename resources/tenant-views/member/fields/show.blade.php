@extends('layouts.member')
@section('pageTitle',__('admin.fields'))

@section('innerTitle')
     @lang('admin.field') : {{ $field->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/fields') }}">@lang('admin.fields')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.field')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/member/fields') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/member/fields/' . $field->id . '/edit') }}" title="@lang('admin.edit') field"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('member/fields' . '/' . $field->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') field" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.id')</th><td>{{ $field->id }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $field->name }} </td></tr>
                            <tr><th> @lang('admin.type') </th><td> {{ $field->type }} </td></tr>
                            <tr><th> @lang('admin.sort-order') </th><td> {{ $field->sort_order }} </td></tr>
                            <tr>
                                <th>@lang('admin.options')</th>
                                <td>{{ $field->options }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.required')</th>
                                <td>{{ boolToString($field->required) }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.placeholder')</th>
                                <td>{{ $field->placeholder }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.enabled')</th>
                                <td>{{ boolToString($field->enabled) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection
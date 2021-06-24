@extends('layouts.admin')
@section('pageTitle',__('admin.member'))

@section('innerTitle')
     @lang('admin.members') : {{ $member->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/members') }}">@lang('admin.members')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.member')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ prevPage() }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/admin/members/' . $member->id . '/edit') }}" title="@lang('admin.edit') @lang('admin.member')"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('admin/members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') @lang('admin.member')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.id')</th><td>{{ $member->id }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $member->name }} </td></tr><tr><th> @lang('admin.email') </th><td> {{ $member->email }} </td></tr>
                            <tr><th> @lang('admin.departments') </th><td>
                                    <ul class="comma-tags">
                                    @foreach($member->departments as $department)
                                      <li>{{ $department->name }}</li>
                                        @endforeach
                                    </ul>
                                </td></tr>
                            @if($member->picture)
                            <tr>
                                <th>@lang('admin.picture')</th>
                                <td><img src="{{ asset($member->picture) }}" style="max-width: 300px" /></td>
                            </tr>
                            @endif

                            <tr>
                                <th>@lang('admin.telephone')</th>
                                <td>{{ $member->telephone }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.gender')</th>
                                <td>@if($member->gender=='m')
                                            @lang('admin.male')
                                        @else
                                            @lang('admin.female')
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('admin.about')</th>
                                <td>{!! clean( $member->about) !!}</td>
                            </tr>

                            @foreach(\App\Field::orderBy('sort_order','asc')->get() as $field)
                            <tr>
                                <th>{{ $field->name }}</th>
                                <td>
                                    <?php
                                    $value = $member->fields()->where('field_id',$field->id)->first() ? $member->fields()->where('field_id',$field->id)->first()->pivot->value:'';

                                    ?>
                                    @if($field->type=='checkbox')
                                        {{ boolToString($value) }}
                                        @else
                                        {{ $value }}
                                    @endif


                                </td>
                            </tr>
@endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection
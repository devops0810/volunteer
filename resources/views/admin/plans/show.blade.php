@extends('layouts.admin-page')

@section('pageTitle',__('saas.plan').': '.$plan->name)
@section('page-title',__('saas.plan').': '.$plan->name)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/plans') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/plans/' . $plan->id . '/edit') }}" title="Edit plan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/plans' . '/' . $plan->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') plan" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $plan->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.name') </th><td> {{ $plan->name }} </td></tr><tr><th> @lang('saas.sort-order') </th><td> {{ $plan->sort_order }} </td></tr><tr><th> @lang('saas.storage-space') </th><td> {{ $plan->storage_space }} {{ $plan->storage_unit }}</td> </tr>
                                <tr>
                                    <th>@lang('saas.user-limit')</th>
                                    <td>{{ limit($plan->user_limit) }}</td>
                                </tr>
                                    <tr>
                                        <th>@lang('saas.department-limit')</th>
                                        <td>{{ limit($plan->department_limit) }}</td>
                                    </tr>
                                <tr>
                                    <th>@lang('saas.is-free')</th>
                                    <td>{{ boolToString($plan->is_free) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('saas.visibility')</th>
                                    <td>
                                        @if($plan->public==1)
                                            @lang('saas.public')
                                            @else
                                            @lang('saas.private')
                                        @endif
                                    </td>
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

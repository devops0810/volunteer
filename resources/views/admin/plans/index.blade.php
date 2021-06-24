@extends('layouts.admin-page')


@section('pageTitle',__('saas.plans'))
@section('page-title',__('saas.manage-plans'))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="{{ url('/admin/plans/create') }}" class="btn btn-success btn-sm" title="@lang('saas.add-new') plan">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('saas.add-new')
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@lang('saas.name')</th><th>@lang('saas.sort-order')</th><th>@lang('saas.subscribers')</th>
                                        <th>@lang('saas.monthly-price')</th>
                                        <th>@lang('saas.annual-price')</th>
                                        <th>@lang('saas.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($plans as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->sort_order }}</td><td>{{ $item->subscribers->count() }}</td>
                                        <td>{{ price($item->packageDurations()->where('type','m')->first()->price) }}</td>
                                        <td>{{ price($item->packageDurations()->where('type','a')->first()->price) }}</td>
                                        <td>
                                            <a href="{{ url('/admin/plans/' . $item->id) }}" title="View plan"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                            <a href="{{ url('/admin/plans/' . $item->id . '/edit') }}" title="Edit plan"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                                            <form method="POST" action="{{ url('/admin/plans' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete plan" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean( $plans->appends(['search' => Request::get('search')])->render()) !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

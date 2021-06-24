@extends('layouts.admin-page')

@section('search-form')
    <!-- Form -->
    <form  method="GET" action="{{ url('/admin/subscribers') }}"  class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input value="{{ request('search') }}" name="search"  class="form-control" placeholder="@lang('admin.search')" type="text">
            </div>
        </div>
        <input type="hidden" name="sort" value="{{ request('sort') }}"/>
    </form>
@endsection

@section('pageTitle',__('saas.subscribers'))
@section('page-title',$title.(!empty(request('search'))? ': '.request('search'):'' ))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="{{ url('/admin/subscribers/create') }}" class="btn btn-success btn-sm" title="@lang('saas.add-new') subscriber">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('saas.add-new')
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@lang('saas.name')</th><th>@lang('saas.email')</th><th>@lang('saas.plan')</th>
                                        <th>@lang('saas.expires')</th>
                                        <th>@lang('saas.enabled')?</th>
                                        <th>@lang('saas.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->subscriber()->exists())
                                            {{ $item->subscriber->packageDuration->package->name }} ({{ ($item->subscriber->packageDuration->type=='m')? __('saas.monthly'):__('saas.annual') }})
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->subscriber()->exists())
                                                {{ date('d/M/Y g:i a',$item->subscriber->expires) }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ boolToString($item->enabled) }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/subscribers/' . $item->id) }}" title="@lang('saas.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                            <a href="{{ url('/admin/subscribers/' . $item->id . '/edit') }}" title="@lang('saas.edit')"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>
                                            @if($item->subscriber()->exists())
                                            <a class="btn btn-sm btn-success" href="{{ route('admin.hostnames.index',['website'=>$item->subscriber->website->id]) }}"><i class="fa fa-link" aria-hidden="true"></i> @lang('saas.manage-domains')</a>
                                            @endif
                                            <form method="POST" action="{{ url('/admin/subscribers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete')" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean( $subscribers->appends(['search' => Request::get('search'),'sort'=>Request::get('sort')])->render()) !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

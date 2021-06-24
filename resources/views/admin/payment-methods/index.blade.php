@extends('layouts.admin-page')
@section('pageTitle',__('saas.payment-methods'))
    @section('page-title',__('saas.payment-methods'))

@section('page-content')

    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>@lang('saas.payment-method')</th>
                <th>@lang('saas.enabled')</th>
                <th>@lang('saas.sort-order')</th>
                <th>@lang('saas.actions')</th>
            </tr>
            </thead>
            <tbody>
                @foreach($paymentMethods as $method)
                    <tr>
                        <td>
                            @if($method->translate==1)
                                @lang('saas.'.$method->code)
                                @else
                            {{ $method->name }}
                        @endif
                        </td>
                        <td>{{ boolToString($method->status) }}</td>
                        <td>{{ $method->sort_order }}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.payment-methods.edit',['paymentMethod'=>$method->id]) }}"><i class="fa fa-edit"></i> @lang('saas.edit')</a>
                        </td>
                    </tr>

                    @endforeach
            </tbody>
        </table>

    </div>

@endsection

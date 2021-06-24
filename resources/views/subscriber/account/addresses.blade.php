@extends('layouts.account-page')
@section('pageTitle','Billing Addresses')
@section('page-title','Billing Addresses')
@section('page-content')
    <div class="card-box">
        <div>
            <a class="btn btn-primary" href="{{ route('user.billing-address.create') }}"><i class="fa fa-plus"></i> Add Address</a>
            <br/>  <br/>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">

                <thead>
                <tr>
                    <th>@lang('saas.name')</th>
                    <th>@lang('saas.city')</th>
                    <th>@lang('saas.state-province')</th>
                    <th>@lang('saas.country')</th>
                    <th>@lang('saas.default')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->name }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->country->name }}</td>
                    <td>{{ boolToString($address->default)}}</td>
                    <td>
                        <form onsubmit="return confirm('@lang('admin.confirm-delete')')" method="post" action="{{ route('user.billing-address.destroy',['billingAddress'=>$address]) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a class="btn btn-sm btn-primary" href="{{ route('user.billing-address.edit',['billingAddress'=>$address]) }}"><i class="fa fa-edit"></i> @lang('saas.edit')</a>

                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> @lang('saas.delete')</button>
                        </form>


                    </td>
                </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $addresses->links() }}
        </div>

    </div>
    
@endsection    
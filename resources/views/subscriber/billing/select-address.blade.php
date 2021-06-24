@extends('layouts.account-page')
@section('pageTitle',__('saas.select-address'))
@section('page-title',__('saas.select-address'))
    @section('page-content')
        <a href="{{ route('user.invoice.checkout')  }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
        <br />
        <br />


        <div class="row">
            <?php $count=1; ?>
        @foreach($addresses as $address)
            <div class="col-md-4" style="min-height: 440px">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('saas.address') {{ $count }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>@lang('saas.name'):</strong> {{ $address->name }}</p>
                                <p><strong>@lang('saas.street-address'):</strong> {{ $address->address }}</p>
                                @if(!empty($address->address2))
                                    <p><strong>@lang('saas.street-address-2'):</strong> {{ $address->address2 }}</p>
                                @endif
                                <p><strong>@lang('saas.city'):</strong> {{ $address->city }}</p>
                                <p><strong>@lang('saas.state'):</strong> {{ $address->state }}</p>
                                <p><strong>@lang('saas.zip'):</strong> {{ $address->zip }}</p>
                                <p><strong>@lang('saas.country'):</strong> {{ $address->country->name }}</p>
                                <a class="btn btn-primary" href="{{ route('user.invoice.set-address',['id'=>$address->id]) }}">Select</a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <?php $count++; ?>
        @endforeach
        </div>
        @endsection
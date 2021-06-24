@extends('layouts.site-page')
@section('pageTitle',__('saas.contact'))
@section('page-title',__('saas.contact'))
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">@lang('saas.contact')</li>
@endsection


@section('page-content')

    <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>{{ setting('general_address') }}</h3>
                    <p>{{ setting('general_site_name') }}</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                <div class="media-body">
                    <h3><a href="tel:{{ setting('general_tel') }}">{{ setting('general_tel') }}</a></h3>

                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3><a href="mailto:{{ setting('general_contact_email') }}">{{ setting('general_contact_email') }}</a></h3>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="flash-message"  style="padding-left:50px; padding-right:50px">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
                @if(Session::has('flash_message'))

                    <p class="alert alert-success">{{ Session::get('flash_message') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            </div> <!-- end .flash-message -->
            <form action="#/" class="form-contact contact_form" action="{{ route('site.send-msg') }}" method="post" id="contactForm">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input required class="form-control" name="name" id="name" type="text" placeholder="@lang('saas.enter-name')">
                        </div>
                        <div class="form-group">
                            <input required  class="form-control" name="email" id="email" type="email" placeholder="@lang('saas.enter-email')">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text" placeholder="@lang('saas.enter-subject')">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <textarea  required  class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="@lang('saas.enter-message')"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button-contactForm">@lang('saas.send-message')</button>
                </div>
            </form>
        </div>
    </div>

@endsection

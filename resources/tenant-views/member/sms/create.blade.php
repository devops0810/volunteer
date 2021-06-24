@extends('layouts.member')
@section('pageTitle',__('admin.sms'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.sms')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/sms') }}">@lang('admin.sms')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.sms')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form id="sendForm" method="post" action="{{ url('/member/sms') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('member.sms.form', ['formMode' => 'create'])

            </form>




            </div>
        </div>


    </div>

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){

            $('#sendForm').submit(function(e){

                console.log($('#members').val());

                if( !$('#members').val() && !$('#departments').val() && !$('#all_members').prop("checked")){
                    e.preventDefault();
                    alert('@lang('admin.recipient-error')');
                }
            });

            $('#teams,#members2').select2();
            $('#members').select2({
                placeholder: "@lang('admin.search-members')...",
                minimumInputLength: 3,
                ajax: {
                    url: '{{ route('members.search') }}?format=number',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            term: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }

            });
        });
    </script>

    <script>
        $(document).ready(function(){
            var $remaining = $('#remaining'),
                    $messages = $remaining.next();

            $('#message').keyup(function(){
                var chars = this.value.length,
                        messages = Math.ceil(chars / 160),
                        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

                $remaining.text(remaining + ' @lang('admin.characters-remaining').');
                $messages.text(messages + ' @lang('admin.message_s')');
            });

            $('#message').trigger('keyup');
        });

    </script>
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection
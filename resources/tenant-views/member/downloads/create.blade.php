@extends('layouts.member')
@section('pageTitle',__('admin.downloads'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.download')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/downloads') }}">@lang('admin.downloads')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.download')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/member/downloads') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="msg_id" value="{{ $msgId }}"/>
                @include ('member.downloads.form', ['formMode' => 'create'])

            </form>




            </div>
        </div>


    </div>

@endsection

@section('footer')
    <!-- dropzone JS
		============================================ -->
    <script src="{{ asset('themes/main/js/dropzone/dropzone.js') }}"></script>
    <script>




        Dropzone.autoDiscover = false;
        jQuery(document).ready(function() {

            $("div#my-dropzone").dropzone({
                url: "{{ route('member.emails.upload',['id'=>$msgId]) }}",
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.zip,.mp3,.mp4",
                maxFilesize: 10, // MB
                success: function (file, response) {
                    console.log("Sucesso");
                    console.log(response);
                },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                addRemoveLinks: true,
                removedfile: function(file) {
                    var name = file.name;
                    console.log(name);

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('member.emails.remove-upload',['id'=>$msgId]) }}',
                        data: {name: name,request: 2},
                        sucess: function(data){
                            console.log('success: ' + data);
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                dictRemoveFile: '@lang('admin.remove-file')',
                dictCancelUpload: '@lang('admin.cancel-upload')',
                dictCancelUploadConfirmation: '@lang('admin.cancel-confirm')'
            });

        });

    </script>
@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('themes/main/css/dropzone/dropzone.css') }}">

@endsection
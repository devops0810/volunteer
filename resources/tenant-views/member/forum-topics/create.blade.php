@extends('layouts.member')
@section('pageTitle',__('admin.forum-topics'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.topic')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/forum-topics') }}">@lang('admin.forum-topics')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.topic')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/member/forum-topics') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="msg_id" value="{{ $msgId }}"/>
                @include ('member.forum-topics.form', ['formMode' => 'create'])

            </form>




            </div>
        </div>


    </div>

@endsection

@section('footer')
    <script src="{{ asset('themes/main/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('themes/main/js/summernote/summernote-active.js') }}"></script>

    <script src="{{ asset('themes/main/js/multiple-email/multiple-email-active.js') }}"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="{{ asset('themes/main/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
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
    <link rel="stylesheet" href="{{ asset('themes/main/css/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/css/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection
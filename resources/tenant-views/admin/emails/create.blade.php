@extends('layouts.admin')
@section('pageTitle',__('admin.messages'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.message')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/emails') }}">@lang('admin.messages')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.message')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="hpanel email-compose">
                <div class="panel-heading hbuilt">
                    <div class="p-xs h4">
                        @lang('admin.new-message')
                    </div>
                </div>
                <form id="sendForm" method="post" action="{{ url('/admin/emails') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="msg_id" value="{{ $msgId }}"/>
                <div class="panel-heading hbuilt">
                    <div class="p-xs">

                            <div class="form-group">
                                <label class="col-lg-1 control-label text-left">@lang('admin.to'):</label>
                                <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                    <div>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('admin.members')</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('admin.departments')</a></li>
                                            <li role="presentation"><a href="#all" aria-controls="profile" role="tab" data-toggle="tab">@lang('admin.all-members')</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active " id="home"  >
                                                <div style="margin-top: 10px">
                                                    <select multiple name="members[]" id="members" class="form-control">
                                                        @if($replyUser) 
                                                            <option selected value="{{ $replyUser->id }}">{{ $replyUser->name }} &lt;{{ $replyUser->email }}&gt; </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="profile">
                                                <div style="margin-top: 10px">
                                                    <select multiple name="departments[]" id="departments" class="form-control select2">
                                                        <option></option>
                                                        @foreach($departments as $department)
                                                            <option @if(is_array(old('departments')) && in_array(@$department->id,old('departments'))) selected @endif value="{{ $department->id }}">{{ $department->name }} ({{ $department->users()->count() }})</option>
                                                        @endforeach
                                                    </select>


                                                </div>

                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="all">

                                                <div style="margin-top: 10px" class="checkbox">
                                                    <label>
                                                        <input @if(old('all_members')==1) checked @endif type="checkbox" name="all_members" id="all_members" value="1"> @lang('admin.send-all')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                 </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-1 control-label text-left">@lang('admin.subject'):</label>
                                <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">

                                    <input  value="{{ old('subject',$subject) }}" required type="text" name="subject" class="form-control input-sm" placeholder="@lang('admin.subject')">
                                </div>
                            </div>

                    </div>
                </div>
                <div class="panel-body no-padding">
<textarea name="message" required id="message" cols="30" class="form-control summernote6">{{ old('message') }}
@if($replyEmail)
    <br/> <br/>
@lang('admin.reply-content',['date'=>\Illuminate\Support\Carbon::parse($replyEmail->created_at)->format('d M Y'),'name'=>$replyEmail->user->name])
        <br/>
{!! clean( $replyEmail->message) !!}
@endif
</textarea>

                </div>

                    <div class="form-group" style="padding-top: 20px">
                        <label class="col-lg-1 control-label text-left">@lang('admin.comment'):</label>
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <input value="{{ old('notes') }}"  type="text" name="notes" class="form-control input-sm" placeholder="@lang('admin.optional')">
                        </div>
                    </div>

                <div class="panel-body no-padding">
                    <div id="dropzone" class="dropmail">

                        <div class="dropzone dropzone-custom needsclick" id="my-dropzone">
                            <div class="dz-message needsclick download-custom">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                <h1>@lang('admin.attachments')</h1>
                                <h2>@lang('admin.upload-info')</h2>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="panel-footer">
                    @if(false)
                    <div class="pull-right">
                        <div class="btn-group active-hook">
                            <button  class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                            <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                        </div>
                    </div>
                    @endif
                    <button id="sendBtn" class="btn btn-primary ft-compse">@lang('admin.send-message')</button>
                    @if(false)
                    <div class="btn-group active-hook mail-btn-sd">
                        <button class="btn btn-default"><i class="fa fa-paperclip"></i> </button>
                        <button class="btn btn-default"><i class="fa fa-image"></i> </button>
                    </div>
                    @endif
                </div>
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

        $('#sendForm').submit(function(e){

            console.log($('#members').val());

            if( !$('#members').val() && !$('#departments').val() && !$('#all_members').prop("checked") ){
                e.preventDefault();
                alert('@lang('admin.recipient-error')');
            }
        });

        $(function(){
            $('#departments').select2();
        });

        $('#members').select2({
            placeholder: "@lang('admin.search-members')...",
            minimumInputLength: 3,
            ajax: {
                url: '{{ route('members.search') }}',
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

        Dropzone.autoDiscover = false;
        jQuery(document).ready(function() {

            $("div#my-dropzone").dropzone({
                url: "{{ route('emails.upload',['id'=>$msgId]) }}",
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
                        url: '{{ route('emails.remove-upload',['id'=>$msgId]) }}',
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
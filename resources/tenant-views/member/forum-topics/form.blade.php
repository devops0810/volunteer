@if($formMode=='create')
<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">@lang('admin.topic')</label>
    <input required class="form-control" name="topic" type="text" id="topic" value="{{ old('topic',isset($forumtopic->topic) ? $forumtopic->topic : '') }}" >
    {!! clean( $errors->first('topic', '<p class="help-block">:message</p>')) !!}
</div>
@endif
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">@lang('admin.content')</label>
    <textarea required class="form-control  summernote6" rows="5" name="content" type="textarea" id="content" >{{ old('content',isset($forumtopic->content) ? $forumtopic->content : '') }}</textarea>
    {!! clean( $errors->first('content', '<p class="help-block">:message</p>')) !!}
</div>

<a class="btn btn-primary pull-right" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
 <i class="fa fa-file-zip-o"></i>   @lang('admin.attach-files')
</a>
<div class="collapse" id="collapseExample">
    <div class="well">
        <div class="panel-body no-padding">
            <div id="dropzone" class="dropmail">

                <div class="dropzone dropzone-custom needsclick" id="my-dropzone">
                    <div class="dz-message needsclick download-custom">
                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                        <h1>@lang('admin.files')</h1>
                        <h2>@lang('admin.upload-info')</h2>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
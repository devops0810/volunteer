<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ __('admin.title') }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('announcement',isset($announcement->title) ? $announcement->title : '') }}" >
    {!! clean( $errors->first('title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ __('admin.content') }}</label>
    <textarea class="form-control summernote6" rows="5" name="content" type="textarea" id="content" >{{ old('announcement',isset($announcement->content) ? $announcement->content : '') }}</textarea>
    {!! clean( $errors->first('content', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group">
    <label for="send">
        <input type="checkbox" name="send" value="1"/> @lang('admin.send-all-members')
    </label>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">

</div>


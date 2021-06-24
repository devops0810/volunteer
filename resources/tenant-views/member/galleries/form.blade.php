<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($gallery->name) ? $gallery->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description') (@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description',isset($gallery->description) ? $gallery->description : '') }}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
            <label for="picture" class="control-label">@lang('admin.picture')</label>


            <input class="form-control" name="picture" type="file" id="picture" value="{{ isset($gallery->file_path) ? $gallery->file_path : ''}}" >
            {!! clean( $errors->first('picture', '<p class="help-block">:message</p>')) !!}
        </div>

    </div>
    <div class="col-md-6">
        @if(isset($gallery->file_path))

            <div><img src="{{ asset($gallery->file_path) }}" style="max-width: 300px" /></div> <br/>

        @endif
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
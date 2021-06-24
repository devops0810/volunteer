
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($download->name) ? $download->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}(@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description',isset($download->description) ? $download->description : '') }}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>

@if($formMode=='create')

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
@endif
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.save') : __('site.create') }}">
</div>
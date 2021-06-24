<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input  required class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description')</label>
    <textarea class="form-control  summernote6" rows="5" name="description" type="textarea" id="description" >{{ isset($category->description) ? $category->description : ''}}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('admin.sort-order')</label>
    <input class="form-control" name="sort_order" type="text" id="sort_order" value="{{ isset($category->sort_order) ? $category->sort_order : ''}}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('admin.update') : __('admin.create') }}">
</div>

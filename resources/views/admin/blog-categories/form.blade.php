<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">@lang('saas.category')</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ old('category',isset($blogcategory->category) ? $blogcategory->category : '') }}" >
    {!! clean( $errors->first('category', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('saas.sort-order')</label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($blogcategory->sort_order) ? $blogcategory->sort_order : '') }}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>

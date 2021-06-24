<div class="form-group {{ $errors->has('menu_title') ? 'has-error' : ''}}">
    <label for="menu_title" class="control-label">@lang('saas.menu-title')</label>
    <input class="form-control" name="menu_title" type="text" id="menu_title" value="{{ old('menu_title',isset($feature->menu_title) ? $feature->menu_title : '') }}" >
    {!! clean( $errors->first('menu_title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('page_title') ? 'has-error' : ''}}">
    <label for="page_title" class="control-label">@lang('saas.page-title')</label>
    <input class="form-control" name="page_title" type="text" id="page_title" value="{{ old('page_title',isset($feature->page_title) ? $feature->page_title : '') }}" >
    {!! clean( $errors->first('page_title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">@lang('saas.content')</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ old('content',isset($feature->content) ? clean($feature->content) : '') }}</textarea>
    {!! clean( $errors->first('content', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('saas.sort-order')</label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($feature->sort_order) ? $feature->sort_order : '') }}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('meta_title') ? 'has-error' : ''}}">
    <label for="meta_title" class="control-label">@lang('saas.meta-title')</label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="{{ old('meta_title',isset($feature->meta_title) ? $feature->meta_title : '') }}" >
    {!! clean( $errors->first('meta_title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : ''}}">
    <label for="meta_description" class="control-label">@lang('saas.meta-description')</label>
    <textarea class="form-control" rows="5" name="meta_description" type="textarea" id="meta_description" >{{ old('meta_description',isset($feature->meta_description) ? $feature->meta_description : '') }}</textarea>
    {!! clean( $errors->first('meta_description', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">@lang('saas.title')</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('title',isset($helppost->title) ? $helppost->title : '') }}" >
    {!! clean( $errors->first('title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">@lang('saas.content')</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ old('content',isset($helppost->content) ? clean($helppost->content) : '') }}</textarea>
    {!! clean( $errors->first('content', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group">
    <label for="categories">@lang('saas.categories')</label>
    @if($formMode === 'edit')
        <select multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            @foreach(\App\Models\HelpCategory::get() as $category)
                <option  @if( (is_array(old('categories')) && in_array(@$category->id,old('categories')))  || (null === old('categories')  && $helppost->helpCategories()->where('help_category_id',$category->id)->first() ))
                    selected
                    @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    @else
        <select  multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            @foreach(\App\Models\HelpCategory::get() as $category)
                <option @if(is_array(old('categories')) && in_array(@$category->id,old('categories'))) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    @endif

</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('saas.sort-order')</label>
    <input class="form-control number" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($helppost->sort_order) ? $helppost->sort_order : '') }}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="control-label">@lang('saas.enabled')</label>
    <select name="enabled" class="form-control" id="enabled" >
    @foreach (json_decode('{"1":"Yes","0":"No"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('enabled',@$helppost->enabled)) && old('helppost',@$helppost->enabled) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('enabled', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>

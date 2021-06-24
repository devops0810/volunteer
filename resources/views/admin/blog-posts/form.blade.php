<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">@lang('saas.title')</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('title',isset($blogpost->title) ? $blogpost->title : '') }}" >
    {!! clean( $errors->first('title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">@lang('saas.content')</label>
     <textarea class="form-control" rows="5" name="content"   id="content" >{{ old('content',isset($blogpost->content) ? clean($blogpost->content) : '') }}</textarea>


    {!! clean( $errors->first('content', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('published_on') ? 'has-error' : ''}}">
    <label for="published_on" class="control-label">@lang('saas.published-on')</label>
    <input class="form-control date" name="published_on" type="text" id="published_on" value="{{ old('published_on',isset($blogpost->published_on) ? $blogpost->published_on : '') }}" >
    {!! clean( $errors->first('published_on', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group">
    <label for="categories">@lang('saas.categories')</label>
    @if($formMode === 'edit')
        <select multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            @foreach(\App\Models\BlogCategory::get() as $category)
                <option  @if( (is_array(old('categories')) && in_array(@$category->id,old('categories')))  || (null === old('categories')  && $blogpost->blogCategories()->where('blog_category_id',$category->id)->first() ))
                    selected
                    @endif
                    value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    @else
        <select  multiple name="categories[]" id="categories" class="form-control select2">
            <option></option>
            @foreach(\App\Models\BlogCategory::get() as $category)
                <option @if(is_array(old('categories')) && in_array(@$category->id,old('categories'))) selected @endif value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    @endif

</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">@lang('saas.enabled')</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"1":"Yes","0":"No"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('status',@$blogpost->status)) && old('blogpost',@$blogpost->status) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('status', '<p class="help-block">:message</p>')) !!}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('cover_image') ? 'has-error' : ''}}">
            <label for="cover_image" class="control-label">@if($formMode=='edit')@lang('admin.change')    @endif @lang('saas.cover-image')</label>


            <input class="form-control" name="cover_image" type="file" id="cover_image" value="{{ isset($blogpost->cover_image) ? $blogpost->cover_image : ''}}" >
            {!! clean( $errors->first('cover_image', '<p class="help-block">:message</p>')) !!}
        </div>

    </div>
    <div class="col-md-6">
        @if($formMode==='edit' && !empty($blogpost->cover_image))

            <div><img src="{{ asset($blogpost->cover_image) }}" style="max-width: 300px" /></div> <br/>
            <a onclick="return confirm('@lang('admin.delete-prompt')')" class="btn btn-danger" href="{{ route('admin.blog.remove-picture',['id'=>$blogpost->id]) }}"><i class="fa fa-trash"></i> @lang('admin.delete') @lang('saas.cover-image')</a>

        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('meta_title') ? 'has-error' : ''}}">
    <label for="meta_title" class="control-label">@lang('saas.meta-title')</label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="{{ old('meta_title',isset($blogpost->meta_title) ? $blogpost->meta_title : '') }}" >
    {!! clean( $errors->first('meta_title', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : ''}}">
    <label for="meta_description" class="control-label">@lang('saas.meta-description')</label>
    <textarea class="form-control" rows="5" name="meta_description" type="textarea" id="meta_description" >{{ old('meta_description',isset($blogpost->meta_description) ? $blogpost->meta_description : '') }}</textarea>
    {!! clean( $errors->first('meta_description', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>

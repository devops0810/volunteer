<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($shift->name) ? $shift->name : __('admin.shift').' '.($event->shifts()->count() + 1)) }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('starts') ? 'has-error' : ''}}">
    <label for="starts" class="control-label">@lang('admin.starts')</label>
    <input class="form-control time" name="starts" type="text" id="starts" value="{{ old('starts',isset($shift->starts) ? \Illuminate\Support\Carbon::parse($shift->starts)->format('h:i A') : '') }}" >
    {!! clean( $errors->first('starts', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('ends') ? 'has-error' : ''}}">
    <label for="ends" class="control-label">@lang('admin.ends')</label>
    <input class="form-control time" name="ends" type="text" id="ends" value="{{ old('ends',isset($shift->ends) ? \Illuminate\Support\Carbon::parse($shift->ends)->format('h:i A') : '') }}" >
    {!! clean( $errors->first('ends', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group">
    <label for="members">@lang('admin.members')</label>
    <select class="select2 form-control" name="members[]" id="members" multiple>
        @foreach($members as $member)
            @if($formMode === 'edit')
                <?php
                $user =$shift->users()->where('id',$member->id)->first();
                ?>
                <option @if( (is_array(old('members')) && in_array(@$member->id,old('members')))  || (null === old('members')  && $shift->users()->where('id',$member->id)->first() )) selected @endif value="{{ $member->id }}" >{{ $member->name }} ({{ $member->email }})</option>

            @else
                <option value="{{ $member->id }}" >{{ $member->name }} ({{ $member->email }})</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description')</label> (@lang('admin.optional'))
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description',isset($shift->description) ? $shift->description : '') }}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
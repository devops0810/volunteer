<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ old('team',isset($team->name) ? $team->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group">
    <label for="members">@lang('admin.members')</label>
    <select class="select2 form-control" name="members[]" id="members" multiple>
        @foreach($members as $member)
                @if($formMode === 'edit')
                    <?php
                    $user =$team->users()->where('id',$member->id)->first();
                    ?>
                    <option @if( (is_array(old('members')) && in_array(@$member->id,old('members')))  || (null === old('members')  && $team->users()->where('id',$member->id)->first() )) selected @endif value="{{ $member->id }}" >{{ $member->name }} ({{ $member->email }})</option>

                @else
                    <option value="{{ $member->id }}" >{{ $member->name }} ({{ $member->email }})</option>
                @endif
        @endforeach
    </select>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
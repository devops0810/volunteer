<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ isset($department->name) ? $department->name : ''}}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description')</label>
    <textarea class="form-control summernote6"    rows="5" name="description" type="textarea" id="description" >{{ isset($department->description) ? $department->description : ''}}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enroll_open') ? 'has-error' : ''}}">
    <label for="enroll_open" class="control-label">@lang('admin.enroll-open')</label>
    <select name="enroll_open" class="form-control" id="enroll_open" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enroll_open) && $department->enroll_open == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enroll_open', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('approval_required') ? 'has-error' : ''}}">
    <label for="approval_required" class="control-label">@lang('admin.approval-required')</label>
    <select name="approval_required" class="form-control" id="approval_required" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->approval_required) && $department->approval_required == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('approval_required', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group {{ $errors->has('show_members') ? 'has-error' : ''}}">
    <label for="show_members" class="control-label">@lang('admin.show-members')</label>
    <select name="show_members" class="form-control" id="show_members" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->show_members) && $department->show_members == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('show_members', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('allow_members_communicate') ? 'has-error' : ''}}">
    <label for="allow_members_communicate" class="control-label">@lang('admin.allow-communicate')</label>
    <select name="allow_members_communicate" class="form-control" id="allow_members_communicate" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->allow_members_communicate) && $department->allow_members_communicate == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('allow_members_communicate', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enable_forum') ? 'has-error' : ''}}">
    <label for="enable_forum" class="control-label">@lang('admin.enable-forum')</label>
    <select name="enable_forum" class="form-control" id="enable_forum" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enable_forum) && $department->enable_forum == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enable_forum', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('allow_members_create_topics') ? 'has-error' : ''}}">
    <label for="allow_members_create_topics" class="control-label">@lang('admin.allow-create-topics')</label>
    <select name="allow_members_create_topics" class="form-control" id="allow_members_create_topics" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->allow_members_create_topics) && $department->allow_members_create_topics == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('allow_members_create_topics', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enable_roster') ? 'has-error' : ''}}">
    <label for="enable_roster" class="control-label">@lang('admin.enable-roster')</label>
    <select name="enable_roster" class="form-control" id="enable_roster" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enable_roster) && $department->enable_roster == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enable_roster', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enable_announcements') ? 'has-error' : ''}}">
    <label for="enable_announcements" class="control-label">@lang('admin.enable-announcements')</label>
    <select name="enable_announcements" class="form-control" id="enable_announcements" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enable_announcements) && $department->enable_announcements == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enable_announcements', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enable_resources') ? 'has-error' : ''}}">
    <label for="enable_resources" class="control-label">@lang('admin.enable-resources')</label>
    <select name="enable_resources" class="form-control" id="enable_resources" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enable_resources) && $department->enable_resources == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enable_resources', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('allow_members_upload') ? 'has-error' : ''}}">
    <label for="allow_members_upload" class="control-label">@lang('admin.allow-members-upload')</label>
    <select name="allow_members_upload" class="form-control" id="allow_members_upload" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->allow_members_upload) && $department->allow_members_upload == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('allow_members_upload', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enable_blog') ? 'has-error' : ''}}">
    <label for="enable_blog" class="control-label">@lang('admin.enable-blog')</label>
    <select name="enable_blog" class="form-control" id="enable_blog" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->enable_blog) && $department->enable_blog == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enable_blog', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('allow_members_post') ? 'has-error' : ''}}">
    <label for="allow_members_post" class="control-label">@lang('admin.allow-members-post')</label>
    <select name="allow_members_post" class="form-control" id="allow_members_post" >
        @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->allow_members_post) && $department->allow_members_post == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('allow_members_post', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group {{ $errors->has('visible') ? 'has-error' : ''}}">
    <label for="visible" class="control-label">@lang('admin.visibility')</label>
    <select name="visible" class="form-control" id="visible" >
        @foreach (json_decode('{"1":"'.__('admin.public').'","0":"'.__('admin.private').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($department->visible) && $department->visible == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('visible', '<p class="help-block">:message</p>')) !!}
</div>

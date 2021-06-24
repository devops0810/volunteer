<div class="form-group">
    <label class="col-lg-1 control-label text-left">To:</label>
    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('admin.members')</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('admin.departments')</a></li>
                <li role="presentation"><a href="#all" aria-controls="profile" role="tab" data-toggle="tab">@lang('admin.all-members')</a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active " id="home"  >
                    <div style="margin-top: 10px">
                        <select multiple name="members[]" id="members" class="form-control">
                            @if($replyUser)
                                <option selected value="{{ $replyUser->id }}">{{ $replyUser->name }} ({{ $replyUser->telephone }}) </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div style="margin-top: 10px">
                        <select multiple name="departments[]" id="departments" class="form-control select2">
                            <option></option>
                            @foreach($departments as $department)
                                <option @if(is_array(old('departments')) && in_array(@$department->id,old('departments'))) selected @endif value="{{ $department->id }}">{{ $department->name }} ({{ $department->users()->count() }})</option>
                            @endforeach
                        </select>


                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="all">

                    <div style="margin-top: 10px" class="checkbox">
                        <label>
                            <input @if(old('all_members')==1) checked @endif type="checkbox" name="all_members" id="all_members" value="1"> @lang('admin.send-all')
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">@lang('admin.message')</label>
    <textarea maxlength="{{ $max }}" required class="form-control" rows="5" name="message" type="textarea" id="message" >{{ old('message',isset($sms->message) ? $sms->message : '') }}</textarea>
    {!! clean( $errors->first('message', '<p class="help-block">:message</p>')) !!}
    <p>
        <span id="remaining">160 @lang('admin.characters-remaining').</span>
        <span id="messages">1 @lang('admin.message_s')</span>
    </p>
</div>

<div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
    <label for="notes" class="control-label">@lang('admin.comment') (@lang('admin.optional'))</label>
    <input class="form-control" name="notes" type="text" id="notes" value="{{ old('notes',isset($sms->notes) ? $sms->notes : '') }}" >
    {!! clean( $errors->first('subject', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('admin.send-message') }}">
</div>


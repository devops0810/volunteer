<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="control-label">{{ 'Subject' }}</label>
    <input class="form-control" name="subject" type="text" id="subject" value="{{ old('email',isset($email->subject) ? $email->subject : '') }}" >
    {!! clean( $errors->first('subject', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ 'Message' }}</label>
    <textarea class="form-control" rows="5" name="message" type="textarea" id="message" >{{ old('email',isset($email->message) ? $email->message : '') }}</textarea>
    {!! clean( $errors->first('message', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
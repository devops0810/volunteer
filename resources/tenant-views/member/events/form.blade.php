<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.event') @lang('admin.name')</label>
    <input placeholder="@lang('admin.event-placeholder')" class="form-control" name="name" type="text" id="name" value="{{ old('event',isset($event->name) ? $event->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('event_date') ? 'has-error' : ''}}">
    <label for="event_date" class="control-label">@lang('admin.event') @lang('admin.date')</label>
    <input   class="form-control date" name="event_date" type="text" id="event_date" value="{{ old('event_date',isset($event->event_date) ? \Illuminate\Support\Carbon::parse($event->event_date)->format('Y-m-d') : '') }}" >
    {!! clean( $errors->first('event_date', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('venue') ? 'has-error' : ''}}">
    <label for="venue" class="control-label">@lang('admin.venue') (@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="venue" type="textarea" id="venue" >{{ old('venue',isset($event->venue) ? $event->venue : '') }}</textarea>
    {!! clean( $errors->first('venue', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description') (@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description',isset($event->description) ? $event->description : '') }}</textarea>
    {!! clean( $errors->first('description', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
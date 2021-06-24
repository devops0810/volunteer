<div class="table-responsive">
    <table class="table">
        <tbody>
        @if($subscriber->subscriber()->exists())
            <tr>
                <th>@lang('saas.users')</th><td>{{ $stats['users']}} / {{ $stats['package']->user_limit }}</td>
            </tr>
            <tr><th> @lang('admin.departments') </th><td> {{ $stats['departments']  }}  / {{ $stats['package']->department_limit }}</td></tr>

            <tr>
                <th>@lang('saas.disk-space')</th><td>{{ $stats['disk']}} / {{ $stats['limit'] }}</td>
            </tr>
            <tr><th> @lang('saas.forum-topics') </th><td> {{ $stats['forum_topics'] }} </td></tr>
            <tr><th> @lang('admin.events') </th><td> {{ $stats['events'] }} </td></tr>

            <tr><th> @lang('admin.downloads') </th><td> {{ $stats['downloads'] }} </td></tr>
            <tr><th> @lang('admin.announcements') </th><td> {{ $stats['announcements'] }} </td></tr>
            <tr><th> @lang('admin.messages') </th><td> {{ $stats['emails'] }} </td></tr>
            <tr><th> @lang('admin.sms') </th><td> {{ $stats['sms'] }} </td></tr>

        @endif
        </tbody>
    </table>
</div>
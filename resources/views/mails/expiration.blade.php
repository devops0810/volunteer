@lang('saas.dear') {{ $invoice->user->name }},<br/>
@lang('saas.expire-mail') {{ date('d/M/Y',$invoice->user->subscriber->expires) }}.
<br/>
@lang('saas.expire-mail-end'): <a href="{{ env('APP_URL').'/pay/'.$invoice->hash }}">{{ env('APP_URL').'/pay/'.$invoice->hash }}</a>.


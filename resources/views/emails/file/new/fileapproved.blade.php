@component('mail::message')
# File Approval

<p>Hi {{ $_user->name }}, we are pleased to infor you that  your file {{ $_file->title }} has been approved.</p>

<p>We appreciate you doing business with us.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

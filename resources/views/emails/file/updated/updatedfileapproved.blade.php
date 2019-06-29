@component('mail::message')
# File approval

<p>Dear {{ $_user->name }}, the changes to your file {{ $_file->title }} has been approved.</p>

<p>We are committed to serving you better.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

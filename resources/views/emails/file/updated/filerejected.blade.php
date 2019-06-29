@component('mail::message')
# File approval

<p>Dear {{ $_user->name }}, the changes you made to your file {{ $_file->title }} has been rejected</p>


<p>Please reveiw the changes and submit the file for reconsideration</p>

<p>We are committed to serving you better.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

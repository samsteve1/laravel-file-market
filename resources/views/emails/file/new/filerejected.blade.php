@component('mail::message')
# File Approval

<p>Hi {{ $_user->name }}, we regret to infor you that your file {{ $_file->title }} has been rejected.</p>


<p>Please reveiw the file and submit it for reconsideration.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

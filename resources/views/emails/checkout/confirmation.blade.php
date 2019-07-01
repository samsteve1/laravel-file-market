@component('mail::message')
# File Download

<p>Thanks for downloading <strong>{{ $_sale->file->title }} from Filemarket.</strong></p>


<p><a href="{{ route('files.download', [$_sale->file, $_sale]) }}">Click here to download your files</a></p>
 <p>
     or, copy and paste this url into your browser: <br>

     {{ route('files.download', [$_sale->file, $_sale]) }}

 </p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent

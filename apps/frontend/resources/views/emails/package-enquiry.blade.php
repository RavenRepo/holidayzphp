@component('mail::message')
# New Package Enquiry

You have received a new enquiry for the **{{ $enquiry['package'] }}** package.

## Enquiry Details:

**Name:** {{ $enquiry['name'] }}  
**Email:** {{ $enquiry['email'] }}  
**Mobile:** {{ $enquiry['mobile'] }}  
**Travel Date:** {{ $enquiry['travel_date'] }}  
**Number of Travellers:** {{ $enquiry['travellers'] }}

@if(isset($enquiry['message']) && !empty($enquiry['message']))
**Additional Message:**  
{{ $enquiry['message'] }}
@endif

@component('mail::button', ['url' => config('app.url')])
View Admin Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

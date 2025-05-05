@component('mail::message')
# New Contact Form Submission

You have received a new contact form submission from the Holidayz Manager website.

**Contact Details:**
- Name: {{ $data['first_name'] }} {{ $data['last_name'] }}
- Email: {{ $data['email'] }}
- Phone: {{ $data['phone'] }}

@if(isset($data['travel_date']))
**Travel Details:**
- Travel Date: {{ $data['travel_date'] }}
- Duration: {{ $data['duration'] }} days
- Destination: {{ $data['destination'] }}
@endif

**Message:**
{{ $data['message'] }}

@component('mail::button', ['url' => config('app.url')])
View Admin Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

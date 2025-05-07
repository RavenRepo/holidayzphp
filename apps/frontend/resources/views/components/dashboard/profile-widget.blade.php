{{-- Profile Widget --}}
{{-- Props: $profile (array with name, email, etc.) --}}
<div class="mb-8">
    <h2 class="text-xl font-semibold mb-2">Profile Summary</h2>
    <div class="bg-white shadow rounded p-4">
        <p><span class="font-semibold">Name:</span> {{ $profile['name'] ?? 'N/A' }}</p>
        <p><span class="font-semibold">Email:</span> {{ $profile['email'] ?? 'N/A' }}</p>
    </div>
</div> 
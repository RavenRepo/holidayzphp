{{-- Team Stats Widget --}}
{{-- Props: $teamMembers (array), $teamBookings (array) --}}
<div class="mb-8">
    <h2 class="text-xl font-semibold mb-2">Team Stats</h2>
    <div class="bg-white shadow rounded p-4 mb-4 flex flex-col md:flex-row md:space-x-8">
        <div class="mb-2 md:mb-0">
            <span class="font-semibold">Total Members:</span> {{ is_array($teamMembers) ? count($teamMembers) : 0 }}
        </div>
        <div>
            <span class="font-semibold">Total Bookings:</span> {{ is_array($teamBookings) ? count($teamBookings) : 0 }}
        </div>
    </div>
    <div class="bg-white shadow rounded p-4">
        <h3 class="font-semibold mb-2">Team Members</h3>
        @if (!empty($teamMembers) && count($teamMembers) > 0)
            <ul class="list-disc pl-5">
                @foreach ($teamMembers as $member)
                    <li>{{ $member['name'] ?? 'N/A' }} ({{ $member['email'] ?? 'N/A' }})</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No team members found.</p>
        @endif
    </div>
</div> 
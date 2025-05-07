{{-- Bookings Widget --}}
{{-- Props: $bookings (array of bookings) --}}
<div class="mb-8">
    <h2 class="text-xl font-semibold mb-2">My Bookings</h2>
    <div class="bg-white shadow rounded p-4">
        @if (!empty($bookings) && count($bookings) > 0)
            <table class="min-w-full text-sm">
                <thead>
                    <tr>
                        <th class="text-left font-semibold">Package</th>
                        <th class="text-left font-semibold">Date</th>
                        <th class="text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking['package'] ?? 'N/A' }}</td>
                            <td>{{ $booking['date'] ?? 'N/A' }}</td>
                            <td>{{ $booking['status'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">You have no bookings yet.</p>
        @endif
    </div>
</div> 
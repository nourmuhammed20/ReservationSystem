<div>

        <script>
            $wire.on('guest-added', () => {
                // Create an audio object and play it
                const audio = document.querySelector('#appointment-sound').play();
            });
        </script>

    <audio id="appointment-sound" src="{{ asset('assets/sounds/bell.mp3') }}" volume="0.6"></audio>
    <div wire:poll.3s class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($appointments as $appointment)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Image -->
                <img src="{{ asset('assets/images/ranks/' . $appointment->rank . '.png') }}" alt="Guest Image"
                    class="w-full h-48">

                <div class="p-4">
                    <!-- Name -->
                    <h3 class="text-lg font-semibold text-gray-900">{{ $rankMap[$appointment->rank] }} /
                        {{ $appointment->name }}</h3>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mt-2">{{ $appointment->description ?? 'No description available' }}
                    </p>

                    <!-- Arrival Time -->
                    <p class="text-gray-500 text-sm mt-2">وقت الوصول: {{ $appointment->arrival_time }}</p>

                    <div class="mt-4 flex gap-1 justify-between">
                        <!-- Let In Button -->
                        <button wire:click="letIn({{ $appointment->id }})"
                            class="bg-green-500 w-full text-white px-4 py-2 rounded-md hover:bg-green-600">
                            سماح بالدخول
                        </button>

                        <!-- Reject Button -->
                        <button wire:click="reject({{ $appointment->id }})"
                            class="bg-red-500 w-full text-white px-4 py-2 rounded-md hover:bg-red-600">
                            رفض
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

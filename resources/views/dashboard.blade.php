<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @role(['commander','admin'])
                @livewire('general-dashboard')
                @endrole
                @role('officer')
                @livewire('officer-dashboard')
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>

<?php

namespace App\Livewire;

use App\Models\Guest;
use Livewire\Component;

class GeneralDashboard extends Component
{
    public $appointments;
    public $lastSeenAppointmentId = null; // Store the last seen appointment ID

    public $rankMap = [
        'student' => 'طالب',
        'areef' => 'عريف',
        'rakeeb' => 'رقيب',
        'rakeebAwl' => 'رقيب اول',
        'mosa3ed' => 'مساعد',
        'mosa3edAwl' => 'مساعد اول',
        'molazem' => 'ملازم',
        'molazemAwl' => 'ملازم اول',
        'nakeeb' => 'نقيب',
        'ra2ed' => 'رائد',
        'mokadem' => 'مقدم',
        'akeed' => 'عقيد',
        '3ameed' => 'عميد',
        'lewa2' => 'لواء',
        'faree2' => 'فريق',
    ];
    public $lastFetchedAppointments;


    public function mount()
    {
        // Load appointments or guests
        $this->appointments = Guest::all();
        $this->lastSeenAppointmentId = $this->appointments->last()->id ?? null; // Store the last seen appointment ID
        $this->lastFetchedAppointments = collect($this->appointments); // Initialize as a collection
    }

    public function letIn($id)
    {
        // Implement the logic for "Let In" action
        $guest = Guest::find($id);
        $guest->status = 'accepted';  // Example status update
        $guest->save();
    }

    public function reject($id)
    {
        // Implement the logic for "Reject" action
        $guest = Guest::find($id);
        $guest->status = 'rejected';  // Example status update
        $guest->save();
    }

    public function loadAppointments()
    {
        // Fetch the latest appointments and check if a new one exists
        $newAppointments = Guest::where('id', '>', $this->lastSeenAppointmentId)->get();

        if ($newAppointments->isNotEmpty()) {
            $this->appointments = Guest::all(); // Update appointments list
            $this->lastSeenAppointmentId = $this->appointments->last()->id; // Update last seen appointment ID
            $this->dispatch('guest-added');

        }
    }

    public function updatedAppointments()
    {
        // Check if the appointments have been updated
        $this->appointments = Guest::all();

        if ($this->appointments->count() > $this->lastFetchedAppointments->count()) {
            // New appointment added, trigger sound notification
            $this->dispatchBrowserEvent('new-appointment');
        }

        $this->lastFetchedAppointments = collect($this->appointments);
        $this->lastFetchedAppointments = $this->appointments;
    }

    public function render()
    {
        // Fetch appointments where 'status' is not null and not equal to 'finished'
        $this->appointments = Guest::whereNotNull('status')
            ->where('status', '=', 'pending')
            ->get();

        return view('livewire.general-dashboard', [
            'appointments' => $this->appointments, // pass appointments to the view
        ]);
    }

}

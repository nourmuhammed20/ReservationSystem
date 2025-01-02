<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guest;

class OfficerDashboard extends Component
{
    public $name = null;
    public $description = '';
    public $rank = null;
    public $showGuestForm = false;

    public $appointments = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:250',
        'rank' => 'required|string',
    ];

    public function toggleGuestForm()
    {
        $this->showGuestForm = !$this->showGuestForm;
    }

    public function saveGuest()
    {
        $this->validate();

        // Save the new guest data
        Guest::create([
            'name' => $this->name,
            'description' => $this->description,
            'rank' => $this->rank,
            'status' => 'pending', // Set the default status
        ]);

        // Reset the form
        $this->reset(['name', 'description', 'rank']);

        // Close the form
        $this->showGuestForm = false;

        // Emit an event to play notification audio

        $this->dispatch('guest-added');

        // Optionally send a success message
        session()->flash('message', 'Guest added successfully.');
    }



    public function loadAppointments()
    {
        $this->appointments = Guest::whereNotNull('status')
                 ->where('status', '!=', 'done')
                 ->get();
    }

    public function mount()
    {
        $this->loadAppointments();
    }
    public function render()
    {
        // Fetch appointments where 'status' is not null and not equal to 'finished'
        $this->appointments = Guest::whereNotNull('status')
            ->where('status', '!=', 'done')
            ->get();

        return view('livewire.officer-dashboard', [
            'appointments' => $this->appointments, // pass appointments to the view
        ]);
    }



}
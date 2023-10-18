<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Dashboard extends Component
{
    public $date_from = '';
    public $date_to = '';

    #[On('activities-filtered')]
    public function updateProps($date_from, $date_to)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    public function render()
    {
        return view('livewire.dashboard')->with([
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.activity-table', [
            'activities' => Activity::paginate(2),
        ]);
    }
}

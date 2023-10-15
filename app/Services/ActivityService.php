<?php

namespace App\Services;

use App\Models\Activity;
use Livewire\WithPagination;

class ActivityService
{
    use WithPagination;

    public function getActivitiesByDate($date_from, $date_to)
    {
        return Activity::whereBetween('created_at', [$date_from, $date_to])->paginate(2);
    }
}

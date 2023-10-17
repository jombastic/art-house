<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Models\User;

class ActivityRepository
{
    public function getActivitiesByUserId($token = null)
    {
        if ($token) {
            $user = User::where('report_token', $token)->first();
            return Activity::where('user_id', $user->id);
        } else {
            return Activity::where('user_id', auth()->id());
        }
    }

    public function getActivitiesByDateRange($dateFrom, $dateTo)
    {
        return $this->getActivitiesByUserId()
            ->whereBetween('date_time', [$dateFrom, $dateTo])
            ->paginate(2);
    }

    public function getAllActivitiesByUserId($token = null)
    {
        return $this->getActivitiesByUserId($token)->lazy();
    }
}

<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Models\Token;

class ActivityRepository
{
    public function getActivitiesByUserId($token = null)
    {
        if ($token) {
            $token = Token::where('report_token', $token)->first();
            return Activity::where('user_id', $token->user_id);
        } else {
            return Activity::where('user_id', auth()->id());
        }
    }

    public function getActivitiesByDateRange($dateFrom = '', $dateTo = '', $token = null)
    {
        $query = $this->getActivitiesByUserId($token);
        if ($dateFrom && $dateTo) {
            $query = $query->whereBetween('date_time', [$dateFrom, $dateTo]);
        }
        return $query;
    }
}

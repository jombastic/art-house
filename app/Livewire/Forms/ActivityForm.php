<?php

namespace App\Livewire\Forms;

use App\Models\Activity;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ActivityForm extends Form
{
    public ?Activity $activity;

    #[Rule('required|min:5')]
    public $title = '';

    #[Rule('required|min:10')]
    public $description = '';

    #[Rule('required|numeric|min:1', as: 'time spent')]
    public $time_spent = '';

    #[Rule('required|date_format:Y-m-d\TH:i', as: 'date and time')]
    public $date_time = '';

    public function setPost(Activity $activity)
    {
        $this->activity = $activity;

        $this->title = $activity->title;

        $this->description = $activity->description;

        $this->time_spent = $activity->time_spent;

        $this->date_time = $activity->date_time;
    }

    public function store()
    {
        $this->validate();

        Activity::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->activity->update(
            $this->all()
        );
    }
}

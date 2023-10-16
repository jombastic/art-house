<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ActivityFilterForm extends Form
{
    #[Rule('nullable|date_format:Y-m-d\TH:i', as: 'date from')]
    public $date_from = '';

    #[Rule('nullable|date_format:Y-m-d\TH:i', as: 'date to')]
    public $date_to = '';

    public function setPost($date_from, $date_to)
    {
        $this->date_from = $date_from;

        $this->date_to = $date_to;
    }

    public function validation()
    {
        return $this->validate();
    }
}

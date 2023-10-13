<?php

namespace App\Livewire;

use App\Livewire\Forms\ActivityForm;
use Livewire\Component;

class CreateActivity extends Component
{
    public ActivityForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-activity');
    }
}

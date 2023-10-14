<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ActivityForm;
use App\Models\Activity;

class UpdateActivity extends Component
{
    public ActivityForm $form;

    public function mount(Activity $activity)
    {
        $this->form->setPost($activity);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-activity', [
            'header' => 'Update'
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\ActivityFilterForm;
use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ActivityTable extends Component
{
    use WithPagination;

    public ActivityFilterForm $form;

    #[Url]
    public $date_from = '';
    #[Url]
    public $date_to = '';

    public function deleteActivity($id)
    {
        Activity::find($id)->delete();
    }

    public function mount()
    {
        $this->form->setPost($this->date_from, $this->date_to);
    }

    public function refresh()
    {
        $this->form->validation();

        $this->date_from = $this->form->date_from;
        $this->date_to = $this->form->date_to;

        $this->resetPage();
    }

    public function resetForm()
    {
        $this->date_from = '';
        $this->date_to = '';

        $this->form->reset();
        $this->resetPage();
    }

    public function render()
    {
        $query = Activity::query();

        if ($this->date_from && $this->date_to) {
            $query->whereBetween('date_time', [
                $this->date_from,
                $this->date_to,
            ]);
        }

        $activities = $query->paginate(2);

        return view('livewire.activity-table', [
            'activities' => $activities
        ]);
    }
}

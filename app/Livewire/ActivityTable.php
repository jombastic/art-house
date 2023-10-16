<?php

namespace App\Livewire;

use App\Livewire\Forms\ActivityFilterForm;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
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

    public $token;
    public $routeName;

    protected $activityRepository;

    public function mount(ActivityRepository $activityRepository, ?string $token = null, ?string $routeName = null)
    {
        $this->activityRepository = $activityRepository;

        $this->token = $token;

        $this->routeName = $routeName;

        $this->form->setPost($this->date_from, $this->date_to);
    }

    public function hydrate(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function deleteActivity($id)
    {
        Activity::find($id)->delete();
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
        if ($this->routeName == 'report.show') {
            $activities = $this->activityRepository->getAllActivitiesByUserId($this->token);
        } else {
            if ($this->date_from && $this->date_to) {
                $activities = $this->activityRepository->getActivitiesByDateRange($this->date_from, $this->date_to);
            } else {
                $activities = $this->activityRepository->getActivitiesByUserId()->paginate(2);
            }
        }

        return view('livewire.activity-table', [
            'activities' => $activities
        ]);
    }
}

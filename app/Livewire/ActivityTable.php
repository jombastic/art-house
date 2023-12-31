<?php

namespace App\Livewire;

use App\Livewire\Forms\ActivityFilterForm;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use WireUi\Traits\Actions;

class ActivityTable extends Component
{
    use Actions;
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

        $this->dispatch('activities-filtered', date_from: $this->date_from, date_to: $this->date_to)->to(Dashboard::class);

        $this->form->setPost($this->date_from, $this->date_to);
    }

    public function hydrate(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function deleteActivity($id)
    {
        $activity = Activity::find($id);
        $activityTitle = $activity->title;
        $activity->delete();

        $this->notification()->success(
            $title = 'Activity deleted',
            $description = "The acivity <strong>$activityTitle</strong> was deleted!"
        );
    }

    public function refresh()
    {
        $this->form->validation();

        $this->date_from = $this->form->date_from;
        $this->date_to = $this->form->date_to;

        $this->dispatch('activities-filtered', date_from: $this->date_from, date_to: $this->date_to)->to(Dashboard::class);

        $this->resetPage();
    }

    public function resetForm()
    {
        $this->date_from = '';
        $this->date_to = '';

        $this->form->reset();

        $this->dispatch('activities-filtered', date_from: $this->date_from, date_to: $this->date_to)->to(Dashboard::class);

        $this->resetPage();
    }

    public function render()
    {
        if ($this->routeName == 'report.show') {
            $activities = $this->activityRepository->getActivitiesByDateRange($this->date_from, $this->date_to, $this->token)->lazy();
        } else {
            $activities = $this->activityRepository->getActivitiesByDateRange($this->date_from, $this->date_to)->paginate(2);
        }

        return view('livewire.activity-table', [
            'activities' => $activities
        ]);
    }
}

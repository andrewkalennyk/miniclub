<?php


namespace App\Observers;


use App\Models\Service;
use App\Models\ServiceReview;
use Illuminate\Support\Str;

class MarkObserver
{
    public function updated($object) {
        $this->recalculateMark($object);
    }

    public function saved($object) {
        $this->recalculateMark($object);
    }

    public function created($object) {
        $this->recalculateMark($object);
    }

    public function deleted($object) {
        $this->recalculateMark($object);
    }

    protected function recalculateMark($object)
    {
        $allMarks = ServiceReview::serviceId($object->service_id)->get()->pluck('mark');
        $service = Service::find($object->service_id);
        $service->mark = $allMarks->sum() / $allMarks->count();
        $service->save();
    }
}

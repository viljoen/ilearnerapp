<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;


class CourseShow extends Component
{
    public Course $modelId;

    public function mount(Course $modelId){

        $this->modelId = $modelId;
    }


    public function render()
    {
        return view('livewire.course-show');
    }
}

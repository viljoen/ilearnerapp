<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use App\Traits\Multitenantable;
use Livewire\Component;
use Livewire\WithPagination;


class Courses extends Component
{
    use withPagination, Multitenantable;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $slug;
    public $description;


    /**
     * Set the validation rules for the input fields
     * @return array
     */
    public function rules(){
        return[
            'name' => 'required',
            'slug' => ['required', Rule::unique('courses','slug')->ignore($this->modelId)],
            'description' => 'required',
        ];
    }



    /**
     * adding the relationship for the created_by field
     * Stating that it links to the User class
     * @return mixed
     */
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * This assists with auto populate
     * slug field with
     * name field
     * @param $value
     */
    public function updatedName($value){
        $this->gerenateSlug($value);
    }

    /**
     * The create function
     */
    public function create()
    {
        //
        $this->validate();
        Course::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }
    /**
     * Shows the form modal
     * of the create function
     */
    public function createShowModal(){
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible =true;
        $this->resetVars();
    }

    /**
     * The data for modal mapped
     * in this component.
     * @return array
     */
    public function modelData(){
        return[
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ];
    }

    /**
     * Resets all the variables in the modal
     * to null
     */
    public function resetVars(){
            $this->modelId = null;
            $this->name = null;
            $this->slug = null;
            $this->description = null;
    }

    /**
     * This will set the url slug to lowercase
     * & set each space to a '-'
     * @param $value
     */
    private function gerenateSlug($value){
        $process1 = str_replace(' ', '-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

    /**
     * The livewire mount function
     */
    public function mount(){
        //resets the pagination after reload

        $this->resetPage();
    }
    /**
     * The read function to return records
     */
    public function read(){
        return Course::paginate(5);

    }

    /**
     * The update function updates the record
     */
    public function update(){
        $this->validate();
        Course::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * Searches the id when loading
     * update modal
     * & loads the update modal
     * @param $id
     */
    public function updateShowModal($id){
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * loads the model data
     * of this component
     */
    public function loadModel(){
        $data = Course::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->description = $data->description;
    }


    /**
     * This will delete
     * based on the modelId
     */
    public function delete(){

        Course::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * passed in the course id before loading the modal
     * @param $id
     */
    public function deleteShowModal($id){

        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
        $this->loadModel();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     *  This is the livewire render function
     */
    public function render()
    {
        return view('livewire.courses',[
            'data' => $this->read()
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Messenger;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;


class Messengers extends Component
{
    /**
    * if pagination is required
    * use the example from below and place above $modalFormVisible = false;
    * use withPagination;
    */
    use withPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    /**
    * Add your public properties here to
    * see example below
    * public $name;
    * public $slug;
    * public $description;
    */
    public $room_id;
    public $user_id;
    public $message;

    /**
     * Set the validation rules for the input fields
     * See example below
     * public function rules(){
     *          return[
     *              'name' => 'required',
     *              'slug' => ['required', Rule::unique('courses','slug')->ignore($this->modelId)],
     *              'description' => 'required',
     *          ];
     *      }
     * @return array
     */
        public function rules(){

        }

     /**
      * The create function
      */
         public function create()
         {
             //
             $this->validate();
             Messenger::create($this->modelData());
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
       * in this component. See example below
       * public function modelData(){
       *        return[
       *            'name' => $this->name,
       *            'slug' => $this->slug,
       *            'description' => $this->description,
       *
       *        ];
       *   }
       * @return array
       */
          public function modelData(){
                return [
                    'room_id' => $this->room_id,
                    'user_id' => $this->user_id,
                    'message' => $this->message,
                ];
          }

       /**
        * Resets all the variables in the modal
        * to null
        * see example below
        * public function resetVars(){
        *                     $this->modelId = null;
        *                     $this->name = null;
        *                     $this->slug = null;
        *                     $this->description = null;
        *             }
        */

            public function resetVars(){
                $this->modelId = null;
                $this->room_id = null;
                $this->user_id = null;
                $this->message = null;

            }

        /**
         * This will set the url slug to lowercase
         * & set each space to a '-'
         * see example below
         * private function gerenateSlug($value){
         *                  $process1 = str_replace(' ', '-', $value);
         *                  $process2 = strtolower($process1);
         *                  $this->slug = $process2;
         *              }
         * @param $value
         */

         /**
          * The livewire mount function
          * If pagination enabled use the example below
          * public function mount(){
          *           //resets the pagination after reload
          *
          *           $this->resetPage();
          *       }
          */
          public function mount(){
                  //resets the pagination after reload

                  $this->resetPage();
              }

          /**
           * The read function to return records
           * See example below of paginated return
           * public function read(){
           *                    return Messenger::paginate(5);
           *                }
           */
              public function read(){
                  return Messenger::paginate(5);
              }

           /**
            * The update function updates the record
            */
               public function update(){
                   $this->validate();
                   Messenger::find($this->modelId)->update($this->modelData());
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
              * See example below
              * public function loadModel(){
              *                   $data = Messenger::find($this->modelId);
              *                   $this->name = $data->name;
              *                   $this->slug = $data->slug;
              *                   $this->description = $data->description;
              *               }
              */
                 public function loadModel(){
                     $data = Messenger::find($this->modelId);
                     $this->room_id = $data->room_id;
                     $this->user_id = $data->user_id;
                     $this->message = $data->message;

                 }

             /**
              * This will delete
              * based on the modelId
              */
                 public function delete(){

                     Messenger::destroy($this->modelId);
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
                       return view('livewire.messengers',[
                           'data' => $this->read()
                       ]);
                   }
}

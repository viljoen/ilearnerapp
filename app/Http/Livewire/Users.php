<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;


class Users extends Component
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
    public $role;
    public $name;
    public $email;

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
            return[
              'name' => 'required',
                'role' => 'required',
                'email' => ['required', Rule::unique('users','email')->ignore($this->modelId)],
            ];
        }

     /**
      * The create function
      */
         public function create()
         {
             //
             $this->validate();
             User::create($this->modelData());
             $this->modalFormVisible = false;
             $this->resetVars();

         $this->dispatchBrowserEvent('event-notification', [
                 'eventName' => 'Success',
                 'eventMessage' => 'A new user has been created'
             ]);

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
                return[
                  'name' => $this->name,
                    'role' => $this->role,
                    'email' => $this->email,
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
                $this->name = null;
                $this->role = null;
                $this->email = null;

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
           *                    return User::paginate(5);
           *                }
           */
              public function read(){
                  return User::paginate(5);
              }

           /**
            * The update function updates the record
            */
               public function update(){
                   $this->validate();
                   User::find($this->modelId)->update($this->modelData());
                   $this->modalFormVisible = false;



                   $this->dispatchBrowserEvent('event-notification', [
                           'eventName' => 'Success',
                           'eventMessage' => 'The user ('.$this->modelId.') has been updated successfully'
                       ]);

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
              *                   $data = User::find($this->modelId);
              *                   $this->name = $data->name;
              *                   $this->slug = $data->slug;
              *                   $this->description = $data->description;
              *               }
              */
                 public function loadModel(){
                     $data = User::find($this->modelId);
                     $this->name = $data->name;
                     $this->role = $data->role;
                     $this->email = $data->email;

                 }

             /**
              * This will delete
              * based on the modelId
              */
                 public function delete(){

                     User::destroy($this->modelId);
                     $this->modalConfirmDeleteVisible = false;
                     $this->resetPage();


                     $this->dispatchBrowserEvent('event-notification', [
                             'eventName' => 'Success',
                             'eventMessage' => 'The user ('.$this->modelId.') has been deleted successfully'
                         ]);

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

                  public function dispatchEvent()
                  {
                      $this->dispatchBrowserEvent('event-notification', [
                      'eventName' => 'Sample Event',
                      'eventMessage' => 'You have a sample notification'
                      ]);
                  }

               /**
                * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
                *
                *  This is the livewire render function
                */
                   public function render()
                   {
                       return view('livewire.users',[
                           'data' => $this->read()
                       ]);
                   }
}

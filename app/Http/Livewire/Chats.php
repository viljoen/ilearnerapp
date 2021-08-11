<?php

namespace App\Http\Livewire;

use App\Models\Messenger;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cookie;


class Chats extends Component
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
    public $message;
    public $roomId;
    public $chatPopupVisibility;


    public function mount(){

        if (in_array(auth()->user()->id, [1, 2])){
            $this->roomId = 1;
        } else {
            $this->roomId = 2;
        }
        //sets the initial state of the chat popup during load or reload
        $this->chatPopupVisibility = Cookie::get('chatPopupShow') == 'true' ? true : false;
    }

    /**
     * Show the chat popup box
     *
     */
    public function showChatPopup(){
        Cookie::queue('chatPopupShow', 'true', 60);
        $this->chatPopupVisibility = true;

        //load chat history be reloading the page
        $this->dispatchBrowserEvent ('reload-page');

    }

    /**
     * Hide the chat popup box
     *
     */
    public function closeChatPopup(){
        Cookie::queue('chatPopupShow', 'false', 60);
        $this->chatPopupVisibility = false;
    }



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
                'message' => 'required',
            ];

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
                return[
                    'room_id' => $this->roomId,
                    'user_id' => auth()->user()->id,
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
     * Send the message
     */
                  public function sendMessage(){
                      // (1) Save message to the database
                      Messenger::create($this->modelData());

                      // (2) remove the value of the message after saving
                      $this->message ="";

                      // (3) prompt the server that we send the message
                      $this->dispatchBrowserEvent('chat-send-message', [
                          'room_id' => $this->roomId,
                          'user_id' => auth()->user()->id,

                      ]);
                  }


               /**
                * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
                *
                *  This is the livewire render function
                */
                   public function render()
                   {
                       return view('livewire.chats',[
                           'data' => $this->read()
                       ]);
                   }
}

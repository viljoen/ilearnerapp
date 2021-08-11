<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class LivewireCustomCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     * having a question mark after the parameter means
     * the paramter is not required
     * e.g. {nameOfTheClass? : The name of the class},
     * @var string
     */
    protected $signature = 'make:livewire:crud
    {nameOfTheClass? : The name of the class},
    {nameOfTheModelClass? : The name of the model class}';

    protected $nameOfTheClass;
    protected $nameOfTheModelClass;
    protected $file;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a custom livewire CRUD';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /* For initial testing to make sure that we can call this command
         * $this->info('This is your livewire console command for generating CRUD');
         */

        // Gathers all parameters
        $this->gatherParameters();
        //Generates the Livewire Class file
        $this->generateLivewireCrudClassFile();
        //Generate the Livewire View file
        $this->generateLivewireCrudViewFile();

    }

    /**
     * This will store the values the user captures for
     * Enter class name && Enter model name
     */
    protected function gatherParameters(){
        $this->nameOfTheClass = $this->argument('nameOfTheClass');
        $this->nameOfTheModelClass = $this->argument('nameOfTheModelClass');

        // If you didn't input the name of the class
        if(!$this->nameOfTheClass){
            $this->nameOfTheClass = $this->ask('Enter class name');
        }

        // If you didn't input the name of the model class
        if(!$this->nameOfTheModelClass){
            $this->nameOfTheModelClass = $this->ask('Enter model name');
        }

        // Convert to Studly Case
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);

        $this->info($this->nameOfTheClass.' '.$this->nameOfTheModelClass);
    }

    /**
     * This creates the livewire class file according to the linked stub template
     * /stubs/custom.livewire.crud.stub
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateLivewireCrudClassFile(){

        //Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination = base_path('/app/Http/Livewire/' .$this->nameOfTheClass. '.php');

        if($this->file->exists($fileDestination)){
            $this->info('File not generated, this class file already exists: ' .$this->nameOfTheClass. '.php');
            $this->info('Aborting class file generation.');
            return false;
        }

        //Get the original string content of the file
        $fileOriginalString = $this->file->get($fileOrigin);

        //replace the string specified in the array sequentially
        $replaceFileOriginalString = Str::replaceArray('{{}}',
            [
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheClass, // Name of the class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                Str::kebab($this->nameOfTheClass), // Name of the class in camelCase as the view name
                //Str::kebab($this->nameOfTheClass), // From "FooBar" to "foo-bar"

            ],
            $fileOriginalString
        );

        //Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString);
        $this->info('Livewire class file generated: '.$fileDestination);

    }

    /**
     * Create the livewire view file according to the stub template
     * /stubs/custom.livewire.crud.view.stub
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateLivewireCrudViewFile(){
        //Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.view.stub');
        $fileDestination = base_path('/resources/views/livewire/'.Str::kebab($this->nameOfTheClass).'.blade.php');
        // using kebab $fileDestination = base_path('/resources/views/livewire/'.Str::kebab($this->nameOfTheClass).'.php');

        if($this->file->exists($fileDestination)){
            $this->info('File not generated, this view file already exists: ' .Str::kebab($this->nameOfTheClass). '.blade.php');
            $this->info('Aborting view file generation.');
            return false;
        }

        //Copy file to destination
        $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view file generated: '.$fileDestination);
    }

}

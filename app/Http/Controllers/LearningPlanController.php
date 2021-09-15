<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LearningPlan;
use App\Models\Course;
use App\Models\User;
use App\Models\Team;
use App\Http\Requests\LearningPlans\Index;
use App\Http\Requests\LearningPlans\Show;
use App\Http\Requests\LearningPlans\Create;
use App\Http\Requests\LearningPlans\Store;
use App\Http\Requests\LearningPlans\Edit;
use App\Http\Requests\LearningPlans\Update;
use App\Http\Requests\LearningPlans\Destroy;


/**
 * Description of LearningPlanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LearningPlanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.learning_plans.index', ['records' => LearningPlan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  LearningPlan  $learningplan
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, LearningPlan $learningplan)
    {
        return view('pages.learning_plans.show', [
                'record' =>$learningplan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$courses = Course::all(['id']);
		$users = User::all(['id']);
		$teams = Team::all(['id']);

        return view('pages.learning_plans.create', [
            'model' => new LearningPlan,
			"courses" => $courses,
			"users" => $users,
			"teams" => $teams,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new LearningPlan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LearningPlan saved successfully');
            return redirect()->route('learning_plans.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LearningPlan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  LearningPlan  $learningplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, LearningPlan $learningplan)
    {
		$courses = Course::all(['id']);
		$users = User::all(['id']);
		$teams = Team::all(['id']);

        return view('pages.learning_plans.edit', [
            'model' => $learningplan,
			"courses" => $courses,
			"users" => $users,
			"teams" => $teams,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  LearningPlan  $learningplan
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,LearningPlan $learningplan)
    {
        $learningplan->fill($request->all());

        if ($learningplan->save()) {
            
            session()->flash('app_message', 'LearningPlan successfully updated');
            return redirect()->route('learning_plans.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LearningPlan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  LearningPlan  $learningplan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, LearningPlan $learningplan)
    {
        if ($learningplan->delete()) {
                session()->flash('app_message', 'LearningPlan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LearningPlan');
            }

        return redirect()->back();
    }
}

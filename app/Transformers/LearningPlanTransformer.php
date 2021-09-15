<?php
namespace App\Transformers;

use LaraCrud\Helpers\TransformerAbstract;
use League\Fractal\ParamBag;
use App\Models\LearningPlan;



class LearningPlanTransformer extends TransformerAbstract
{
     /**
     * @var array
     */
    private $validParams = ['q', 'limit', 'page','fields'];

    /**
     * @var array
     */
    protected $availableIncludes = ["team","createdby","course",];

     /**
      * @var array
      */
    protected $defaultIncludes = [];


    public function transform(LearningPlan $learningPlan)
    {
        $data= [
			"id" => $learningPlan->id,
			"name" => $learningPlan->name,
			"overview" => $learningPlan->overview,
			"isActive" => $learningPlan->isActive,
			"course_id" => $learningPlan->course_id,
			"created_by" => $learningPlan->created_by,
			"team_id" => $learningPlan->team_id,
			"deleted_at" => $learningPlan->deleted_at,
			"created_at" => $learningPlan->created_at,
			"updated_at" => $learningPlan->updated_at,

        ];
        return $this->filterFields($data);

    }

    
    /**
     * Include team
     * @param LearningPlan $learningPlan
     * @return \League\Fractal\Resource\item;
     */
    public function includeTeam(LearningPlan $learningPlan, ParamBag $paramBag = null)
    {
        return $this->item($learningPlan->team, new TeamTransformer($paramBag->get('fields')));
    }
    /**
     * Include createdBy
     * @param LearningPlan $learningPlan
     * @return \League\Fractal\Resource\item;
     */
    public function includeCreatedBy(LearningPlan $learningPlan, ParamBag $paramBag = null)
    {
        return $this->item($learningPlan->createdBy, new UserTransformer($paramBag->get('fields')));
    }
    /**
     * Include course
     * @param LearningPlan $learningPlan
     * @return \League\Fractal\Resource\item;
     */
    public function includeCourse(LearningPlan $learningPlan, ParamBag $paramBag = null)
    {
        return $this->item($learningPlan->course, new CourseTransformer($paramBag->get('fields')));
    }
}
<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
     public static function bootMultitenantable(){

         if(auth()->check()){
             static ::creating(function($model){
                 $model->team_id = Auth::user()->currentTeam->id();
             });

             static::addGlobalScope('created_user_team', function(Builder $builder){
                 if (auth()->check()){
                     return $builder->where('team_id', Auth::user()->currentTeam->id());
                 }
             });
         }

     }


}

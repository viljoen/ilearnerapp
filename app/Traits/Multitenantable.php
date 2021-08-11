<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
     public static function bootMultitenantable(){

         if(auth()->check()){
             static ::creating(function($model){
                 $model->created_by = auth()->user()->id();
             });

             static::addGlobalScope('created_user', function(Builder $builder){
                 if (auth()->check()){
                     return $builder->where('created_by', auth()->user()->id());
                 }
             });
         }

     }
}

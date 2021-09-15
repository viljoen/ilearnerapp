@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    learning_plans
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> learning_plans </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('learning_plans.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.learning_plan')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection
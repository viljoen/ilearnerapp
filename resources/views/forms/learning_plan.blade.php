<form action="{{isset($route)?$route:route('learning_plans.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{old('name',$model->name)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="overview">Overview</label>
        <input type="text" class="form-control {{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" id="overview" value="{{old('overview',$model->overview)}}" placeholder="" required="required" >
          @if($errors->has('overview'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('overview') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('isActive') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="isActive"
           id="isActive">
    <label class="form-check-label" for="isActive">
        IsActive
    </label>
      @if($errors->has('isActive'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('isActive') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="course_id">Course Id</label>
    <select class="form-control {{ $errors->has('course_id') ? ' is-invalid' : '' }}" name="course_id" id="course_id">
        @if(isset($courses))
@foreach ($courses as $data)
<option value="{{$data->id}}" {{$data->id==$model->course_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('course_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('course_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="created_by">Created By</label>
    <select class="form-control {{ $errors->has('created_by') ? ' is-invalid' : '' }}" name="created_by" id="created_by">
        @if(isset($users))
@foreach ($users as $data)
<option value="{{$data->id}}" {{$data->id==$model->created_by?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('created_by'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('created_by') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="team_id">Team Id</label>
    <select class="form-control {{ $errors->has('team_id') ? ' is-invalid' : '' }}" name="team_id" id="team_id">
        @if(isset($teams))
@foreach ($teams as $data)
<option value="{{$data->id}}" {{$data->id==$model->team_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('team_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('team_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>
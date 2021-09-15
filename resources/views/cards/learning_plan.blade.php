<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('learning_plans.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('learning_plans.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('learning_plans.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Name</th>
			<td>{{$record->name}}</td>
		</tr>
		<tr>
			<th>IsActive</th>
			<td>{{$record->isActive}}</td>
		</tr>
		<tr>
			<th>Course Id</th>
			<td>{{$record->course_id}}</td>
		</tr>
		<tr>
			<th>Created By</th>
			<td>{{$record->created_by}}</td>
		</tr>
		<tr>
			<th>Team Id</th>
			<td>{{$record->team_id}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Name </th>
		<th>IsActive </th>
		<th>Course Id </th>
		<th>Created By </th>
		<th>Team Id </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->name }} </td>
	 	<td> {{$record->isActive }} </td>
	 	<td> {{$record->course_id }} </td>
	 	<td> {{$record->created_by }} </td>
	 	<td> {{$record->team_id }} </td>
	<td><a class="btn btn-secondary" href="{{route('learning_plans.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('learning_plans.edit',$record->id)}}">
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
</form></td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>
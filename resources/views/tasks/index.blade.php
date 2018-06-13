@extends('master')

@section('content')

<div class="content">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Tasks</div>

							<div class="panel-body">
								<div class="align-right">
									<a href="{{ route('task.create') }}" class="btn btn-success">+ Add New Task</a>
								</div>

								<br /><br />
								@if(\Session::has('success'))
									<div class="alert alert-success">
										<p>{{ \Session::get('success') }}</p>
									</div>
								@endif
								<table class="table">
									<tr>
										<th>S/N</th>
										<th>Task</th>
										<th>Status</th>
										<th>Time Created</th>
										<th>Action</th>
										
									</tr>
									<?php $i = 1; ?>
									@foreach($tasks as $task)
									
									<tr>
										<td>{{ $i}}
										<td>{{ $task->task }} </td>
										<td>{{ $task->status }} </td>
										<td>{{ $time = date('jS \of F Y, h:i a',$task->taskstamp) }} </td>
										<td><a href="{{action('TaskController@edit',$task['id'])}}" class="btn btn-primary">Mark-As-Done</a> | 
										<a href="/delete/{{$task['id']}}" class="btn btn-danger">Delete Task</a></td>
									</tr>
									<?php $i++; ?>
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
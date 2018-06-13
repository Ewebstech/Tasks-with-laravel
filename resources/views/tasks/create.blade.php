@extends('master')

@section('content')

<div class="content">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">Create A New Task</div>

							<div class="panel-body">
								@if(count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								@if(\Session::has('success'))
									<div class="alert alert-success">
										<p>{{ \Session::get('success') }}</p>
									</div>
								@endif
								<form action="/posttask" method="post">
									<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
									<input type="hidden" name="stat" value="Pending">
									<table class="table">
									<tr>
									<td><input class="form-control" placeholder="Enter A Task Here ..." type="text" name="taskname" /></td>
									</tr>
									
									<tr>
									<td colspan="2" align="center"><input type="submit" class="btn btn-primary" value="Save Task" /></td>
									</tr>
									</table>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
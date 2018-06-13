<?php namespace App\Http\Controllers;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Schema;

class TaskController extends Controller {

	/**
	 * Create Table Schema once initialized
	 */
	public function __construct()
	{
		if (Schema::hasTable('tasks'))
		{
		   // Do nothing 
		}
		else{
			Schema::create('tasks', function($table)
				{
					$table->increments('id');
					$table->string('task');
					$table->string('status');
					$table->string('taskstamp');
					$table->timestamps();
				});
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::all();
		return view('tasks.index',compact('tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tasks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'taskname' => 'required',
		]);
		$status = "Pending";
		$data = new Task([
			'task' => $request->get('taskname'),
			'taskstamp' => time(),
			'status' => $status,
			
		]);
		
		try{
			$data->save();
			return redirect()->route('task.index')->with('success','New Task added Successfully');
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Get ID from click event and update status of Task.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Task::find($id);
		$data->status = 'Task Completed';
		
		try{
			$data->save();
			return redirect()->route('task.index')->with('success', 'Task has been Marked as Done');
		}
		catch(\Exception $e){
			return $e->getMessage();

		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$del_data = Task::findOrFail($id);
		try{
			$del_data->delete();
			return redirect()->route('task.index')->with('success','Task has been Deleted');
		}	
		catch(\Exception $e){
			return $e->getMessage();
			echo"This has failed";
		}
		
	}

}

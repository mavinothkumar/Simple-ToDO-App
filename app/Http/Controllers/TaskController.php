<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function auth;
use function compact;
use function redirect;
use function view;

class TaskController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$tasks = Task::with('user')->where('type','public')->where('user_id','!=',auth()->id())->get();

		return view( 'task.tasks', compact( 'tasks' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		$task = new Task();

		return view( 'task.create_task', compact( 'task' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store( Request $request ) {
		$this->validate( $request, [
			'title'       => 'required|max:200',
			'description' => 'required',
			'deadline'    => 'required|date',
			'type'        => [ 'required', Rule::in( [ 'public', 'private' ] ) ],
		] );

		$task              = new Task();
		$task->title       = $request->title;
		$task->description = $request->description;
		$task->deadline    = $request->deadline;
		$task->type        = $request->type;
		$task->user_id     = auth()->id();
		$task->save();

		return redirect()->route( 'home' )->with( 'message', 'New task ' . $request->title . ' successfully created' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Task $task
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Task $task ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Task $task
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Task $task ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Task $task
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Task $task ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Task $task
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Task $task ) {
		//
	}
}

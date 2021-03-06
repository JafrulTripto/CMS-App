<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Todo;
use App\Http\Resources\Todo as TodoResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class TodoController extends Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $user = JWTAuth::toUser($request->token);

        $todos = Todo::where('user_id', $user->id)->paginate(45);

        return TodoResource::collection($todos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->user_id = $request->input('user_id');
        $todo->description = $request->input('description');
        $todo->start_time = $request->input('startDate');
        $todo->end_time = $request->input('endDate');
        $todo->status = $request->input('status');

        if ($todo->save()) {
            $todo = Todo::paginate(45);

            return TodoResource::collection($todo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get todo

        $todo = Todo::findOrFail($id);

        return new TodoResource($todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->start_time = $request->input('start_time');
        $todo->end_time = $request->input('end_time');

        if ($todo->save()) {
            $todo = Todo::paginate(45);
            return TodoResource::collection($todo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        if ($todo->delete()) {
            $todo = Todo::paginate(45);

            return TodoResource::collection($todo);
        }

    }

    public function updateStatus(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = $request->input('status');
        $todo->save();
        return new TodoResource($todo);
    }

}

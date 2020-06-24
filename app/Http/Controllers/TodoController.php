<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoUpdateRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $todos = Todo::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);
       // dd($todos);
        return view('todo.index')->with(compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::id();
        $item = (new Todo())->create($data);
        //$item->user_id = 1;
        $item->save();
        return redirect()->back()->with('success', 'Todo is saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::where('id', $id)->first();
        
        if(empty($todo)) {
            return back()
               ->withErrors(['msg'=>'Record not found'])
               ->withInput();
        }

        return view('todo.show')->with(compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        
        if(empty($todo)) {
            return back()
               ->withErrors(['msg'=>'Record not found'])
               ->withInput();
        }

        return view('todo.edit')->with(compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoUpdateRequest $request, $id)
    {

        $todo = Todo::where('id', $id)->first();

        if(empty($todo)) {
            return back()
               ->withErrors(['msg'=>'Record not found'])
               ->withInput();
        }

        $data = $request->all();

        $result = $todo->update($data);
           if ($result) {
            return redirect() 
                ->route('todo.edit', $todo->id)
                ->with(['success'=>'Saved']);
        }
        else {
            return  back() 
                ->withErrors(['msg'=>'Error'])
                ->withInput();
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $result = Todo::destroy($id);

        if ($result) {
            return redirect()
                   ->route('todo.index')
                   ->with(['success' => 'Deleted']);
        } else {
            return back()
                   ->withErrors(['msg' => 'Can\'t to delete']);
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;

        $todo = Todo::where('id', $id)->first();

        if(empty($todo)) {
            return response()->json(array('msg'=> 'Record not found'), 200);
        }
        $todo->completed = (int)$request->status;

        $result = $todo->save();
           if ($result) {
            return response()->json(array('msg'=> 'Record has been changed'), 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use File;
use Storage;
class TodoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function index()
    {
        //query list of todos from db
        $todos=Todo::paginate(2);

        //$todos=Todo::all();

        //$user = auth()->user();
        //$todos = $user->todos;
        //return to view resources/views/todos
        return view('todos.index',compact('todos'));
        //return 'hello world';
    } 
    public function  create()
    {
        //show create form
        return view ('todos.create');
        
    }
    public function  store(Request $request)
    {
    //store todos table usiong model
    $todo = new todo();
    $todo->title = $request->title;
    $todo->description = $request->description;
    $todo->user_id = auth()->user()->id;
    $todo->save();

    if ($request->hasFile('attachment')){
        //rename
        $filename = rand(10.100).$todo->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
        
        //store at file storage
        Storage::disk('public')->put($filename, File::get($request->attachment));
        
        //update row on dB
        $todo->attachment = $filename;
        $todo->save();
    }
    
    //return todos index
    return redirect()->to('/todos')->with([
        'type'=>'alert-primary',
        'message'=>'Successfully stored your todo!'
    ]);

    }
    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }
    public function update(Todo $todo,Request $request)
    {
        
            //store todos table usiong model
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->save();

           
            
            //return todos index
            return redirect()->to('/todos');
            
    }
    public function delete(Todo $todo)
    {
        if($todo->attachment){
            Storage::disk('public')->delete($todo->attachment);
        }
                
        //delete from table using model
        $todo->delete();
        //return todos index
        return redirect()->to('/todos')->with([
            'type'=>'alert-danger',
            'message'=>'Successfully deleted your todo!'
        ]);
    }

}

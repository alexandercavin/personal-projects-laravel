<?php
use \App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }



Route::get("/", function() {
    return redirect() -> route("tasks.index"); //method chaining
});

// responsible for displaying the lists of
Route::get('/tasks', function ()  {
    return view("index", [
        // 'name' => '<b>Alex<b/>'
        "tasks" => Task::latest()->paginate(10), //fetch the most recent stuff || ->where('completed', true) this is a query builder
    ]);
})->name("tasks.index"); //good practice is to name the blade templates with the suffix of the route name e.g : index.blade.php

Route::view("/tasks/create", 'create')
->name("tasks.create"); //this is above the parameter, because parameter is greedy. if this is below the parameter then it will redirect to tasls/{id} where the id is "create"

Route::get("/tasks/{task}/edit", function(Task $task) {
    return view("edit", ["task" => $task]);
})->name("tasks.edit"); 


Route::get("/tasks/{task}", function(Task $task) {
    // laravel nganggep ini "id" di {task}
    return view("show", ["task" => $task]);
})->name("tasks.show"); //good practice is to name the blade templates with the suffix of the route name e.g : show.blade.php

Route::post("/tasks", function (TaskRequest $request) { //submit form to this route then the route will handle storing new tasks
    // dd($request->all()); //reads all datafield submited THROUGH the form
    // $data = $request->validated();
    // //creates a new class
    // $task = new Task;
    // $task->title = $data["title"];
    // $task->description = $data["description"];
    // $task->long_description = $data["long_description"];

    // $task->save(); //run for an update query to save to database

    $task = Task::create($request->validated());
    return redirect()->route("tasks.show", ["task" => $task->id])
    ->with("success","Task Created Successfully!"); //success is a variable session

})->name("tasks.store");


Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) { //submit form to this route then the route will handle storing new tasks
    // dd($request->all()); //reads all datafield submited THROUGH the form
    

    //creates a new class
    // $task = $task; no need to instantiate
    // $data = $request->validated();
    // $task->title = $data["title"];
    // $task->description = $data["description"];
    // $task->long_description = $data["long_description"];

    // $task->save(); //run for an update query to save to database

    $task->update($request->validated());
    return redirect()->route("tasks.show", ["task" => $task->id])
    ->with("success","Task updated Successfully!"); //success is a variable session

})->name("tasks.update");

Route::delete("/tasks/{task}", function (Task $task) {
    $task->delete();
    return redirect()->route("tasks.index")->with("success","Task Deleted Successfully");
})->name("tasks.destroy");

Route::put("tasks/{task}/toggle-complete", function(Task $task) {
   $task->toggleCompleted();

    return redirect()->back()->with("success", "Task Completed Successfully");
})->name("tasks.toggle-complete");



// Route::get('/test', function () {
//     return "Hello";
// })->name("hello"); //giving the route a name

// Route::get('/greet/{name}', function ($name) {
//     return "Hello " . $name . " !";
// });

// Route::get("/halo", function () {
//     // return redirect("/hello");
//     return redirect()->route('hello');
// });

//fallback route, a route that will be called when no other routes are matched
Route::fallback(function() {
    return "Still got somewhere!";
});
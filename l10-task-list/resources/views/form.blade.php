@extends('layouts.app')

@section('title', isset($task) ? "Edit Task" : 'Add Task')

@section("styles")
@endsection

@section("content")
    {{-- {{ $errors }} --}}
    <form method="POST" action="{{ isset($task) ? route("tasks.update", ["task" => $task->id]) : route("tasks.store")}}">
        @csrf{{--  protects user from csrf using generated csrf token for every data submited, csrf is crafting malicious ways to induce privileged users to perform unwanted actions, taking advantage of the browser-target trust --}}
        @isset($task)
            @method("PUT")
        @endisset
        <div class="mb-4">
            <label for="title">{{--  binds the label to the input by id. whenever someone clicks the label, the input will be activated --}}
                Title
            </label>
            <input text="test" name = "title" id="title" 
            @class(["border-red-500" => $errors->has("title")])
            value="{{ $task-> title ?? old("title")}}"/>
            @error("title")
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows = "5"
            @class(["border-red-500" => $errors->has("description")])> {{$task-> description ?? old("description")}} </textarea>
            @error("description")
            <p class="error"> {{ $message }} </p>
        @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows = "10"
            @class(["border-red-500" => $errors->has("long_description")])> {{$task-> long_description ?? old("long_description")}} </textarea>        </div>
            @error("long_description")
            <p class="error"> {{ $message }} </p>
        @enderror
        <div class="flex gap-2 items-center ">
            <button type="submit" class="btn">@isset($task)
                Update Task
                @else
                Add Task
            @endisset
            <a href="{{route("tasks.index")}}" class="links">Cancel</a>
        </button>
        </div>
    </form>
@endsection
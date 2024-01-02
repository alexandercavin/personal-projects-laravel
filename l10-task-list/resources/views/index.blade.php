
@extends("layouts.app")

@section("title", "The lists of tasks")

{{-- 
@isset($name)
    <div>My name is : {{ $name }} </div>
@endisset --}}

@section("content")
    <nav class="mb-4">
        <a href="{{route("tasks.create")}}" class="links">Add Task</a>
    </nav>
        {{-- @if (count($tasks)) --}}
    <div>There are tasks!</div>
    <br>
    @forelse ($tasks as $task) 
    {{-- $tasks dari routes, KALO MASIH BINGUNG AMA ROUTING REWATCH THE BLADE TEMPLATES LECTURE sama liat chatan ama gpt dengan judul laravel migration: https://chat.openai.com/c/628b8e31-3385-4e8e-961c-889f0ace35c1 --}} 
    <div>
        <a href="{{ route("tasks.show", ["task" => $task->id]) }}"
            @class([ "line-through" => $task->completed])>{{$task -> title}}</a>
    </div>
        
    @empty
    <div>There are no tasks!</div>
        
    @endforelse

    @if ($tasks->count())
    <nav class="mt-4">
        {{$tasks->links()}}
    </nav>
    @endif

        

    {{-- @else --}}
    {{-- @endif --}}
@endsection


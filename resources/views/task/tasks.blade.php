@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>All Task(s)</h2>
                </div>
            </div>
            <div class="col-md-8 col-lg-offset-2">
                @forelse ($tasks as $task)
                    <div class="panel
@if($task->type === 'public') {{'panel-primary'}} @else {{'panel-danger'}} @endif
">
                        <div class="panel-heading">
                            {{$task->title}} [{{$task->type}}]
                            <div class="pull-right">
                                Posted by {{$task->user->name}} | Created at {{$task->created_at->diffForHumans()}}
                            </div>
                        </div>

                        <div class="panel-body">
                            <h5>Deadline: {{$task->deadline}}</h5>
                            <h4>{{$task->description}}</h4>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">Sorry no task yet posted!</h1>
                @endforelse


            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')    

@foreach($discussions as $discussion)

<div class="card">   
    <div class="card-header">
       <div class="d-flex justify-content-between" >
        <div>
            <!-- <img src="Gravatar::src($discussion->user->email)"> -->
            <img src="" style="border-radius:50% ">
            <strong class="ml-2">{{$discussion->user->name}}</strong>
        </div>
        <div>
            <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-info " style="color: white;">View</a>
        </div>
           
       </div>
    </div>

    <div class="card-body">

        {{$discussion->title}}

    </div>
</div>
@endforeach
        
@endsection

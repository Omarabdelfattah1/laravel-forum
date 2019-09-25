@extends('layouts.app')

@section('content')    
<div class="card">   
    <div class="card-header">
       
            <!-- <img src="Gravatar::src($discussion->user->email)"> -->
            <img src="" style="border-radius:50% ">
            <strong class="ml-2">{{$discussion->user->name}}</strong>
    </div>

    <div class="card-body">

        {{$discussion->title}}
        <hr>
        {{$discussion->content}}
        <hr>
        <div class="card" style="border-color: green; ">
            <div class="card-header bg-success" style="color: white;">
                <div class="d-flex justify-content-between" >
                    <div>
                        <!-- <img src="Gravatar::src($discussion->user->email)"> -->
                        <img src="" style="border-radius:50% ">
                        <strong class="ml-2">{{$discussion->BestReply->user->name}}</strong>
                    </div>
                    <div>
                        Best Reply
                    </div>
                </div>
                
            </div>
            <div class="card-body " style="background: lightgreen;">
                {{$discussion->BestReply->content}}
            </div>
            
        </div>

    </div>

</div>
<hr>
Comments
<hr>
@foreach($discussion->replies()->paginate(3) as $reply)
           
    <div class="card">   
    <div class="card-header">
       <div class="d-flex justify-content-between" >
        <div>
            <!-- <img src="Gravatar::src($discussion->user->email)"> -->
            <img src="" style="border-radius:50% ">
            <strong class="ml-2">{{$reply->user->name}}</strong>
        </div>
        <div>
            @auth
            @if(auth()->user()->id==$discussion->user_id)
                <form method="POST" action="{{route('discussions.best-reply',[
                                                                    'discussion'=>$discussion->slug,
                                                                    'reply'=>$reply->id
                                                                ])}}">
                    @csrf
                    <button type="submit" class="btn btn-info" style="color: white;">Mark as best reply</button>
                </form>

            @endif

            @endauth

                
        </div>
       </div>
    </div>

    <div class="card-body">

        {{$reply->content}}

    </div>
</div>

@endforeach
{{$discussion->replies()->paginate(3)->links()}}

<div class="card">
    <div class="card-header">
        Add a reply
    </div>
    <div class="card-body">
        @auth
        <form action="{{route('replies.store',$discussion->slug)}}" method="POST">
            @csrf
            <div class="form-group">
            <textarea class="form-control" name="content" cols="5" rows="5"></textarea>
                
            </div>
            <button type="submit" class="btn btn-sm btn-success">Reply</button>
        </form>
        @else
        <a href="{{route('login')}}" class="btn btn-info">Sign in to add a reply</a>
        @endauth
    </div>
    
</div>
        
@endsection

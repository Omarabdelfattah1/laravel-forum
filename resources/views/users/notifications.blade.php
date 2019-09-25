@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Notifications</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($notifications as $notification)

                    <li class="list-group-item">
                        <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}">
                            @if($notification->type=='App\Notifications\NewReplyAdded')
                            <strong>New reply added</strong>

                            @endif
                            @if($notification->type=='App\Notifications\MarkedAsBestReply')
                            <strong>your reply marked as best reply</strong>

                            @endif
                            {{$notification->data['discussion']['title']}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
        
@endsection

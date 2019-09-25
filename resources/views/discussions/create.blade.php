@extends('layouts.app')

@section('content')

@if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
@endif
    <div class="card">
        <div class="card-header">Add discussion</div>

        <div class="card-body">
            <form action="{{route('discussions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea cols="5" rows="5" name="content" id="content" value="" class="form-control"></textarea> 
                    
                </div>
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select name="channel" id="channel" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">
                                {{$channel->name}}
                            </option>
                        @endforeach

                    </select>
                    
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
        
@endsection

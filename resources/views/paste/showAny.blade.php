@extends('layouts.app')

@section('content')


    <div class="container d-flex flex-column justify-content-center">
        @foreach($pastes as $paste)

        <div class="card" style="width: 1300px; margin-bottom: 30px;">
            <h4>{{$paste->title}}</h4><br>
                <span>Published: {{$paste->created_at}}</span> <a href="{{route('paste.show', $paste->url_selector)}}" class="btn btn-primary">Open</a>
        </div>
        @endforeach

            <div >{{$pastes->links()}}</div>
    </div>



@endsection

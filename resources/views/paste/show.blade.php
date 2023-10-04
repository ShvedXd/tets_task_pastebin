@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content-center flex-column">

                     <label >Paste Link</label>
                    <textarea class="form-control" style="margin-bottom: 50px">{{url()->current()}}</textarea>

        <h4>{{$paste->title}}</h4>
        <label >Content</label>

        <pre class=@if($paste->highlight !== null)
         "prettyprint linenums lang-{{$paste->highlight}}"
             @else  " "  @endif>{{$paste->content}}</pre>


    </div>


@endsection

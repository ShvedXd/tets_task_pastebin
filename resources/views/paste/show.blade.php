@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center flex-column">

                     <label >Paste Link</label>
                    <textarea class="form-control" style="margin-bottom: 50px">{{url()->current()}}</textarea>

        <h4>{{$paste->title}}</h4>
        <label >Content</label>
        <div class="card-body">
        <pre class=@if($paste->highlight !== null)
         "prettyprint linenums lang-{{$paste->highlight}} form-control"
             @else  " "  @endif>{{$paste->content}}</pre>
        </div>
    </div>


    <div class="container " >
        <button style="margin-left: 1150px"  name="complain" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Complain">Report</button>

        {{---modal window---}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">What's reason?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('complaint.store')}}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Reason:</label>
                                <textarea class="form-control" name="reason" id="reason"></textarea>
                                <input type="text" name="user_id" value=@if(auth()->user()) "{{auth()->user()->id}}" @else "{{auth()->user()}}" @endif hidden >
                                <input type="text" name="paste_id" value="{{$paste->id}}" hidden >
                                <input type="text" name="url_selector" value="{{$paste->url_selector}}" hidden >
                                @error('reason')
                                <p class="text-danger"></p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger"> Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection

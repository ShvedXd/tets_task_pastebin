@extends('layouts.app')
@section('content')

    <div class="container">

        <form action="{{route('paste.store')}}" method="post">
            @csrf
            @method('post')
            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control"  name="title" placeholder="Some Title">
            </div>
            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlTextarea1">New Paste</label>
                <textarea class="form-control"  rows="3" name="content"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlSelect1">Expiration time</label>
                <select class="form-control" name="delete_time">
                    <option  >1 minute</option>
                    <option >10 minute </option>
                    <option >3 hours</option>
                    <option >1 day</option>
                    <option >1 week</option>
                    <option >1 month</option>
                    <option value="{{null}}">unlimited</option>
                </select>
            </div>



            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlSelect">Paste Exposure</label>
                <select class="form-control"  name="access_type">
                    <option>public</option>
                    <option>unlisted </option>
                    <option>private</option>

                </select>
            </div>

            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlSelect">Code HighLighting</label>
                <select class="form-control"  name="highlight">
                    <option value="{{null}}">-</option>
                    @foreach($LANGS as $lang)
                    <option>{{$lang}}</option>
                    @endforeach
                    >
                </select>
            </div>

{{--            <div class="form-check" style="margin-bottom: 20px">--}}
{{--                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="highlight">--}}
{{--                <label class="form-check-label" for="exampleCheck1">Code HighLighting</label>--}}
{{--            </div>--}}

            <button type="submit" class="btn btn-primary" style="margin-left: 1150px; font-size: 20px">Create</button>

        </form>

    </div>

    <div class="container d-flex flex-row" style="margin-top: 50px">
        <div class="card" style="width: 500px; margin-right: 100px">
            <div class="card-header">
                Latest
            </div>
            @foreach($latestPastes as $paste)
            <div class="card-body">

                    <a href="{{route('paste.show', $paste->url_selector)}}">{{$paste->title}}</a>

            </div>
            @endforeach
        </div>
        @if(auth()->user() !==null)
        <div class="card" style="width: 500px; margin-right: 100px">
            <div class="card-header">
                Your Latest Pastes
            </div>
            @foreach($latestUserPastes as $userPaste)
            <div class="card-body">

                    <a href="{{route('paste.show', $userPaste->url_selector)}}">{{$userPaste->title}}</a>

            </div>
            @endforeach
        </div>
        @endif
    </div>



{{--    {{base64_encode(random_bytes(9))}}<br>--}}
@endsection

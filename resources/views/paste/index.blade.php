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
                    <option value="100 years">unlimited</option>
                </select>
            </div>



            <div class="form-group" style="margin-bottom: 20px">
                <label for="exampleFormControlSelect">Paste Exposure</label>
                <select class="form-control"  name="access_type">
                    <option>public</option>
                    <option>unlisted </option>
                     @if(!is_null(auth()->user()))  <option>private</option>@endif

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



@include('layouts.pastesBlock')

{{--    {{base64_encode(random_bytes(9))}}<br>--}}
@endsection

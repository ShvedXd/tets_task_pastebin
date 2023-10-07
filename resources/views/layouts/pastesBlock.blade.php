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

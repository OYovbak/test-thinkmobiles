@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My favorite films</div>
                    <div class="card-body">
                    <div>
                    @foreach($favorites as $favorite)

                        @if($favorite->user_id == auth()->user()->id)
                            @foreach($films as $film)
                                @if($film->id == $favorite->film_id)

                            <div> <H1 ><a href="{{url('film/'.$film->id)}}">{{ $film->title  }}</a></H1>
                                <a>Category: {{$film->categories->first()->title}}</a>
                                <p>{{$film->subtitle}}</p>
                                <a href="{{url('/film/delete-from-favorite/'.$film->id)}}"><button class="btn btn-dark btn-sm">Delete from favorites</button></a>
                                <hr>
                            </div>

                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

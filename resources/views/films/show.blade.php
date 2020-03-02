@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ $film->categories->first()->title  }}</strong></div>
                    <div class="card-body">
                        <img src="{{$film->img}}">
                        <h1>{{ $film->title  }}</h1>
                        <p>{{$film->content}}</p>
                        <h4>
                            <iframe width="560" height="315" src="{{$film->trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </h4>
                        @if (!$film->favorites()->get()->contains('id', \Illuminate\Support\Facades\Auth::user()->id))

                            <a href="{{url('/film/add-to-favorite/'.$film->id)}}"><button class="btn btn-dark btn-sm">Add to favorites </button></a>
                        @else
                            <a href="{{url('/film/delete-from-favorite/'.$film->id)}}"><button class="btn btn-dark btn-sm">Delete from favorites</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

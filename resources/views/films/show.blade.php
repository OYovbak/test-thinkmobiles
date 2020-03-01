@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ $film->categories->first()->title  }}</strong></div>
                    <div class="card-body">
                        <h1>{{ $film->title  }}</h1>
                        <p>{{$film->content}}</p>
                        <h4>
                            <iframe width="560" height="315" src="{{$film->trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </h4>
                        <button class="btn btn-dark btn-sm">Add to favorite</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Films</div>
                    <div class="card-body">

                        <div>
                        @foreach ($films as $film)

                            <H1 ><a href="{{url('film/'.$film->id)}}">{{ $film->title  }}</a></H1>
                               <a>Category: {{$film->categories->first()->title}}</a>
                               <p>{{$film->subtitle}}</p>

                            <hr>

                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

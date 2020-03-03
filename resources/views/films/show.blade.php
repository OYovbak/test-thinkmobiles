@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>
                            @foreach(\Illuminate\Support\Facades\DB::table('category_film')->get() as $categ)
                                @foreach($category as $cat)
                                    @if($categ->film_id == $film->id && $categ->category_id == $cat->id)
                                        <a href="{{url('/films/category/'.$cat->id)}}">{{ $cat->title  }}|</a>
                                        @endif
                                    @endforeach
                        @endforeach
                        </strong>
                    </div>
                    <div class="card-body">
                        <h1>{{ $film->title  }}</h1>
                        <img src="{{$film->img}}">
                        <p>{{$film->content}}</p>
                        <h4>
                            <iframe width="560" height="315" src="{{$film->trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </h4>
                        <a href="{{url('films/')}}"><button class="btn btn-dark btn-sm"><< Back to film list</button></a>
                        @if (!$film->favorites()->get()->contains('id', \Illuminate\Support\Facades\Auth::user()->id))

                            <a href="{{url('/film/add-to-favorite/'.$film->id)}}"><button class="btn btn-dark btn-sm">Add to favorites </button></a>
                        @else
                            <a href="{{url('/film/delete-from-favorite/'.$film->id)}}"><button class="btn btn-dark btn-sm">Delete from favorites</button></a>
                        @endif
                        <a href="{{url('favorite/')}}"><button class="btn btn-dark btn-sm">Go to favorites >></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

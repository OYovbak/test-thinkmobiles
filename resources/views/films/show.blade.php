@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong><a href="/films">All films-></a>
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
                       <div style="display: inline-flex"> <a href="{{url('films/')}}"><button class="btn btn-dark btn-sm"><< Back to film list</button></a>
                       <div style="margin-inline: 5px">
                        @if (!$film->favorites()->get()->contains('id', \Illuminate\Support\Facades\Auth::user()->id))

                            <form action="/add-film-to-favorite/{{$film->id}}" method="POST">
                                @csrf
                               <button class="btn btn-dark btn-sm" type="submit">Add to favorite</button>
                            </form>
                        @else
                           <form action="/delete-film-to-favorite/{{$film->id}}" method="POST">
                                @csrf
                                <button class="btn btn-dark btn-sm" type="submit">Delete from favorite</button>
                            </form>

                        @endif
                       </div>
                           <a href="{{url('favorite/')}}"><button class="btn btn-dark btn-sm">Go to favorites >></button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

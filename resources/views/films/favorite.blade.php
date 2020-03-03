@extends('layouts.app')
<style>
    .sidenav {
        height: auto;
        width: 125px;
        position: fixed;
        z-index: 1;
        top: 12%;
        left: 14.2%;
        background-color: #e9f1df;
        overflow-x: auto;
        padding-top: 20px;
    }


    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 17px;
        color: #818181;
        display: block;
    }


    .sidenav a:hover {
        color: #232323;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="sidenav">
                    @foreach(\App\Category::all() as $cat)
                        <a href="{{url('/films/category/'.$cat->id)}}">{{$cat->title}}</a>
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-header">My favorite films</div>
                    <div class="card-body">
                    <div>
                    @foreach($favorites as $favorite)

                        @if($favorite->user_id == auth()->user()->id)
                            @foreach($films as $film)
                                @if($film->id == $favorite->film_id)

                            <div> <H1 ><a href="{{url('film/'.$film->id)}}">{{ $film->title  }}</a></H1>
                                <a>Category: @foreach(\Illuminate\Support\Facades\DB::table('category_film')->get() as $categ)
                                   @foreach(\App\Category::all() as $category)
                                        @if(($categ->film_id == $film->id) && ($categ->category_id == $category->id))
                                    <a href="{{url('/films/category/'.$category->id)}}">{{$category->title}}|</a>
                                        @endif
                                        @endforeach
                                    @endforeach
                                </a>
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

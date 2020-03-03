@extends('layouts.app')
<style>
    .sidenav {
        height: auto;
        width: 125px;
        position: fixed;
        z-index: 1;
        top: 12%;
        left: 13.8%;
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
                    @foreach($category as $cat)
                    <a href="{{url('/films/category/'.$cat->id)}}">{{$cat->title}}</a>
                        @endforeach
                </div>
                <div class="card">
                    <div class="card-header"><strong><h2>Films</h2></strong></div>
                    <div class="card-body">
                        <div>
                        @foreach ($films as $film)

                            <H1 ><a href="{{url('film/'.$film->id)}}">{{ $film->title  }}</a></H1>
                               <a>Category:  @foreach(\Illuminate\Support\Facades\DB::table('category_film')->get() as $categ)
                                       @foreach($category as $cat)
                                       @if($categ->film_id == $film->id && $categ->category_id == $cat->id)
                                               <a href="{{url('/films/category/'.$cat->id)}}">  {{$cat->title}}|</a>
                            @endif
                           @endforeach
                            @endforeach</a>
                               <p>{{$film->subtitle}}</p>
                            <hr>
                        @endforeach
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection

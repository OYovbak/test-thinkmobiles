@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Film added successful!</h1></div>

                  <div style="margin: 10px">  <a href="{{url('film/'.$film->id)}}"><button class="btn btn-dark btn-sm"><< Back to film</button></a>
                      <a href="{{url('favorite/')}}"><button class="btn btn-dark btn-sm" style="margin-left: 73.3%;">Favorite >></button></a></div></div>
                    </div>
                </div>
            </div>
        </div>

@endsection
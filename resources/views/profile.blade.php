@extends('layouts.app')
<style>
    button {
        display: inline-block;
        font-family: arial, sans-serif;
        font-size: 11px;
        color: rgb(205, 216, 228);
        text-shadow: 0 -1px rgb(46, 53, 58);
        text-decoration: none;
        user-select: none;
        line-height: 2em;
        padding: 1px 1.2em;
        outline: none;
        border: 1px solid rgba(33, 43, 52, 1);
        border-radius: 3px;
        background: rgb(81, 92, 102) linear-gradient(rgb(81, 92, 102), rgb(69, 78, 87));
        box-shadow: inset 0 1px rgba(101, 114, 126, 1),
        inset 0 0 1px rgba(140, 150, 170, .8),
        0 1px rgb(83, 94, 104),
        0 0 1px rgb(86, 96, 106);
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <form action="/user-update/{{ $user->id }}"
                          method="POST">
                        @csrf
                        <div style="margin: 10px"><a>Change Name</a>
                            <div><input name="name"></div>
                        </div>
                        <div style="margin: 10px"><a>Change Email</a>
                            <div><input name="email"></div>
                        </div>
                        <div style="margin: 10px"><a>Change Phone</a>
                            <div><input name="phone_number"></div>
                        </div>
                        <div style="margin: 10px"><a>Change Password</a>
                            <div><input name="password" type="password"></div>
                        </div>
                        <button style="width: 100px; height: 30px; margin: 10px" type="submit">submit</button>
                    </form>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

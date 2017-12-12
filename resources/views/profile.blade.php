@extends('layouts.app')

@section('content')

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><span class="material-icons">dashboard</span> Dashboard <small>My profile</small></h1>
                </div>
            </div>
        </div>
    </header>

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li>Dashboard</li>
                <li class="active">My Profile</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{route('home')}}" class="list-group-item"><span class="material-icons">dashboard</span> Dashboard</a>
                        <a href="{{route('profile')}}" class="list-group-item active main-color-bg"><span class="material-icons">account_circle</span>My Profile</a>
                        <a href="#" class="list-group-item"><span class="material-icons">edit</span> Posts</a>
                        <a href="#" class="list-group-item"><i class="material-icons"></i>style</a>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Profile</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                ID : {{Auth::User()->id}}<br>
                                Name : {{Auth::User()->name}}<br>
                                Email :{{Auth::User()->email}}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

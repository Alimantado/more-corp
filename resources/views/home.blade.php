@extends('layouts.app')

@section('content')


    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ config('app.name', 'MoreCorp') }}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('home')}}">Dashboard</a></li>
                    <li><a href="{{route('Products.index')}}">Product</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Welcome, {{ Auth::user()->name }}! <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('profile') }}">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><span class="material-icons">dashboard</span> Dashboard <small>Manage your product</small></h1>
                </div>
            </div>
        </div>
    </header>

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{route('home')}}" class="list-group-item active main-color-bg">
                            <span class="material-icons">dashboard</span> Dashboard
                        </a>
                        <a href="{{route('Products.index')}}" class="list-group-item"><span class="material-icons">shopping_cart</span> Products</a>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <h2><span class="material-icons">shopping_cart</span> {{$pCount}}</h2>
                                    <h4>Products</h4>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <h2><span class="material-icons">gavel</span> {{$bCount}}</h2>
                                    <h4>Bids</h4>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <h2><span class="material-icons">account_circle</span> {{$cUser}}</h2>
                                    <h4>Admin</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--Modals-->
    <!-- Modal -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                    </div>
                    <div class="modal-body">
                        <label ca></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

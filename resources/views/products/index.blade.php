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
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="active"><a href="{{route('Products.index')}}">Product</a></li>
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
                        <a href="{{route('home')}}" class="list-group-item">
                            <span class="material-icons">dashboard</span> Dashboard
                        </a>
                        <a href="{{route('Products.index')}}" class="list-group-item active main-color-bg"><span class="material-icons">shopping_cart</span> Products</a>
                    </div>
                </div>

                <div class="col-md-9">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('message')}}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">All the Products</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{route('Products.create')}}" class="btn btn-xs btn-info" type="button"><span class="material-icons">add</span></a>
                            <table class="table table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <td>Sku</td>
                                        <td>Name</td>
                                        <td>Description</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                               <tbody>
                               @foreach($products as $key => $value)
                                   <tr>
                                       <td>{{$value->sku}}</td>
                                       <td>{{$value->name}}</td>
                                       <td>{{$value->description}}</td>
                                       <td>{{$value->price}}</td>
                                       <td>
                                           <a href="{{route('Products.show', $value->sku)}}" class="btn btn-xs btn-primary" type="button"><span class="material-icons">visibility</span></a>
                                           <a href="{{route('Products.edit', $value->sku)}}" class="btn btn-xs btn-success" type="button"><span class="material-icons">edit</span></a>

                                           {{ Form::open(array('url' => 'Products/' . $value->sku, 'class' => 'pull-right', 'method' => 'DELETE')) }}

                                           {{ Form::button('<span class="material-icons">delete</span>', array('type'=>'submit', 'class' => 'btn btn-xs btn-warning')) }}

                                           {{ Form::close() }}

                                           {{--<a href="{{URL::to('products/'.$value->id)}}" class="btn btn-small btn-info"></a>--}}
                                       </td>
                                   </tr>
                               @endforeach
                               </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

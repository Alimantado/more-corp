@extends('layouts.app_front')

@section('content')

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
                <li>Dashboard</li>
                <li class="active">Show Product</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active main-color-bg">
                            <span class="material-icons">dashboard</span> Dashboard
                        </a>
                        <a href="{{route('profile')}}" class="list-group-item"><span class="material-icons">account_circle</span>My Profile</a>
                        <a href="#" class="list-group-item"><span class="material-icons">edit</span> Posts</a>
                        <a href="#" class="list-group-item"><i class="material-icons"></i>style</a>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Show Product</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h2>{{$product->name}}</h2>
                                <p>
                                    <strong>Description:</strong> {{$product->description}}
                                    <strong>Price:</strong> {{$product->price}}
                                    <strong>Created by:</strong> {{$product->cUser()->first()->name}}
                                    <strong>Updated by:</strong> @if($product->updated_by){{$product->uUser()->first()->name}}@endif
                                    <strong>Deleted by:</strong> @if($product->deleted_by){{$product->dUser()->first()->name}}@endif
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

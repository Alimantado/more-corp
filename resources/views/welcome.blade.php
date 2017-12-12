@extends('layouts.app_front')
@section('content')

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><span class="material-icons">dashboard</span> Welcome <small>To the world of bidding</small></h1>
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

                <div class="col-md-12">
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
                            <table class="table table-stripped table-hover">
                                <thead>
                                <tr>
                                    <td>Sku</td>
                                    <td>Name</td>
                                    <td>Description</td>
                                    <td>Price</td>
                                    <td>Latest Bid</td>
                                </tr>
                                </thead>
                                <tbody class="products">
                                @foreach($products as $key => $value)
                                    <tr>
                                        <td id="sku">{{$value->sku}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->price}}</td>
                                            <td>@if($value->bid()->count() != 0){{$value->bid()->latest()->first()->amount}}@endif</td>
                                        <td>
                                            <a href="{{route('show', $value->sku)}}" class="btn btn-xs btn-primary" type="button"><span class="material-icons">visibility</span></a>

                                            <button class="btn-bid btn btn-xs btn-success" type="button" data-toggle="modal" data-target="#myModal"><span class="material-icons">gavel</span></button>

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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{Form::model(null, array('route' => array('bid', null), 'method' => 'POST'))}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Bidding!</h4>
                </div>
                <div class="modal-body">

                    {{HTML::ul($errors->all())}}


                    {{ Form::hidden('sku', 'secret', array('id' => 'sku_field')) }}

                    <div class="form-group">
                        {{Form::label('amount', 'Amount')}}
                        {{Form::text('price', null, array('class' => 'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', null, array('class' => 'form-control'))}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{Form::submit('Bid the Product!', array('class' => 'btn btn-primary'))}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>



@endsection
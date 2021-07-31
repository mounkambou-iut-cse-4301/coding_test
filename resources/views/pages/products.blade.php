@extends('layouts/master',['title'=>'Dashboard'])

@section('content')
<div class="container">
        <div class="row mt-5 d-flex justify-content-center">
        <a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
            <div class="col-md-10 ">
            <h4 class="text-center">Dashboard</h4><hr>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Read</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td><a href="/read/{{$product->id}}" class="btn btn-success">Read</a></td></td>
                            <td><a href="/update/{{$product->id}}" class="btn btn-primary">Update</a></td>
                            <td><a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection
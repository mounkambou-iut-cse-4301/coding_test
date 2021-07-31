@extends('layouts/master',['title'=>'Dashboard'])

@section('content')
<div class="container">
        <div class="row mt-5 d-flex justify-content-center">
        <a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
            <div class="col-md-6 ">
            <h4 class="text-center">Welcome</h4><hr>
                <ul>
                    <li><a href="/create_product">Create new product</a></li>
                    <li><a href="/products">My products</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
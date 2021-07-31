@extends('layouts/master',['title'=>'Dashboard'])

@section('content')
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
    <a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
        <div class="col-md-6 ">
            <h4 class="text-center">Detail</h4>
            <hr>
            <div class="card " >
                <img src="{{asset('storage/images/'.$detail->photo_name)}}" style="width: 50%; " class="card-img-top" alt="{{$detail->photo_name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$detail->title}}</h5>
                    <p class="card-text">{{$detail->description}}</p>
                    <p class="card-text text-success text-end">{{$detail->price}} fcfa</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
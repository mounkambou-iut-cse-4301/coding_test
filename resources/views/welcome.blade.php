@extends('layouts/master',['title'=>'Home'])

@section('content')
<div class="container">
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4 ">
          <h4 class="text-center">Laravel</h4><hr>
          
          <a href="/login"><button class="btn btn-primary">Login</button></a>
          <a href="/register"><button class="btn btn-primary">Sing Up</button></a>
        </div>
      </div>
</div>
@endsection

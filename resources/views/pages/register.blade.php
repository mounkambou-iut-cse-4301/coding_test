@extends('layouts/master',['title'=>'Login'])

@section('content')


<div class="container">
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4 ">
          <h4 class="text-center">Register | Custom Auth</h4><hr>
          <form action="{{route('save')}}" method="post">
          @if(Session::get('success'))
               <div class="alert alert-success">
                  {{Session::get('success')}}
               </div>
              @endif
              @if(Session::get('fail'))
               <div class="alert alert-danger">
                 {{Session::get('fail')}} 
               </div>
              @endif

              @csrf
          <div class="mb-3">
              <label for="name" class="form-label fw-bold">Name</label>
              <input type="name" class="form-control" name="name" id="name" placeholder="name" value="{{old('name')}}">
              <span class="text-danger">@error('name'){{$message}} @enderror</span>
           </div>
           <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
              <span class="text-danger">@error('email'){{$message}} @enderror</span>
           </div>
           <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="password">
              <span class="text-danger">@error('password'){{$message}} @enderror</span>
           </div>
           <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100 ">Sign Up</button>
           </div>
          </form>
          <a href="/login"> I already have an account, sign in</a>
        </div>
      </div>
    </div>
@endsection
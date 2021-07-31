
 @extends('layouts/master',['title'=>'Login'])

@section('content')
   <div class="container">
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4 ">
          <h4 class="text-center">Login | Custom Auth</h4><hr>
          <form action="{{route('check')}}" method="post">
          @if(Session::get('fail'))
               <div class="alert alert-danger">
                 {{Session::get('fail')}} 
               </div>
              @endif
            @csrf
           <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
              <!-- <span class="text-danger">@error('email'){{$message}} @enderror</span> -->
           </div>
           <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="password">
              <!-- <span class="text-danger">@error('password'){{$message}} @enderror</span> -->
           </div>
           <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100 ">Sign in</button>
           </div>
          </form>
          <a href="/register"> I don't have an account, ceate new</a>
        </div>
      </div>
    </div>

@endsection
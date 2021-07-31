@extends('layouts/master',['title'=>'Create Product'])

@section('content')


<div class="container">
      <div class="row mt-5 d-flex justify-content-center">
      <a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
        <div class="col-md-4 ">
          <h4 class="text-center">Create Product</h4><hr>
          <form action="/insert_update/{{$update->id}}" method="post" >
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
              <label for="title" class="form-label fw-bold">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$update->title}}">
              <span class="text-danger">@error('title'){{$message}} @enderror</span>
           </div>
           <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
             <textarea class="form-control" name="description" id="description" rows="3" value="{{$update->description}}"></textarea>
             <span class="text-danger">@error('description'){{$message}} @enderror</span>
            </div>
           <div class="mb-3">
              <label for="price" class="form-label fw-bold">Price</label>
              <input type="number" class="form-control" name="price" id="price" placeholder="price" value="{{$update->price}}">
              <span class="text-danger">@error('price'){{$message}} @enderror</span>
           </div>
           <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100 ">Update</button>
           </div>
          </form>
        </div>
      </div>
    </div>
@endsection
@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')

<div class="my-5 d-flex justify-content-between">
   <a class="btn btn-primary" href="student-add">Add Data</a>
   <a class="btn btn-info" href="student-deleted">Show Deleted Data</a>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
   {{Session::get('message')}}
</div>
@endif

<h3>Student List</h3>
<div class="my-3 col-12 col-sm-8 col-md-5">
   <form action="" method="get">
      <div class="input-group mb-3">
         <input type="text" class="form-control" name="keyword" id="floatingInputGroup1" placeholder="cari">
      <button class="input-group-text btn btn-primary">Search</button>
      </div>
   </form>
</div>
<table class="table">
   <thead>
      <tr>
         <th>#</th>
         <th>Name</th>
         <th>Gender</th>
         <th>NIS</th>
         <th>Class</th>
         @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
            @else
         <th>Action</th>
         @endif
      </tr>
   </thead>
   <tbody>
      @foreach ($studentList as $data)
      <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$data->name}}</td>
         <td>{{$data->gender}}</td>
         <td>{{$data->nis}}</td>
         <td>{{$data->class->name}}</td>
         <td>
            @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
            @else
            <a class="btn btn-primary" href="student/{{$data->id}}">Detail</a>
            <a class="btn btn-warning" href="/student-edit/{{$data->id}}">Edit</a>
            @endif
            
            @if(Auth::user()->role_id != 1)
            @else
            <a class="btn btn-danger" href="/student-delete/{{$data->id}}">Delete</a></td>
            @endif
      </tr>
      @endforeach
   </tbody>
</table>
<div class="my-5">
   {{$studentList->withQueryString()->links()}}
</div>

@endsection

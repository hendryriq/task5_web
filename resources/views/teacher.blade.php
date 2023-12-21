@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')
<h3>Teacher List</h3>
<div class="my-5">
   <a href="" class="btn btn-primary">Add Data</a>
</div>

<table class="table">
   <thead>
      <tr>
         <th>#</th>
         <th>Name</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($teacherList as $data)
      <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$data->name}}</td>
         <td><a class="btn btn-primary" href="student/{{$data->id}}">Detail</a></td>

         
      </tr>
      @endforeach

   </tbody>
</table>

@endsection

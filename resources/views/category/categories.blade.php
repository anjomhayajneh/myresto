@extends('adminLayout.main.master')
@section('DynamicContent')
<div class="row" my-2 justify-content-center>
    <a href="" class="btn btn-success col-3">Add new Category</a>
</div>
<div class="row" my-2 justify-content-center><table class="table table-dark">
    <thead>
        <tr>
         <th>#</th>
         <th>Name</th>
         <th>Descreption</th>
         <th>Action</th>
        </tr>
    </thead>
    <tbody>
@php
    $i=1;

@endphp
@foreach ($data as $item)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->descreption }}</td>
    <td>
<a href="" class="btn btn-success">Edit</a>
<a href="" class="btn btn-danger">Delete</a>
       </td>
</tr>

@endforeach
    </tbody>
</table>
</div>
@endsection

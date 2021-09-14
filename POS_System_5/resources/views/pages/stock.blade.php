@extends('master.app')
@section('main-content')
<h2 class="text-center my-md-4">Product Stocks </h2>
<hr width="50%" class=" mb-5 mx-auto">
<table id="datatables" class="table table-striped table-hover">

 
  <thead>
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Code</th>
      <th>Product Stock </th>
  
    </tr>
  </thead>
  <tbody>
    @forelse($stocks as $stock)
    <tr>
      <th scope="row">{{$stock->id}}</th>
      <td>{{$stock->product_name}}</td>
      <td>{{$stock->product_code}}</td>
      <td class="@if($stock->product_stock==0) bg-danger @elseif($stock->product_stock < 10) bg-warning @else bg-success @endif" >{{$stock->product_stock }}</td>
    </tr>
    @empty
    <tr>
      <th colspan="4" scope="row">No Register stock Found</th>
    </tr>
    @endforelse  
  </tbody>
</table>
 

@endsection 
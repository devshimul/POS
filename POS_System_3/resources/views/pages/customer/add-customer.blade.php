@extends('master.app')

@section('main-content')

<h2 class="text-center">Add New Customer</h2>
<hr class="mx-auto mb-4" width="50%">

@if($errors->any())
<h3 class="text-danger">Something went wrong.</h3>
@foreach($errors->all() as $error )
<li class="text-danger"> {{ $error }}</li>
@endforeach
@endif
<form action="{{ route('customer.store')}}" method="POST">
    @csrf
    <div class="my-3">
        <label for="customer" class="form-label">Customer Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}} " id="Customer">
    </div>
    <div class="my-3">
        <label for="email" class="form-label">Customer Email @error('email')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="email" class="form-control" value="{{ old('email')}} " id="email">
    </div>
    <div class="my-3">
        <label for="phone" class="form-label">Customer Phone @error('phone')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone')}} " id="phone">
    </div>
    <div class="my-3">
        <label for="address" class="form-label">Customer Address @error('address')
            <span class="text-danger"> *</span>
            @enderror</label>
        <textarea name="address" class="form-control" id="address" style="height: 100px">{{ old('address')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
@extends('master.app')

@section('main-content')

<h2 class="text-center">Add New Supplier</h2>
<hr class="mx-auto mb-4" width="50%">

@if($errors->any())
<h3 class="text-danger">Something went wrong.</h3>
@foreach($errors->all() as $error )
<li class="text-danger"> {{ $error }}</li>

@endforeach


@endif
<form action="{{ route('supplier.store')}}" method="POST">
    @csrf
    <div class="my-3">
        <label for="supplier" class="form-label">Supplier Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}} " id="supplier">

    </div>
    <div class="my-3">
        <label for="email" class="form-label">Supplier Email @error('email')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="email" class="form-control" value="{{ old('email')}} " id="email">
    </div>
    <div class="my-3">
        <label for="phone" class="form-label">Supplier Phone @error('phone')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone')}} " id="phone">
    </div>
    <div class="my-3">
        <label for="address" class="form-label">Supplier Address @error('address')
            <span class="text-danger"> *</span>
            @enderror</label>
        <textarea name="address" class="form-control" id="address" style="height: 100px">{{ old('address')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
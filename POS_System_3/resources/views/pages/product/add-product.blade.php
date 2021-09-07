@extends('master.app')

@section('main-content')

<h2 class="text-center">Add New Product</h2>
<hr width="50%" class="mx-auto mb-4">

@if($errors->any())
<h3 class="text-danger">Something went wrong.</h3>
@foreach($errors->all() as $error )
<li class="text-danger"> {{ $error }}</li>

@endforeach


@endif
<form action="{{ route('product.store')}}" method="POST">
    @csrf
    <div class="my-3">
        <label for="name" class="form-label">Product Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}} " id="name">
    </div>
    <div class="my-3">
        <label for="code" class="form-label">Product Code @error('code')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="code" class="form-control" value="{{ old('code')}} " id="code">
    </div>
    <div class="my-3">
        <label for="cat" class="form-label">Product Category @error('category')
            <span class="text-danger"> *</span>
            @enderror</label>
        <select id="cat" name="category"   class="form-select form-select-lg">
            <option selected disabled>Select Category</option>
            @forelse($categories as $category )
            <option  value="{{ $category->id}}" >{{ $category->name }}</option>
            @empty
            <option>No Category Found</option>
            @endforelse
        </select>
    </div>
    <div class="my-3">
        <label for="units" class="form-label">Product Unit @error('unit')
            <span class="text-danger"> *</span>
            @enderror</label>
        <select id="units" name="unit" class="form-select form-select-lg">
            <option selected disabled>Select Unit</option>
            @forelse($units as $unit )
            <option value="{{ $unit->id}}">{{ $unit->name }}</option>
            @empty
            <option>No Unit Found</option>
            @endforelse
        </select>
    </div>
    <div class="my-3">
        <label for="sup" class="form-label">Product Supplier @error('supplier')
            <span class="text-danger"> *</span>
            @enderror</label>
        <select id="sup" name="supplier" class="form-select form-select-lg">
            <option selected disabled>Select Supplier</option>
            @forelse($suppliers as $supplier )
            <option value="{{ $supplier->id}}">{{ $supplier->name }}</option>
            @empty
            <option>No Supplier Found</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
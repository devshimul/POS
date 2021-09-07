@extends('master.app')

@section('main-content')

<h2 class="text-center">Edit Product</h2>
<hr width="50%" class="mx-auto mb-4">

@php
$cat = App\Models\Category::find($product->category_id);
$uni = App\Models\Unit::find($product->unit_id);
$sup = App\Models\Supplier::find($product->supplier_id);
@endphp

@if($errors->any())
<h3 class="text-danger">Something went wrong.</h3>
@foreach($errors->all() as $error )
<li class="text-danger"> {{ $error }}</li>
@endforeach
@endif
<form action="{{ route('product.update')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="my-3">
        <label for="name" class="form-label">Product Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" value="{{ $product->product_name }} " id="name">
    </div>
    <div class="my-3">
        <label for="code" class="form-label">Product Code @error('code')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="code" class="form-control" value="{{ $product->product_code }} " id="code">
    </div>
    <div class="my-3">
        <label for="stock" class="form-label">Product Stock @error('stock')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="stock" class="form-control" value="{{ $product->product_stock }} " id="stock">
    </div>
    <div class="my-3">
        <label for="cost" class="form-label">Cost Price @error('cost')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="cost" class="form-control" value="{{ $product->cost_price }} " id="cost">
    </div>
    <div class="my-3">
        <label for="sale" class="form-label">Sale Price @error('sale')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="sale" class="form-control" value="{{ $product->sale_price }} " id="sale">
    </div>

    <div class="my-3">
        <label for="cat" class="form-label">Product Category @error('category')
            <span class="text-danger"> *</span>
            @enderror</label>
        <select id="cat" name="category" class="form-select form-select-lg">
            <option value="{{$product->category_id}}" selected> {{$cat->name}} </option>
            @forelse($categories as $category )
            @if($category->id == $cat->id)
                @continue;
            @endif
            <option value="{{ $category->id}}">{{ $category->name }}</option>
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
        <option value="{{$product->unit_id}}" selected> {{$uni->name}} </option>
            @forelse($units as $unit )
            @if($unit->id == $uni->id)
                @continue;
            @endif
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
        <option value="{{$product->supplier_id}}" selected> {{$sup->name}} </option>
            @forelse($suppliers as $supplier )
            @if($supplier->id == $sup->id)
                @continue;
            @endif
            <option value="{{ $supplier->id}}">{{ $supplier->name }}</option>
            @empty
            <option>No Supplier Found</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection
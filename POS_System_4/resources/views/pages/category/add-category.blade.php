@extends('master.app')

@section('main-content')

<h2>Add New Category</h2>
<hr>
@error('name')
<span class="text-danger"> {{ $message}}</span>
@enderror
<form action="{{ route('category.add')}}" method="POST">
    @csrf
    <div class="my-3">
        <label for="cagetory" class="form-label">Category Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" id="cagetory">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
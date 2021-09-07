@extends('master.app')

@section('main-content')

<h2 class="text-center">Edit Category</h2>
<hr class="mb-5 mx-auto" width="50%">
@error('name')
<span class="text-danger"> {{ $message}}</span>
@enderror
<form action="{{ route('category.update')}}" method="POST">
    @csrf
    <div class="my-3">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <label for="cagetory" class="form-label">Category Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="cagetory">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
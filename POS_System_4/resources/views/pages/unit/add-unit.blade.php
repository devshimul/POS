@extends('master.app')

@section('main-content')

    <h2 class="text-center ">Add New Unit</h2>
    <hr class="mx-auto mb-4 ">
    @error('name')
<span class="text-danger"> {{ $message}}</span>
@enderror
<form action="{{ route('unit.add')}}" method="POST">
    @csrf
    <div class="my-3">
        <label for="unit" class="form-label">Unit Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" id="unit">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
@extends('master.app')

@section('main-content')

    <h2 class="text-center ">Edit Unit</h2>
    <hr class="mx-auto mb-4 ">
    @error('name')
<span class="text-danger"> {{ $message}}</span>
@enderror
<form action="{{ route('unit.update')}}" method="POST">
    @csrf
    <div class="my-3">
        <input type="hidden" name="id" value="{{ $unit->id }}">
        <label for="unit" class="form-label">Unit Name @error('name')
            <span class="text-danger"> *</span>
            @enderror</label>
        <input type="text" name="name" class="form-control" value="{{ $unit->name }}" id="unit">
    </div>
    <button type="submit" class="btn btn-primary">Update </button>
</form>

@endsection
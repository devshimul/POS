@extends('master.app')

@section('main-content')
<div class="container">

    <h2 class="text-center">Update Your Profile </h2>
    <hr class="mx-auto mb 4" width="50%">

    <h1 class="mt-5">User Name: {{ $user->name}}</h1>
    <h1 class="mt-5">User Email: {{ $user->email}}</h1>
    <form action="{{ route('profile.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="profile" class="form-label">Site Mini Logo </label>
            <input class="form-control form-control" id="profile" type="file" name="profile">
            <img id="profileimage" width="20%" class="img-fluid my-4" src="{{ asset('dashboard/images/profile')}}/{{$user->image}}" alt="">
        </div>
        <button type="submit" class="btn btn-primary float-right">Update Profile</button>
    </form>


</div>

@endsection

@push('scripts')

<script>
    $('#profile').change(function(e) {
        var x = URL.createObjectURL(e.target.files[0]);
        $('#profileimage').attr('src', x);
    });
</script>

@endpush
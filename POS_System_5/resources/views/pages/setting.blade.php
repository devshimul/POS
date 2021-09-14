@extends('master.app')

@section('main-content')
<div class="container">

    <h2 class="text-center">Update Your Site Settings</h2>


    <hr class="mx-auto mb 4" width="50%">
    <form action="{{ route('setting.save')}}" method="post" enctype="multipart/form-data">
        @csrf
      <input type="hidden" name="id" value="{{ $tools->id }}">
        <div class="my-3">
            <label for="title" class="form-label">Site Title @error('title')
                <span class="text-danger"> *</span>
                @enderror</label>
            <input type="text" name="title" value="{{ $tools->title }}" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="favIcon" class="form-label">Site Favicon</label>
            <input class="form-control form-control" id="favIcon" type="file" name="favicon">
            <img id="favimg" width="20%" class="img-fluid my-4" src="{{ asset('dashboard/images')}}/{{$tools->favicon}}" alt="">
        </div>
        <div class="mb-3">
            <label for="navlogo" class="form-label">Site Logo</label>
            <input class="form-control form-control" id="navlogo" type="file" name="logo">
            <img id="logoimg" width="20%" class="img-fluid my-4" src="{{ asset('dashboard/images')}}/{{$tools->logo}}" alt="">
        </div>
        <div class="mb-3">
            <label for="minilogo" class="form-label">Site Mini Logo </label>
            <input class="form-control form-control" id="minilogo" type="file" name="minilogo">
            <img id="minimg" width="20%" class="img-fluid my-4" src="{{ asset('dashboard/images')}}/{{$tools->minilogo}}" alt="">
        </div>
        <button type="submit" class="btn btn-primary float-right">Save</button>
    </form>

</div>

@endsection

@push('scripts')

<script>
    $('#favIcon').change(function(e) {
        var x = URL.createObjectURL(e.target.files[0]);
        $('#favimg').attr('src', x);
    });

    $('#navlogo').change(function(e) {
        var x = URL.createObjectURL(e.target.files[0]);
        $('#logoimg').attr('src', x);
    });

    $('#minilogo').change(function(e) {
        var x = URL.createObjectURL(e.target.files[0]);
        $('#minimg').attr('src', x);
    });
</script>

@endpush
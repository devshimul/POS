@extends('master.app')

@section('main-content')

<h2 class="text-center">{{ $title }}</h2>
<hr class="mb-5 mx-auto" width="50%">
<table id="datatables" class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"> Category ID </th>
            <th scope="col"> Cetegory Name </th>
            <th scope="col"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $category)

        <tr scope="row">
            <td> {{ $category->id }}</td>
            <td> {{ $category->name }}</td>
            <td>

                <form class="d-inline" action="{{ route('category.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button class="edit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-success">
                    edit
                        </span></button>
                </form>

                <form id="delete-form" class="d-inline" action="{{ route('category.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button class="submit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-danger">
                            close
                        </span></button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="3">No Record Found</td>
        </tr>
        @endforelse
    </tbody>
</table>



@endsection
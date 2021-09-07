@extends('master.app')

@section('main-content')

<h2 class="text-center">View All Unit</h2>
<hr class="mb-5 mx-auto" width="50%">
<table id="datatables" class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"> Unit ID </th>
            <th scope="col"> Unit Name </th>
            <th scope="col"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse($units as $unit)

        <tr scope="row">
            <td> {{ $unit->id }}</td>
            <td> {{ $unit->name }}</td>
            <td>
                <form class="d-inline" action="{{ route('unit.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $unit->id }}">
                    <button class="edit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-success">
                            edit
                        </span></button>
                </form>
                <form id="delete-form" class="d-inline" action="{{ route('unit.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $unit->id }}">
                    <button class="submit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-danger">
                            close
                        </span></button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="3">No Category Found</td>
        </tr>
        @endforelse
    </tbody>
</table>



@endsection
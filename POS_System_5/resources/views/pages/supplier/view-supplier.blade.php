@extends('master.app')

@section('main-content')

<h2 class="text-center">View All Supplier</h2>
<hr class="mb-5 mx-auto" width="50%">
<div class="container overflow-auto">
<table id="datatables" class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"> Supplier ID </th>
            <th scope="col"> Supplier Name </th>
            <th scope="col"> Supplier Email</th>
            <th scope="col"> Supplier Mobile</th>
            <th scope="col"> Supplier Address </th>
            <th scope="col"> Due </th>
            <th scope="col"> Action </th>
        </tr>
    </thead>
    <tbody>
        @forelse($suppliers as $supplier)

        <tr scope="row">
            <td> {{ $supplier->id }}</td>
            <td> {{ $supplier->name }}</td>
            <td> {{ $supplier->email }}</td>
            <td> {{ $supplier->phone }}</td>
            <td> {{ $supplier->address }}</td>
            <td> {{ number_format($supplier->due, 2)}}</td>
            <td>
            <form class="d-inline" action="{{ route('supplier.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                    <button class="edit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-success">
                    edit
                        </span></button>
                </form>
                <form id="delete-form" class="d-inline" action="{{ route('supplier.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                    <button class="submit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-danger">
                            close
                        </span></button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="7">No Record Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>



@endsection
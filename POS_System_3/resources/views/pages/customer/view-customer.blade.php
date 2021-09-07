@extends('master.app')

@section('main-content')

<h2 class="text-center">View All Customer</h2>
<hr class="mb-5 mx-auto" width="50%">
<div class="container overflow-auto">
    <table id="datatables" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"> Customer ID </th>
                <th scope="col"> Customer Name </th>
                <th scope="col"> Customer Email</th>
                <th scope="col"> Customer Mobile</th>
                <th scope="col"> Customer Address </th>
                <th scope="col"> Due </th>
                <th scope="col"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)

            <tr scope="row">
                <td> {{ $customer->id }}</td>
                <td> {{ $customer->name }}</td>
                <td> {{ $customer->email }}</td>
                <td> {{ $customer->phone }}</td>
                <td> {{ $customer->address }}</td>
                <td> {{ number_format($customer->due, 2)}}</td>
                <td>
                    <form class="d-inline" action="{{ route('customer.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <button class="edit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-success">
                                edit
                            </span></button>
                    </form>
                    <form id="delete-form" class="d-inline" action="{{ route('customer.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $customer->id }}">
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
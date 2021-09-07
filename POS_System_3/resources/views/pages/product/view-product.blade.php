@extends('master.app')

@section('main-content')

<h2 class="text-center">View All Products</h2>
<hr class="mb-5 mx-auto" width="50%">
<div class="container overflow-auto">
    <table id="datatables" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"> Product ID </th>
                <th scope="col">  Name </th>
                <th scope="col">  Code</th>
                <th scope="col"> stock </th>
                <th scope="col"> Cost price </th>
                <th scope="col"> sale price </th>
                <th scope="col"> Category</th>
                <th scope="col"> Unit </th>
                <th scope="col"> Supplier </th>
                <th scope="col"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                @php    
                $cat  = App\Models\Category::find($product->category_id);
                $uni  = App\Models\Unit::find($product->unit_id);
                $sup  = App\Models\Supplier::find($product->supplier_id);
                @endphp
            <tr scope="row">
                <td> {{ $product->id }}</td>
                <td> {{ $product->product_name }}</td>
                <td> {{ $product->product_code }}</td>
                <td> {{ $product->product_stock }}</td>
                <td> {{ number_format($product->cost_price, 2) }}</td>
                <td> {{ number_format($product->sale_price, 2) }}</td>
                <td> {{ $cat->name  }} </td>
                <td> {{ $uni->name  }} </td>
                <td> {{ $sup->name  }} </td>

                <td>
                    <form class="d-inline" action="{{ route('product.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="edit-btn" type="submit"><span title="edit" class="material-icons-outlined text-success">
                                edit
                            </span></button>
                    </form>
                    <form id="delete-form" class="d-inline" action="{{ route('product.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="submit-btn" type="submit"><span title="Delete" class="material-icons-outlined text-danger">
                                close
                            </span></button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="10">No Record Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>



@endsection
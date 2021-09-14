@extends('master.app')

@section('main-content')

<h2 class="text-center">Sale Products</h2>
<hr class="mx-auto mb-4" width="50%">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="saleForm" autocomplete="off">
                @csrf
                <input type="hidden" name="counter" id="counter" value="1">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="padding:0" colspan="8">

                                <select id="customer" name="customer_id" class="form-select" onchange="customerChange();">
                                    <option value="" selected disabled> ---Select Customer--- </option>
                                    @php $customers = App\Models\Customer::all();
                                    @endphp
                                    @foreach($customers as $customer )

                                    <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                                    @endforeach

                                </select>
                            </th>
                            <th style="padding:0;" width="10%">
                                <button type="button" style="background:rgba(0, 0, 0, 0.2);" id="additem" class="btn-sm rounded-0 radius-0 w-100" data-bs-toggle="modal" data-bs-target="#addCustomer">
                                    Add New Customer</button>
                            </th>

                        </tr>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th width="40%" colspan="3">Product</th>
                            <th>Unit</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th width="15%">Sub Total</th>
                        </tr>

                    </thead>
                    <tbody id="tablebody" class="text-center">
                        <tr id="afteritemrow" class="pdrow">
                            <td rowspan="7">Note</td>
                            <td rowspan="6" colspan="5">

                                <textarea class="form-control w-100" name="note" placeholder="Type here...." rows="16"></textarea>

                            </td>
                        </tr>
                        <tr class="pdrow">
                            <td colspan="2"> Total Amount</td>
                            <td> <input class="form-control text-center" type="number" min="0" name="total_amount" id="total_amount" placeholder="0.00" readonly></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-8 pt-3 pe-0">
                                        Discount Amount (%)
                                    </div>
                                    <div class="col-4 ps-0">
                                        <input class="form-control text-center" type="number" min="0" name="discount" id="discount" placeholder="0%" onkeyup="discountCalculation()">
                                    </div>
                                </div>
                            </td>

                            <td> <input class="form-control text-center" type="number" min="0" name="discount_amount" id="discount_amount" placeholder="0.00" readonly></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Extra Charge</td>
                            <td><input class="form-control text-center" type="number" min="0" name="extra_charge" id="extra_charge" placeholder="0.00" onkeyup="discountCalculation()"></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Grand Total</td>
                            <td><input class="form-control text-center" type="number" min="0" name="grand_total" id="grand_total" placeholder="0.00" readonly></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Paid Amount</td>
                            <td style="padding: 0;"> <input class="form-control text-center" type="number" min="0" name="paid_amount" id="paid_amount" placeholder="0.00" onkeyup="paidAmount()"></td>
                        </tr>
                        <tr class="pdrow">
                            <td colspan="5"> <button id="additem" class="btn-sm btn-success rounded-0 radius-0 w-100" onclick="addNewProduct(); return false;">
                                    Add Another Product</button></td>
                            <td colspan="2"> Due Amount</td>
                            <td><input class="form-control text-center" type="number" min="0" name="due_amount" id="due_amount" placeholder="0.00" readonly></td>
                        </tr>
                        <tr>

                            <td colspan="9"> <button id="submitbtn" class="btn btn-success float-end radius-0 rounded-0" type="submit">Confirm</button></td>
                        </tr>


                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="addCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     @if($errors->any())
                    <h3 class="text-danger">Something went wrong.</h3>
                    @foreach($errors->all() as $error )
                    <li class="text-danger"> {{ $error }}</li>
                    @endforeach
                    @endif
                    <form action="{{ route('customer.store')}}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="customer" class="form-label">Customer Name @error('name')
                                <span class="text-danger"> *</span>
                                @enderror</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')}} " id="Customer">
                        </div>
                        <div class="my-3">
                            <label for="email" class="form-label">Customer Email @error('email')
                                <span class="text-danger"> *</span>
                                @enderror</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email')}} " id="email">
                        </div>
                        <div class="my-3">
                            <label for="phone" class="form-label">Customer Phone @error('phone')
                                <span class="text-danger"> *</span>
                                @enderror</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone')}} " id="phone">
                        </div>
                        <div class="my-3">
                            <label for="address" class="form-label">Customer Address @error('address')
                                <span class="text-danger"> *</span>
                                @enderror</label>
                            <textarea name="address" class="form-control" id="address" style="height: 100px">{{ old('address')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('css')

<style>
    .pdrow td {
        padding: 0;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[readonly],
    input[type="number"] {
        border: none;
    }
</style>

@endpush


@push('scripts')
@if($errors->any())
<script>
    $('#addCustomer').modal('show');
</script>
@endif

 <script>
    function addNewProduct() {
        var customer_id = parseInt($('#customer').val());
        if (!customer_id) {
            alert("Please Select Customer First");
            return false;
        }
        var product_list = '';
        $.get('{{ route("getallproducts")}}', {
            id: customer_id
        }).done(function(response) {
            product_list = '<option value="" disabled selected>Select a Product</option>'
            $.each(response.products, function(index, val) {
                product_list += '<option value="' + val.id + '">' + val.product_name + '</option>';
            });
            $('#product_' + x).append(product_list);
        });
        var x = parseInt($('#counter').val());
        var y = x + 1;
        var itemrow = '<tr class="pdrow product_row" id="trItem_' + x + '"> <td>' + x + '</td> <td colspan="3"><select id="product_' + x + '"  name="product[' + x + '][product_id]" class="form-select" onchange="onChangeProduct(' + x + ')">  </select></td> <td id="unit_' + x + '"> </td> <td id="stock_' + x + '">  </td> <td><div class="input-group input-group-sm">  <input type="number" id="qnt_' + x + '" class="form-control text-center" name="product[' + x + '][product_qnt]" min="0" placeholder="0" onkeyup="Calculate(' + x + ')" ></div></td><td><div class="input-group input-group-sm">  <input type="number" class="form-control text-center" name="product[' + x + '][product_price]" min="0" placeholder="0" id="price_' + x + '" onkeyup="Calculate(' + x + ')"></div></td> <td><input class="form-control text-center sub_total" type="number" min="0" name="product[' + x + '][sub_total]" id="sub_total_' + x + '" placeholder="0.00" readonly></td></tr>';
        $('#afteritemrow').before(itemrow);
        $('#counter').val(y);
    }

    function customerChange() {
        $('.product_row').closest('tr').remove();
        $('#total_amount').val('0.00');
        $('#discount').val('');
        $('#discount_amount').val('');
        $('#extra_charge').val('');
        $('#grand_total').val('');
        $('#paid_amount').val('');
        $('#due_amount').val('');
        addNewProduct();
    }

    function onChangeProduct(pid) {
        var id = $('#product_' + pid).val();
        var unit = $('#unit_' + pid);
        var stock = $('#stock_' + pid);
        var price = $('#price_' + pid);
        if (id === '') {
            unit.text('');
            return false;
        }
        $.get('{{ route("getProductDetails")}}', {
            id: id
        }).done(function(response) {
            unit.text(response.product.unit.name);
            stock.text(response.product.product_stock);
            price.val(response.product.sale_price);
            //        $("#purchase_rate_" + pid).val(response.product.cost_price);
            //          $("#quantity_" + pid).focus();
            Calculate(pid);
        });
    }

    function Calculate(id) {
        var inStock = parseFloat($('#stock_' + id).text());
        var qnt = parseFloat($("#qnt_" + id).val());
        var price = parseFloat($("#price_" + id).val());
        if( inStock < qnt ){
            swal({
                title: "Quantity is Over The Stock",
                icon: "warning",
            });
            $("#qnt_" + id).val(" ");
            $("#sub_total_" + id).val('0.00');
            return false;
        }

        var product = $('#product_' + id).val();
        if (!product) {
            alert('Please Select Any Product First');
            $("#qnt_" + id).val(' ');
            $("#price_" + id).val(' ');
            $('#product_' + id).focus();
            return false;
        }
        var sub_total = qnt * price;
        if (sub_total) {
            $("#sub_total_" + id).val(sub_total.toFixed(2));
        } else {
            $("#sub_total_" + id).val('0.00');
        }
        var ta = 0;
        $('.sub_total').each(function() {
            if ($(this).val()) {
                ta += parseFloat($(this).val())
            }
        });
        $("#total_amount").val(ta.toFixed(2));
        // $("#grand_total").text(ta.toFixed(2));
        // $("#due_amount").text(ta.toFixed(2));
        discountCalculation();
    }
    function discountCalculation() {
        var discountPercentage = parseFloat($("#discount").val());
        var total = parseFloat($("#total_amount").val());
        var extra_charge = parseFloat($("#extra_charge").val());
        var discount_amount = ((total / 100) * discountPercentage);
        var grand_total = total;
        if (discount_amount) {
            $("#discount_amount").val(discount_amount.toFixed(2));
            grand_total = total - discount_amount;
        } else {
            $("#discount_amount").val('');

        }
        if(extra_charge){
            grand_total = grand_total + extra_charge;
        } 
        if (grand_total) {
            $("#grand_total").val(grand_total.toFixed(2));
            $("#due_amount").val(grand_total.toFixed(2));
        } else if(grand_total==0){
            $("#grand_total").val(0);
            $("#due_amount").val(0);
        }
         else {
            $("#grand_total").val(total.toFixed(2));
            $("#due_amount").val(total.toFixed(2));
        }
        paidAmount();
    }

    function paidAmount() {
        var grand_total = parseFloat($("#grand_total").val());
        var paid_amount = parseFloat($("#paid_amount").val());
        var due_amount = grand_total - paid_amount;
        if (due_amount) {
            $("#due_amount").val(due_amount.toFixed(2));
        } else if (due_amount == 0) {
            $("#due_amount").val('0.00');
        } else {
            $("#due_amount").val(grand_total.toFixed(2));
        }
    }
    $('#submitbtn').click(function(e) {
        e.preventDefault();
    //   alert($("#saleForm").serialize());
        $.ajax({
            type: 'post',
            url: '{{ route("sale.store") }}', 
            data: $("#saleForm").serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.message == 'true') {
                    // toastr.success("Save Successfully!!");
                    alert('Save Successfully!!');
                } else {
                    alert('SomeThing is Wrong!!');
                }
                // setTimeout(function(){location.reload()}, 3000);    
                location.reload();
            }
        });
    })
</script> 
@endpush
@push('bootstrap')
<script src="{{ asset('dashboard/js/bootstrap.min.js')}}"></script>
@endpush
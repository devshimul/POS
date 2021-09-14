@extends('master.app')

@section('main-content')

<h2 class="text-center">Purchase Products</h2>
<hr class="mx-auto mb-4" width="50%">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="purchaseForm" autocomplete="off">
                @csrf 
                <input type="hidden" name="counter" id="counter" value="1">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="padding:0" colspan="8">

                                <select id="supplier" name="supplier_id" class="form-select" onchange="supplierChange();">
                                    <option value="" selected disabled> ---Select Supplier--- </option>
                                    @php $suppliers = App\Models\Supplier::all();
                                    @endphp
                                    @foreach($suppliers as $supplier )

                                    <option value="{{ $supplier->id}}">{{ $supplier->name}}</option>
                                    @endforeach

                                </select>
                            </th>
                            <th style="padding:0" width="10%">
                                <button id="additem" class="btn-sm btn-success rounded-0 radius-0 w-100" onclick="addNewItem(); return false;">
                                    Add New Item</button>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th width="40%" colspan="3">Product</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Purchase Rate</th>
                            <th>Sale Price</th>
                            <th width="15%">Sub Total</th>
                        </tr>

                    </thead>
                    <tbody id="tablebody" class="text-center">
                        <tr id="afteritemrow" class="pdrow">
                            <td rowspan="6">Note</td>
                            <td rowspan="6" colspan="5">

                                <textarea class="form-control w-100" name="note" placeholder="Type here...." cols="30" rows="16"></textarea>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> Total Amount</td>
                            <td id="total_amount"> 0.00</td>
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

                            <td id="discount_amount"> 0.00</td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Grand Total</td>
                            <td><input class="form-control text-center" type="number" min="0" name="grand_total" id="grand_total" placeholder="0.00" readonly></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Paid Amount</td>
                            <td style="padding: 0;"> <input class="form-control text-center" type="number" min="0" name="paid_amount" id="paid_amount" placeholder="0.00" onkeyup="paidAmount()"></td>
                        </tr>
                        <tr class=" pdrow">
                            <td colspan="2"> Due Amount</td>
                            <td><input class="form-control text-center" type="number" min="0" name="due_amount" id="due_amount" placeholder="0.00" readonly></td>
                        </tr>
                        <td colspan="9"> <button id="submitbtn" class="btn btn-success float-end radius-0 rounded-0" type="submit">Confirm</button></td>
                        </tr>


                    </tbody>
                </table>
            </form>
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

<script>
    //================= Add New Row Function===================//
    function addNewItem() {
        var supplier_id = parseInt($('#supplier').val());
        if (!supplier_id) {
            alert("Please Select Supplier First");
            return false;
        }
        var product_list = '';
        $.get('{{ route("getproducts")}}', {
            id: supplier_id
        }).done(function(response) {
            product_list = '<option value="" disabled selected>Select a Product</option>'
            $.each(response.products, function(index, val) {
                product_list += '<option value="' + val.id + '">' + val.product_name + '</option>';
            });
            $('#product_' + x).append(product_list);
        });
        var x = parseInt($('#counter').val());
        var y = x + 1;
        var itemrow = '<tr class="pdrow product_row" id="trItem_' + x + '"> <td>' + x + '</td> <td colspan="3"><select id="product_' + x + '"  name="product[' + x + '][product_id]" class="form-select" onchange="onChangeProduct(' + x + ')">  </select></td> <td id="unit_' + x + '"> </td><td><div class="input-group input-group-sm">  <input type="number" id="qnt_' + x + '" class="form-control text-center" name="product[' + x + '][product_qnt]" min="0" placeholder="0" onkeyup="Calculate(' + x + ')" ></div></td><td><div class="input-group input-group-sm">  <input type="number" class="form-control text-center" name="product[' + x + '][product_price]" min="0" placeholder="0" id="price_' + x + '" onkeyup="Calculate(' + x + ')"></div></td> <td><div class="input-group input-group-sm">  <input type="number" class="form-control text-center" name="product[' + x + '][sale_price]" min="0" placeholder="0.00"></div></td> <td><input class="form-control text-center sub_total" type="number" min="0" name="product[' + x + '][sub_total]" id="sub_total_' + x + '" placeholder="0.00" readonly></td></tr>';
        $('#afteritemrow').before(itemrow);
        $('#counter').val(y);
    }

    function supplierChange() {
        $('.product_row').closest('tr').remove();
        $('#total_amount').text('0.00');
        $('#discount').val('');
        $('#discount_amount').text('0.00');
        $('#grand_total').val('');
        $('#paid_amount').val('');
        $('#due_amount').val('');
        addNewItem();
    }

    function onChangeProduct(pid) {
        var id = $('#product_' + pid).val();
        var unit = $('#unit_' + pid);
        if (id === '') {
            unit.text('');
            return false;
        }
        $.get('{{ route("getProductDetails")}}', {
            id: id
        }).done(function(response) {
            unit.text(response.product.unit.name);
            //        $("#purchase_rate_" + pid).val(response.product.cost_price);
            //          $("#quantity_" + pid).focus();
        });

    }
//================= Calculation Function===================//
    function Calculate(id) {
        var qnt = parseFloat($("#qnt_" + id).val());
        var price = parseFloat($("#price_" + id).val());


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
        $("#total_amount").text(ta.toFixed(2));
        // $("#grand_total").text(ta.toFixed(2));
        // $("#due_amount").text(ta.toFixed(2));
        discountCalculation();
    }
//================= Discount Calculation Function===================//
    function discountCalculation() {
        var discountPercentage = parseFloat($("#discount").val());
        var total = parseFloat($("#total_amount").text());
        var discount_amount = (total / 100) * discountPercentage;
        if (discount_amount) {
            $("#discount_amount").text(discount_amount.toFixed(2));
        } else {
            $("#discount_amount").text('0.00');
        }
        var grand_total = total - discount_amount;
        if (grand_total) {
            $("#grand_total").val(grand_total.toFixed(2));
            $("#due_amount").val(grand_total.toFixed(2));
        } 
        else if(grand_total==0){
            $("#grand_total").val(0);
            $("#due_amount").val(0);
        }
         else {
            $("#grand_total").val(total.toFixed(2));
            $("#due_amount").val(total.toFixed(2));
        }
        paidAmount();
    }

    //================= due calcutaion Function===================//
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

    //================= Form Submission ===================//
    $('#submitbtn').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '{{ route("purchase.store") }}', 
            data: $("#purchaseForm").serialize(),
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
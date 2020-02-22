@extends('admin.layouts.app')
@section('page-name','Order-Create')
@section('order','active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <style>
        #product {
            width: 150px;
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header" style="background-color: #003e80">
                            <h2 class="card-title">Add New Order</h2>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form action="{{ route('user_orders.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Customer Name:</strong>
                                    <input type="text" name="customer_name" id="name" class="form-control"
                                           placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>Contact Number:</strong>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control"
                                           placeholder="Contact Number">
                                </div>
                                <table class="table table-bordered table table-responsive" id="table1">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Weight</th>
                                        <th>Rate(per 10 gram)</th>
                                        <th>Making Cost</th>
                                        <th>Advance</th>
                                        <th>Price</th>
                                        <th>
                                            <button class="btn add"
                                                    style="color: #0E9A00"><i class="fas fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="prototype">
                                        <td width="100">
                                            <select class="form-control product_category" name="category_id[]"
                                                    id="product_category_0" onclick="changeProduct();">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td width="100">
                                            <select class="form-control product" name="product_id[]" id="product_0">
                                                <option value=""></option>
                                            </select></td>
                                        <td><input type="text" class="form-control weight" name="weight[]"/></td>
                                        <td><input type="text" class="form-control rate" name="rate[]"/></td>
                                        <td><input type="text" class="form-control making_cost" name="making_cost[]"/>
                                        </td>
                                        <td><input type="text" class="form-control advance" name="advance[]"/></td>
                                        <td><input type="text" class="form-control price" name="price[]"/></td>
                                        <td>
                                            <button type="button" class="btn remove" style="color: red;"><i class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>Sub Total</td>
                                        <td><input type="text" class="form-control subtotal" name="sub_total"></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>Discount(%)</td>
                                        <td><input type="text" class="form-control discount" name="discount"></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>Price After Discount</td>
                                        <td><input type="text" class="form-control discountprice"
                                                   name="price_after_discount"></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>Tax(%)</td>
                                        <td><input type="text" class="form-control tax" name="tax"></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>Grand Total</td>
                                        <td><input type="text" name="grand_total" class="form-control grandtotal">
                                        </td>
                                        <td style="border: none"></td>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="form-group text-center">
                                    <a class="btn btn-primary mt-3 btn-xs" href="{{ route('user_orders.index') }}">
                                        Back</a>
                                    <button type="submit" class="btn btn-primary mt-3 btn-xs">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        let count = 0;

        function changeProduct() {
            let category = "product_category_" + count;
            console.log(category);
            let category_change = $("#" + category).val($(".product_category").val());
            let product = "product_" + count;
            console.log(product);
            let product_get = $("#" + product).val($(".product").val());
            let tbody = $("table").children();
            let tr = tbody.children();
            // let
            (category_change).change(function () {
                console.log("Testing");
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('get-products') }}?category_id=" + cat_id,
                        success: function (data) {
                            console.log(data);
                            if (data) {
                                (product_get).empty();
                                (product_get).append('<option>Select Product</option>');
                                $.each(data, function (key, value) {
                                    (product_get).append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                (product_get).empty();
                            }
                        }
                    });
                } else {
                    (product_get).empty();
                    (product_get).empty();
                    // tr.find(".product").empty();
                }
            });
        }

        $('tbody').delegate('.weight,.rate,.discount,.advance,.tax,.making_cost', 'keyup', function () {
            var tr = $(this).parent().parent();
            var trs = $(this).parent().parent().parent();
            var weight = tr.find('.weight').val();
            var rate = tr.find('.rate').val();
            var making_cost = tr.find('.making_cost').val();
            var make_cost = parseInt(making_cost) || 0;
            var advance = tr.find('.advance').val();
            var advance_cost = parseInt(advance) || 0;
            var price = (weight * rate) + make_cost - advance_cost;
            tr.find('.price').val(price);
            total();


        });

        function total() {
            var subtotal = 0;
            var totalmoney = 0;

            $('.price').each(function (i, e) {
                var amount = $(this).val() - 0;
                subtotal += amount;
            });
            $('.subtotal').val(subtotal.toFixed(2));

            discount = $('.discount').val();
            if (discount != '' && typeof(discount) != "undefined") {
                totalmoney = subtotal - (discount * subtotal) / 100;
            }

            $('.discountprice').val(totalmoney.toFixed(2));

            tax = $('.tax').val();
            if (tax != '' && typeof(tax) != "undefined") {
                totalpricewithtax = totalmoney + (tax * totalmoney) / 100;
            }
            $('.grandtotal').val(totalpricewithtax.toFixed(2));
        }

        $('.discount').keyup(function () {
            total();
        });
        $('.tax').keyup(function () {
            total();
        });


        function addHtml(count) {
            let html = '<tr class="prototype">\n' +
                '                                        <td width="100">\n' +
                '                                            <select class="form-control product_category" name="category_id[]"\n' +
                '                                                    id="product_category_' + count + '" keyup="changeProduct();">\n' +
                '                                                @foreach($categories as $category)\n' +
                '                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>\n' +
                '                                                @endforeach\n' +
                '                                            </select>\n' +
                '                                        </td>\n' +
                '                                        <td width="100">\n' +
                '                                            <select class="form-control product" name="product_id[]" id="product_' + count + '">\n' +
                '                                                <option value=""></option>\n' +
                '                                            </select></td>\n' +
                '                                        <td><input type="text" class="form-control weight" id="weight' + count + '" name="weight[]"/></td>\n' +
                '                                        <td><input type="text" class="form-control rate" id="rate' + count + '" name="rate[]"/></td>\n' +
                '                                        <td><input type="text" class="form-control making_cost" id="making_cost' + count + '" name="making_cost[]"/>\n' +
                '                                        </td>\n' +
                '                                        <td><input type="text" class="form-control advance" id="making_cost' + count + '" name="advance[]"/></td>\n' +
                '                                        <td><input type="text" class="form-control price" id="price' + count + '" name="price[]"/></td>\n' +
                '                                        <td>\n' +
                '                                            <button class="btn remove" style="color:red;" id="remove' + count + '"><i class="fas fa-times"></i></button>\n' +
                '                                        </td>\n' +
                '                                    </tr>';
            $("table tbody").append(html);

        }

        $("table.table button.add").click(function (e) {
            e.preventDefault();
            count++;
            addHtml(count);
            changeProduct();
        });

        $(function () {
            $(document).on("click", "table.table button.remove", function () {
                var last = $('tbody tr').length;
                if (last == 1) {
                    alert('You can not remove last row');
                }
                else {
                    $(this).parents("tr").remove();
                }
            });
        });
    </script>
@endsection
@extends("layouts.backend")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/pluginsdatatables-net/extensions/responsive/css/responsive.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/select2/select2.min.css")}}">
@endsection

@section("title")
    Payment
@endsection

@section("page-title")
    Payment
@endsection

@section("header-right-side")
    <h3 class="ks-title">Payment</h3>
@endsection

@section("sidebar-tabs")
    @include("includes.backend.superAdmin-sidebar")
@endsection

@section("main-container")


    <div class="ks-body-wrap-container">
        <div class="ks-full-table">
            <div class="ks-full-table-header">
                <h4 class="ks-full-table-name">All Invoices</h4>
                {{--<div class="ks-controls">
                    <a href="{{route('create.invoice')}}" class="btn btn-primary">Create Invoice</a>
                </div>--}}
            </div>
            <div id="ks-datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="ks-datatable_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 204px;" aria-sort="ascending" aria-label="Status: activate to sort column descending">Due Data</th>
                                <th class="sorting" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 137px;" aria-label="Amount: activate to sort column ascending">Amount</th>
                                <th class="sorting" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 203px;" aria-label="Customer: activate to sort column ascending">Customer</th>
                                <th class="sorting" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 220px;" aria-label="Issue Date: activate to sort column ascending">Issue Date</th>
                                <th class="sorting" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 135px;" aria-label="Invoice: activate to sort column ascending">Invoice</th>
                                <th class="sorting" tabindex="0" aria-controls="ks-datatable" rowspan="1" colspan="1" style="width: 19px;" aria-label=": activate to sort column ascending">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)

                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">
                                    <span class="badge ks-circle badge-danger ks-text-danger">
                                        <?php
                                        $timestamp=$invoice->due_date;
                                        echo gmdate("d-m-Y", $timestamp);
                                        ?>
                                    </span>
                                    </td>
                                    <td>$ {{$invoice->amount_due}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><?php
                                        $timestamp=$invoice->date;
                                        echo gmdate("d-m-Y", $timestamp);
                                        ?></td>
                                    <td>{{$invoice->number}}</td>
                                    <th>
                                        @if($invoice->billing == "charge_automatically")
                                            <a class="btn btn-primary" href="{{$invoice->hosted_invoice_url}}" target="_blank">Download</a>
                                        @else
                                            <a class="btn btn-primary" href="{{route('subscription', [])}}" target="_blank">Pay Online</a>
                                        @endif
                                    </th>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                @endsection

                @section("scripts")
                    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/jquery.dataTables.min.js")}}"></script>
                    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/dataTables.bootstrap4.min.js")}}"></script>
                    <script src="{{asset("assets/backend/plugins/datatables-net/extensions/responsive/js/dataTables.responsive.min.js")}}"></script>
                    <script src="{{asset("assets/backend/plugins/datatables-net/extensions/responsive/js/responsive.bootstrap4.min.js")}}"></script>
                    <script src="{{asset("assets/backend/js/custom/select2.min.js")}}"></script>
                    <script type="application/javascript">
                        (function ($) {
                            $(document).ready(function() {
                                $('#ks-datatable').DataTable({
                                    "initComplete": function () {
                                        $('.dataTables_wrapper select').select2({
                                            minimumResultsForSearch: Infinity
                                        });
                                    }
                                });
                            });
                        })(jQuery);
                    </script>
@endsection

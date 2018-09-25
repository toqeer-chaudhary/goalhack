@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/stacktable/stacktable.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/payment/billing.min.css")}}">
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
    @include("includes.backend.vision-sidebar")
@endsection

@section("main-container")
    <div class="col-xl-9">
        <div class="ks-log-table">
            <h3 class="ks-header">
                <span>History</span>
                <a href="#">View All</a>
            </h3>
            <table class="table stacktable large-only" id="paymentTable">
                <thead>
                <tr>
                    <th>Date submitted</th>
                    <th>Payment ID</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Payment By</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-info">Processing</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-success">Paid</span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Sep 29, 2016 12:26 PM</td>
                    <td>VSR000000001221</td>
                    <td class="ks-status"><span class="ks-color-danger">Failed <span class="la la-warning ks-icon"></span></span></td>
                    <td>$1,119.00</td>
                    <td class="ks-download">
                        <a href="#"><span class="la la-file-pdf-o ks-icon"></span> Download</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="ks-col-info">
            <div class="card panel panel-default ks-no-border ks-solid ks-bg-light-gray">
                <h5 class="card-header">
                    Your Plan
                </h5>
                <div class="card-block">
                    <table class="ks-plan-details stacktable small-only">
                        <tbody>
                        <tr class="  ">
                            <th class="st-head-row st-head-row-main" colspan="2">
                                <div class="ks-amount">$119</div>
                                <div class="ks-plan">
                                    <div class="ks-name">Light (8GB)</div>
                                    <div class="ks-datetime">Since April 12, 2016</div>
                                </div>
                                <a href="#" class="btn btn-primary">Change Plan</a>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                    <table class="ks-plan-details stacktable large-only">
                        <tbody>
                        <tr>
                            <td>
                                <div class="ks-amount">$119</div>
                                <div class="ks-plan">
                                    <div class="ks-name">Light (8GB)</div>
                                    <div class="ks-datetime">Since April 12, 2016</div>
                                </div>
                                <a href="#" class="btn btn-primary">Change Plan</a>
                            </td>
                            <td>
                                <ul class="ks-description">
                                    <li>— Total Price</li>
                                    <li>— Billed Monthly</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card panel panel-default ks-light ks-solid">
                <h5 class="card-header">
                    Billing Details
                </h5>
                <div class="card-block">
                    <table class="ks-billing-details stacktable small-only">
                        <tbody>
                        <tr class="  ">
                            <th class="st-head-row st-head-row-main" colspan="2">Name</th>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Country</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val ">USA</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">State/Province</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val ">New York</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Address/Street</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val ">874 Wisoky Estate Suite 050</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Zip Code</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val ">3126</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Phone Number</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val ">+1 (417) 555-555-555</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Email</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">Charles Gillbert</td>
                            <td class="st-val "><a href="#">charles_gillbert@example.com</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="ks-billing-details stacktable large-only">
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>Charles Gillbert</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <td>State/Province</td>
                            <td>New York</td>
                        </tr>
                        <tr>
                            <td>Address/Street</td>
                            <td>874 Wisoky Estate Suite 050</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>3126</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>+1 (417) 555-555-555</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><a href="#">charles_gillbert@example.com</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card panel panel-default ks-light ks-solid">
                <h5 class="card-header">
                    Payment card details
                </h5>
                <div class="card-block">
                    <table class="ks-payment-details stacktable small-only">
                        <tbody>
                        <tr class="  ">
                            <th class="st-head-row st-head-row-main" colspan="2">Card Type</th>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Name on Card</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">VISA</td>
                            <td class="st-val ">CHARLES GILLBERT</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">State/Province</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">VISA</td>
                            <td class="st-val ">New York</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Card Number</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">VISA</td>
                            <td class="st-val ">444*********6666</td>
                        </tr>
                        <tr class="">
                            <th class="st-head-row" colspan="2">Expiration</th>
                        </tr>
                        <tr class="">
                            <td class="st-key">VISA</td>
                            <td class="st-val ">03.2017</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="ks-payment-details stacktable large-only">
                        <tbody>
                        <tr>
                            <td>Card Type</td>
                            <td>VISA</td>
                        </tr>
                        <tr>
                            <td>Name on Card</td>
                            <td>CHARLES GILLBERT</td>
                        </tr>
                        <tr>
                            <td>State/Province</td>
                            <td>New York</td>
                        </tr>
                        <tr>
                            <td>Card Number</td>
                            <td>444*********6666</td>
                        </tr>
                        <tr>
                            <td>Expiration</td>
                            <td>03.2017</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("assets/backend/plugins/stacktable/stacktable.js")}}"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $('table').stacktable();
            });
        })(jQuery);
    </script>
@endsection

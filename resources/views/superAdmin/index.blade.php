@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/noty/noty.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/payment.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/panels.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/dashboard/tabbed-sidebar.min.css")}}">
@endsection

@section("title")
    Super Admin
@endsection

@section("page-title")
    Super Admin
@endsection

@section("sidebar-tabs")
    @include("includes.backend.superAdmin-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-4">
        </div>
        <div class="col-sm-4">
            <h2>Welcome Mr Admin</h2>
        </div>
        <div class="col-sm-offset-4">
        </div>
    </div>
@endsection

@section("main-container")
    <div class="ks-dashboard-tabbed-sidebar">
        <div class="ks-dashboard-tabbed-sidebar-widgets">
            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-purple">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-combo-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $companies->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Companies
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-green">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-user ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $users->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Users
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-pink">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-level-up ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $levels->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                               Total Levels
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-orange">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-bar-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $visions->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Visions
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-green">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-line-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $strategies->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Strategies
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-purple">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-area-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $kpis->count() }}</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                             </div>
                            <div class="payment-simple-amount-item-description">
                                Total Kpis
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card ks-card-widget ks-widget-table">
                        <h5 class="card-header">
                            Detailed Table
                        </h5>
                        <div class="card-block">
                            <table class="table ks-payment-table-invoicing">
                                <tbody>
                                <tr>
                                    <th width="1">ID</th>
                                    <th>Company Name</th>
                                    <th>No of Users</th>
                                    <th>No of Levels</th>
                                    <th>No of Visions</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                @foreach($companies as $company)
                                    <tr  id="company{{$company->id}}">
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->users->count() }}</td>
                                        <td>{{ $company->levels->count() }}</td>
                                        <td>{{ $company->visions->count() }}</td>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                        <td><button class="btn btn-danger disable-company" data-id="{{ $company->id }}" data-status="{{$company->status}}" id="disable-company" >Disable</button></td>
                                        <td><button class="btn btn-success enable-company" data-id="{{ $company->id }}" data-status="{{$company->status}}" id="enable-company" >Enable</button></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("assets/backend/plugins/d3/d3.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/c3js/c3.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/noty/noty.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/maplace/maplace.min.js")}}"></script>
@endsection

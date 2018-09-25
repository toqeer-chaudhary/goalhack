@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/noty/noty.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/payment.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/panels.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/dashboard/tabbed-sidebar.min.css")}}">
@endsection

@section("title")
    Strategy Home
@endsection

@section("page-title")
    Strategy
@endsection

@section("sidebar-tabs")
    @include("includes.backend.strategy-sidebar")
@endsection

@section("main-container")
    <div class="ks-dashboard-tabbed-sidebar">
        <div class="ks-dashboard-tabbed-sidebar-widgets">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-purple">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-combo-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$9.24</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Profit <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-green">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-pie-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$2.190</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Revenue <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-pink">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-user ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">23</span>
                                <span class="ks-amount-icon ks-icon-circled-down-left"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Active Clients <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-orange">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-area-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$431.2</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Average Profit <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card ks-card-widget ks-widget-payment-card-rate-details">
                        <h5 class="card-header">
                            Card Rate Details

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-card-widget-datetime">
                                These rates are for the 24-hour period ending <span class="ks-text-bold">Wednesday, Feb 8, 2017</span>
                                23:00 WAT
                            </div>

                            <table class="table ks-payment-card-rate-details-table">
                                <tbody><tr>
                                    <td class="ks-currency">
                                        <img src="{{asset("assets/backend/images/flags/24/United-States.png")}}" class="ks-flag">
                                        US Dollar
                                    </td>
                                    <td class="ks-amount">320.00</td>
                                </tr>
                                <tr>
                                    <td class="ks-currency">
                                        <img src="{{asset("assets/backend/images/flags/24/United-Kingdom.png")}}" class="ks-flag">
                                        Pounds Sterling
                                    </td>
                                    <td class="ks-amount">407.59</td>
                                </tr>
                                <tr>
                                    <td class="ks-currency">
                                        <img src="{{asset("assets/backend/images/flags/24/European-Union.png")}}" class="ks-flag">
                                        Euro
                                    </td>
                                    <td class="ks-amount">347.83</td>
                                </tr>
                                <tr>
                                    <td class="ks-currency">
                                        <img src="{{asset("assets/backend/images/flags/24/Canada.png")}}">
                                        Canadian Dollar
                                    </td>
                                    <td class="ks-amount">248.39</td>
                                </tr>
                                <tr>
                                    <td class="ks-currency">
                                        <img src="{{asset("assets/backend/images/flags/24/United-Arab-Emirates.png")}}" class="ks-flag">
                                        U.A.E. Dirham
                                    </td>
                                    <td class="ks-amount">88.91</td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <div class="card ks-card-widget ks-widget-payment-budget">
                        <a href="#" class="ks-thumbnail">
                            <img src="{{asset("assets/backend/images/widgets/cover.png")}}" class="embed-responsive">
                        </a>
                        <a class="card-header">Magazine Images</a>
                        <div class="ks-card-widget-datetime">Last update <span class="ks-text-bold">Apr 17, 2017</span></div>
                        <div class="card-block">
                            <div class="ks-payment-budget-amount-block">
                                <div class="ks-text-action">$44.99</div>
                                <div class="ks-description">Budget</div>
                            </div>
                            <div class="ks-payment-budget-remaining-block">
                                <div class="ks-text-action">Early Apr 2017</div>
                                <div class="ks-description ks-color-purple">10 days Remaining</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card ks-card-widget ks-widget-payment-earnings">
                        <h5 class="card-header">
                            Next Payout

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-card-widget-datetime">
                                Activity from <span class="ks-text-bold">Jan 4, 2017</span> to <span class="ks-text-bold">Jan 10, 2017</span>
                            </div>

                            <div class="ks-payment-earnings-amount">$2.37</div>
                            <div class="ks-payment-earnings-amount-description">
                                You’ve made $230 today
                            </div>
                        </div>
                    </div>
                    <div class="card ks-card-widget ks-widget-tasks-overview-progress">
                        <h5 class="card-header">
                            All Tasks Overview
                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-card-widget-datetime">
                                Next <span class="ks-text-bold">4 weeks</span>
                            </div>
                            <div class="ks-tasks-progress-items">
                                <div class="ks-tasks-progress-item">
                                    <div class="ks-label">Week 3</div>
                                    <div class="ks-progress">
                                        <div class="progress ks-progress-xs">
                                            <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 40%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ks-tasks-progress-item">
                                    <div class="ks-label">Week 4</div>
                                    <div class="ks-progress">
                                        <div class="progress ks-progress-xs">
                                            <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 10%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 40%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ks-tasks-progress-item">
                                    <div class="ks-label">Week 5</div>
                                    <div class="ks-progress">
                                        <div class="progress ks-progress-xs">
                                            <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ks-tasks-progress-item">
                                    <div class="ks-label">Week 6</div>
                                    <div class="ks-progress">
                                        <div class="progress ks-progress-xs">
                                            <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 50%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="ks-tasks-progress-item-statuses">
                                <li class="ks-task-progress-bar-status">Progress</li>
                                <li class="ks-task-progress-due-status">Due</li>
                                <li class="ks-task-progress-qa-status">QA</li>
                                <li class="ks-task-progress-delegated-status">Delegated</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ks-card-widget ks-widget-payment-earnings">
                                <h5 class="card-header">
                                    Total Earnings

                                    <div class="dropdown ks-control">
                                        <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="ks-icon la la-ellipsis-h"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Add Card</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </h5>
                                <div class="card-block">
                                    <div class="ks-card-widget-datetime">
                                        In <span class="ks-text-bold">12 Months</span>
                                    </div>

                                    <div class="ks-payment-earnings-amount">$23.54</div>
                                    <div class="ks-payment-earnings-amount-description">
                                        Last month you’ve made $230
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-green">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">23.82</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-up-right"></span>
                                    <div class="ks-text">0.32%</div>
                                </div>
                            </div>
                            <div class="card ks-widget-payment-price-ratio ks-blue">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">23.82</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-up-right"></span>
                                    <div class="ks-text">0.32%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-purple">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">0.23</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-down-left"></span>
                                    <div class="ks-text">1.56%</div>
                                </div>
                            </div>
                            <div class="card ks-widget-payment-price-ratio ks-yellow">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">0.23</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-down-left"></span>
                                    <div class="ks-text">1.56%</div>
                                </div>
                            </div>
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

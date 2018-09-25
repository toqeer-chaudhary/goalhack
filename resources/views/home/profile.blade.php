@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Register


@endsection
@section("container")
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-1 toppad" >


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$company->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>


                            <div class=" col-md-12 col-lg-12 ">
                                <table class="table table-user-information">
                                    <tbody>
                                   {{-- <tr>
                                        <td>Company name:</td>
                                        <td>{{$company->name}}</td>
                                    </tr>--}}
                                    <tr>
                                        <td>Comany email:</td>
                                        <td>{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Company address:</td>
                                        <td>{{$company->address}}</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Comany contact:</td>
                                        <td>{{$company->contact}}</td>
                                    </tr>
                                    <tr>
                                        <td>Company website:</td>
                                        <td>{{$company->website}}</td>
                                    </tr>
                                    <tr>
                                        <td>Company city:</td>
                                        <td>{{$company->city}}</td>
                                    </tr>
                                    <td>Company province</td>
                                    <td>{{$company->province}}
                                    </td>

                                    </tr>
                                    <tr>
                                        <td>Comany country:</td>
                                        <td>{{$company->country}}</td>
                                    </tr>
                                    <tr>
                                        <td>Comany password:</td>
                                        <td>{{$company->password}}</td>
                                    </tr>

                                    </tbody>
                                </table>

                                <a href="{{route('company.edit', [$company->id])}}" class="btn btn-warning">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    {{--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>--}}

                </div>
            </div>
        </div>
    </div>








@endsection

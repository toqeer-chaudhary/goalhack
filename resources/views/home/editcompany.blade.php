@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Register
@endsection

@section("container")

<div class="card mt-5">
    <div class="card-header">
        <marquee><h1> <strong>Update Your company profile</strong></h1></marquee>
    </div>
    <div class="card-body">
        <form  action="{{route('company.update', [$company->id])}}" method="post">
            {{csrf_field()}}
            {{method_field("put")}}
            <div class="form-group">
                <div class="col-md-6">
                <label for="name">name:</label></div>
                <input type="name" class="form-control" id="name"  name="name" value="{{$company->name}}">
            </div>
            <div class="form-group">
                <label for="pwd">email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$company->email}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="pwd">address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$company->address}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="contact">contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{$company->contact}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="Website">Website:</label>
                <input type="text" class="form-control" id="Website" name="Website" value="{{$company->website}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="city">city:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$company->city}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="province">province:</label>
                <input type="text" class="form-control" id="province" name="province" value="{{$company->province}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="country">country:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{$company->country}}">
            </div>
            {{--email of the company--}}
            <div class="form-group">
                <label for="password">password:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{$company->password}}">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        {{--<form action="{{route('company.update', [$company->id])}}" method="post">
            {{csrf_field()}}
            {{method_field("put")}}
            <div class="form-group">
                <label for="Comany_Name">Comany Name:</label>
                <input type="text" class="form-control" name="title" id="name" value="{{$company->name}}">
                <p id="name-error"></p>
            </div>
            <div class="form-group">
                <label for="Comany_email">Comany Email:</label>
                <input type="text" class="form-control" name="title"id="email" value="{{$company->email}}">
                <p id="email-error"></p>
            </div>
            <div class="form-group">
                <label for="Comany_email">Comany Address:</label>

                <input type="text" class="form-control" name="title" id="address" value="{{$company->address}}">
                <p id="address-error"></p>
            </div>

            <div class="form-group">
                <label for="Comany_contact">Comany contact:</label>
                <input type="text" class="form-control" name="title" id="contact"value="{{$company->contact}}">
                <p id="contact-error"></p>
            </div>
            <div class="form-group">
                <label for="Comany_email">Comany website:</label>
                <input type="text" class="form-control" name="title"id="website" value="{{$company->website}}">
                <p id="website-error"></p>
            </div>

            <div class="form-group">
                <label for="Comany_city">Company city:</label>
                <input type="text" class="form-control" name="title"id="city" value="{{$company->city}}">
                <p id="city-error"></p>
            </div>

            <div class="form-group">
                <label for="Comany_province:">province</label>
                <input type="text" class="form-control" name="title"id="province" value="{{$company->province}}">
                <p id="province-error"></p>
            </div>

            <div class="form-group">
                <label for="Company_country">Companycountry:</label>
                <input type="text" class="form-control" name="title"id="country" value="{{$company->country}}">
                <p id="country-error"></p>
            </div>

            <div class="form-group">
                <label for="Company_password">Company password:</label>
                <input type="text" class="form-control" name="title"id="password" value="{{$company->password}}">
                <p id="password-error"></p>
            </div>
            <input type="submit" value="Submit" class="btn btn-info">
            --}}{{--<a href="{{action('CompanyController@show', [$company->id])}}" class="btn btn-info">update Profile</a>--}}{{--
        </form>--}}






        {{--<div class="card-body">
            <form  action="{{route('company.update', [$company->id])}}" method="post">
                {{csrf_field()}}
                {{method_field("put")}}
                <div class="form-group col-md-4">
                    <label for="name">Company Name:</label>
                    <input type="name" class="form-control" id="name"  name="name" value="{{$company->name}}">
                    <p id="name-error"></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Comapny Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$company->email}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="pwd">Company Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$company->address}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="contact">Company Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{$company->contact}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="Website">Company Website:</label>
                    <input type="text" class="form-control" id="Website" name="Website" value="{{$company->website}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="city">Company city:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$company->city}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="province">Company province:</label>
                    <input type="text" class="form-control" id="province" name="province" value="{{$company->province}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="country">Company country:</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{$company->country}}">
                </div>
                --}}{{--email of the company--}}{{--
                <div class="form-group col-md-4">
                    <label for="password">Company password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{$company->password}}">
                </div>
                <div class="checkbox " >
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <center><button type="submit" class="btn btn-default">Submit</button></center>
            </form>--}}

        </div>
</div>
@endsection
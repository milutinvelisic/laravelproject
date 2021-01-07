@extends("layout/template")
@section("content")
    @if(session()->has('msg'))
        <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
            <div class="col-md-12">
                <h5 class="h5"> {{ session('msg') }}</h5>
            </div>
        </div>
    @endif
    @isset($errors)
        <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
            <div class="col-md-12">
                @foreach($errors->all() as $error)
                    <h5 class="h5">{{ $error }}</h5>
                @endforeach
            </div>
        </div>
    @endisset
    <div id="loginForm">
        <div class="row d-flex justify-content-around block-12" >
            <div class="col-md-3 order-md-last d-flex">
                <form action="{{ url("/login") }}" method="POST"  onsubmit="return checkLogin();" class="bg-white p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="logUsername">Username</label>
                        <input type="text" id="logFirstName" class="form-control" placeholder="Your Username" name="logFirstName" />
                        <small id="logFirstNameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="logPassword">Password</label>
                        <input type="password" id="logPassword" class="form-control" placeholder="Your Password" name="logPassword" />
                        <small id="logPasswordError"></small>
                    </div>
                    <div class="form-group d-flex justify-content-around">
                        <input type="submit" value="Login" id="btnLogin" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

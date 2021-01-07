@extends("layout/template")
@section("content")
    <div id="loginForm">
        <div class="row d-flex justify-content-around block-12" >
            <div class="col-md-3 order-md-last d-flex">
                <form action="{{ url("/login") }}" method="POST"  onsubmit="return checkLogin();" class="bg-white p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="logUsername">Username</label>
                        <input type="text" id="logUsername" class="form-control" placeholder="Your Username" name="logUsername" />
                        <small id="logUsernameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="logPassword">Password</label>
                        <input type="text" id="logPassword" class="form-control" placeholder="Your Password" name="logPassword" />
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

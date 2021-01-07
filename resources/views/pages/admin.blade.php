@extends("layout/template")
@section("content")
    <h1>Admin page</h1>
    <div id="addContactForm">
        <div class="row d-flex justify-content-around block-12" >
            <div class="col-md-3 order-md-last d-flex">
                <form action="{{ url("/login") }}" method="POST" data-bind="submit: handleSubmit" class="bg-white p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" class="form-control" placeholder="Your first name" name="firstName" />
                        <small id="FirstNameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" class="form-control" placeholder="Your last name" name="lastName" />
                        <small id="FirstNameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Phone numbers</label>
                        <input type="text" id="mobile" class="form-control" value="Mobile" name="mobile" />
                        <input type="text" id="mobileNumber" class="form-control" placeholder="(555) 121-2121" name="mobileNumber" />
                        <div class="form-group d-flex justify-content-around">
                            <input type="submit" value="Add Number" id="addNumberPrimary" class="btn btn-primary">
                        </div>
                        <small id="mobileNumberError"></small>
                        <input type="text" id="home" class="form-control" value="Home" name="home" />
                        <input type="text" id="homeNumber" class="form-control" placeholder="" name="homeNumber" />
                        <input type="text" id="office" class="form-control" value="Office" name="office" />
                        <input type="text" id="officeNumber" class="form-control" placeholder="" name="officeNumber" />
                        <div class="form-group d-flex justify-content-around">
                            <input type="submit" value="Add Number" id="addNumberSecondary" class="btn btn-primary">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

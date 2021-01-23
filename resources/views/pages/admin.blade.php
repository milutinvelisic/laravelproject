@extends("layout/template")
@section("content")
    <h1>Admin page</h1>
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-md-5">
               <div class="form-row">
                   <div class="form-group col-lg-6">
                       <label for="firstName">Choose number of forms</label>
                       <select name="formNumber" id="formNumber">
                           <option value="0">Choose...</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                       </select>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <div id="addContactForm">
        <div class="row d-flex justify-content-around" >
            <div class="col-md-4 d-flex">
                <form action="{{ route("insertContact") }}" method="POST" class="bg-white p-5" id="contact-form">
                    @csrf

                </form>

            </div>
        </div>
    </div>
@endsection

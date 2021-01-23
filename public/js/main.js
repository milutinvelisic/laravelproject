let url = window.location.href;

let serverUrl = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port;

if (url.indexOf("login") != -1) {
    function checkLogin() {

        let logFirstName = document.getElementById("logFirstName").value;
        let logPassword = document.getElementById("logPassword").value;

        if (logFirstName == "") {
            document.getElementById("logFirstNameError").textContent = "Must fill username";
            return false;
        } else {
            document.getElementById("logFirstNameError").textContent = "";
        }

        if (logPassword == "") {
            document.getElementById("logPasswordError").textContent = "Must fill password";
            return false;
        } else {
            document.getElementById("logPasswordError").textContent = "";
        }
    }
} else if(url.indexOf("admin") != -1){

    function CreateAccountViewModel() {
        var self = this;

        self.firstName = ko.observable("").extend({
            required: true,
            minLength: 2
        });
        self.mobile = ko.observable("").extend({
            required: true,
            minLength: 2
        });
        self.lastName = ko.observable("").extend({
            required : true,
            minLength: 2
        })
        // self.emailAddress = ko.observable("").extend({
        //     required: true,
        //     email: true
        // });
        self.subscriptionType = ko.observable("standard");
        self.hasBeenSubmitted = ko.observable(false);

        window.firstName = self.firstName;
        window.lastName = self.lastName;
        window.mobile = self.mobile;



        self.handleSubmit = function() {

            //Check for errors
            var errors = ko.validation.group(self);
            if (errors().length > 0) {
                errors.showAllMessages();
                return;
            }

            self.hasBeenSubmitted(true);

            //Form is valid!
            console.log('submit the form!')
            //Api call would go here...
            //
            //
            console.log({
                firstName: self.firstName(),
                lastName: self.lastName(),
                mobile: self.mobile(),
                subscriptionType: self.subscriptionType(),
            })
        }
    };




    let formNumberDd = document.getElementById("formNumber");
    formNumberDd.addEventListener("change", function (){
        let formNumberDdValue = formNumberDd.options[formNumberDd.selectedIndex].value;
        let html = ''

        for (let i = 0; i < formNumberDdValue; i++) {
            html += `<div class="mb-5" id="forma${i+1}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName${i+1}" class="form-control" placeholder="Your first name" name="firstName[]" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName${i+1}" class="form-control" placeholder="Your last name" name="lastName[]" />
                            </div>
                            <div class="form-group col-md-4">
                                <br/><button type="button" class="mt-2 deleteInfo">Delete</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="firstName">Phone numbers</label>
                                <input type="text" id="mobile${i+1}" class="form-control" value="Mobile" name="phoneTypeName[]" />
                            </div>
                            <div class="form-group col-md-5">
                                <br/><input type="text" id="mobileValue${i+1}" class="form-control mt-2" placeholder="(555) 121-2121" name="phoneNumber[]" />
                            </div>
                            <div class="form-group col-md-3">
                                <br/><button type="button" class="mt-2 deleteNumber" >Delete</button>
                            </div>
                            <div class="form-group col-md-4">
                                <br/><input type="text" id="home${i+1}" class="form-control" value="Home" name="phoneTypeName[]" />
                            </div>
                            <div class="form-group col-md-5">
                                <br/><input type="text" id="homeValue${i+1}" class="form-control" placeholder="(555) 121-2121"  name="phoneNumber[]" />
                            </div>
                            <div class="form-group col-md-3">
                                <br/><button type="button" class="deleteNumber">Delete</button>
                            </div>
                            <div class="form-group col-md-4">
                                <br/><input type="text" id="office${i+1}" class="form-control" value="Office" name="phoneTypeName[]" />
                            </div>
                            <div class="form-group col-md-5">
                                <br/><input type="text" id="officeValue${i+1}" class="form-control" placeholder="(555) 121-2121" name="phoneNumber[]" />
                            </div>
                            <div class="form-group col-md-3">
                                <br/><button type="button" class="deleteNumber">Delete</button>
                            </div>
                        </div>
                        <input type="submit" value="Add Number" name="contactSubmit" class="btn btn-primary"/>
                    </div>`
        }

        document.getElementById("contact-form").innerHTML = html

        // Kod za KO js se ovde nalazi jer se u ovom momentu ispisuje forma

        let contactForm = document.querySelector("#addContactForm");

        function clearAndBindFormEvent(){
            ko.cleanNode(contactForm);
            ko.applyBindings(new CreateAccountViewModel(), contactForm);
        }
        if(document.getElementById("firstName1")){

            document.getElementById("firstName1").value = ''
        }

        clearAndBindFormEvent()


        if($(".deleteInfo")){

            $(document).on('click', '.deleteInfo', function (e){
                e.target.parentElement.previousElementSibling.childNodes[3].value = ''
                e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].value = ''
                // clearAndBindFormEvent()
                // ko.cleanNode(contactForm);
            })
        }

        if($(".deleteNumber")){

            $(document).on('click', '.deleteNumber', function (e){
                e.target.parentElement.previousElementSibling.childNodes[2].value = ''
                // clearAndBindFormEvent()
                // ko.cleanNode(contactForm);
            })
        }
    })


}

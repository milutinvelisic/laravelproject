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
            minLength: 2,
            // validation: {
            //    message: "Please enter at least 2 characters",
            //    validator: function(value) {
            //       return value.length >= 2;
            //    }
            // }
        });
        self.emailAddress = ko.observable("").extend({
            required: true,
            email: true
        });
        self.subscriptionType = ko.observable("standard");
        self.hasBeenSubmitted = ko.observable(false);

        window.firstName = self.firstName;

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
                emailAddress: self.emailAddress(),
                subscriptionType: self.subscriptionType(),
            })
        }
    };

    const contactForm = document.querySelector("#addContactForm");
    ko.applyBindings(new CreateAccountViewModel(), contactForm);
}

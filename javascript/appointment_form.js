// this boolean allows the submission of the form
var submit_appointment = false;

// take the form from the document where this script is called
const appointment_form = document.getElementById('book-an-appointment');

appointment_form.addEventListener("submit", function(error) {
    // on form submit, if the boolean variable is set to false, prevent the form from submitting and run the validation function
    if (!submit_appointment) {
        error.preventDefault();
        // form validation function
        valAppointment();
    }
});

function valAppointment() {
    // retrieves the value entered by the user
    const appointment_date = document.getElementById('date-for-app').value;
    const appointment_reason = document.getElementById('app-reason').value;

    // target the error tags on both 
    const appointment_date_error = document.getElementById('date-error');
    const appointment_reason_error = document.getElementById('reason-error');

    // boolean variable becomes true if there is no error
    var appointment_date_valid = false;
    // if the input field is empty, display error
    if (appointment_date == "") {
        // display error tag
        appointment_date_error.style.display = "inline";
        appointment_date_error.innerHTML = "Field empty. Fill in.";
    }
    else {
        // hide error message
        appointment_date_error.style.display = "none";
        // set boolean to true
        appointment_date_valid = true;
    }

    // boolean variable becomes true if there is no error
    var appointment_reason_valid = false;
    // if the input field is empty, display error
    if (appointment_reason == "") {
        // display error tag
        appointment_reason_error.style.display = "inline";
        appointment_reason_error.innerHTML = "Field empty. Fill in.";
    }
    else {
        // hide error message
        appointment_reason_error.style.display = "none";
        // set boolean to true
        appointment_reason_valid = true;
    }

    // if reason and date booleans are true, main boolean variable is set to true
    if (appointment_date_valid && appointment_reason_valid) {
        submit_appointment = true;
    }
}
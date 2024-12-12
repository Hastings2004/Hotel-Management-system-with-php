let firstname = document.getElementById('firstname');
let lastname = document.getElementById('lastname');
let email = document.getElementById('email');
let phone_number = document.getElementById('phone-No');
let nationality = document.getElementById('nationality');
let check_in = document.getElementById('check-in');
let check_out = document.getElementById('check-out');
let room_num = document.getElementById('room');
let option = document.getElementById('option');

let form = document.getElementById('Form');

let fname_error = document.getElementById('fname_error');
let lname_error = document.getElementById('lname_error');
let email_error = document.getElementById('email_error');
let phone_error = document.getElementById('num_error');
let nation_error = document.getElementById('nation_error');
let checkin_error = document.getElementById('checkin_error');
let checkout_error = document.getElementById('checkout_error');
let num_error = document.getElementById('num_error1');
form.addEventListener("submit", (e) => {


    if (firstname.value === "") {
        e.preventDefault();
        fname_error.textContent = "Enter your firstname";
    } else {
        fname_error.textContent = "";
    }

    if (lastname.value === "") {
        e.preventDefault();
        lname_error.textContent = "Enter your lastname";
    } else {
        lname_error.textContent = "";
    }

    if (email.value === "") {
        e.preventDefault();
        email_error.textContent = "Enter your email address";
    } else {
        email_error.textContent = "";
    }



    if (nationality.value === "") {
        e.preventDefault();
        nation_error.textContent = "Enter your nationality";
    } else {
        nation_error.textContent = "";
    }

    if (phone_number.value === "") {
        e.preventDefault();
        phone_error.textContent = "Enter your correct phone number";
    } else {
        phone_error.textContent = "";
    }


    if (check_in.value === "") {
        e.preventDefault();
        checkin_error.textContent = "Enter check-in date";
    } else {
        checkin_error.textContent = "";
    }


    if (check_out.value === "") {
        e.preventDefault();
        checkout_error.textContent = "Enter check-out date";
    } else {
        checkout_error.textContent = "";
    }




    if (room_num.value === "") {
        e.preventDefault();
        num_error.textContent = "Select number of the room";
    } else {
        num_error.textContent = "";
    }



});
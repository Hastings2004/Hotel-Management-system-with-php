let fname = document.getElementById("fname");

let lname = document.getElementById("lname");

let email = document.getElementById("email");

let password = document.getElementById("password");

let cpassword = document.getElementById("cpassword");

let fname_error = document.getElementById("fname_error1");

let lname_error = document.getElementById("lname_error1");

let email_error = document.getElementById("email_error1");

let pass_error1 = document.getElementById("pass_error1");

let cpass_error1 = document.getElementById("cpass_error1");

let form = document.getElementById("form");

let email_pattern = /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;

let name_pattern = /^[A-Za-z]{3,20}$/;

let password_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&(),.:{}|<>]).{6,}$/;

form.addEventListener('submit',(e)=>{
    if(fname.value === ""){
        e.preventDefault();
        fname_error.textContent = "First name is required";
    }else{
        if(!fname.value.match(name_pattern)){
            e.preventDefault();
            fname_error.textContent = "Please use only letters";
        }
        else{
            fname_error.textContent = "";
        }
    }
    if(lname.value === ""){
        e.preventDefault();
        lname_error.textContent = "Last name is required";
    }else{
        if(!lname.value.match(name_pattern)){
            e.preventDefault();
            lname_error.textContent = "Please use only letters";
        }
        else{
            lname_error.textContent = "";
        }
    }
    if(email.value === ""){
        e.preventDefault();
        email_error.textContent = "Email is required";
    }else{
        if(!email.value.match(email_pattern)){
            e.preventDefault();
            email_error.textContent = "Please use valid email";
        }
        else{
            email_error.textContent = "";
        }
    }
    if(password.value === ""){
        e.preventDefault();
        pass_error1.textContent = "Password is required";
    }else{
        if(password.value.length < 6){
            e.preventDefault();
            pass_error1.textContent = "Please enter at least six characters";
        }else if(!password.value.match(password_pattern)){
            e.preventDefault();
            pass_error1.textContent = "Create strong password";
        }
        else{
            pass_error1.textContent = "";
        }
    }
    if(cpassword.value === ""){
        e.preventDefault();
        cpass_error1.textContent = "Password is required";
    }else{
        if(password.value !== cpassword.value){
              e.preventDefault();
            cpass_error1.textContent = "Password does not match";
        }else{
            cpass_error1.textContent = "";
        }
    }
});
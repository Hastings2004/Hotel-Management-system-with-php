let login_form = document.getElementById("form");

login_form.addEventListener('submit', (e) => {
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let email_msg = document.getElementById("email_msg");
    let pass_msg = document.getElementById("pass_msg");
    let pass1_msg = document.getElementById("pass1_msg");

    if (email.value === "") {
        e.preventDefault();
        email_msg.textContent = " email is required";

    } else {
        email_msg.textContent = "";
    }
    if (password.value === "") {
        e.preventDefault();
        pass_msg.textContent = " password is required";

    } else if (password.value.length < 6) {
        pass_msg.textContent = "";
        e.preventDefault();
        pass1_msg.textContent = "enter at leat six characters";

    }
});
console.log('start')
// fildes to retarive sign in data from form
let formValidSignIn = document.getElementById("login_form");
let email = document.getElementById("log_in_email");
let password = document.getElementById("log_in_password");

//  fields to insert  error messages
let emailRequired = document.getElementById("emailRequired");
let passwordRequired = document.getElementById("passwordRequired");

// Regex rules
let emailRegExp = /[a-z0-9\._%+!$&*=^|~#%'`?{}/\-]+@([a-z0-9\-]+\.){1,}([a-z]{2,16})/i;
let passwordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}$/;

//arrays for  sign in data and error messages
let formFieldsSignIn = [email, password];
let formFieldsSignInRequired = [emailRequired, passwordRequired];
// array for error messahges
let formFieldsNamesSigIn = ["Email", "Mot de passe"];

//reset error mesages on submit
formValidSignIn.addEventListener("click", function resetMessage(submit) {
    for (let i = 0; i < formFieldsNamesSigIn.length; i++) {
        formFieldsSignInRequired[i].textContent = "";
        console.log("reset");
    }
});
// form validation
formValidSignIn.addEventListener("click", function validate(submit) {

    // regex validation results
    let emailResult = emailRegExp.test(email.value);
    let passwordResult = passwordRegExp.test(password.value);

    // array of regex validation results
    let formRegExp = [emailResult, passwordResult];


    for (let i = 0; i < formFieldsNamesSigIn.length; i++) {
        if (formFieldsSignIn[i].value === "") {
            formFieldsSignInRequired[i].textContent = formFieldsNamesSigIn[i] + " manquant";

            submit.preventDefault();
        } else if (formRegExp[i] === false) {
            formFieldsSignInRequired[i].textContent = formFieldsNamesSigIn[i] + " n'est pas conforme"
            submit.preventDefault();
        }
        formFieldsSignInRequired[i].style.color = "red";
    }
});
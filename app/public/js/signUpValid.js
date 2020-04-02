// fildes to retarive sign in data from form
let formValidSignUp = document.getElementById("signup_button");
let name = document.getElementById("sign_up_name");
let surname = document.getElementById("sign_up_surname");
let emailUp = document.getElementById("sign_up_email");
let passwordUp = document.getElementById("sign_up_password");
let confirmPassword = document.getElementById("sign_up_password_ confirm");

//  fields to insert  error messages
let nameRequired = document.getElementById("nameRequired");
let surnameRequired = document.getElementById("surnameRequired");
let emailUpRequired = document.getElementById("upEmailRequired");
let passwordUpRequired = document.getElementById("upPasswordRequired");
let passwordUpConfirmRequired = document.getElementById("upPasswordConfirmRequired");

// Regex rules
let nameRegExp = /(^[A-Z][a-zà-öø-ÿ]+) ?-?([A-Z][a-zà-öø-ÿ]+)? ?-?([A-Z][a-zà-öø-ÿ]+)?$/
let surnameRegExp = /(^[A-Z][a-zà-öø-ÿ]+) ?-?([A-Z][a-zà-öø-ÿ]+)? ?-?([A-Z][a-zà-öø-ÿ]+)?$/
let emailUpRegExp = /[a-z0-9\._%+!$&*=^|~#%'`?{}/\-]+@([a-z0-9\-]+\.){1,}([a-z]{2,16})/i;
let passwordUpRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}$/;

//arrays for sign up data and error messages
let formFieldsSignUp = [name, surname, emailUp, passwordUp];
let formFieldsSignUpRequired = [nameRequired, surnameRequired, emailUpRequired, passwordUpRequired];

// array for error messahges
let formFieldsNamesSigUp = ["Prenom", "Nom", "Email", "Mot de passe"];


//reset error mesages on submit
formValidSignUp.addEventListener("click", function resetMessage() {
    for (let i = 0; i < formFieldsNamesSigUp.length; i++) {
        formFieldsSignUpRequired[i].textContent = "";
    }
});
// form validation
formValidSignUp.addEventListener("click", function validate(event) {
    console.log('valid')
    // regex validation results
    let nameResult = nameRegExp.test(name.value);
    let surnameResult = surnameRegExp.test(surname.value);
    let emailUpResult = emailUpRegExp.test(emailUp.value);
    let passwordUpResult = passwordUpRegExp.test(passwordUp.value);

    // array of regex validation results
    let formRegExpUp = [nameResult, surnameResult, emailUpResult, passwordUpResult];

    // checkind  empty form fields  and input formats
    for (let i = 0; i < formFieldsNamesSigUp.length; i++) {
        if (formFieldsSignUp[i].value === "") {
            console.log('empty')
            formFieldsSignUpRequired[i].textContent = formFieldsNamesSigUp[i] + " manquant";
            event.stopImmediatePropagation();

        } else if (formRegExpUp[i] == false) {
            console.log('false')
            formFieldsSignUpRequired[i].textContent = formFieldsNamesSigUp[i] + " n'est pas conforme"
            event.stopImmediatePropagation();
        }
    }
    if (passwordUp.value != confirmPassword.value) {
        console.log(passwordUp.value);
        console.log(confirmPassword.value);
        passwordUpConfirmRequired.textContent = "La confirmation du mot de passe ne correspond pas !"
        click.stopImmediatePropagation();
    }
});
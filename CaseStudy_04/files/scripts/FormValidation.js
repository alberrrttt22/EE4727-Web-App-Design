function validateName(){
    var name = document.getElementById("name").value.trim();
    var nameError = document.getElementById("name-error");
    var nameRegex = /^[A-Za-z]+(?:\s+[A-Za-z]+)*$/;
    if (name === ""){
        nameError.textContent = "Name cannot be empty.";
        return false;
    }
    if (!nameRegex.test(name)){
        nameError.textContent = "Please input a valid name.";
        return false;
    }
    else {
        nameError.textContent =""
        return true;
    }
    
}

function validateEmail(){
    var email = document.getElementById("email").value.trim();
    var emailError = document.getElementById("email-error");
    var emailRegex = /^[\w.-]+@[a-zA-Z\d]+\.[a-zA-Z]{2,3}(?:\.[a-zA-Z]{2,3}){0,3}$/i;
    if (email === ""){
        emailError.textContent = "Email cannot be empty.";
        return false;
    }
    if (!emailRegex.test(email)){
        emailError.textContent = "Please input a valid email.";
        return false;
    }
    else {
        emailError.textContent =""
        return true;
    }
    
}

function validateStartDate() {
    var startDateValue = document.getElementById("start-date").value;
    var startError = document.getElementById("start-error");
    var startDate = new Date(startDateValue);
    console.log(startDate);
    var currentDate = new Date();
    console.log(currentDate.getDate())
    console.log(startDate.getDate())
    

    if (startDate < currentDate){
        startError.textContent = "Start date cannot be from the past."
        return false;
    }
    
    if (startDate.getDate() === currentDate.getDate()){
        startError.textContent = "Start date cannot be today."
        return false;
    }
    else{
        startError.textContent = "";
        return true
    }
}

function validateExperience(){
    var exp = document.getElementById("experience").value.trim();
    var expError = document.getElementById("exp-error")
    if (exp === ""){
        expError.textContent = "Experience cannot be empty."
        return false
    }
    else{
        expError.textContent = ""
        return true
    }
}



document.getElementById("name").addEventListener("input", validateName);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("start-date").addEventListener("input", validateStartDate);
document.getElementById("experience").addEventListener("input", validateExperience);

document.getElementById("jobs-form").addEventListener("submit", function(event){
    var isNameValid = validateName();
    var isEmailValid = validateEmail();
    var isStartDateValid = validateStartDate();
    var isExperienceValid = validateExperience();

    //Prevent form submission if any validation fails

    if (!isNameValid || !isEmailValid || !isStartDateValid || !isExperienceValid) {
        event.preventDefault();  // Stop form submission
        alert("Please fix the error message(s)")
    }
})
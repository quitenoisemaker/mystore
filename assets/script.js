const form= document.getElementById('form');
const fname= document.getElementById('fname');
const lname= document.getElementById('lname');
const email= document.getElementById('email');
const phone= document.getElementById('phone');
// const password2= document.getElementById('password2');


// function to show input error message

function showError(input, message) {
    const formControl = input.parentElement;// getting the parent element(i.e div)
    formControl.className= 'form-control error'; //adding the class error
    const small = formControl.querySelector('small'); /// querySelector to get HTML tag small
    small.innerText=message;
}

// function to show input success message

function showSuccess(input) {
    const formControl = input.parentElement;// getting the parent element(i.e div)
    formControl.className= 'form-control success'; //adding the class success
    
}

//function to validate email
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


// Check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
      showSuccess(input);
    } else {
      showError(input, 'Email is not valid');
    }
  }

//check required field
function checkRequired(inputArr) {// unction to loop through an array of all input
    inputArr.forEach(function(input) {// using foreach to get each value
        if (input.value.trim() === '') {
            showError(input, `${getFieldName(input)} is required`);
        } else {
            showSuccess(input);
        }
    });
}

// Check input length
function checkLength(input, min, max) {
    if (input.value.length < min) {
      showError(
        input,
        `${getFieldName(input)} must be at least ${min} characters`
      );
    } else if (input.value.length > max) {
      showError(
        input,
        `${getFieldName(input)} must be less than ${max} characters`
      );
    } else {
      showSuccess(input);
    }
  }

  // Check passwords match
function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
      showError(input2, 'Passwords do not match');
    }
  }



//Get fieldname
function getFieldName(input) {// function to get fieldname with first character in upper case
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//Event Listeners
form.addEventListener('submit', function(e){

    e.preventDefault();// prevent the form from submitting naturally

    checkRequired([fname, lname, email, phone]);// refactoring them in array to make it cleaner

    // checkLength(username, 3, 10);
    // checkLength(password, 4, 25);
    checkEmail(email);
    // checkPasswordsMatch(password, password2);
});
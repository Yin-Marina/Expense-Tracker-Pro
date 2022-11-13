const firstName = document.getElementById("firstName");
const firstNameError = document.getElementById("firstNameError");

const lastName = document.getElementById("lastName");
const lastNameError = document.getElementById("lastNameError");

const email = document.getElementById("email");
const emailError = document.getElementById("emailError");

const password = document.getElementById("password");
const passwordError = document.getElementById("passwordError");

const setErrorMessage = (element, message, display) => {
  element.innerHTML = message;
  element.style.display = display;
}

const validateFirstName = (firstName) => {
  let message = '';
  if (!firstName) {
    message = "Please enter your first name";
    setErrorMessage(firstNameError, message, 'block');
    return false;
  }

  setErrorMessage(firstNameError, message, 'none');
  return true;
}

const validateLastName = (lastName) => {
  let message = '';
  if (!lastName) {
    message = "Please enter your last name";
    setErrorMessage(lastNameError, message, 'block');
    return false;
  }

  setErrorMessage(lastNameError, message, 'none');
  return true;
}

const validateEmail = (email) => {
  let message = '';
  if (!email) {
    message = "Please enter an email address";
    setErrorMessage(emailError, message, 'block');
    return false;
  }
  const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const isValid = pattern.test(email);
  if (!isValid) {
    message = "Please enter a valid email address";
    setErrorMessage(emailError, message, 'block');
    return false;
  }

  setErrorMessage(emailError, message, 'none');
  return true;
}

const validatePassword = (password) => {
  let message = '';
  if (!password) {
    message = "Please enter a password";
    setErrorMessage(passwordError, message, 'block');
    return false;
  }
  if (password.length < 6) {
    message = "Your password must include at least 6 characters";
    setErrorMessage(passwordError, message, 'block');
    return false;
  }

  setErrorMessage(passwordError, message, 'none');
  return true;
}

// add event listeners
const fields = [
  { node: firstName, validateFunc: validateFirstName },
  { node: lastName, validateFunc: validateLastName },
  { node: email, validateFunc: validateEmail },
  { node: password, validateFunc: validatePassword }
];
fields.forEach(field => {
  if (field.node) {
    field.node.addEventListener('keyup', event => {
      field.validateFunc(field.node.value);
    });
  }
})

const validateForm = () => {
  let isValid = true;
  fields.forEach(field => {
    if (field.node && !field.validateFunc(field.node.value)) {
      isValid = false;
    }
  })
  return isValid;
}

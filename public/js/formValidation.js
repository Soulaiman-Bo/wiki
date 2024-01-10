function validateForm() {
  let isValid = true;

  // Validate Firstname
  const firstname = document.getElementById("firstname").value.trim();
  isValid = validateName(firstname, "firstname");

  //Validate Lastname
  const lastname = document.getElementById("lastname").value.trim();
  isValid = validateName(lastname, "lastname") && isValid;

  // Validate Email
  const email = document.getElementById("email").value.trim();
  isValid = validateEmail(email, "email") && isValid;

  // Validate Passwords
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmpassword").value;
  isValid = validatePassword(password, confirmPassword) && isValid;

  // Validate Title
  const title = document.getElementById("title").value.trim();
  isValid = validateLength(title, "title", 8, 30) && isValid;

  // Validate Description
  const description = document.getElementById("description").value.trim();
  isValid = validateLength(description, "description", 8, 300) && isValid;

  // Validate Profile Image
  const profileImg = document.getElementById("profile_img").value;
  isValid = validateProfileImage(profileImg, "profile_img") && isValid;

  return isValid;
}

function validateName(name, fieldName) {
  const nameRegex = /^[a-zA-Z]+$/;
  const isValidLength = name.length >= 4 && name.length <= 25;

  if (!nameRegex.test(name) || !isValidLength) {
    document.getElementById(
      `${fieldName}Error`
    ).innerHTML = `${fieldName} is required and must contain only letters (4-25 characters).`;
    return false;
  }

  return true;
}

function validateEmail(email, fieldName) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    document.getElementById(`${fieldName}Error`).innerHTML =
      "Email is required and must be a valid email address.";
    return false;
  }

  return true;
}

function validatePassword(password, confirmPassword) {
  const isValidLength = password.length >= 8 && password.length <= 50;

  if (password !== confirmPassword || !isValidLength) {
    document.getElementById(`passwordError`).innerHTML =
      "Passwords are required, must match, and be between 8 and 50 characters.";
    document.getElementById(`confirmpasswordError`).innerHTML =
      "Passwords are required, must match, and be between 8 and 50 characters.";

    return false;
  }

  return true;
}

function validateLength(value, fieldName, minLength, maxLength) {
  const isValidLength = value.length >= minLength && value.length <= maxLength;

  if (!isValidLength) {
    document.getElementById(
      `${fieldName}Error`
    ).innerHTML = `${fieldName} is required and must be between ${minLength} and ${maxLength} characters.`;
    return false;
  }

  return true;
}

function validateProfileImage(profileImg, fieldName) {
  if (!profileImg) {
    document.getElementById(`${fieldName}Error`).innerHTML =
      "Profile Image is required.";
    return false;
  }
  return true;
}

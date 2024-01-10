const form = document.getElementById("signupForm");

form.addEventListener("submit", async function (event) {
  event.preventDefault();

  if (validateForm()) {
    const formData = new FormData(this);

    try {
      const response = await fetch("/api/register", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      if(data.message == "User Registered Successfully"){
        document.getElementById('signup_btn').innerHTML = "Success"
        document.getElementById('signup_btn').classList.remove("color")
        document.getElementById('login_btn').classList.remove("hidden")
        document.getElementById('signup_btn').classList.add("color_success") 
        this.reset();

        setTimeout(()=> {
            document.getElementById('signup_btn').innerHTML = "Sign up"
            document.getElementById('signup_btn').classList.remove("color_success")
            document.getElementById('signup_btn').classList.add("color") 
        }, 2000)
        }

    } catch (error) {

      console.error("Error during fetch:", error);
    }
  }
});

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

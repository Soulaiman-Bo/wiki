const form = document.getElementById("loginForm");

form.addEventListener("submit", async function (event) {
  event.preventDefault();

  if (validateForm()) {
    const formData = new FormData(this);

    console.log(formData);

    try {
      const response = await fetch("/api/login", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      if(data.login == "log in successfull"){
        // document.getElementById('signup_btn').innerHTML = "Success"
        // document.getElementById('signup_btn').classList.remove("color")
        // document.getElementById('login_btn').classList.remove("hidden")
        // document.getElementById('signup_btn').classList.add("color_success") 
        this.reset();
        window.location.href = "./";

        // setTimeout(()=> {
        //     document.getElementById('signup_btn').innerHTML = "Sign up"
        //     document.getElementById('signup_btn').classList.remove("color_success")
        //     document.getElementById('signup_btn').classList.add("color") 
        // }, 2000)
        }

    } catch (error) {

      console.error("Error during fetch:", error);
    }
  }

});



function validateForm() {


  let isValid = true;


  const email = document.getElementById("email").value.trim();
  isValid = validateEmail(email, "email") && isValid;


//   const password = document.getElementById("password").value;
//   const confirmPassword = document.getElementById("confirmpassword").value;
//   isValid = validatePassword(password, confirmPassword) && isValid;



  return isValid;


}



const updateCategoryForm = document.getElementById("updateCategoryForm");
const addCategoryForm = document.getElementById("addCategoryForm");
const deleteCategoryForm = document.querySelectorAll("deleteCategoryForm");

updateCategoryForm.addEventListener("submit", async function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  let formMethod = updateForm.method;
  let formAction = updateForm.action;

  console.log(formData);


  try {
    const response = await fetch(formAction, {
      method: formMethod,
      body: formData,
    });

    const data = await response.json();

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    if (data.message == "Category Updated Successfully") {
      this.reset();
      window.location.href = "./categories";
    }
  } catch (error) {
    console.error("Error during fetch:", error);
  }


});

addCategoryForm.addEventListener("submit", async function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  let formMethod = addCategoryForm.method;
  let formAction = addCategoryForm.action;

  console.log(formAction);

  try {
    const response = await fetch(formAction, {
      method: formMethod,
      body: formData,
    });

    const data = await response.json();

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    if (data.message == "Category Inserted Successfully") {
      // document.getElementById('signup_btn').innerHTML = "Success"
      // document.getElementById('signup_btn').classList.remove("color")
      // document.getElementById('login_btn').classList.remove("hidden")
      // document.getElementById('signup_btn').classList.add("color_success")
      this.reset();
      window.location.href = "./tags";

      // setTimeout(()=> {
      //     document.getElementById('signup_btn').innerHTML = "Sign up"
      //     document.getElementById('signup_btn').classList.remove("color_success")
      //     document.getElementById('signup_btn').classList.add("color")
      // }, 2000)
    }
  } catch (error) {
    console.error("Error during fetch:", error);
  }
});

deleteCategoryForm.forEach((element) => {
  element.addEventListener("submit", async function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    let formMethod = "DELETE";
    let formAction = element.action;

    console.log(formMethod);

    console.log(formAction);

    try {
      const response = await fetch(formAction, {
        method: formMethod,
      });

      const data = await response.json();

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      if (data.message == "Deleted Successfully") {
        this.reset();
        window.location.href = "./tags";
      }
    } catch (error) {
      console.error("Error during fetch:", error);
    }
  });
});

function validateForm() {
  let isValid = true;

  const email = document.getElementById("email").value.trim();
  isValid = validateEmail(email, "email") && isValid;

  return isValid;
}

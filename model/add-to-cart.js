import { Ajax } from "./ajax.js";

function Add_to_cart(product_details, btn) {
  btn.innerHTML = "Adding...";
  Ajax.post(
    "model/queries/add_to_cart.php",
    JSON.stringify(product_details),
    (err, data) => {
      if (err) {
        console.log(err);
      } else {
        if (data === "login-user") {
          location.href = "login-signup-module/login.html";
        }

        if (data === "success") {
          setTimeout(() => {
            btn.innerHTML = "View In Cart";
            btn.setAttribute("id", "view-in-cart2");
          }, 1000);
        }
      }
    }
  );
}

export { Add_to_cart };

// import { Ajax } from "../../../model/ajax.js";

// const saveProduct = document.getElementById("save-product");
// const productDetails = document.getElementsByClassName("add-product-inputs");

// saveProduct.onclick = (e) => {
//   let formData = {};
//   let errors = 0;

//   // stop form from submitting automatically
//   e.preventDefault();

//   for (let detail of productDetails) {
//     // basic image box validation
//     if (detail.id === "get-image") {
//       if (detail.value === "") {
//         document.getElementById("img-preview").style.outline = "2px solid red";
//         errors++;
//       }
//     }
//     if (detail.value === "") {
//       detail.style.border = "1px solid red";
//       errors++;
//     }

//     if (errors === 0) {
//       formData[detail.name] = detail.value;
//     }
//   }

//   let product_details = `image=${formData['product_image']}&name=${formData['product_name']}&category=${formData['category']}&price=${formData['price']}&quantity=${formData['quantity']}&tag=${formData['produc_tag']}`;

//   if (formData) {
//     Ajax.post("model/add-product.php", JSON.stringify(formData), (err, data) => {
//       if (err) {
//         console.log(err);
//       } else {
//         console.log(data);
//       }
//     });
//   }
// };

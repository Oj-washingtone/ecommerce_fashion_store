import { Ajax } from "./ajax.js";
import { Add_to_cart } from "./add-to-cart.js";

const add_cart_2 = document.getElementById('add-cart-2');
const single_prod_page_quantity = document.getElementById('single-prod-page-qty');
const add_quantity = document.getElementById('add-quantity');
const reduce_quantity = document.getElementById('reduce-quantity');
let product_id = document.getElementById('s-product-id').value;
let require_prod = {
    'product_id':product_id
};

// check if product already is in database
Ajax.post('model/queries/get-single-from-cart.php', JSON.stringify(require_prod),  (err, data)=>{
    if(err){
        console.log("Invalid request");
    }else{
        if(Number(data) === 1){
            add_cart_2.removeEventListener('click', add_item_to_cart);
            add_cart_2.innerHTML = "View in Cart";
            add_cart_2.addEventListener('click', viewCartContent);
        }
    }
});

let quantity = Number(single_prod_page_quantity.value);

add_quantity.onclick = function(){
    single_prod_page_quantity.value = ++quantity;
}

reduce_quantity.onclick = function(){
    if(quantity !== 1){
        single_prod_page_quantity.value = --quantity;
    }
}



let item_added = false;

add_cart_2.addEventListener('click', add_item_to_cart);



function add_item_to_cart(){
    let quantity = single_prod_page_quantity.value;
    let size = document.getElementById('s-product-size').value;

    const product_details = {
        product_id: product_id,
        size: size,
        quantity: quantity
    }

    Add_to_cart(product_details, add_cart_2);
    item_added = true;
    if(item_added){
        // add code...
        add_cart_2.removeEventListener('click', add_item_to_cart);
    }
    add_cart_2.addEventListener('click', viewCartContent);
}



function viewCartContent(){
    window.location.href = "cart.php";
}
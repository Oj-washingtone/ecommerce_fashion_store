import { Ajax } from "./ajax.js";

const catalog = document.getElementById('my-products');

// get all products
Ajax.get("model/queries/get-products.php", (err, data)=>{
    if(err){
        console.log(err)
    }else{
        catalog.innerHTML = data;
    }
});

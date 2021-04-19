function makeChanges() {
    var productname = document.querySelector('.change-product-name').value;
    var productID = document.querySelector('.change-product-id').value;
    var productinventory = document.querySelector('.change-inventory-option').value;
    var productprice = document.querySelector('.change-price').value;
    var productdescription = document.querySelector('.productdescription').value;
 //If there is a single error in the inputs, there will be an alert notifying the user that there is an existing error
    if (/\d/.test(productname) == 1 || /\D/.test(productID) == 1 || /\D/.test(productinventory) == 1 || /\D/.test(productprice) == 1 || productdescription==""){
    const ban = document.querySelector('.changing-span1');
   //If there is a number in the product name it is invalid
    if (/\d/.test(productname) == 1) {
            console.log('Contains a number');
            ban.innerHTML = "Error! Invalid Product Name";
    }
    else {
            console.log('Does not contain a number');
            ban.innerHTML = "The new Product Name is " + productname;
    }
    //If there is a letter in the product ID it is invalid
    const ban2 = document.querySelector('.changing-span2');
    if (/\D/.test(productID) == 1) {
            console.log('Contains a letter');
            ban2.innerHTML = "Error! Invalid Product ID";
    }
    else {
            console.log('Does not contain a letter');
            ban2.innerHTML = "The new Product ID is " + productID;
    }
    //If there is a letter in the product inventory it is invalid
    const ban3 = document.querySelector('.changing-span3');
    if (/\D/.test(productinventory) == 1) {
            console.log('Contains a letter');
            ban3.innerHTML = "Error! Invalid product inventory";
    }
    else {
            console.log('Does not contain a letter');
            ban3.innerHTML = "The new Product inventory is " + productinventory;
    }
    //If there is a letter in the product price it is invalid 
    const ban4 = document.querySelector('.changing-span4');
    if (/\D/.test(productprice) == 1) {
            console.log('Contains a letter');
            ban4.innerHTML = "Error! invalid product price";
    }
    else {
            console.log('Does not contain a letter');
            ban4.innerHTML = "The new Product price is " + productprice + "$";
    }
    //If the product description is empty it is invalid
    const ban5 = document.querySelector('.changing-span5');
    if(productdescription==""){
        console.log('empty')
        ban5.innerHTML = "Error! Must enter a description"
    }
  alert("There are errors in your inputs!")
 }
else {
    const ban = document.querySelector('.changing-span1');
    if (/\d/.test(productname) == 1) {
            console.log('Contains a number');
            ban.innerHTML = "Error! Invalid Product Name";
    }
    else {
            console.log('Does not contain a number');
            ban.innerHTML = "The new Product Name is " + productname;
    }
    const ban2 = document.querySelector('.changing-span2');
    if (/\D/.test(productID) == 1) {
            console.log('Contains a letter');
            ban2.innerHTML = "Error! Invalid Product ID";
    }
    else {
            console.log('Does not contain a letter');
            ban2.innerHTML = "The new Product ID is " + productID;
    }
    const ban3 = document.querySelector('.changing-span3');
    if (/\D/.test(productinventory) == 1) {
            console.log('Contains a letter');
            ban3.innerHTML = "Error! Invalid product inventory";
    }
    else {
            console.log('Does not contain a letter');
            ban3.innerHTML = "The new Product inventory is " + productinventory;
    }
    const ban4 = document.querySelector('.changing-span4');
    if (/\D/.test(productprice) == 1) {
            console.log('Contains a letter');
            ban4.innerHTML = "Error! invalid product price";
    }
    else {
            console.log('Does not contain a letter');
            ban4.innerHTML = "The new Product price is " + productprice + "$";
    }
    const ban5 = document.querySelector('.changing-span5');
    if(productdescription==""){
        console.log('empty')
        ban5.innerHTML = "Error! Must enter a description"
    }
    
    alert("Your information has been saved")
}
    
    
}

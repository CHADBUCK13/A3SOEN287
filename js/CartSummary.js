
//Function to call all necessary functions to update cart summary
//Called when any relevant buttons are pressed on shopping cart page
function updateSummary(){
    updateSubtotal();
    updateGST();
    updateQST();
    updateTotal();
}

//Global variables to be used in update total
var summarySubtotal;
var summaryGST;
var summaryQST;
var summaryTotal;

//Update subtotal of cart summary on shopping cart page
function updateSubtotal(){
    //Get all elements that have class name subtototal 
    var prices = document.getElementsByClassName('subtotal');
    
    
    summarySubtotal = 0;

    //Loop through HTMLCollection to get displayed subtotal and add to summarySubtotal
    for(let i = 0; i < prices.length; i++)
    {
        summarySubtotal += parseFloat(prices.item(i).innerHTML);
    }

    //Change subtotal value in cart summary to calculated subtotal
    document.getElementById("cartSummarySubtotal").innerHTML = summarySubtotal.toFixed(2);
}

//Calculate GST by multiplying subtotal by 5% and display in cart summary
function updateGST(){
    summaryGST = summarySubtotal * 0.05;
    
    document.getElementById("cartSummaryGST").innerHTML = summaryGST.toFixed(2);
}

//Calculate QST by multiplying subtotal by 10% and display in cart summary
function updateQST(){
    summaryQST = summarySubtotal * 0.1;
    
    document.getElementById("cartSummaryQST").innerHTML = summaryQST.toFixed(2);
}

//Sum subtotal and taxes to get final total and display in cart summary
function updateTotal(){
    summaryTotal = summarySubtotal + summaryGST + summaryQST;

    document.getElementById("cartSummaryTotal").innerHTML = summaryTotal.toFixed(2);
}


//Get current text box value and increment by 1 when + button is clicked
function increaseValue(boxID) {
    //Try to get elements, if not found set value to 0
    try {
        var value = parseInt(document.getElementById(boxID).value, 10);
        var subtotal = parseFloat(document.getElementById('price').innerHTML);
    } catch (error) {
        value = 0;
    }
    
    //Check user input for non numbers and negative values
    if(isNaN(value) || value < 0)
    {
        value = 0;
    }

    //Increment value
    value++;

    //Set text box to new value
    document.getElementById(boxID).value = value;

    //Update subototal
    document.getElementById('subTotalID').innerHTML = (subtotal * value).toFixed(2);

    //Update cart (if not on shopping cart page, nothing will happen)
    if(typeof(updateSummary) == typeof(Function))
    {
        updateSummary();
    }
    
  }

//Get current text box value and decrement by 1 when - button is clicked
function decreaseValue(boxID) {
    //Try to get elements, if not found set value to 0
    try {
        var value = parseInt(document.getElementById(boxID).value, 10);
        var subtotal = parseFloat(document.getElementById('price').innerHTML);
    } catch (error) {
        value = 0;
    }
    
    //Check user input for non numbers and negative values
    if(isNaN(value) || value < 1)
    {
        value = 1;
    }
    
    //Decrement value
    value--;

    //Set text box to new value
    document.getElementById(boxID).value = value;

    //Update subototal
    document.getElementById('subTotalID').innerHTML = (subtotal * value).toFixed(2);

    //Update cart (if not on shopping cart page, nothing will happen)
    if(typeof(updateSummary) == typeof(Function))
    {
        updateSummary();
    }
  }
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

//adds all event listeners
function ready() {
    //adds listener to the delete buttons
    var removeUserRowButtons = document.getElementsByClassName('btn-remove')
    for (var i = 0; i < removeUserRowButtons.length; i++) {
        var button = removeUserRowButtons[i]
        button.addEventListener('click', removeUserRow)
    }

    //adds listener to the remove check boxes
    var removeCheckBoxes = document.getElementsByClassName('removeBoxes')
    for (var i = 0; i < removeCheckBoxes.length; i++) {
        var boxes = removeCheckBoxes[i];
        boxes.addEventListener('click', selectRowToBeDeleted)
    }

    //adds listener to the main delete box button (the one that deletes all selected)
    var removedCheckedRowsButton = document.getElementsByClassName('mainDeleteButton')
    removedCheckedRowsButton[0].addEventListener('click', removeCheckedRows)

    //adds listener to the checkbox that selects all rows
    var selectAllBoxes = document.getElementsByClassName("selectAll")
    selectAllBoxes[0].addEventListener('click', selectAll)

    //adds listener to the green add button
    var addChecked = document.getElementsByClassName("addCheckedRows")
    addChecked[0].addEventListener('click', addSelected)
}

//method that removes a row when one of the delete buttons is clicked
function removeUserRow(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.parentElement.remove()
}

//method that will remove all rows that are currently checked
function removeCheckedRows() {
    for (var i = 0; i < selectedRows.length; i++) {
        selectedRows[i].remove();
    }
    selectedRows = new Array;
    document.getElementsByClassName("selectAll")[0].checked = false;
}   

//
var selectedRows = []; 

//method to send specific row to be deleted when pressing delete selected button
function selectRowToBeDeleted(event) {
    var boxClicked = event.target;
    selectedRows.push(boxClicked.parentElement.parentElement)
    console.log(boxClicked.parentElement.parentElement)

    if (!event.target.checked) {
        selectedRows.pop();
        
        for (var i = 0; i < selectedRows.length; i++) {
            if (selectedRows[i] == boxClicked.parentElement.parentElement) {
                selectedRows.splice(i, 1)
            }
        }
    }
}

//method to send all rows to be deleted when pressing delete selected button
function selectAll(event) {
    var boxes = document.getElementsByClassName("removeBoxes")

    for (var i = 0; i < boxes.length; i++) {
        selectedRows.push(boxes[i].parentElement.parentElement)
        boxes[i].checked = true;
        //adds all rows to be deleted

        if (!event.target.checked) {
            selectedRows = new Array;
            //if the checkbox is unchecked then empties the array of things to be deleted
        }
    }
    
}

//adds all the selected rows at the end of the table
function addSelected(event) {
    var length = selectedRows.length;
    for (var i = 0; i < length; i++) {
        var pic = selectedRows[i].getElementsByClassName("productpic")[0].innerHTML
        var name = selectedRows[i].getElementsByClassName("productname")[0].innerHTML
        var id = selectedRows[i].getElementsByClassName("productID")[0].innerHTML
        var quantity = selectedRows[i].getElementsByClassName("productquantity")[0].innerHTML
        var price = selectedRows[i].getElementsByClassName("productprice")[0].innerHTML
        addRow(pic, name, id, quantity, price);
    }

    //adds listener to the delete buttons
    var removeUserRowButtons = document.getElementsByClassName('btn-remove')
    for (var i = 0; i < removeUserRowButtons.length; i++) {
        var button = removeUserRowButtons[i]
        button.addEventListener('click', removeUserRow)
    }

    //adds listener to the remove check boxes
    var removeCheckBoxes = document.getElementsByClassName('removeBoxes')
    for (var i = 0; i < removeCheckBoxes.length; i++) {
        var boxes = removeCheckBoxes[i];
        boxes.addEventListener('click', selectRowToBeDeleted)
        boxes.checked = false; //unchecks every box
    }
    //empties selected array so there's no duplicates
    document.getElementsByClassName("selectAll")[0].checked = false;
    selectedRows = new Array;
}

//function that handles adding all the elements of the row and creating it
function addRow(pic, name, id, quantity, price) {
    var row = document.createElement('tr')

    var rowContent = `
        <td id = "Zoro"><input type = "checkbox" value="2" class="removeBoxes"> </td>
        <td class="user-name"><h5>${pic}</h5></td>     
        <td class="user-id"><h5>${name}</h5></td>
        <td class="user-email"><h5>${id}</h5></td>
        <td class="user-country"><h5>${quantity}</h5></td>
        <td class="user-city"><h5>${price}</h5></td>
        <td id = "rightmargin"><form><a href = "Backstore(p2).html"><button  type = "button" id = "edit" >Edit</button></a>
            <button type = "button" id = "delete" class = "btn-remove">Delete</button></form></td>
    `

    row.innerHTML = rowContent;
    var rowItems = document.getElementById("user-table")
    rowItems.append(row);
    console.log("here is row")
    console.log(row)
    selectedRows.push(row);
    
}

//make sure check are visually correct, also, finish p10 just write ...

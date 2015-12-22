/**
 * Created by Marco on 10/13/2015.
 */

function validateForm() {
    var x = document.getElementById("inputID").value;
    var y = document.getElementById("pwd").value;
    var idPattern = /^\d{9}$/;
    if(idPattern.test(x)){
        if(y != ""){
            return true;
        }
        else{
            alert("Password is Empty");
            return false;
        }
        return false;
    }
    else{
        alert("please enter the correct student ID");
        return false;
    }
}

function validateNewItemForm(){
    var x = document.getElementById("fTitle").value;
    var y = document.getElementById("sel1").value;
    var z = document.getElementById("fDate").value;
    var idPattern = /^(\d{2})\.(\d{2})\.(\d{4}) (\d{2}):(\d{2}):(\d{2})$/;
    if(x!="" && y!= "" && idPattern.test(z)){
        return true;
    }
    else{
        var out = document.getElementById("output");
        out.innerHTML = "Input is not valid, please enter again";
        return false;
    }
}

function validateNewUserForm() {

    var x = document.getElementById("inputID").value;
    var pwd = document.getElementById("pwd").value;
    var rePwd = document.getElementById("rePwd").value;
    var firstName = document.getElementById("fName").value;
    var lastName = document.getElementById("lName").value;
    var idPattern = /^\d{9}$/;
    var namePattern = /^[a-zA-Z]+$/;
    var output = document.getElementById("output-area");

    if(idPattern.test(x)){
        if (pwd == "" || rePwd == ""){
            output.innerHTML="Password is empty";
            return false;
        }
        else{
            if(pwd != rePwd){

                output.innerHTML= "Password does not match";
                return false;
            }
            else{
                if (namePattern.test(firstName) && namePattern.test(lastName)) {
                    return true;
                }
                else {
                    output.innerHTML = "Error: name is not legit";
                    return false;
                }
            }
        }
    }
    else{
        alert("please enter the correct student ID");
        return false;
    }


}

function setColor(){

    // generate a random color for the background
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }

    alert("New color is: "+ color);

    var temp = document.getElementById("allContents");
    temp.style.backgroundColor = color;

    // get all the child buttons
    var buttonsArray = document.getElementsByClassName("childButtons");

    // disable all the child buttons
    for(var i=0; i<buttonsArray.length; i++)
    {
        buttonsArray[i].disabled = true;
    }

//    generate a random color for the contents

    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    var contentsArray = document.getElementsByClassName("contents");
    for(var i=0; i<contentsArray.length; i++)
    {
        contentsArray[i].setAttribute("color", color);
    }

}

function myFunction() {
    var x = document.createElement("BUTTON");
    //var t = document.createTextNode("New Color");
    //t.setAttribute("type", "button");
    //x.setAttribute("value", "New Color");
    x.innerHTML = "New Color!";
    x.setAttribute("class", "childButtons");
    x.setAttribute("onclick", "setColor();");
    x.disabled = false;


    //button_element.setAttribute('onclick','doSomething();'); // for FF
    //x.onclick = function() {setColor();}; // for IE

    //x.appendChild(t);
    var test = document.getElementById("messageBar");
    test.appendChild(x);
}

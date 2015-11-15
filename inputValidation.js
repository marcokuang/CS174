/**
 * Created by Marco on 10/13/2015.
 */

function validateForm() {

    var x = document.getElementById("inputID").value;

    var idPattern = /^\d{9}$/;

    if(idPattern.test(x)){

        return true;

    }
    else{
        alert("please enter the correct student ID");
        return false;
    }


}

function validateNewUserForm() {

    var x = document.getElementById("inputID").value;
    var pwd = document.getElementById("pwd").value;
    var rePwd = document.getElementById("rePwd").value;
    var idPattern = /^\d{9}$/;

    if(idPattern.test(x)){
        //alert("hello correct");
        //return true;
        if (pwd == "" || rePwd == ""){
            alert("Password is empty");
            return false;
        }
        else{
            if(pwd != rePwd){
                alert("Password does not match");
                return false;
            }
            else{
                return true;
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

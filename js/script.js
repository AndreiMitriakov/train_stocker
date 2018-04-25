function initAjax(button, data) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert('4');
            //&& this.status == 200
            document.getElementById("ajax").innerHTML =
                this.responseText;
        }
        if (this.readyState == 3) {
            alert('3');
        }
        if (this.readyState == 2) {
            alert('2');
        }
        if (this.readyState == 1) {
            alert('1');
        }
        if (this.readyState == 0) {
            alert('0');
        }
    };
    xhttp.open("POST", "/major/ajax", true);
    //Send the proper header information along with the request
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //alert(xhttp.readyState);

    str = str.toString();
    xhttp.send('send');
    document.getElementById("ajax").innerHTML = xhttp.responseText;
}
function changeText(item) {
    if(document.getElementById(item).innerText == 'Ready'){
        document.getElementById(item).innerText = 'Changed';
    }
    else{
        document.getElementById(item).innerText = 'Ready';
    }
}
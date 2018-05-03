function changeText(item) {
    if(document.getElementById(item).innerText == 'Ready'){
        document.getElementById(item).innerText = 'Changed';
    }
    else{
        document.getElementById(item).innerText = 'Ready';
    }
}

function getRandomColor() {
    var hex = '#';
    for(var i=0; i<6; i++){
        hex += '0123456789ABCDEF'.charAt(Math.floor(Math.random()*16));
    }
    return hex;
}

function changeColor(num) {
    var element = document.getElementById(num.toString());
    element.style.background = getRandomColor();
}

function sendCommand( controller, action, id, data){
    var xhttp = new XMLHttpRequest();
    xhttp.withCredentials = true;
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    var address = "/"+controller+"/"+action;
    xhttp.open("POST", address, true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//x-www-form-urlencoded
    var toSend= id+'='+data;
    xhttp.send(encodeURI(toSend));

}

function sendCommandjQuery( controller, action, data1, data2){
    var address = "/"+controller+"/"+action;
    var toSend = {};
    toSend[data1] = data2;
     $.ajax({method: "POST",
         url: address,
         data: toSend
     });
}

function change_role_user(id_user){
    var elements = document.getElementsByClassName('2');
    for (var i = 0; i<elements.length; i++){
        var item = "echo \""+id_user+"\";";
        if(elements.item(i).parentNode.id == item){
            if(elements.item(i).innerHTML == 'user'){

                sendCommandjQuery('user','change_role','id',id_user);

                elements.item(i).innerHTML = 'editor';
            }
            else if(elements.item(i).innerHTML == 'editor'){
                sendCommandjQuery('user','change_role','id',id_user);
                elements.item(i).innerHTML = 'user';
            }
        }
    }
}

function delete_user(id_user){
    var item = "echo \""+id_user+"\";";
    sendCommandjQuery('user','delete_user','id',id_user);
    document.getElementById(item).remove();
}

function update_link(id_link){
    var elements = document.getElementsByClassName('3');
    for (var i = 0; i<elements.length; i++){
        var item = "echo \""+id_link+"\";";
        if(elements.item(i).parentNode.id == item){
            if(elements.item(i).innerHTML == 'public'){

                sendCommand('link','update_link','update',id_link);
                elements.item(i).innerHTML = 'private';
            }
            else{

                sendCommand('link','update_link','update',id_link);
                elements.item(i).innerHTML = 'public';
            }
        }
    }
    //location.replace("/link/update_link");
}

function delete_link(id_link){
    var item = "echo \""+id_link+"\";";
    sendCommand('link','delete_link','id_link',id_link);
    document.getElementById(item).remove();
}
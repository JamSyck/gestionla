//*SOLO LETRAS*\\
function sololetras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    letras=" abcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial==true;break;
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

//*SOLO NUMEROS*\\
function solonumeros(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    letras=" 1234567890";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial==true;break;
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function crear(e){
    const name = document.getElementById("name").value;
    const pass = document.getElementById("pass").value;
    var alert1 = document.getElementById("alert-name");
    var alert2 = document.getElementById("alert-pass");

    if(name.length<6){
        alert1.style.display="block";
        return false;
    }
    if(pass.length<6){
        alert2.style.display="block";
        return false;
    }
}
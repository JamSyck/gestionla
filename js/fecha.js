function mostrar_fecha(){

    var hoy = new Intl.DateTimeFormat('es-CO',{month:'long'}).format(new Date());
    var fecha = new Date();
    var meridim = fecha.toLocaleTimeString('es-CO');
    var dia = fecha.getDay();
    var año = fecha.getFullYear();

    document.getElementById("fecha").innerHTML = hoy+'/'+dia+'/'+año+' - '+meridim;
}   
window.onload = function(){
    setInterval(mostrar_fecha,1000);
}
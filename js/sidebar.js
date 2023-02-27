const btn1 = document.getElementById("btn-menu");
const sb = document.getElementById("menu");
const btn2 = document.getElementById("btn-close");

btn1.addEventListener('click',function(){
    menu.style.left="0";
})
btn2.addEventListener('click',function(){
    menu.style.left="-180px";
})
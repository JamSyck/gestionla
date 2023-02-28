const open = document.getElementById("active");
const modal = document.getElementById("modal");
const close = document.getElementById("close");

open.addEventListener('click',function(){
    modal.style.transform="scale(1)";
    modal.style.visibility="visible";
    modal.style.opacity="1";
});
close.addEventListener('click',function(){
    modal.style.transform="scale(0.3)";
    modal.style.visibility="hidden";
    modal.style.opacity="0";
});
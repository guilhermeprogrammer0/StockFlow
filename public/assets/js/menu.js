document.addEventListener('DOMContentLoaded', () => {
let btnMenu = document.getElementById("btnMenu");
let menu_ativo = document.getElementById("menu-ativo");
btnMenu.addEventListener('click',()=>{
    menu_ativo.classList.toggle('ativo');
    if(btnMenu.classList.contains('fa-bars')){
        btnMenu.classList.remove('fa-bars')
        btnMenu.classList.add("fa-xmark");
    }
    else{
        btnMenu.classList.add('fa-bars')
        btnMenu.classList.remove("fa-xmark");
    }
})
});

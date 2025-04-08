document.addEventListener('DOMContentLoaded', () => {
let btn_senha = document.getElementById("btn_senha");
let senhas = document.querySelectorAll(".senha");
btn_senha.addEventListener("click",()=>{
    senhas.forEach((s)=>{
        if(s.type == 'password'){
            s.type = 'text'
            btn_senha.classList.add('fa-eye-slash');
            btn_senha.classList.remove('fa-eye');

        }
        else{
            s.type = 'password'
            btn_senha.classList.remove('fa-eye-slash');
            btn_senha.classList.add('fa-eye');
        }
    })
})

});



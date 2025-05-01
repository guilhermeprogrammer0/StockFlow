let tipo_movimentacao = document.querySelector("#tipo");
let fornecedor = document.querySelector("#fornecedor");
fornecedor.disabled = true;
fornecedor.classList.add('text-red-300');
tipo_movimentacao.addEventListener('change',()=>{
    if(tipo_movimentacao.value === 'entrada'){
        fornecedor.disabled = false;
        fornecedor.classList.remove('text-red-300');
    }
    else{
        fornecedor.disabled = true;
        fornecedor.classList.add('text-red-300');
    }
});



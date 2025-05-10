let div_fornecedor = document.querySelector("#div-fornecedor");
let div_cliente = document.querySelector("#div-cliente");
let cliente = document.querySelector("#cliente");
let tipo_movimentacao = document.querySelector("#tipo");

tipo_movimentacao.addEventListener('change',()=>{
    if(tipo_movimentacao.value === 'entrada'){
        div_fornecedor.classList.remove('hidden');
        div_cliente.classList.add('hidden');

    }
    else if(tipo_movimentacao.value === 'saida'){
        div_fornecedor.classList.add('hidden');
        div_cliente.classList.remove('hidden');
    }
    else{
        div_fornecedor.classList.add('hidden');
        div_cliente.classList.add('hidden');
    }
});



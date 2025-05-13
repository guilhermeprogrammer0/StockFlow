<x-main-layout titulo="Movimentações" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>  
         <div class="lista_usuarios overflow-x-auto"> 
            <livewire:form-tipo-movimentacao />
        </div>
        </x-area-component>
        
    </main>
    <script src="{{asset('assets/js/modal.js')}}"></script>
</x-main-layout>
$(document).ready(function(){
    $('.categoria').click(function(e){
        e.preventDefault()
        $('#conteudo').empty()
        $('#conteudo').lead('src/categorias/visao/list-categoria.html')
    })
})
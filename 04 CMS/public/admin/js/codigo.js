$(document).ready(function(){ //cuando el html este listo aplica la sigte funcion
    $('.delete_link').on('click', function(){ //en la clase delete_link cuando hago click haz funcion
        //console.log("hiciste click");
        const id = $(this).attr('rel'); //para llamar el atributo rel del portafolioController y manipularlo por su ID
        const titulo = $(this).attr('titulo');
        const action = $(this).attr('action');
        const table = $(this).attr('table');
        const param = $(this).attr('param');
        const delete_url = `index.php?${table}&${param}=${id}`;
        $('.titleDelete').html(titulo);
        $('.bodyDelete').html('¿Estas seguro de ejecutar esta acción?');
        $('.btn_delete_link').attr('href', delete_url);
        const btn = document.querySelector('.btn_delete_link');
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-danger');
        btn.textContent = action;
        $('#deleteModal').modal('show');
    })
});
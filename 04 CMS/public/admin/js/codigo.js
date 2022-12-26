$(document).ready(function(){ //cuando el html este listo aplica la sigte funcion
    $('.delete_link').on('click', function(){ //en la clase delete_link cuando hago click haz funcion
        //console.log("hiciste click");
        const id = $(this).attr('rel'); //para llamar el atributo rel del portafolioController y manipularlo por su ID
        const delete_url = `index.php?portafolio&delete=${id}`;
        $('.titleDelete').html('Desacativar Items');
        $('.bodyDelete').html('¿Estas seguro de eliminar este item?');
        $('.btn_delete_link').attr('href', delete_url);
        const btn = document.querySelector('.btn_delete_link');
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-danger');
        btn.textContent = 'Desactivar';
        $('#deleteModal').modal('show');
    })
});
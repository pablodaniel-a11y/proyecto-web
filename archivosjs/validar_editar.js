const formulario = document.getElementById('form_edit');

formulario.addEventListener('submit', (evento) => {
    const nombre_editado=document.getElementById('nom_mat').value.trim();
    const fecha_editada=document.getElementById('fech_mat').value.trim();
    const contiene_mensaje=document.getElementById('mensaje_editar');

    if(nombre_editado === "" || fecha_editada === ""){
        evento.preventDefault();
        contiene_mensaje.textContent ="Completar el Nombre y la Fecha de la Materia";
        contiene_mensaje.style.display='block';
    }
});
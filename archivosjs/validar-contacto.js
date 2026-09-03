const formulario= document.getElementById('form-contacto-js');

formulario.addEventListener('submit', (evento) => {
    const nombre_contacto = document.getElementById('nombre').value.trim();
    const apellido_contacto = document.getElementById('apellido').value.trim();
    const email_contacto = document.getElementById('contacto').value.trim();
    const contenido = document.getElementById('comentario').value.trim();
    const contiene_mensaje_contacto =document.getElementById('mensaje_contacto');

    const regeEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(nombre_contacto === "" || apellido_contacto === "" || email_contacto === "" || contenido === ""){
        evento.preventDefault();
        contiene_mensaje_contacto.textContent = "Completar todos los Campos del formulario";
        contiene_mensaje_contacto.style.display = 'block';
    }else{
        if(!regeEmail.test(email_contacto)){
            evento.preventDefault();
            contiene_mensaje_contacto.textContent = "El formato del email no es válido.";
            contiene_mensaje_contacto.style.display = 'block';
        }
    }
});
<article id="cont">
    <h3> Enviar Mensaje</h3>
    <p> Puedes hablerme en <span>pp159723@gmail.com</span> para comunicarnos </p>
    <br>
    <form action="../public/index.php?action=enviarcontacto" method="post">
        <label for="nombre"> Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresar Nombre" />
        <br><label for="apellido"> Apellido: </label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingresar Apellido" />
        <br><label for="contacto"> Contacto: </label>
        <input type="text" id="contacto" name="contacto" placeholder="Ingresar contacto" />
        <br><label for="comentario"> Comentario: </label>
        <br><textarea cols="50" rows="10" id="comentario" name="comentario" placeholder="ingresar comentario"></textarea>
        <br><button type="submit"> Enviar Mensaje</button>
        <button type="reset"> Borrar Mensaje</button>
    </form>
</article>
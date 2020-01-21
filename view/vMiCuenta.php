<form action="../index.php?pagina=editar" method="POST" enctype="multipart/form-data" name="Formulario">
    <label for="usuario">usuario</label>
    <input type="text" name="usuario" id="codUsuario" disabled value="<?php echo $_SESSION['datos'][0]?>">
    <input type="hidden" name="usuario2" id="usuario2" value="<?php echo $_SESSION['datos'][0]?>">
    <label for="desc">Descipcion usuario</label>
    <input type="text" name="desc" id="desc" value="<?php echo $_SESSION['datos'][1]?>">
    <input type="submit" value="Enviar" name="Enviar">
    <input type="button" onclick="location='cambiarContraseña.php'" value="Cambiar Contraseña">
    <input type="button" onclick="location='../index.php?pagina=inicio'" value="Atras">
    <input type="button" onclick="location='eliminarUsuario.php'" value="Borrar Usuario">
</form>


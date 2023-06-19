<?php 
//El código html no se envía al cliente, sino que se guarda en memoria
ob_start();
?>   
    <section class="cont">
        <form action="index.php?action=insertarPokemon" method="post" enctype="multipart/form-data" class="formdatper">
            <label>Foto:</label><input type="file" name="foto" class="campoent" accept=".gif, .jpg, .png, .webp">
            <br>
            <label>Nombre:</label><input type="text" name="nombre" class="campoent">
            <br>
            <label>Descripción:</label>
            <br>
            <textarea name="descripcion" class="campoent"></textarea>
            <br>
            <label>Categoría:</label><input type="text" name="categoria" class="campoent">
            <br>
            <input list="tipoP" name="tipoP">
            <datalist id="tipoP" class="campoent">
                <option value="1">Acero</option>
                <option value="2">Agua</option>
                <option value="3">Bicho</option>
                <option value="4">Dragón</option>
                <option value="5">Eléctrico</option>
                <option value="6">Fantasma</option>
                <option value="7">Fuego</option>
                <option value="8">Hada</option>
                <option value="9">Hielo</option>
                <option value="10">Lucha</option>
                <option value="11">Normal</option>
                <option value="12">Planta</option>
                <option value="13">Psíquico</option>
                <option value="14">Roca</option>
                <option value="15">Siniestro</option>
                <option value="16">Tierra</option>
                <option value="17">Veneno</option>
                <option value="18">Volador</option>
            </datalist>
            <br>
            <input list="tipoS" name="tipoS">
            <datalist id="tipoS" class="campoent">
                <option value=""></option>
                <option value="1">Acero</option>
                <option value="2">Agua</option>
                <option value="3">Bicho</option>
                <option value="4">Dragón</option>
                <option value="5">Eléctrico</option>
                <option value="6">Fantasma</option>
                <option value="7">Fuego</option>
                <option value="8">Hada</option>
                <option value="9">Hielo</option>
                <option value="10">Lucha</option>
                <option value="11">Normal</option>
                <option value="12">Planta</option>
                <option value="13">Psíquico</option>
                <option value="14">Roca</option>
                <option value="15">Siniestro</option>
                <option value="16">Tierra</option>
                <option value="17">Veneno</option>
                <option value="18">Volador</option>
            </datalist>
            <br>
            <label>Habilidad:</label><input type="text" name="habilidad" class="campoent">
            <br>
            <label>Habilidad Oculta:</label><input type="text" name="habilidadO" class="campoent">
            <br>
            <label>Peso:</label><input type="text" name="peso" class="campoent">kg
            <br>
            <label>Altura:</label><input type="text" name="altura" class="campoent">m
            <br>
            <label>Color:</label><input type="text" name="color" class="campoent">
            <br>
            <input list="generacion" name="generacion">
            <datalist id="generacion" class="campoent">
                <option value="Primera"></option>
                <option value="Segunda"></option>
                <option value="Tercera"></option>
                <option value="Cuarta"></option>
                <option value="Quinta"></option>
                <option value="Sexta"></option>
                <option value="Séptima"></option>
                <option value="Octava"></option>
                <option value="Novena"></option>
            </datalist>
            <br>
            <label>Huella:</label><input type="file" name="huella" class="campoent" accept=".gif, .jpg, .png, .webp">
            <br>
            <label>Grito:</label><input type="file" name="grito" class="campoent" accept="audio/*">
            <br>
            <input type="submit" value="insertar" class="enviar">
        </form>
    </section>
<?php
//Guarda todo el html en $vista
$vista =  ob_get_clean(); 

require 'vistas/plantilla.php';

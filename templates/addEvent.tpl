<form method="post" action="EventController.php" name="formAddEvent" id="formAddEvent">
    <input type="hidden" name="action" id="action" value ="saveEvent" />
    <input type="hidden" name="fecha" id="fecha" value="{$fecha}" />
    <fieldset>
        <legend>Evento</legend>
        <label style="display: inline-block; width: 80px; vertical-align: top; margin: 5px;">Nombre</label><input style="width: 180px;" type="text" name="nombre" id="nombre" />
        <label style="display: inline-block; width: 80px; vertical-align: top; margin: 5px;">Descripción </label><textarea id="descripcion" name="descripcion" rows='4' cols='20'></textarea>        
    </fieldset>    
</form>
    
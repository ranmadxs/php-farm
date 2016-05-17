
<input type="hidden" name="action" id="action" value ="saveEvent" />
<input type="hidden" name="fecha" id="fecha" value="{$fecha}" />
<fieldset>
    <legend>Evento</legend>
    <div id="formValues" style="float:left; margin: 2px;">
        <label>Tipo</label>
        <select name="evento" id="tEvento">            
            <option>[Seleccione]</option>
            {foreach from=$listEventos item=eventAux}
                <option value="{$eventAux}">{$eventAux}</option>
            {/foreach}
        </select> <br/>
        <label>Nombre</label>
        <input style="width: 160px;" type="text" name="nombre" id="nombre" /><br/>
        <label>Descripción</label> <br/>
        <textarea id="descripcion" name="descripcion" rows='13' cols='28'></textarea>        
    </div>
    <div id="image_preview" style="float:left; margin: 2px;">
        <label>Agregar Imágen</label><br/>&nbsp;
        <input type="file" name="file" id="file" /><br/>&nbsp;
        <img id="previewing" src="img/noimage.png" />
    </div>        
</fieldset>        
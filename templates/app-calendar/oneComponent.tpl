<style>    
    /* LIST #1 */
/* LIST #2 */
    #listEvent { width:320px; }
    #listEvent ol { font-style:italic; font-family:Georgia, Times, serif; font-size:24px; color:#bfe1f1; font-weight: bold; }
    #listEvent ol li { }
    #listEvent ol li p { padding:8px; font-style:normal; font-family:Arial; font-size:13px; color:#369; border-left: 1px solid #999; font-weight: normal;}
    #listEvent ol li p em { display:block; font-weight: bold;}
</style>

<h2>Eventos: {{dia}} de {{monthName}} del {{anio}}</h2>
<div id="listEvent">
    <ol>
        <li *ngFor="#calendarEvent of listEvent">
            <p><em>{{calendarEvent.nombre}}</em>{{calendarEvent.descripcion}}</p>
        </li>
    </ol>
</div>

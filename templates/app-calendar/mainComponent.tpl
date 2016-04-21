<app-calendar-menu 
    (emittMes)="setMes($event)"
    (emittAnio)="setAnio($event)" 
    (emittDia)="setDia($event)" >
    Cargando...Menu Calendar2.tpl
</app-calendar-menu>
<h1>Calendario Eventos</h1>
<nav>
      <a [routerLink]="['OneComponent', {'mes': mes, 'anio': anio, 'dia' : dia}]">Resumen</a>
      <a [routerLink]="['CalendarComponent', {'mes': mes, 'anio': anio}]">Calendario</a>   
</nav>
    
<router-outlet></router-outlet>    

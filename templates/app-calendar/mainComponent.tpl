<app-calendar-menu (emittMes)="setMesSelectedMain($event)">Cargando...Menu Calendar2.tpl</app-calendar-menu>
<h1>Calendario {{anio}}-{{mes}}-{{dia}}</h1>
<nav>
      <a [routerLink]="['OneComponent']">Resumen</a>
      <a [routerLink]="['CalendarComponent', {'mes': mes, 'anio': anio}]">Calendario</a>   
</nav>
    
<router-outlet></router-outlet>    

<h1>Component Router</h1>
<nav>
      <a [routerLink]="['OneComponent']">Componente One</a>   
      <a href="javascript:void(0);" (click)="onSelect()" >Marzo</a>
      <a [routerLink]="['CalendarComponent', {'mes': '04', 'anio': '2016'}]">Abril</a>   
</nav>
    
<router-outlet></router-outlet>    

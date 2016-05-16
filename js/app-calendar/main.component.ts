import {Component, OnInit, Input} from 'angular2/core';
import {Router, RouteConfig, ROUTER_DIRECTIVES, RouteParams} from 'angular2/router';
import {OneComponent}   from './one.component.ts';
import {CalendarComponent}     from './calendar.component.ts';
import {MenuComponent}     from './menu.component.ts';
import {Http, Headers, RequestOptions, URLSearchParams, Response, HTTP_DIRECTIVES} from 'angular2/http';

@Component({
  selector: 'app-calendar-content',    
  templateUrl: './templates/app-calendar/mainComponent.tpl'
  directives: [ROUTER_DIRECTIVES, MenuComponent]
})
@RouteConfig([
  {path:'/main.php/one', name: 'OneComponent', component: OneComponent, useAsDefault: true},
  {path:'/main.php/calendar', name: 'CalendarComponent', component: CalendarComponent, data: {var1: 'valor1'}}
])
export class MainComponent { 
  
  public dia : numeric = null;    
  public mes : numeric = null;  
  public anio : numeric = null;  

  constructor(private _router: Router) {
        var date = new Date(); 
        this.mes = date.getMonth()+1;
        this.anio = date.getFullYear();  
        this.dia = date.getDate();
  }

  setMes(mes : numeric){
      this.mes = mes;
  }

  setAnio(anio : numeric){
      this.anio = anio;
  }

  setDia(dia : numeric){
      this.dia = dia;
  }

  
  onSelect() {
    this._router.navigate( ['CalendarComponent', { 'mes': '03' , 'anio' : '2016'}] );
  }
}

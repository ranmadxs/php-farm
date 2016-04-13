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
  {path:'/one', name: 'OneComponent', component: OneComponent, useAsDefault: true},
  {path:'/calendar', name: 'CalendarComponent', component: CalendarComponent, data: {var1: 'valor1'}}
])
export class MainComponent { 
  
  public dia : string = "01";    
  public mes : string = "01";  
  public anio : string = "2016";  
  constructor(private _router: Router) { }

  setMesSelectedMain(mes : string){
      this.mes = mes;
  }
  onSelect() {
    this._router.navigate( ['CalendarComponent', { 'mes': '03' , 'anio' : '2016'}] );
  }
}

import {Component, OnInit} from 'angular2/core';
import {Router, RouteConfig, ROUTER_DIRECTIVES, RouteParams} from 'angular2/router';
import {OneComponent}   from './one.component';
import {TwoComponent}     from './two.component';
import {Http, Headers, RequestOptions, URLSearchParams, Response, HTTP_DIRECTIVES} from 'angular2/http';

@Component({
  selector: 'pyfarm-menu',    
  templateUrl: './templates/app/mainComponent.tpl'
  directives: [ROUTER_DIRECTIVES]
})
@RouteConfig([
  {path:'/one', name: 'OneComponent', component: OneComponent, useAsDefault: true},
  {path:'/two', name: 'TwoComponent', component: TwoComponent, data: {var1: 'valor1'}}
])
export class AppComponent { 
  constructor(private _router: Router) { }

  onSelect() {
    this._router.navigate( ['TwoComponent', { 'mes': '03' , 'anio' : '2016'}] );
  }
}

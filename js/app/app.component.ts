import {Component} from 'angular2/core';
import {RouteConfig, ROUTER_DIRECTIVES} from 'angular2/router';
import {OneComponent}   from './one.component';
import {TwoComponent}     from './two.component';
@Component({
  selector: 'pyfarm-menu',    
  template: `    
    <h1>Component Router</h1>
    <nav>
      <a [routerLink]="['OneComponent']">One Component</a>
      <a [routerLink]="['TwoComponent']">Two Component</a>
    </nav>
    <router-outlet></router-outlet>    
  `,
  directives: [ROUTER_DIRECTIVES]
})
@RouteConfig([
  {path:'/one', name: 'OneComponent', component: OneComponent, useAsDefault: true},
  {path:'/two', name: 'TwoComponent', component: TwoComponent, data: {var1: 'valor1'}}
])
export class AppComponent { }

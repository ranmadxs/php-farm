import {Component} from 'angular2/core';
import {RouteData, ROUTER_DIRECTIVES} from 'angular2/router';

@Component({
  selector: 'pyfarm-body',
  template: `
    <h2>Componente Dos</h2>
    <p>Ejemplo componente dos</p>`
})
export class TwoComponent { 
    
    constructor(data: RouteData){
        console.log(data.get('var1'));
    }
}

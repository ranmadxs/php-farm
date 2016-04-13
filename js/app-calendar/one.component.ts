import {Component} from 'angular2/core';
import {RouteData, ROUTER_DIRECTIVES, RouteParams, routerInjectables} from 'angular2/router';
import {Http, Headers, RequestOptions, URLSearchParams, Response, HTTP_PROVIDERS} from 'angular2/http';
import 'rxjs/Rx';
import {CalendarEvent}     from './calendar.struct';

@Component({
  template: `
    <h2>One Component</h2>
    <p>Ejemplo componente uno</p>
    <ul>
        <li *ngFor="#calendarEvent of listEvent">
            <span class="badge">{{calendarEvent.id}}</span> {{calendarEvent.nombre}}
        </li>
    </ul>
     {{listEvent2}}
    `,
  providers: [HTTP_PROVIDERS]
})
export class OneComponent { 
    
   public endpoint_url : string = 'http://localhost/php-farm/rs-catalog.php';
   public listEvent : Object;
   public calendarEvent : CalendarEvent;
    
   constructor(http: Http){
       this.http = http;
       var uri = '/calendar/listaByDay/29/03/2016';
       this.result = {calendarEvent:[]};
       this.http.get(this.endpoint_url+ uri)
            .map(res => res.json())
            .subscribe(
                    data => this.listEvent = data,
                    error => this.error = "restSvc no responde"
            );        
   }
    

}

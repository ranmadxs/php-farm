import {Component, Injectable} from 'angular2/core';
import {RouteData, ROUTER_DIRECTIVES, RouteParams, routerInjectables} from 'angular2/router';
import {Http, Headers, RequestOptions, URLSearchParams, Response, HTTP_PROVIDERS} from 'angular2/http';

import 'rxjs/Rx';

@Component({
   templateUrl: (function() {
        return './templates/app-calendar/calendarComponent.tpl';
    }()),
   providers: [HTTP_PROVIDERS]
})
    
@Injectable()
export class CalendarComponent { 
    
    private endpoint_url : string = 'http://localhost/php-farm/calendar.php';
    public calendarHtml : string = null;  
    private http : Http;  
    var1 : string = null;
    mes: string = null;
    private anio: string = null;
    
    constructor(data: RouteData, params: RouteParams, http: Http){
        this.http = http;
        console.log(data.get('var1'));
        console.log(params.get('mes'));
        this.mes = params.get('mes');
        this.anio = params.get('anio');     
        this.getCalendarHtml(this.mes, this.anio);           
    }
    
    getCalendarHtml(mes : string, anio : string){
       var params: URLSearchParams = new URLSearchParams();
       params.set('mes', mes);
       params.set('anio', anio);
       this.http.get(this.endpoint_url, {search: params})
            .map(res => res.text())
            .subscribe(
                data => this.calendarHtml = data,
                error => this.error = "calendar.php no responde"
        );          
    }
    
}
import {Component} from 'angular2/core';
import {RouteData, ROUTER_DIRECTIVES, RouteParams, routerInjectables} from 'angular2/router';
import {Http, Headers, RequestOptions, URLSearchParams, Response, HTTP_PROVIDERS} from 'angular2/http';
import { TemplateCompiler } from 'angular2/src/compiler/template_compiler';
import 'rxjs/Rx';
import {CalendarEvent}     from './calendar.struct';

@Component({
  templateUrl: './templates/app-calendar/oneComponent.tpl',
  providers: [HTTP_PROVIDERS]
})
export class OneComponent { 
    public endpoint_url : string = 'http://localhost/php-farm/rs-catalog.php';
    public listEvent : Object;
    public calendarEvent : CalendarEvent;
    public dia : numeric = null;    
    public mes : numeric = null;  
    public anio : numeric = null;  
    public monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                        "Julio", "Augosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    public monthName : string = null;


   constructor(http: Http, params: RouteParams, templateCompiler: TemplateCompiler){
        templateCompiler.clearCache();
        var date = new Date(); 
        this.dia = params.get('dia');
        this.mes = params.get('mes');
        this.anio = params.get('anio');
        if(this.dia == null){
            this.dia = date.getDate();
        }
        if(this.mes == null){
            this.mes = date.getMonth()+1;
        }
        this.monthName = this.monthNames[this.mes - 1];
        if(this.anio == null){
            this.anio = date.getFullYear();
        }
        console.log(this.anio + "-" + this.mes + "-" + this.dia);
        this.http = http;
        var uri = "/calendar/listaByDay/"+this.dia+"/"+this.mes+"/"+this.anio;
        this.result = {calendarEvent:[]};
        this.http.get(this.endpoint_url+ uri)
            .map(res => res.json())
            .subscribe(
                    data => this.listEvent = data,
                    error => this.error = "restSvc no responde"
            );        
   }
    

}

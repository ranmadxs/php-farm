import {Component, Output, EventEmitter} from 'angular2/core';

interface MesObject{
    name:string;
    value:number;
}

@Component({
  selector: 'app-calendar-menu',    
  templateUrl: './templates/app-calendar/menuComponent.tpl'
})

export class MenuComponent { 
    public arrayAnio = [2015, 2016, 2017];
    public arrayMes : MesObject[];
    public arrayDia = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
    public anioSelected : numeric;
    public mesSelected : numeric ;
    public diaSelected : numeric ;
    @Output() emittMes = new EventEmitter();
    @Output() emittAnio = new EventEmitter();
    @Output() emittDia = new EventEmitter();
    public anioSelected : string;

    constructor(){
        var date = new Date();        
        this.mesSelected = date.getMonth()+1;
        this.anioSelected = date.getFullYear();
        this.diaSelected = date.getDate();
        this.llenarMeses();
    }
    
    llenarMeses(){
        this.arrayMes = [{'name':'Enero', 'value':1},{'name':'Febrero', 'value':2},{'name':'Marzo', 'value':3},
                        {'name':'Abril', 'value':4},{'name':'Mayo', 'value':5},{'name':'Junio', 'value':6}
                        {'name':'Julio', 'value':7},{'name':'Agosto', 'value':8},{'name':'Septiembre', 'value':9},
                        {'name':'Octubre', 'value':10},{'name':'Noviembre', 'value':11},{'name':'Diciembre', 'value':12}];
    }
    
    onChangeMes(mes : numeric) : void {
        this.mesSelected = mes;
        this.emittMes.next(this.mesSelected);
    }
    
    updateSelectedAnio(event:numeric): void{
        this.anioSelected = event;
        this.emittAnio.next(this.anioSelected);
    }
    
    updateSelectedDia(event:numeric): void{
        this.diaSelected = event;
        this.emittDia.next(this.diaSelected);
    }    
    
}

import {Component, Output, EventEmitter} from 'angular2/core';
@Component({
  selector: 'app-calendar-menu',    
  templateUrl: './templates/app-calendar/menuComponent.tpl'
})

export class MenuComponent { 
    public mesSelected : string = "01";
    @Output() emittMes = new EventEmitter();
    
    public anioSelected : string;

    onChangeMes(mes : string) {
        this.mesSelected = mes;
        this.emittMes.next(this.mesSelected);
    }
}

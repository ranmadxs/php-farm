import {Component} from 'angular2/core';
import {RouteData, ROUTER_DIRECTIVES} from 'angular2/router';

@Component({
   templateUrl: (function() {
        return 'http://localhost/php-farm/calendar.php';
    }())
})
export class TwoComponent { 
    
    var1 : String;
    
    constructor(data: RouteData){
        console.log(data.get('var1'));
    }
}
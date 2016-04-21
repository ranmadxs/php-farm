Revisemos ... 
<select [ngModel]="anioSelected" (change)="updateSelectedAnio($event.target.value)">
        <option *ngFor="#anio of arrayAnio" [value]=anio >{{anio}}</option>
</select>

<select [ngModel]="mesSelected" (change)="onChangeMes($event.target.value)">
        <option *ngFor="#mes of arrayMes" [value]=mes.value >{{mes.name}}</option>
</select>

<select [ngModel]="diaSelected" (change)="updateSelectedDia($event.target.value)">
        <option *ngFor="#dia of arrayDia" [value]=dia >{{dia}}</option>
</select>
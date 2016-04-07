import {MainComponent}       from './main.component';
import {MenuComponent}     from './menu.component';
import {bootstrap}          from 'angular2/platform/browser';
import {ROUTER_PROVIDERS}   from 'angular2/router';
import {HTTP_PROVIDERS}     from 'angular2/http';
bootstrap(MainComponent, [ROUTER_PROVIDERS], [HTTP_PROVIDERS]);
bootstrap(MenuComponent);

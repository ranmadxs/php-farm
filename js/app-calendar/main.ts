import {MainComponent}       from './main.component.ts';
import {MenuComponent}     from './menu.component.ts';
import {bootstrap}          from 'angular2/platform/browser';
import {ROUTER_PROVIDERS}   from 'angular2/router';
import {HTTP_PROVIDERS}     from 'angular2/http';
bootstrap(MainComponent, [ROUTER_PROVIDERS], [HTTP_PROVIDERS]);

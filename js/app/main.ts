import {AppComponent}       from './app.component';
import {IndexComponent}     from './app.index';
import {bootstrap}          from 'angular2/platform/browser';
import {ROUTER_PROVIDERS}   from 'angular2/router';
import {HTTP_PROVIDERS}     from 'angular2/http';
bootstrap(AppComponent, [ROUTER_PROVIDERS], [HTTP_PROVIDERS]);
bootstrap(IndexComponent);

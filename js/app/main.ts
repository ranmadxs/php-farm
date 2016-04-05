import {AppComponent}     from './app.component';
import {IndexComponent}     from './app.index';
import {bootstrap}        from 'angular2/platform/browser';
import {ROUTER_PROVIDERS} from 'angular2/router';
bootstrap(AppComponent, [ROUTER_PROVIDERS]);
bootstrap(IndexComponent);

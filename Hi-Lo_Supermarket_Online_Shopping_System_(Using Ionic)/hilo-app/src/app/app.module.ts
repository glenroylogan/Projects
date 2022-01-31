import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { BrowsePage } from "../pages/browse/browse";

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import {PicviewPage} from "../pages/picview/picview";
import {ViewItemPage} from "../pages/view-item/view-item";
import {CartPage} from "../pages/cart/cart";
import { Cart } from "../classes/Cart";

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    ListPage,
    BrowsePage,
    PicviewPage,
    ViewItemPage,
    CartPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    ListPage,
    BrowsePage,
    ViewItemPage,
    PicviewPage,
    CartPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    Cart,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}

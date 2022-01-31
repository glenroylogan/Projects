import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Cart } from "../../classes/Cart";

/**
 * Generated class for the CartPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-cart',
  templateUrl: 'cart.html',
})
export class CartPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, public cart: Cart) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad CartPage');
  }

  showCart(){
    this.navCtrl.push(CartPage);
  }

  getCart(){
    return this.cart;
  }


}

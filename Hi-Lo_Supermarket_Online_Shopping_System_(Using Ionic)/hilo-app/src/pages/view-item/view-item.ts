import { Component } from '@angular/core';
import {IonicPage, NavController, NavParams} from 'ionic-angular';
import {Product} from "../../classes/Product";
import {CartPage} from "../cart/cart";
import {Cart} from "../../classes/Cart";

/**
 * Generated class for the ViewItemPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */



@IonicPage()
@Component({
  selector: 'page-view-item',
  templateUrl: 'view-item.html',
})
export class ViewItemPage {

  item: Product;
  min: number = 1;
  inputValue: number = this.min;

  constructor(public navCtrl: NavController, public navParams: NavParams, public cart: Cart) {
    console.log(this.navParams.data);
    this.item = this.navParams.data;
  }

  getItem(){
    return this.item;
  }

  getInput(){
    return this.inputValue;
  }

  getCurrPrice(){
    return this.getItem().getPrice() * this.getInput();
  }

  showCart(){
    this.navCtrl.push(CartPage);
  }

  addtoCart() {
    this.getItem().item_update("b", this.getInput());
    this.cart.addItem(this.getItem());
    this.navCtrl.pop();
  }
}

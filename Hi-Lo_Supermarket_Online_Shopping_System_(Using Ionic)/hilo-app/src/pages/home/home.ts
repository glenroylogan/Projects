import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { CartPage } from "../cart/cart";
import { Cart } from "../../classes/Cart";


let avatarPath = "../../assets/imgs/items/";


  @Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  cats: Array<string> = ["Toiletries",
    "Frozen Food",
    "Meat",
    "Dry Goods",
    "Personal Care",
    "Cleaners",
    "Beverages",
    "Produce"];


  constructor(public navCtrl: NavController, public cart: Cart) {
  }

  showCart(){
    this.navCtrl.push(CartPage);
  }

  getAvatar(str: string){
    return avatarPath + str + ".jpg";
  }

}

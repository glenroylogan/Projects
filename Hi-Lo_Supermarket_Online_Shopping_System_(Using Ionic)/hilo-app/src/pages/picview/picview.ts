import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {Product} from "../../classes/Product";

/**
 * Generated class for the PicviewPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-picview',
  templateUrl: 'picview.html',
})
export class PicviewPage {

  item: Product;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    console.log(this.navParams.data);
    this.item = this.navParams.data;
  }

  getItem(){
    return this.item;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ViewItemPage');
  }

}

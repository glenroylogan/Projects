import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, PopoverController } from 'ionic-angular';
import {Product} from "../../classes/Product";
import {ViewItemPage} from "../view-item/view-item";
import {PicviewPage} from "../picview/picview";
import {CartPage} from "../cart/cart";
import {Cart} from "../../classes/Cart";

/**
 * Generated class for the BrowsePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-browse',
  templateUrl: 'browse.html',
})
export class BrowsePage {

  items: Array<Product> = [];

  constructor(public navCtrl: NavController, public navParams: NavParams, public popoverCtrl: PopoverController, public cart: Cart) {
    this.initialize();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad BrowsePage');
  }

  initialize(){

    //beverages
    this.items.push(new Product("Ting", 120, "bottle(s)", 100, 6, "Carbonated Grapefruit beverage"));
    this.items.push(new Product("Tropical Rhythms", 200, "bottle(s)", 200, 6, "Grace Fruit Juice of assorted natural Flavours"));
    this.items.push(new Product("BIGGA", 80, "bottle(s)", 100, 6, "carbonated soft drink made with many flavours"));
    this.items.push(new Product("Ribena", 150, "bottle(s)", 100, 6, "fruit drink made with black currant"));
    this.items.push(new Product("Ting(pink)", 120, "bottle(s)", 100, 6, "carbonated grapefruit flavoured drink"));
    
    //Cleaners
    this.items.push(new Product("Broom", 300, "", 100, 5, "sweep dusty and messy floors "));
    this.items.push(new Product("Feather Duster", 250, "", 100, 5, "dust furnitures and appliances"));
    this.items.push(new Product("Lizol Floor Cleaner", 180, "", 100, 5, "cleanse floor from germs and bacteria and remove stains\n"));
    this.items.push(new Product("Mop", 400, "", 100, 5, "wipe and clean floors usually when wet"));
    this.items.push(new Product("Soap Powder Ariel", 120, "", 100, 6, "used to wash clothing of any colour"));

    //Dry Snacks
    this.items.push(new Product("Big Foot", 120, "", 100, 3, "foot shaped snack made with cheddar cheese"));
    this.items.push(new Product("Butterkist Cookies", 120, "", 100, 3, "coconut flavored cookies"));
    this.items.push(new Product("Fillers Sweet Popcorn", 120, "", 100, 3, "caramel flavoured popcorn"));
    this.items.push(new Product("National Cheeztrix", 120, "", 100, 3, "caramel flavoured popcorn"));

    //Frozen Food
    this.items.push(new Product("Drumstick Ice Cream", 120, "", 100, 1, "waffle cone filled with vanilla icecream and chocolate"));
    this.items.push(new Product("Kremi Ice-cream", 120, "", 100, 1, "box of Ice cream can be in any flavour"));
    this.items.push(new Product("Reggae Jammin Jerk Beef", 120, "", 100, 1, "jerk flavoured beef burger"));

    //Meat
    this.items.push(new Product("Best Dressed Chicken Mixed Parts", 120, "", 100, 2, "cleaned and cut parts of chicken"));
    this.items.push(new Product("Chicken Grade A", 120, "", 100, 2, "best quality chicken slices"));
    this.items.push(new Product("Chicken Tenders", 120, "", 100, 2, "cleaned chicken strips"));
    this.items.push(new Product("Chicken wings", 120, "", 100, 2, "cleaned wings of chicken"));

    //Personal Care
    this.items.push(new Product("Colgate", 120, "", 100, 4, "clean the mouth teeth and tongue from germs and bacteria"));
    this.items.push(new Product("Colgate toothbrush 360", 120, "", 100, 4, "clean brush the mouth teeth and tonguee"));
    this.items.push(new Product("Jergens", 120, "", 100, 4, "used to keep the body moisturized"));
    this.items.push(new Product("Palmolive Shampoo", 120, "", 100, 4, "used to cleanse hair of any type"));

    //Produce
    this.items.push(new Product("Cabbage", 120, "", 100, 7, "leafy green vegetable imported and exported"));
    this.items.push(new Product("Carrot", 120, "", 100, 7, "root vegetable usually orange"));
    this.items.push(new Product("Ocra", 120, "", 100, 7, "green vegetable imported or exported"));
    this.items.push(new Product("Tomato", 120, "", 100, 7, "red vegetable imported or exported"));

    //Toiletries
    this.items.push(new Product("Antibacterial hand soap", 120, "", 100, 0, "used to wash hands and preventing bacteria"));
    this.items.push(new Product("Clorox Bleach", 120, "", 100, 0, "used to clean floors, tables ect. Preventing germs and bacteria"));
    this.items.push(new Product("Lysol Disinfectant Spray", 120, "", 100, 0, "help to clean, sanitize and deodorize your home and preventing germs and bacteria"));




  }

  getItems(){
    return this.items;
  }

  viewPic(item: Product){
    let popover = this.popoverCtrl.create(PicviewPage, item);
    popover.present();
  }

  viewItem(item: Product) {
    this.navCtrl.push(ViewItemPage, item);
  }

  showCart(){
    this.navCtrl.push(CartPage);
  }

}

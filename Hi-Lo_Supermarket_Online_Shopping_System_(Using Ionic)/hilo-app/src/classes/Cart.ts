import { Injectable } from "@angular/core";
import {Product} from "./Product";

@Injectable()
export class Cart{

  static contents: Array<Product> = [];

  constructor(){}

  getContents(){
    return Cart.contents;
  }

  addItem(item: Product){
    this.getContents().push(item);
  }

   removeItem(id: number){
    this.getContents().splice(Product.searchProd(id, this.getContents()), 1);
  }

   getTotal(){
    let tot = 0;
    for(let item of this.getContents()){
      tot += item.getBuyVal();
    }
    return tot;
  }

   updateItem(id: number, q: number){
    this.getContents()[Product.searchProd(id, this.getContents())].item_update("q", q);
  }

   emptyCart(){
    Cart.contents = [];
  }

   getCount(){
    return this.getContents().length;
  }

  
}


enum Category {
  Toiletries = 0,
  Frozen,
  Meat,
  Dry,
  PCare,
  Cleaners,
  Beverages,
  Produce,
}

let avatarPath = "../../assets/imgs/items/";

export class Product{

  static idnum: number =0;
  id: number;
  name: string;
  unit: string;
  unitPrice: number;
  quantity: number;
  qtoBuy: number = 0;
  category: string;
  description: string;
  avatar: string;

  constructor(name: string, unitPrice: number, unit: string, quantity: number, category: number, description: string){
    this.id = Product.nextId();
    this.name = name;
    this.unitPrice = unitPrice;
    if(unit !== ""){this.unit = unit;}else{this.unit = "Unit(s)";}
    this.category = Category[category];
    if(this.category == "PCare"){this.category = "Personal Care";}
    if(this.category == "Dry"){this.category = "Dry Goods";}
    if(this.category == "Frozen"){this.category = "Frozen Food";}
    if(this.category == "PCare"){this.category = "Personal Care";}
    this.quantity = quantity;
    this.description = description;
    this.avatar = this.genAvatar();
    //console.log(this.getAvatar());
  }

  static nextId(){
    return Product.idnum++;
  }

  static searchProd(key: number,list: Array<Product> ){
    for(let x = 0; x < list.length; x++){
      if(list[x].getId() === key){
        return x;
      }
    }
    return -1;
  }

  getId(){
    return this.id;
  }

  getName(){
    return this.name;
  }

  getPrice(){
    return this.unitPrice;
  }

  getUnit(q: number){
    if(q == 1){
      return this.unit.slice(0,-3)
    }
    return this.unit;
  }

  getQuantity(){
    return this.quantity;
  }

  getToBuy(){
    return this.qtoBuy;
  }

  getCategory(){
    return this.category;
  }

  getDescription(){
    return this.description;
  }

  getAvatar(){
    return this.avatar;
  }

  getValue(){
      return this.getPrice() * this.getQuantity();
  }

  getBuyVal(){
    return this.getPrice() * this.getToBuy();
  }

  getPartialValue(q){
    return this.getPrice() * q;
  }

  item_update(tag: string, value: any){
    switch (tag) {
      case "n":
        this.name = value;
        break;
      case "p":
        this.unitPrice = value;
        break;
      case "u":
        this.unit = value;
        break;
      case "q":
        this.quantity = value;
        break;
      case "c":
        this.category = Category[value];
        break;
      case "d":
        this.description = value;
        break;
      case "b":
        this.qtoBuy = value;
        break;
      default:
        console.log("Invalid update option");
    }
  }

  purchase(q: number){
    if(q <= this.getQuantity()){
      this.item_update("q", this.getQuantity() - q);
    }else{
      console.log("Quantity requested too high");
    }
  }

  addStock(q: number){
    this.item_update("q", this.getQuantity() + q);
  }


  genAvatar(){
    return avatarPath + this.getCategory() + "/" + this.getName() + ".jpg";
  }

}

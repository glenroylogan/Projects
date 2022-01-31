import {User} from "./User";
import {Cart} from "./Cart";

export class Customer extends User{

  static idnum: number = 0;
  id: number;
  username: string;
  password: string;
  firstname: string;
  surname: string;
  preferences: Array<string> = [];

  constructor(username: string, password: string, firstname: string, surname: string){
    super();
    this.id = Customer.nextId();
    this.username = username;
    this.password = password;
    this.firstname = firstname;
    this.surname = surname;
  }

  static nextId(){
    return Customer.idnum++;
  }

  getUsername(){
    return this.username;
  }

  getFirstname(){
    return this.firstname;
  }

  getSurname(){
    return this.surname;
  }

  getName(){
    return this.getFirstname() + " " + this.getSurname();
  }

  getId(){
    return this.id
  }

  getPrefs(){
    return this.preferences;
  }


}

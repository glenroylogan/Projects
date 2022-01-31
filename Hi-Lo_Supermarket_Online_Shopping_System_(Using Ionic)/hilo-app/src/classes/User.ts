export abstract class User{

  sessionId: number;

  constructor(){
    this.sessionId = User.gensessId();
  }

  getsessId(){return this.sessionId;}

  static gensessId(){return Math.floor(Math.random() * 10**4) + 10**3;}


}

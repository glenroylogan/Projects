package cashRegister;

import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Main {

	public static void main(String[] args) throws FileNotFoundException, IOException {
		// TODO Auto-generated method stub
		
		 // TODO code application logic here
        Menu switchboard=new Menu();
        Items oItem=new Items();
        CustomerDatabase db=new CustomerDatabase();
        try {
            //loads customer
            db.loadCustomer();
            //prepares inventory 
            oItem.initInventory();
            //prepares items
            oItem.initItems();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException ex) {
            Logger.getLogger(Main.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            switchboard.setVisible(true);
        }

	}

}

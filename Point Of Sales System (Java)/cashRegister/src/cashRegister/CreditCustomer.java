package cashRegister;

public class CreditCustomer extends Customer{
    
    
    private double CREDIT_MARKUP=.02;
    
    public CreditCustomer(){
        
    }
    
    public CreditCustomer(int customerID, String customerName, String address, String type){
        this.customerID=customerID;
        this.customerName=customerName;
        this.address=address;
        this.type=type;

        
    }
    
    


    public double getCREDIT_MARKUP() {
        return CREDIT_MARKUP;
    }
    
}

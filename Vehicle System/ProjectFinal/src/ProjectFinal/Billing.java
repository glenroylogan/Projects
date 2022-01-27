package ProjectFinal;

/*Billing Class used to evaluate the Pricing of the User's choice of Renting or Chartering a Vehicle */

public class Billing {
	
	/* Initialized Variables used to Implement the Rent Vehicle and Charter Vehicle in the Billing Class*/
	private double total = 0; 
	Customer customer;
	Vehicle vehicle;
	int amountOfDays;
	Service ServiceType;
	TransportationOfficer TO;
	Billing finalBill;
	int RentBill,CharterBill;
	
	public Billing(Customer customer,Vehicle vehicle,int amountOfDays,double total,Service serviceType){
		
		this.customer=customer;
		this.vehicle=vehicle;
		this.amountOfDays=amountOfDays;
		
		for (Service s:Service.values()){
			if (ServiceType.equals(Service.RENT_VEHICLE))
				total = RentBill(vehicle,amountOfDays);
		}		
	}
	
	public Billing(TransportationOfficer TO,Vehicle vehicle,Customer customer,double total,Service ServiceType){
		
		this.TO=TO;
		this.vehicle=vehicle;
		this.customer=customer;
		
		for(Service s: Service.values()){
			if(ServiceType.equals(Service.CHARTER_SERVICE)){
				total = CharterBill(vehicle,TO);
			}
		}		
	}
	
	
	/* Character Bill Method */
	private double CharterBill(Vehicle vehicle2, TransportationOfficer tO2) {
		// TODO Auto-generated method stub
		return 0;
	}
	
	
	/* Rent Bill Method */
	private double RentBill(Vehicle vehicle,int amountOfDays){
		total = vehicle.getDailyRate()*amountOfDays;
		return total;
	}
	
	/* Getters and Setters for Billing Class */
	
	public double getTotal() {
		return total;
	}

	public void setTotal(double total) {
		this.total = total;
	}	
			
	public String toString1(){
		
		return ("Customer Info:"+ this.getCustomer().toString()+"\n "+"Number of Days for Rent: "+ this.getAmountOfDays()+"\n"+"Total for Service = \t"+this.getTotal()+"\n");		
	}
	
	public String toString(){
		
		return ("Officer Info:"+ this.getTO().toString()+"\n "+"Vehicle Info: "+ this.getVehicle().toString()+"\n"+"Customer Info: "+this.getCustomer().toString()+"\n"+"Total for Service =\t"+this.getTotal());		
	}

	public Customer getCustomer() {
		return customer;
	}

	public void setCustomer(Customer customer) {
		this.customer = customer;
	}

	public Vehicle getVehicle() {
		return vehicle;
	}

	public void setVehicle(Vehicle vehicle) {
		this.vehicle = vehicle;
	}

	public int getAmountOfDays() {
		return amountOfDays;
	}

	public void setAmountOfDays(int amountOfDays) {
		this.amountOfDays = amountOfDays;
	}

	public Service getServiceType() {
		return ServiceType;
	}

	public void setServiceType(Service serviceType) {
		ServiceType = serviceType;
	}

	public TransportationOfficer getTO() {
		return TO;
	}

	public void setTO(TransportationOfficer tO) {
		TO = tO;
	}

	public Billing getFinalBill() {
		return finalBill;
	}

	public void setFinalBill(Billing finalBill) {
		this.finalBill = finalBill;
	}

	public int getRentBill() {
		return RentBill;
	}

	public void setRentBill(int rentBill) {
		RentBill = rentBill;
	}

	public int getCharterBill() {
		return CharterBill;
	}

	public void setCharterBill(int charterBill) {
		CharterBill = charterBill;
	}
	
	
		
	
}

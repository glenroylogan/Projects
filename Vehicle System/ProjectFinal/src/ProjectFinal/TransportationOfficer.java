package ProjectFinal;

import java.util.Scanner;

public class TransportationOfficer {
	
	private String firstName,lastName;
	private	double hourlyRate; 
	private	float phoneNumber;
	private Licence licence;
	
	public TransportationOfficer(String firstName,String lastName, double hourlyRate,float phoneNumber){
		
		this.firstName=firstName;
		this.lastName=lastName;
		this.hourlyRate=hourlyRate;
		this.phoneNumber=phoneNumber;
		this.licence=getLicence();		
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public double getHourlyRate() {
		return hourlyRate;
	}

	public void setHourlyRate(double hourlyRate) {
		this.hourlyRate = hourlyRate;
	}
	
	public Licence getLicence(){
		
		Scanner scan = new Scanner(System.in);
		String licenceExpDate;
		int licenceNum;
		VehicleType type;
		Licence Licence;
		
		System.out.println("Please Enter the Licence Expiry Date");
		licenceExpDate=scan.nextLine();
		System.out.println("Enter Licence Number");
		licenceNum = scan.nextInt();
		System.out.println("Enter Vehicle type that allowed to Drivr");
		type = getVehicleType();
		
		Licence = new Licence(licenceNum,licenceExpDate,type);
		return Licence;		
	}
	
	public void setLicence(Licence licence){
		this.licence = licence;
	}
	
	private static VehicleType getVehicleType(){
		int type;
		Scanner scan = new Scanner(System.in);
		System.out.println("Enter from the Following Options");
		System.out.println("1- Car");
		System.out.println("2- Bus");
		System.out.println("3- Truck");
		type = scan.nextInt();
		
		try{
			for (VehicleType vechs: VehicleType.values()){
				if(type==vechs.numberValue()){
					return vechs;
				}}}
		catch(IndexOutOfBoundsException e){
			System.out.println("Enter 0 for Car,2 for Bus & 3 for Truck");
			}
		catch(Exception e){
			System.out.println("Enter 0 for Car,2 for Bus & 3 for Truck");
		}
		return null;
	}


}

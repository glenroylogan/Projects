package ProjectFinal;

import java.util.Scanner;

public class Customer {
	
	private String firstName,lastName;
	private	Address address; 
	private	int id;
	
	public Customer(){
		
	}
	
	public Customer(String firstName, String lastName, Address address, int id2) {
		this.firstName=firstName;
		this.lastName=lastName;
		this.address= getAddress();
		this.id=id2;
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
	
	public Address getAddress(){
		
		Scanner scan = new Scanner(System.in);
		String Street,City,Parish;
		Address Address;
		
		System.out.println("Please Enter the Address Street");
		Street=scan.nextLine();
		
		System.out.println("Please Enter the City of the Address ");
		City=scan.nextLine();
		
		System.out.println("Please Enter the Parish of the Address ");
		Parish=scan.nextLine();
	
		Address = new Address(Street,City,Parish);
		return Address;	
		
	}
	
	public void setaddress(){
		this.address=address;
	}
	
	public ID getid(){
		Scanner scan = new Scanner(System.in);
		String idType,expDate,idNum;
		int carRentalDays;
		ID id;
		
		System.out.println("Please Enter the ID type");
		idType=scan.nextLine();		
		
		System.out.println("Please Enter the Expration Date ");
		expDate=scan.nextLine();		
		
		System.out.println("Please Enter the ID Number ");
		idNum=scan.nextLine();		
		
		System.out.println("Please Enter the number of Days in whihc you would like to Rent a Cars ");
		carRentalDays=scan.nextInt();			
		
		id = new ID (idType,expDate,idNum,carRentalDays);
		return id;
	}
	
	public void setID(int id){
		this.id=id;
	}

}

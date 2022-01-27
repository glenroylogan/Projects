package ProjectFinal;

import java.sql.Date;
import java.util.ArrayList;
import java.util.Scanner;

import ProjectFinal.Address;
import ProjectFinal.Bus;
import ProjectFinal.Car;
import ProjectFinal.Customer;
//import ProjectFinal.DriverCertificate;
import ProjectFinal.TransportationOfficer;
import ProjectFinal.Truck;
import ProjectFinal.Vehicle;


public class TransportationOfficerManager {

	static ArrayList<TransportationOfficer> registry = new ArrayList<TransportationOfficer>();
	static ArrayList<Vehicle> fleet = new ArrayList<Vehicle>();
	public static void main(String[] args){
		
		
		System.out.println("   Welcome to L&J's Vehicle services \n");
		
		boolean running = true;
		Scanner scan = new Scanner(System.in);
		
		while(running){
		
			running = mainMenu(running, scan);
		}
		System.out.println("Thank you");
	}
	
	public static boolean mainMenu(boolean running, Scanner scan){
		String selection;
		
		System.out.println("please select from the following options");
		System.out.println("Please enter \"Customer\" if you are a customer");
		//System.out.println("Please enter \"Admin\" only for Administration");
		System.out.println("Please enter \"Q\" to exit the application");
		
		selection = scan.next();
		
		if(selection.equalsIgnoreCase("Customer")){
			showCustomerMenu(running);
			
		}/*else if(selection.equalsIgnoreCase("Admin")){
			showAdminMenu(running);
			
		}*/else if(selection.equalsIgnoreCase("Q")){
			running = false;
		}
		return true;
		
	}
	
	public static boolean showAdminMenu(boolean running){
		String select;
		Scanner scan = new Scanner(System.in);
		
		System.out.println("Please select frome the following options");
		System.out.println("Enter \"add\" to add the fleet");
		System.out.println("Enter \"officer\" to edit transport officers");
		System.out.println("Enter \"Q\" to log out");
		select = scan.next();
		
		if(select.equalsIgnoreCase("add")){
			addVehicle();
			
		}else if(select.equalsIgnoreCase("officer")){
		
			transportOfficerMenu(scan, running);
			
		}else if(select.equalsIgnoreCase("Q")){
			running = false;
		}
		
		return false;
	}
	
	public static boolean showCustomerMenu(boolean running){
		
		Scanner cust = new Scanner(System.in);
		String selection;
		
		System.out.println("Please enter \"new\" if you are a new customer");
		System.out.println("Please enter \"login\" if you are an existing customer");
		
		selection = cust.next();
		
		if(selection.equalsIgnoreCase("new")){
			
			createCustomer(running);
			showServiceMenu(running);
		
		}else if(selection.equalsIgnoreCase("login")){
			
			showServiceMenu(running);
			
		}
		
		
		
		return false;
		
	}
	public static boolean showServiceMenu(boolean running) {
		
		Scanner scan = new Scanner(System.in);
		String choice;
		Vehicle vehicle=null;
		
		System.out.println("Welcome to  and L&J's Vehicle Services");
		System.out.println("");
		System.out.println("Please select the type of service you would like");
		System.out.println("Enter \"rent\" for rental or \"Charter\" for chartered" + "\n");
		
		choice = scan.next();
		
		if (choice.equalsIgnoreCase("rent")){
			createRental(fleet);
		}
		if(choice.equalsIgnoreCase("charter")){
			createChater(fleet);
		}
		return running;
	}
	
	public static Customer createCustomer(boolean running){
		
		Vehicle vehicle= null;
		String firstName,lastName,  idExp;
		Address address;
		int id;
		int idType;
		Scanner RentVehicle = new Scanner(System.in);
		
			System.out.println("Please enter your required information");
			
			System.out.println("Please enter your  First Name" + "\n");
			firstName = RentVehicle.next();
			
			System.out.println("Please enter your  Last Name" + "\n");
			lastName = RentVehicle.next();
			
			System.out.println("Please enter your your type of identification" + "\n"
								+ "1 if it is a driver's licence or 2 of it is a passport \n");
			idType = RentVehicle.nextInt();
			
			System.out.println("Please enter your id number \n");
			id = RentVehicle.nextInt();
		
			System.out.println("Please enter yor id Expiry date in the format dd/mm/yyyy \n");
			idExp = RentVehicle.next();
			
			address();
			running = false;
			
			return new Customer(firstName,lastName,address(),id);
					
	}
	static Address address(){
		
		String street, city, parish;
		Address address;
		Scanner scan= new Scanner(System.in);
		
		System.out.println("Please enter the lot number and anme of the street");
		street = scan.next();
		
		System.out.println("Enter the name of the city");
		city = scan.next();
		
		System.out.println("Enter your parish name");
		parish = scan.next();
		
		address = new Address(street,city,parish);
		
		return address;
		
	}
	
	public static void addVehicle(){
		
		Scanner add = new Scanner(System.in);
		String colour, fitnessExpDate, regNum;
		int type,select,seatingCap;
		final int CHASSISNUM;
		double dailyRate, maxWeight;
		Car car = null;
		Truck truck = null;
		Bus bus = null;
		
		System.out.println("If the vehicle is a car select 1 \n"
							+ "If the vehicle is a bus select 2 \n"
							+ "If the vehicle is a Truck select 3 \n");
		select = add.nextInt();
		
		if(select == 1){
			System.out.println("Please enter the Chassis Number \n");
			CHASSISNUM = add.nextInt();
			
			System.out.println("Please enter the registration number \n");
			regNum = add.next();
			
			System.out.println("Please enter the fitness expiry date \n");
			fitnessExpDate = add.next();
			
			System.out.println("Place enter the color of the car \n");
			colour = add.next();
			
			System.out.println("Please enter the daily rate for this vehicle \n");
			dailyRate = add.nextDouble();
			
			System.out.println("Please enter the car body type");
			type = add.nextInt();
			
			car = new Car(CHASSISNUM,regNum,fitnessExpDate,colour,dailyRate,type);
			fleet.add(car);
		}
		
		if(select == 2){
			System.out.println("Please enter the Chassis Number \n");
			CHASSISNUM = add.nextInt();
			
			System.out.println("Please enter the registration number \n");
			regNum = add.next();
			
			System.out.println("Please enter the fitness expiry date \n");
			fitnessExpDate = add.next();
			
			System.out.println("Place enter the color of the car \n");
			colour = add.next();
			
			System.out.println("Please enter the daily rate for this vehicle \n");
			dailyRate = add.nextDouble();
			
			System.out.println("Please enter the capacity of the bus \n");
			seatingCap = add.nextInt();
			
			bus = new Bus(CHASSISNUM,regNum,fitnessExpDate,colour,dailyRate,seatingCap);
			fleet.add(bus);
		}
		if(select == 3){
			System.out.println("Please enter the Chassis Number \n");
			CHASSISNUM = add.nextInt();
			
			System.out.println("Please enter the registration number \n");
			regNum = add.next();
			
			System.out.println("Please enter the fitness expiry date \n");
			fitnessExpDate = add.next();
			
			System.out.println("Place enter the color of the car \n");
			colour = add.next();
			
			System.out.println("Please enter the daily rate for this vehicle \n");
			dailyRate = add.nextDouble();
			
			System.out.println("Please enter the maximum weight of the truck \n");
			maxWeight = add.nextDouble();
			
			truck = new Truck(CHASSISNUM,regNum,fitnessExpDate,colour,dailyRate,maxWeight);
			fleet.add(truck);
		}
	}
	
	public static void transportOfficerMenu(Scanner scan, boolean running){
		
		String name;
		
		System.out.println("Please enter transport officer name");
		name = scan.next();
		
		System.out.println("Please \n");
		
	}
	
	
/**	public static Vehicle showFleet(Vehicle show){
		
		Vehicle show = null;
		ArrayList<Vehicle> fleet = new ArrayList<Vehicle>();
		
		for(Vehicle f: fleet){
		System.out.println(fleet);
		return show.add(f);
		}
		return show;
	}*/
	
	public static void createRental(ArrayList<Vehicle> fleet){
		Scanner scan = new Scanner(System.in);
		
		
		if(fleet.size()>0){
			for(Vehicle v : fleet){
				System.out.println(v);
			}
		}else{
			System.out.println("Fleet of vehicles is empty");
		}
		
	}
	//TransportationOfficer officer1 = new TransportationOfficer("Levaugh Battick", "559-9856",56.7,new DriverCertificate("233546", "30/04/2090",1)); 
	
	public static void createChater(ArrayList<Vehicle> fleet){
		
	}
	
}

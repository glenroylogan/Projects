package ProjectFinal;


public class Car extends Vehicle {
	
	private BodyType body;
	
	public Car(int CHASSISNUM, int regNum, String fitnessExpDate, String colour, double dailyRate, BodyType body) {
		super (CHASSISNUM, regNum, fitnessExpDate, colour,dailyRate); 
		this.body = body ;
		
	}
	
	public String toString(){
		return ("Vehicle Type: Car\n"+super.toString()+"\t Body Type: "+this.body);
	}

	

}


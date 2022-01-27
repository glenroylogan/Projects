package ProjectFinal;

public class Bus extends Vehicle {
	
	private int seatingCap;		

	public Bus(int CHASSISNUM, int regNum, String fitnessExpDate, String colour, double dailyRate, int seatingCap) {
	super (CHASSISNUM, regNum, fitnessExpDate, colour,dailyRate); 
	this.seatingCap = seatingCap ;
	
}
	

	public int getSeatingCap() {
		return seatingCap;
	}

	public void setSeatingCap(int seatingCap) {
		this.seatingCap = seatingCap;
	}
	
	public String toString(){
		return ("Vehicle Type: Bus\n"+super.toString()+"\t Seating Capacity: "+this.seatingCap);
	}


}

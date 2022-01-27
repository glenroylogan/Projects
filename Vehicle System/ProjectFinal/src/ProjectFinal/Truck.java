package ProjectFinal;

public class Truck extends Vehicle{
	
private int maxWeight;
	
	public Truck(int CHASSISNUM, int regNum, String fitnessExpDate, String colour, double dailyRate, int maxWeight) {
		super (CHASSISNUM, regNum, fitnessExpDate, colour,dailyRate); 
		this.maxWeight = maxWeight ;
		
	}	
	
	public int getMaxWeight() {
		return maxWeight;
	}


	public void setMaxWeight(int maxWeight) {
		this.maxWeight = maxWeight;
	}


	public String toString(){
		return ("Vehicle Type: Truck\n"+super.toString()+"\t Maximum Weight: "+this.maxWeight);
	}



}

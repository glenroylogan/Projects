package ProjectFinal;


public class Vehicle {

	protected final int CHASSISNUM;
	private int regNum;
	private String fitnessExpDate,colour;
	private double dailyRate;
	private VehicleType vehicleType;
	
	Vehicle(int CHASSISNUM, int regNum,String fitnessExpDate,String colour,double dailyRate){
		
		this.CHASSISNUM=CHASSISNUM;
		this.regNum=regNum;
		this.fitnessExpDate=fitnessExpDate;
		this.colour=colour;
		this.dailyRate=dailyRate;
		
	}

	public int getRegNum() {
		return regNum;
	}

	public void setRegNum(int regNum) {
		this.regNum = regNum;
	}

	public String getFitnessExpDate() {
		return fitnessExpDate;
	}

	public void setFitnessExpDate(String fitnessExpDate) {
		this.fitnessExpDate = fitnessExpDate;
	}

	public String getColour() {
		return colour;
	}

	public void setColour(String colour) {
		this.colour = colour;
	}

	public double getDailyRate() {
		return dailyRate;
	}

	public void setDailyRate(double dailyRate) {
		this.dailyRate = dailyRate;
	}

	public VehicleType getVehicleType() {
		return vehicleType;
	}

	/*public void setVehicleType(vehicleType vehicleType) {
		VehicleType = vehicleType;
	}*/

	public int getCHASSISNUM() {
		return CHASSISNUM;
	}
	
	
	
}

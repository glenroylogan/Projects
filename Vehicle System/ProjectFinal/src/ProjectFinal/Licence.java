package ProjectFinal;

public class Licence {
	
	private int LicenceNum;
	private String LicenceExpDate;
	private VehicleType type;
	
	public Licence(int LicenceNum,String LicenceExpDate,VehicleType type){
		this.LicenceNum=LicenceNum;
		this.LicenceExpDate=LicenceExpDate;
		this.type=type;
	}

	public int getLicenceNum() {
		return LicenceNum;
	}

	public void setLicenceNum(int licenceNum) {
		LicenceNum = licenceNum;
	}

	public String getLicenceExp() {
		return LicenceExpDate;
	}

	public void setLicenceExp(String licenceExpDate) {
		LicenceExpDate = licenceExpDate;
	}

	public VehicleType getType() {
		return type;
	}

	public void setType(VehicleType type) {
		this.type = type;
	}
	
	public String toString(){
		return ("\n Licence Number: "+this.LicenceNum+"Liscence Exipiry Date: "+this.LicenceExpDate+"Vehicle Type: "+this.type);
	}

}

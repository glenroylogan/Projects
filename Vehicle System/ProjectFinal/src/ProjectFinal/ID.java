package ProjectFinal;

public class ID {
	
	private String type,expDate, idNum;
	private int rentDays;
	
	public ID(String type,String expDate,String idNum, int rentDays){
		
		this.type=type;
		this.expDate=expDate;
		this.rentDays=rentDays;		
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public String getExpDate() {
		return expDate;
	}

	public void setExpDate(String expDate) {
		this.expDate = expDate;
	}

	public String getIdNum() {
		return idNum;
	}

	public void setIdNum(String idNum) {
		this.idNum = idNum;
	}

	public int getRentDays() {
		return rentDays;
	}

	public void setRentDays(int rentDays) {
		this.rentDays = rentDays;
	}
	

}

package ProjectFinal;

/* Address Class used to take in User Street Address as well as the City and Parish*/

public class Address {
	
	private String Street,City,Parish;
	
	public Address(String Street,String City,String Parish){
		
		this.Street=Street;
		this.City=City;
		this.Parish=Parish;		
	}
	
	/*Getters and Setters for Parameters within the Address Class */

	public String getStreet() {
		return Street;
	}

	public void setStreet(String street) {
		Street = street;
	}

	public String getCity() {
		return City;
	}

	public void setCity(String city) {
		City = city;
	}

	public String getParish() {
		return Parish;
	}

	public void setParish(String parish) {
		Parish = parish;
	}
	
	

}

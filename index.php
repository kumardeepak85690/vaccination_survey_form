<?php 

	$uploadPath = "uploads/";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include_once "./db_config.php";

		$firstName = $_POST["first_Name"];
		$lastName = $_POST["last_Name"];
		$fatherName = $_POST["father_Name"];
		$dob = $_POST["dob"];
		$gender = $_POST["gender"];
		$state = $_POST["state"];
		$dov = $_POST["date_of_vaccination"];
		$vaccineName = $_POST["vaccine_name"];
		$doseNum = $_POST["dose"];
		$aadharNum = $_POST["aadhar_uid"];
		$benificiaryID = $_POST["benificiaryID"];
		$tmpFileName = $_FILES["certName"]["tmp_name"];
		$fileName = $_FILES["certName"]["name"];
		$phoneNum = $_POST["phnumber"];
		$email = $_POST["email"];

		$isUploaded = move_uploaded_file($tmpFileName, $uploadPath.$fileName);

		if($isUploaded){
			$sql = "INSERT INTO `surveydat` (`firstname`, `lastname`, `fathername`, `dob`, `gender`, `state`, `date_of_vac`, `vaccine_name`, `dose_no`, `aadhar_no`, `benificiary_id`, `uploaded_filename`, `mobile_num`, `email_id`) VALUES ('$firstName', '$lastName', '$fatherName', '$dob', '$gender', '$state', '$dov', '$vaccineName', '$doseNum', '$aadharNum', '$benificiaryID', '$fileName', '$phoneNum', '$email')";
			$resl = mysqli_query($conn, $sql);
			if($resl){
				header("location: greet.php");
			}else{
				header("location: index.php");
			}
		}


	}

?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Survey From</title>
		<link rel="stylesheet" href="Survey css.css" type="text/css">
    </head>
	
	<body>
	    <div class="main">
		    <div class="register">
			    <h2>Vaccination Survey From</h2>
				    <form action="index.php" id="register" method="post" enctype="multipart/form-data">
					    <label>First Name : </label>
						<br>
						<input type="text" name="first_Name" id="fname" placeholder="Enter Your First Name">
						<br><br>
						<label>Last Name : </label>
						<br>
						<input type="text" name="last_Name" id="lname" placeholder="Enter Your Last Name">
						<br><br>
						<label>Father Name : </label>
						<br>
						<input type="text" name="father_Name" id="pname" placeholder="Enter Your Father Name">
						<br><br>
						<label>Date Of Birth : </label>
						<br>
						<input type="Date" placeholder="D.O.B" name="dob" id="Date">
						<br><br>
						<label>Gender : </label>
						<br>
						<input type="radio" name="gender" value="male" id="Male">
						<span id="Male">Male</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="female" id="Female">
						<span id="Female">Female</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="other" id="Other">
						<span id="Female">Other</span>
						<br><br>
						<label>Select Vaccination State : </label>
						<br>
						    <select name="state" id="state" class="form-control">
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
								<option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
						<br><br>
						<label>Date Of Vaccination</label>
						<br>
						<input type="Date" placeholder="Date Of Vaccination" name="date_of_vaccination" id="Date">
						<br><br>
						<label>Select Vaccine Name</label>
						<br>
						<select name="vaccine_name" value="vaccine">
							<option value="Covishield" >Covishield</option>
                                <option value="Covaxin" >Covaxin</option>
                                <option value="Sputnik V" >Sputnik V</option>
                                <option value="Other" >Other</option>
						</select>
						<br><br>
						<label>Dose</label>
						<br>
						<select name="dose" value="dose">
							    <option value="1st Dose">1st Dose</option>
                                <option value="2nd Dose">2nd Dose</option>
						</select>
						<br><br>
						<label>Aadhar no. : </label>
						<br>
                        <input type="password" id="pwd" name="aadhar_uid" placeholder="UID" maxlength="12">
						<br><br>
						<label>Beneficiary Reference Id : </label>
						<br>
                        <input type="Text" id="Text" name="benificiaryID" placeholder="Beneficiary Reference Id" maxlength="14">
						<br><br>
						<label>Attach Your Vaccination Certificate :</label>
						<br>
						<input type="file" name="certName">
						<br><br>
						<label>Mobile No. :</label>
						<br>
						<input type="phone number" id="number" name="phnumber" placeholder="Mobile Number" maxlength="20">
						<br><br>
						<label>Email Id :</label>
						<br>
						<input type="email" id="email" name="email" placeholder="Email">
						<br><br>
						<label>Submit Here!</label>
						<br>
                        <input type="Submit" value="submit" name=""> &nbsp;&nbsp;&nbsp; <input type="Reset">
                    </form>
			</div>			
		</div>	
    <h6 style="text-align:right">@Alpha squad 😎😎</h6>		
	</body>
</html>

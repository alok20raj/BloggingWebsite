<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register Form</title>
	</head>
	<body>

		<div>
			<?php
			if(isset($_POST['create']))
			{
				echo 'User submitted .' ;
				$Employee_ID = $_POST['Employee_ID'];
				$First_name = $_POST['First_name'];
				$Last_name = $_POST['Last_name'];
				$Gender = $_POST['Gender'];
				$Email = $_POST['Email'];
				$Password = $_POST['Password'];
				$Date_of_birth = $_POST['Date_of_birth'];

				//echo $Employee_ID . " " . $First_name . " ". $Last_name . " " . $Gender . " " . $Email . " " . $Password . " " . $Date_of_birth; 

				$sql = "INSERT INTO sign_up (Employee_ID, First_name , Last_name , Gender , Email , Password , Date_of_birth) VALUES (?,?,?,?,?,?,?)";
				$stmtinsert =$db->prepare($sql);
				$result = $stmtinsert->execute([$Employee_ID, $First_name, $Last_name, $Gender, $Pssword, $Date_of_Birth]);
				if($result)
				{
					echo"successfully saved .";
				}
				else
				{
					echo " there were errors while saving the data.";
				}
    			}
			?>
			</div>
		<div align="center">
			<form action="sign_up.php" method="post">
			<div class = "container">
				<div class="row">
					<div class = "col-sm-3">
			<h1 id="Heading"><u>Register</u></h1>
			   	<label for="First"><b>First Name:</b> </label>
			   	<input class ="form-control" id="First" name="First" class="textbox" type="text" placeholder="First Name" required>
			   	<br>
			   	<label for="Last"><b> Last Name:</b></label>
			   	<input class ="form-control" id="Last"  name="Last" class="textbox" type="text" placeholder="Last Name" required>
			   	<br>
			   	<label><b>Gender</b>:  </label>
			   	<label for="Male">Male</label>
			   	<input class ="form-control" type="radio" name="Gender" id="Male" value="Male">
			   	<label for="Female">Female</label>
			   	<input class ="form-control" type="radio" name="Gender" id="Female" value="Female">
		        <label for="Other">Other</label>
		        <input  class ="form-control" type="radio" name="Gender" id="Other" value="Other">
		        <br>
			    <label for="email"><b> Email:</b></label>
				<input class ="form-control" name="email"  class="textbox" type="Email" id="email" placeholder="Your Email" required>
				<br>
				<label for="password"><b> Password:</b></label>
				<input class ="form-control" name="password" type="Password" id="password"  class="textbox" placeholder="Password" pattern=".{5,10}" required title="password must be between 5 and 10 characters">
				<br>
				<label><b> Date of Birth:</b>
					<select name="Month" class="textbox">
						<option>Month</option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>
					<select name="Day" class="textbox">
						<option>Day</option>
						<option>01</option>
						<option>02</option>
						<option>03</option>
						<option>04</option>
						<option>05</option>
						<option>06</option>
						<option>07</option>
						<option>08</option>
						<option>09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
					<select name="Year" class="textbox">
						<option>Year</option>
						<option>1950</option>
						<option>1951</option>
						<option>1952</option>
						<option>1953</option>
						<option>1954</option>
						<option>1955</option>
						<option>1956</option>
						<option>1957</option>
						<option>1958</option>
						<option>1959</option>
						<option>1960</option>
						<option>1961</option>
						<option>1962</option>
						<option>1963</option>
						<option>1964</option>
						<option>1965</option>
						<option>1966</option>
						<option>1967</option>
						<option>1968</option>
						<option>1969</option>
						<option>1970</option>
						<option>1971</option>
						<option>1972</option>
						<option>1973</option>
						<option>1974</option>
						<option>1975</option>
						<option>1976</option>
						<option>1977</option>
						<option>1978</option>
						<option>1979</option>
						<option>1980</option>
						<option>1981</option>
						<option>1982</option>
						<option>1983</option>
						<option>1984</option>
						<option>1985</option>
						<option>1986</option>
						<option>1987</option>
						<option>1988</option>
						<option>1989</option>
						<option>1990</option>
						<option>1991</option>
						<option>1992</option>
						<option>1993</option>
						<option>1994</option>
						<option>1995</option>
						<option>1996</option>
						<option>1997</option>
						<option>1998</option>
						<option>1999</option>
						<option>2000</option>
						<option>2001</option>
						<option>2002</option>
						<option>2003</option>
						<option>2004</option>
						<option>2005</option>
						<option>2006</option>
						<option>2007</option>
						<option>2008</option>
						<option>2009</option>
						<option>2010</option>
						<option>2011</option>
					</select>
				 </label>
				<br>
				<label for="agreed"><b>I agree to the terms and conditions:</b></label>
			    <input type="checkbox" id="agreed" name="agreed">
			    <br>
			    <input type="submit" class="button">
			</form>
		</div>
	</body>
</html>
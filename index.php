<?php
    include 'connecttodb.php';
	$query = "SELECT * FROM doctor";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Assignment 3 Home Page</title>

              <meta charset="utf-8">
              <title>Asn3 Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
	
 <body>    
        <style>
            h1{text-align:center;}
            form{text-align: center;}
        </style>

	<h1>Assignment 3 Home Page</h1>	
          
    <table id="table">
      <thead>

		<tr>
			<th>License Number</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>License Date</th>
            <th>Birthdate</th>
            <th>Current Hospital</th>
            <th>Speciality</th>
		<tr>
      </thead>

      <tbody>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
          $licensenum = $rows['licensenum'];
          $firstname = $rows['firstname'];
          $lastname = $rows['lastname'];
          $licensedate = $rows['licensedate'];
          $birthdate = $rows['birthdate'];
          $hosworksat = $rows['hosworksat'];
          $speciality = $rows['speciality'];
        ?>
        <tr>
          <td><?php echo $licensenum ?></td>
          <td><?php echo $firstname ?></td>
          <td><?php echo $lastname ?></td>
          <td><?php echo $licensedate ?></td>
		  <td><?php echo $birthdate ?></td>
          <td><?php echo $hosworksat ?></td>
          <td><?php echo $speciality ?></td>
        </tr>
      </tbody>

      <?php
      }
      ?>

    </table>

		<form action="getdoctors.php" method="post">  
                <h3>Select 	How To View Doctor Data</h3>
                <h4>Order data by:</h4>
                <input type='Radio' name='SortDoctor' value="lastname" checked>Last Name<br>
                <input type='Radio' name='SortDoctor' value="birthdate">Birthdate<br>
                <h4>View data in:</h4>
                <input type='Radio' name='OrderDoctor' value="ASC" checked>Ascending order<br>
                <input type='Radio' name='OrderDoctor' value="DESC">Descending order<br><br>
                <input type="submit" value="Show Doctor Data"><br>
		</form><br><br><hr>
  
                  
        <script src="getspec.js"></script>          
		<form action="doctorspec.php" method="post">
      	<h3>Select Option to see Doctor by Speciality:</h3>
                <select name="pickspec" id="pickspec" onchange="getSpec(this)">
                <option value="1">Select Here</option>
                <?php
                include "getspec.php";
                ?>
                </select>
                <br><br>
                <input type="submit" value="View Doctors by Speciality">
		</form><br><hr>
        
 		<script src="hosworksat.js"></script> 
		<form action="adddoctor.php" method="post">
                <h3>Add a new Doctor:</h3>
                  
				<label for= "newlicensenum">License Number:</label>
				<input type="text" name="newlicensenum" maxlength="4" required><br><br>
                  
                <label for="newfirstname">First Name:</label>
				<input type="text" name="newfirstname" maxlength="20" required><br><br>
                  
                <label for="newlastname">Last Name:</label>
				<input type="text" name="newlastname" maxlength="20" required><br><br>
                  
                <label for="newlicensedate">License Date:</label>
                <input type="date" name="newlicensedate" placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31" required><br><br>
                
                <label for="newbirthdate">Birthdate:</label>
                <input type="date" name="newbirthdate" placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31" required><br><br>
                  
                <label for="newhosworksat">Hospital Code:</label>
                <input type="text" list="hosworksat" name="newhosworksat" id = "newhosworksat" maxlength="3" required><br><br>
                <datalist name="hosworksat" id="hosworksat" onchange="getCode(this)" required = "true">
                <?php
                include "hosworksat.php"
                ?>
                </datalist><br><br>
                  
                <label for="newspeciality">Speciality:</label>
				<input type="text" name="newspeciality" maxlength="30"><br><br>
                  
                <input type="submit" value="Add New Doctor">
        </form><br><br><hr>
                  
        <script src="getdeletedoc.js"></script> 
        <form action="deletedoctor.php" method="post" onsubmit="return confirm('You are about to delete the selected doctor from the database. Are you sure you would like to proceed?')">
       			<h3>Delete Existing Doctor:</h3>
                  
                <label for="doctorlist">Select Doctor to Delete:</label>
                <select name="deletedoc" id="deletedoc" onchange="getDel(this)" required>
                <option value="1">Select Here</option>
                  
                <?php
                include "getdeletedoc.php"
                ?>
                  
                </select><br><br>
        <input type="submit" value="Delete Doctor"><br>
        </form><br><br><hr>
                 
                  
        <script src="getassigndoc.js"></script> 
        <script src="getpatient.js"></script> 
        <form action="doctopat.php" method="post">
                <h3>Assign Doctor to Patient:</h3>
                  
                <label for="doctorlist">Select Doctor:</label>
                <select name="assigndoc" id="assigndoc" onchange="getAss(this)" required>
                <option value="1">Select Here</option>
                <?php
                include "getassigndoc.php"
                ?>
                </select><br><br>
                  
                <label for="patientlist">Assign to Patient:</label>
                <select name="selectpat" id="selectpat" onchange="getPat(this)" required>
                <option value="1">Select Here</option>
                <?php
                include "getpatient.php"
                ?>
                </select><br><br>
        <input type="submit" value="Assign Patient"><br>          
        </form><br><br><hr>
                  
        <script src="getdeletedoc.js"></script>                   
        <form action="showpatientondoc.php" method="post">  
                <h3>Select a Doctor to view patient data</h3>
                <label for="doctorlist">Select Doctor to Delete:</label>
                <select name="deletedoc" id="deletedoc" onchange="getDel(this)">
                <option value="1">Select Here</option>
                  
                <?php
                include "getdeletedoc.php"
                ?>
                </select><br><br>    
        <input type="submit" value="Show doctors patient data"><br>
		</form><br><br><hr>
                  
        <form action="showhosinfo.php" method="post">  
                <h3>Select a Hospital to view data</h3>
                <label for="hoslist">Select Hospital:</label>
                <select name="hosps" id="hosps" onchange="getHos(this)">
                <option value="1">Select Here</option>
                  
                <?php
                include "gethos.php"
                ?>
                </select><br><br>    
        <input type="submit" value="Show Hospital Data"><br>
		</form><br><br><hr>

                  
                  
        <form action="updatehos.php" method="post">  
		        <h3>Update Hospital Beds </h3>
                <label for="hoslist">Select Hospital to update:</label>
                <select name="hosps" id="hosps" onchange="getHos(this)" required>
                <option value="1">Select Here</option>
                <?php
                include "gethos.php"
                ?>
                </select><br><br>   
                  
                <label for= "updatehosbed">New Number of Hospital Beds:</label><br>    
				<input type="number" name="hosbed" maxlength="6" required><br><br>
                
                  
 
        <input type="submit" value="Update Number of Beds"><br>
		</form><br><br><hr>
                  
                  
  <?php
  		mysqli_close($connection);
  ?>    
            <style>
            h4{text-align:center;}
        </style>
          
    <h4>Thank you for visiting my website:)</h4>
    <iframe src="https://giphy.com/embed/3o7qDQ4kcSD1PLM3BK" style="width: 100%; max-width: 100%; height: auto; class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/nickatnite-dance-friends-chandler-3o7qDQ4kcSD1PLM3BK">via GIPHY</a></p>
	<h4>"We're almost done!"</h4>
      
</body>

</html>



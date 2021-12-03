<?php
// Include database connection file
require_once "db_connection.php";
 
// Define variables and initialize with empty values
$cat_name = $breed = $cat_color = $gender = $origin = $age_in_years = $Capture_date = $Supplier_id = $food_supplied = "";
$cat_name_err = $breed_err = $cat_color_err = $gender_err = $origin_err = $age_in_years_err = $Capture_date_err = $Supplier_id_err = $food_supplied_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    // Get hidden input value
    $cat_id = $_POST["cat_id"];
    
    // Validate name
     $input_name = trim($_POST["cat_name"]);
    if(empty($input_name)){
        $cat_name_err = "Please enter the name of the Wild Cat.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cat_name_err = "Please enter a valid name.";
    } else{
        $cat_name = $input_name;
    }
    
    // Validate breed
    $input_breed = trim($_POST["breed"]);
    if(empty($input_breed)){
        $breed_err = "Please enter the breed.";     
    } else{
        $breed = $input_breed;
    }

    // Validate cat color
    $input_cat_color = trim($_POST["cat_color"]);
    if(empty($input_cat_color)){
        $cat_color_err = "Please enter the color of the cat.";     
    } else{
        $cat_color = $input_cat_color;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter the gender of the animal.";     
    } else{
        $gender = $input_gender;
    }

    // Validate origin
    $input_origin = trim($_POST["origin"]);
    if(empty($input_origin)){
        $origin_err = "Please enter a location at which the Wild Cat was found.";     
    } else{
        $origin = $input_origin;
    }

    // Validate age
    $input_age = trim($_POST["age_in_years"]);
    if(empty($input_age)){
        $age_in_years_err = "Please enter the age of the Wild Cat";     
    } else{
        $age_in_years = $input_age;
    }

    // Validate Capture Date
    $input_capture = trim($_POST["Capture_date"]);
    if(empty($input_capture)){
        $Capture_date_err = "Please enter the date in which the Wild Cat was captured/rescued.";     
    } else{
        $Capture_date = $input_capture;
    }

    // Validate Supplier ID
    $input_sId = trim($_POST["Supplier_id"]);
    if(empty($input_sId)){
        $Supplier_id_err = "Please enter the Supplier's ID number.";     
    } else{
        $Supplier_id = $input_sId;
    }

    // Validate Food Taken by animal
    $input_food_supplied = trim($_POST["food_supplied"]);
    if(empty($input_food_supplied)){
        $food_supplied_err = "Please enter the food supplied to the Wild Cat.";     
    } else{
        $food_supplied = $input_food_supplied;
    }
    
    // Check input errors before updating in database
    if(empty($cat_name_err) && empty($breed_err) && empty($cat_color_err) && empty($gender_err) && empty($origin_err) && empty($age_in_years_err) && empty($Capture_date_err) && empty($Supplier_id_err) && empty($food_supplied_err)){
        // Prepare an update statement
 	$sql = "UPDATE Cat_info SET cat_name=?, breed=?, cat_color=?, gender=?, origin=?, , age_in_years=?, Capture_date=?, Supplier_id=?, food_supplied=? WHERE cat_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssisisi", $param_name, $param_breed, $param_cat_color, $param_gender, $param_origin, $param_age_in_years, $param_Capture_date, $param_Supplier_id, $param_food_supplied, $param_id);
            
            // Set parameters
            $param_name = $cat_name;
            $param_breed = $breed;
            $param_cat_color = $cat_color;
	    $param_gender = $gender;
	    $param_origin = $origin;
	    $param_age_in_years = $age_in_years;
	    $param_Capture_date = $Capture_date;
	    $param_Supplier_id = $Supplier_id;
	    $param_food_supplied = $food_supplied;
	    $param_id = $cat_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["cat_id"]) && !empty(trim($_GET["cat_id"]))){
        // Get URL parameter
        $cat_id =  trim($_GET["cat_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Cat_info WHERE cat_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $cat_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    // Fetch result row as an associative array.
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $cat_name = $row["cat_name"];
                    $breed = $row["breed"];
                    $cat_color = $row["cat_color"];
		    $gender = $row["gender"];
		    $origin = $row["origin"];
		    $age_in_years = $row["age_in_years"];
		    $Capture_date = $row["Capture_date"];
		    $Supplier_id = $row["Supplier_id"];
		    $food_supplied = $row["food_supplied"];
		    $cat_id = $row["cat_id"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the information and submit to update this animal's record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Cat Name:</label>
                            <input type="text" name="cat_name" class="form-control <?php echo (!empty($cat_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cat_name; ?>">
                            <span class="invalid-feedback"><?php echo $cat_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Breed:</label>
                            <input type="text" name="breed" class="form-control <?php echo (!empty($breed_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $breed; ?>">
                            <span class="invalid-feedback"><?php echo $breed_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Color:</label>
                            <input type="text" name="cat_color" class="form-control <?php echo (!empty($cat_color_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cat_color; ?>">
                            <span class="invalid-feedback"><?php echo $cat_color_err;?></span>
                        </div>
			<div class="form-group">
                            <label>Gender:</label>
                            <input type="text" name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>">
                            <span class="invalid-feedback"><?php echo $gender_err;?></span>
                        </div>
			<div class="form-group">
                            <label>Location Found:</label>
                            <input type="text" name="origin" class="form-control <?php echo (!empty($origin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $origin; ?>">
                            <span class="invalid-feedback"><?php echo $origin_err;?></span>
                        </div>
			<div class="form-group">
				<label>Age:</label>
				<input type="text" name="age_in_years" class="form-control <?php echo (!empty($age_in_years_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age_in_years; ?>">
				<span class="invalid-feedback"><?php echo $age_in_years_err; ?></span>
			</div>
			<div class="form-group">
				<label>Date Of Capture:</label>
				<input type="text" name="Capture_date" placeholder="yyyy - mm - dd" class="form-control <?php echo (!empty($Capture_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Capture_date; ?>">
				<span class="invalid-feedback"><?php echo $Capture_date_err; ?></span>
			</div>
			<div class="form-group">
				<label>Supplier ID:</label>
				<input type="text" name="Supplier_id" class="form-control <?php echo (!empty($Supplier_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Supplier_id; ?>">
				<span class="invalid-feedback"><?php echo $Supplier_id_err; ?></span>
			</div>
			<div class="form-group">
				<label>Food Taken:</label>
				<input type="text" name="food_supplied" class="form-control <?php echo (!empty($food_supplied_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $food_supplied; ?>">
				<span class="invalid-feedback"><?php echo $food_supplied_err; ?></span>
			</div>
			<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
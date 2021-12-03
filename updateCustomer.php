<?php
// Include database connection file
require_once "db_connection.php";
 
// Define variables and initialize with empty values
$customer_name = $telephone = $address = $cat_name = "";
$customer_name_err = $telephone_err = $address_err = $cat_name_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["customer_id"]) && !empty($_POST["customer_id"])){
    // Get hidden input value
    $customer_id = $_POST["customer_id"];
    
    // Validate name
    $input_name = trim($_POST["customer_name"]);
    if(empty($input_name)){
        $customer_name_err = "Please enter the name of the animal.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $customer_name_err = "Please enter a valid name.";
    } else{
        $customer_name = $input_name;
    }
    
    // Validate telephone number
    $input_telephone = trim($_POST["telephone"]);
    if(empty($input_telephone)){
        $telephone_err = "Please enter the telephone number.";     
    } else{
        $telephone = $input_telephone;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter the address.";     
    } else{
        $address = $input_address;
    }

    // Validate location animal was found
    $input_cat_name = trim($_POST["cat_name"]);
    if(empty($input_cat_name)){
        $cat_name_err = "Please enter the name of animal adopted.";     
    } else{
        $cat_name = $input_cat_name;
    }
    
    // Check input errors before updating in database
    if(empty($customer_name_err) && empty($telephone_err) && empty($address_err) && empty($cat_name_err)){
        // Prepare an update statement
 	$sql = "UPDATE Customer SET customer_name=?, telephone=?, address=?, cat_name=? WHERE customer_id=?";
	 // Did not add the updating of email and password because the user only should be given that privilege to change those.
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_telephone, $param_address, $param_cat_name ,$param_id);
            
            // Set parameters
            $param_name = $customer_name;
            $param_telephone = $telephone;
            $param_address = $address;
	    $param_cat_name = $cat_name;
	    $param_id = $customer_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: Customer.php");
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
    if(isset($_GET["customer_id"]) && !empty(trim($_GET["customer_id"]))){
        // Get URL parameter
        $customer_id =  trim($_GET["customer_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Customer WHERE customer_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $customer_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    // Fetch result row as an associative array.
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $customer_name = $row["customer_name"];
                    $telephone = $row["telephone"];
                    $address = $row["address"];
		    $cat_name = $row["cat_name"];
		    $customer_id = $row["customer_id"];
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
                    <p>Please edit the information and submit to update the Customer/Member's record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Customer/Member Name:</label>
                            <input type="text" name="customer_name" class="form-control <?php echo (!empty($customer_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_name; ?>">
                            <span class="invalid-feedback"><?php echo $customer_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone:</label>
                            <input type="text" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                            <span class="invalid-feedback"><?php echo $telephone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
			<div class="form-group">
                            <label>Name of Wild Cat Adopted:</label>
                            <input type="text" name="cat_name" class="form-control <?php echo (!empty($cat_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cat_name; ?>">
                            <span class="invalid-feedback"><?php echo $cat_name_err;?></span>
                        </div>
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Customer.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
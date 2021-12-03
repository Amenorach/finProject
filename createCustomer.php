<?php
// Include database connection file
require_once "db_connection.php";
 
// Define variables and initialize with empty values
$customer_name = $telephone = $address = $cat_name = $email = $password = "";
$customer_name_err = $telephone_err = $address_err = $cat_name_err = $email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["customer_name"]);
    if(empty($input_name)){
        $customer_name_err = "Please enter the name of the Customer/Member.";
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

    // Validate cat name
    $input_cat_name = trim($_POST["cat_name"]);
    if(empty($input_cat_name)){
        $cat_name_err = "Please enter the name of animal.";     
    } else{
        $cat_name = $input_cat_name;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the email.";     
    } else{
        $email = $input_email;
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){ //string length less than 6, prompt the user.
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    // Check input errors before inserting in database
    if(empty($customer_name_err) && empty($telephone_err) && empty($address_err) && empty($cat_name_err) && empty($email_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Customer (customer_name, telephone, address, cat_name, email, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_telephone, $param_address, $param_cat_name, $param_email, $param_password);
            
            // Set parameters
            $param_name = $customer_name;
            $param_telephone = $telephone;
            $param_address = $address;
	    $param_cat_name = $cat_name;
	    $param_email = $email;
	    $param_password = $password;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add new Customer/Member record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <label>Name of Cat Adopted:</label>
                            <input type="text" name="cat_name" class="form-control <?php echo (!empty($cat_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cat_name; ?>">
                            <span class="invalid-feedback"><?php echo $cat_name_err;?></span>
                        </div>
			<div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
				<span class="invalid-feedback"><?php echo $password_err; ?></span>
			</div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Customer.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
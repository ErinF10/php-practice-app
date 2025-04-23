<?php
//    if(isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
//    }
if(isset($_POST['submit'])){
		
    // check email
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // check title
    if(empty($_POST['title'])){
        $errors['title'] = 'A title is required';
    } else{
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }

    // check ingredients
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'At least one ingredient is required';
    } else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }

    if(array_filter($errors)){
        //echo 'errors in form';
    } else {
        //echo 'form is valid';
        header('Location: index.php');
    }

} // end POST check

?>

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your Email</label>
            <input type="text" name="email">
            <label>Pizza Title: </label>
            <input type="text" name="title">
            <label>Ingredients: (comma separated)</label>
            <input type="text" name="ingredients">
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>

    <?php include('templates/footer.php') ?>
</body>
</html>
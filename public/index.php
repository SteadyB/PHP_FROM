<?php
    require "../src/form.php";
    $options = ['Question', 'Contact', 'Aftersale', 'Other'];
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>THE FORM</title>
</head>

<body>
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3">FORM</h1>
            <hr class="my-2">
            <p class="lead">GET or POST</p>
            <div class="success-content">
                <?php if (!empty($_POST) && errorsCheck($errors) === true) : ?><!--TODO if empty errors-->
                <h4 class="alert alert-success">Message send, bye.</h4>
                    <p><span>Name :</span> <?php echo htmlentities($_POST['user_Lname']) ?>
                        <?php echo htmlentities($_POST['user_Fname']) ?> -
                        <span>Email : </span><?php echo htmlentities($_POST['user_email']) ?> -
                        <span> Phone number : </span><?php echo htmlentities($_POST['user_phone']) ?></p>
                    <hr class="my-2">
                    <p><span>message type : </span><?php echo htmlentities($_POST['msg_type']) ?> <span> Your message :</span></p>
                    <p class="blockquote"><?= htmlentities($_POST['user_message']) ?></p>
                <?php endif; ?>
                </div>

        </div>
    </div>

    <div class="row justify-content-center">
        <form class="" action="" method="post" >
            <div class="form-group no-gutters">
                <div class="col-12 form-group">
                        <label for="nom">Lastname :</label>
                        <input class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['lastNameERR'])):
                        echo "error";
                    endif; ?>" type="text" id="nom" name="user_Lname" minlength="2" maxlength="100"
                            value="<?php if (!empty($_POST) && errorsCheck($errors) === false) :
                                echo htmlentities($_POST['user_Lname']);
                            endif; ?>">
                    <?php if (!empty($errors['lastNameERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['lastNameERR'] . "</p>";
                    endif; ?>
                      </div>

                <div class="col-12 form-group">
                        <label for="Firstname">Firstname :</label>
                        <input class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['firstNameERR'])):
                        echo "error";
                    endif; ?>" type="text" id="Firstname" name="user_Fname" minlength="2" maxlength="150"
                            value="<?php if (!empty($_POST) && errorsCheck($errors) === false) :
                                echo htmlentities($_POST['user_Fname']);
                            endif; ?>">
                    <?php if (!empty($errors['firstNameERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['firstNameERR'] . "</p>";
                    endif; ?>
                      </div>

                  <div class="col-12 form-group">
                        <label for="email">Email :</label>
                        <input class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['emailERR'])):
                        echo "error";
                    endif; ?>"
                               type="email" id="email" name="user_email"
                               value="<?php if (!empty($_POST) && errorsCheck($errors) === false) :
                                    echo htmlentities($_POST['user_email']);
                                endif; ?>"><?php if (!empty($errors['emailERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['emailERR'] . "</p>";
                    endif; ?>
                      </div>

                  <div class="col-12 form-group">
                        <label for="phone">phone number :</label>
                        <input class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['phoneERR'])):
                        echo "error";
                    endif; ?>" type="tel" id="phone" name="user_phone" pattern="^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$" minlength="10"
                               value="<?php if (!empty($_POST) && errorsCheck($errors) === false) :
                                    echo htmlentities($_POST['user_phone']);
                                endif; ?>">
                    <?php if (!empty($errors['phoneERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['phoneERR'] . "</p>";
                    endif; ?>
                      </div>

                <div class="col-12 form-group">
                        <label for="msg_type">message type : </label>
                    <select name="msg_type" class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['selectERR'])):
                        echo "error";
                    endif; ?>" id="msg_type">
                        <option disabled selected value>-- Please select a type --</option>
                         <?php foreach($options as $option => $typeOption) : ?>
                            <option value="<?=$typeOption?>"
                                <?php if(!empty($errors) && !empty($_POST)) echo 'selected'; ?>
                            ><?= $typeOption?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['selectERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['selectERR'] . "</p>";
                    endif; ?>     
                      </div>

                <div class="col-12 form-group">
                        <label for="message">Message :</label>
                        <textarea class="form-control form-control-lg <?php if (!empty($_POST) && !empty($errors['selectERR'])):
                        echo "error";
                    endif; ?>" id="message" name="user_message" minlength="25" maxlength="450" required><?php if (!empty($_POST) && errorsCheck($errors) === false) :
                                echo htmlentities($_POST['user_message']);
                            endif; ?></textarea>
                    <?php if (!empty($errors['messageERR'])):
                        echo "<p class='text-center text-danger'>" . $errors['messageERR'] . "</p>";
                    endif; ?>
                      </div>
                 
                  <div class="col-12 form-group">
                        <button class="form-control  btn btn-lg btn-info" type="submit">Send Message</button>
                </div>
            </div>
             
        </form>
    </div>

</div>

    <!--SCRIPT-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--SCRIPT-->
</body>
</html>

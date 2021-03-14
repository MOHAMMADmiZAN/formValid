<?php
session_start();
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registerForm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/formStyle.css">

</head>
<body class="img-bg">
<header class="formTitle">
    <div class="container"><h1>registerForm</h1></div>
</header>
<main class="formContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="response.php" method="post">
                    <label for="name">fullName:</label>
                    <input type="text" id="name"
                           placeholder="Type Your Name"
                           name="name" <?php if (isset($_SESSION["errorMessageName"]) || isset($_SESSION["errorMessageRegexName"])) {
                        print("class='errorMessageInput'");
                    } ?>>
                    <?php
                    if (isset($_SESSION["errorMessageName"])) {
                        echo "Error: " . $_SESSION["errorMessageName"];
                        unset($_SESSION["errorMessageName"]);
                    } else if (isset($_SESSION["errorMessageRegexName"])) {
                        echo "Error: " . $_SESSION["errorMessageRegexName"];
                        unset($_SESSION["errorMessageRegexName"]);
                    }
                    ?>
                    <label for="email">email: </label>
                    <input type="email" id="email" placeholder=" Type Your Email"
                           name="email" <?php if (isset($_SESSION["errorMessageMail"]) || isset($_SESSION["errorMessageRegexMail"])) {
                        print("class='errorMessageInput'");
                    } ?>>
                    <?php
                    if (isset($_SESSION["errorMessageMail"])) {
                        echo "Error: " . $_SESSION["errorMessageMail"];
                        unset($_SESSION["errorMessageMail"]);
                    } else if (isset($_SESSION["errorMessageRegexMail"])) {
                        echo "Error: " . $_SESSION["errorMessageRegexMail"];
                        unset($_SESSION["errorMessageRegexMail"]);
                    }
                    ?>
                    <label for="password">password:</label>
                    <input type="password" id="password" placeholder=" Type Your Password"
                           name="password" <?php if (isset($_SESSION["errorMessagePassword"]) || isset($_SESSION["errorMessageRegexPassword"])) {
                        print("class='errorMessageInput'");
                    } ?>>
                    <?php

                    if (isset($_SESSION["errorMessagePassword"])) {
                        echo "Error: " . $_SESSION["errorMessagePassword"];
                        unset($_SESSION["errorMessagePassword"]);
                    } else if (isset($_SESSION["errorMessageRegexPassword"])) {
                        echo "Error: " . $_SESSION["errorMessageRegexPassword"];
                        unset($_SESSION["errorMessageRegexPassword"]);
                    }
                    ?>
                    <label for="re-password">confirmPassword:</label>
                    <input type="password" id="re-password" placeholder=" Confirm Your Password"
                           name="confirmPassword" <?php if (isset($_SESSION["errorMessageConfirmPassword"]) || isset($_SESSION["errorMessageConfirmPasswordNotMatch"]) || isset($_SESSION["errorMessageConfirmPasswordRegex"])) {
                        print("class='errorMessageInput'");
                    } ?>>
                    <?php
                    if (isset($_SESSION["errorMessageConfirmPassword"])) {
                        echo "Error: " . $_SESSION["errorMessageConfirmPassword"];
                        unset($_SESSION["errorMessageConfirmPassword"]);
                    } else if (isset($_SESSION["errorMessageConfirmPasswordNotMatch"])) {
                        echo "Error: " . $_SESSION["errorMessageConfirmPasswordNotMatch"];
                        unset($_SESSION["errorMessageConfirmPasswordNotMatch"]);

                    } else if (isset($_SESSION["errorMessageConfirmPasswordRegex"])) {
                        echo "Error: " . $_SESSION["errorMessageConfirmPasswordRegex"];
                        unset($_SESSION["errorMessageConfirmPasswordRegex"]);
                    }
                    ?>
                    <label for="cell">cellNumber: </label>
                    <input type="text" id="cell" placeholder="Type Your Cell Number"
                           name="cell"<?php if (isset($_SESSION["errorMessageCell"]) || isset($_SESSION["errorMessageCellRegex"])) {
                        print("class='errorMessageInput'");
                    } ?>>
                    <?php
                    if (isset($_SESSION["errorMessageCell"])) {
                        echo "Error: " . $_SESSION["errorMessageCell"];
                        unset($_SESSION["errorMessageCell"]);
                    } else if (isset($_SESSION["errorMessageCellRegex"])) {
                        echo "Error: " . $_SESSION["errorMessageCellRegex"];
                        unset($_SESSION["errorMessageCellRegex"]);
                    }
                    ?>
                    <div class="selectGender displayBlock">selectYourGender :
                        <input type="radio" id="gender" name="gender" class="widthAuto" value="Male">
                        <label for="gender" class="displayInlineBlock">Male</label>
                        <input type="radio" id="genderF" name="gender" value="Female" class="widthAuto">
                        <label for="genderF" class="displayInlineBlock">Female</label>
                        <?php
                        if (isset($_SESSION["errorMessageGender"])) {
                            echo "<span style='color:black;'>Error:</span> " . $_SESSION["errorMessageGender"];
                            unset($_SESSION["errorMessageGender"]);
                        }
                        ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="./assets/js/script.js"></script>
</body>
</html>
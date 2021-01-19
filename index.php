<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="formTitle">
    <div class="container"><h1>registerForm</h1></div>
</header>
<main class="formContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="response.php" method="post">
                    <label for="name">FULL_NAME:</label>
                    <input type="text" id="name" placeholder="Type Your Name" name="name">
                    <label for="email">EMAIL: </label>
                    <input type="email" id="email" placeholder=" Type Your Email" name="email" required>
                    <label for="password">PASSWORD:</label>
                    <input type="password" id="password" placeholder=" Type Your Password" name="password">
                    <label for="re-password">CONFIRM_PASSWORD:</label>
                    <input type="password" id="re-password" placeholder=" Confirm Your Password" name="confirmPassword">
                    <label for="cell">CELL_NUMBER: </label>
                    <input type="text" id="cell" placeholder="Type Your Cell Number" name="cell">
                    <div class="selectGender displayBlock">Select Your Gender :
                        <input type="radio" id="gender" name="gender" class="widthAuto" value="Male">
                        <label for="gender" class="displayInlineBlock">Male</label>
                        <input type="radio" id="genderF" name="gender" value="Female" class="widthAuto">
                        <label for="genderF" class="displayInlineBlock">Female</label>
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
<script src="js/script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/> 
        <script src="js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="loginPage.css" rel="stylesheet" type="text/css"/>
        <script src="loginPage.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="loginContainer"> 
            <div id="errorMessage" style="color: red"></div>
            <form name="loginForm" method="post" action="">
                <div class="form-group">
                    <label for="inputUserName">User Name</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username or Email">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <!--                <a type="submit" class="btn btn-primary btn-lg btn-block" onclick="checkFormat()">Log On</a>-->
            </form>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="checkFormat()">Log On</button>
        </div>
    </body>
</html>

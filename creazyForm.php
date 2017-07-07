<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/> 
        <script src="js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="creazyForm.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="formContainer" style="width: 600px; height: auto; margin: auto; border: 1px black solid;overflow:auto;">
            <!-- 如果Form中需要电话，那么input的name必须是phoneNumber，而且必须紧跟phoneError,可以参考emial!!!-->
            <!-- 注意Form中Email和Subject的input name必须是email和subject!!!-->
            <form class="form-horizontal" id="creazyForm" name="creazyForm" method="post" action="">
                <div class="col-sm-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" required="" placeholder="Your Name*">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" required="" placeholder="E-mail Address*">
                        <div id="emailError" style="color: red"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" required="" placeholder="Subject*">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <textarea class="form-control" rows="6" id="message" name="message" required="" placeholder="Message*"></textarea>
                    </div>
                </div>
                <input type="hidden" name="receiverEmail" value="bullplusstudio@gmail.com">
                <!-- sectionNames, sectionTitles和sectionTypes的分隔符是##,三者的element必须一一对应并且总数相同 -->
                <input type="hidden" name="sectionNames" value="name##email##subject##message">
                <input type="hidden" name="sectionTitles" value="Name##Email Address##Subject##Content">
                <input type="hidden" name="sectionTypes" value="special##normal#normal#normal">
                <div style="text-align: center;">
                    <input type="submit" id="submitCreazyForm" class="btn btn-primary"></input>
                </div>
            </form>
        </div>
    </body>
</html>
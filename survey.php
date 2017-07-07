<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/> 
        <script src="js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="survey.css" rel="stylesheet" type="text/css"/>
        <script src="survey.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="surveyContainer" style="width: 800px; margin: auto;">
            <form class="form-horizontal" id="surveyForm" name="surveyForm" method="post" action="">
                <div class="form-group">
                    <label for="question1">1. Do you have an existing Trademark?</label>
                    <input type="radio" name="question1" value="yes" onclick="displayText(this.name)">Yes
                    <input type="radio" name="question1" value="no" onclick="hiddenText(this.name)" checked="">No
                </div>
                <div id="question1" class="form-group hiddenText">
                    <label for="question1_1">&nbsp;&nbsp;&nbsp;&nbsp;In which country or countries list numbers in to hand?</label>
                    <input type="text" class="form-control" id="question1_1" name="question1_1" style="width: 400px !important;">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question2">2. Do you export from New Zealand?</label>
                    <input type="radio" name="question2" value="yes" onclick="displayText(this.name)">Yes
                    <input type="radio" name="question2" value="no" onclick="hiddenText(this.name)" checked="">No
                </div>
                <div id="question2" class="form-group hiddenText">
                    <label for="question2_1">&nbsp;&nbsp;&nbsp;&nbsp;Which countries?</label>
                    <input type="text" class="form-control" id="question2_1" name="question2_1" style="width: 400px !important;" placeholder="countries">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question3">3. What sector is most relevant for your business?</label>
                    <input type="text" class="form-control" id="qustion3" name="qustion3" style="width: 400px !important;" required="" placeholder="i.e.IT, Motor Trade, Supermarket etc">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question4">4. Do you have a corporate logo?</label>
                    <input type="radio" name="question4" value="yes">Yes
                    <input type="radio" name="question4" value="no" checked="">No
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question5">5. Do you require website and/or optimization assistance?</label>
                    <input type="radio" name="question5" value="yes">Yes
                    <input type="radio" name="question5" value="no" checked="">No
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question6">6. Do you require Chinese translation and/or transliteration of advertising copy for the Chinese market?</label>
                    <input type="radio" name="question6" value="yes">Yes
                    <input type="radio" name="question6" value="no" checked="">No
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question7">7. Do you require similar services for any other countries?</label>
                    <input type="radio" name="question7" value="yes">Yes
                    <input type="radio" name="question7" value="no" checked="">No
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question8_1">8. How long have you been in business?</label>
                    <input type="text" class="form-control" id="question8_1" name="question8_1" style="width: 400px !important;" required="">
                    <label for="question8_2">&nbsp;&nbsp;&nbsp;&nbsp;How long have you been using your trade mark?</label>
                    <input type="text" class="form-control" id="question8_2" name="question8_2" style="width: 400px !important;" required="">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question9">9. Do you investment in sponsorship?</label>
                    <input type="radio" name="question9" value="yes" onclick="displayText(this.name)">Yes
                    <input type="radio" name="question9" value="no" onclick="hiddenText(this.name)" checked="">No
                </div>
                <div id="question9" class="form-group hiddenText">
                    <label for="question9_1">&nbsp;&nbsp;&nbsp;&nbsp; Which sports/areas?</label>
                    <input type="text" class="form-control" id="question9_1" name="question9_1" style="width: 400px !important;" placeholder="sports/areas">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="question10">10. Do you require marketing assistance in any countries outside of New Zealand?</label>
                    <input type="radio" name="question10" value="yes" onclick="displayText(this.name)">Yes
                    <input type="radio" name="question10" value="no" onclick="hiddenText(this.name)" checked="">No
                </div>
                <div id="question10" class="form-group hiddenText">
                    <label for="question10_1">&nbsp;&nbsp;&nbsp;&nbsp; Where would you most require assistance?</label>
                    <input type="text" class="form-control" id="question10_1" name="question10_1" style="width: 400px !important;">
                </div>
                <!-- ******** CUT LINE ******** -->
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">NAME: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" required="" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">POSITION: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="position" name="position" required="" placeholder="Your Position">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">COMPANY: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company" name="company" required="" placeholder="Your Company Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">EMAIL: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" required="" placeholder="example@123.com">
                        <div id="emailError" style="color: red"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">PHONE : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" required="" placeholder="123456789">
                        <div id="phoneError" style="color: red"></div>
                    </div>
                </div>
                <input type="submit" id="submitSurveyForm" class="btn btn-primary"></input>
            </form>
        </div>
    </body>
</html>

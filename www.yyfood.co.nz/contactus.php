
<script language=JavaScript>
        function InputCheck(formsingin)
        {

                if (formsingin.fname.value == "")
                {

                        document.getElementById("demo1").innerHTML = "*Enter first name";
                        document.getElementById("demo1").style.color = "red";
                        formsingin.fname.focus();
                        return (false);
                }

                else {
                        var pattern = /^[A-Za-z]+/;
                        var fname = document.getElementById("fname");
                        if (!pattern.test(fname.value))
                        {
                                document.getElementById("demo1").innerHTML = "*Only letter";
                                document.getElementById("demo1").style.color = "red";
                                fname.focus();
                                return (false);
                        }
                }



                if (formsingin.lname.value == "")
                {

                        document.getElementById("demo2").innerHTML = "*Enter last name";
                        document.getElementById("demo2").style.color = "red";
                        formsingin.lname.focus();
                        return (false);
                }

                else {
                        var pattern = /^[A-Za-z]+/;
                        var lname = document.getElementById("lname");
                        if (!pattern.test(lname.value))
                        {
                                document.getElementById("demo2").innerHTML = "*Only letter";
                                document.getElementById("demo2").style.color = "red";
                                lname.focus();
                                return (false);
                        }
                }








                if (formsingin.email.value == "")
                {

                        document.getElementById("demo3").innerHTML = "*Enter email";
                        document.getElementById("demo3").style.color = "red";
                        formsingin.email.focus();
                        return (false);
                }
                else {


                        var pattern = /([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i;
                        var email = document.getElementById("email");
                        if (!pattern.test(email.value))
                        {

                                document.getElementById("demo3").innerHTML = "*Only email format";
                                document.getElementById("demo3").style.color = "red";
                                email.focus();
                                return (false);
                        }
                }




                if (formsingin.phone.value == "")
                {

                        document.getElementById("demo4").innerHTML = "*Enter phone number";
                        document.getElementById("demo4").style.color = "red";
                        formsingin.phone.focus();
                        return (false);
                }
                else {
                        var pattern = /^\d+/;
                        var phone = document.getElementById("phone");
                        if (!pattern.test(phone.value))
                        {

                                document.getElementById("demo4").innerHTML = "*Must be number";
                                document.getElementById("demo4").style.color = "red";
                                phone.focus();
                                return (false);
                        }
                }






                if (formsingin.message.value == "")
                {
                        document.getElementById("demo5").innerHTML = "*Message content is empty";
                        document.getElementById("demo5").style.color = "red";
                        formsingin.message.focus();
                        return (false);
                }
        }

</script>


<div class="container-fluid clearPaddingAndMargin contactpage" >
        <div class="row fill clearPaddingAndMargin"> 
                <div class="col-xs-12 col-sm-12 col-md-5 clearPaddingAndMargin mapPart">
                        <iframe marginheight="0" class="contactMap" src="https://maps.google.co.nz/maps?q=10+Hotunui+Drive,+Mt+Wellington,+Auckland,+New+Zealand&amp;ie=UTF8&amp;hq=&amp;hnear=10+Hotunui+Dr,+Mt+Wellington,+Auckland+1060,+Auckland&amp;gl=nz&amp;t=m&amp;z=14&amp;ll=-36.923918,174.849574&amp;output=embed" frameborder="0" marginwidth="0" scrolling="no"></iframe>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 clearPaddingAndMargin contactPart">
                        <div class="row contactFirst">
                                <div class="contactContent">
                                        <div class="contact-header">
                                                <h2>ADDRESS</h2>
                                        </div>
                                        <div class="contact-body">
                                                <div>
                                                        <p>Phone: +64 9 276 2268 or +64 9 270 3038</p>
                                                        <p>Fax: +64 9 276 2168</p>
                                                        <p>Email: <a href="mailto:sales@yyfood.co.nz">sales@yyfood.co.nz</a></p>
                                                        <p>Address: 10 Hotunui Drive, Mt Wellington, Auckland, New Zealand</p>
                                                        <p>PO Box 62 092, Mt Wellington, Auckland, New Zealand</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row contactSecond">
                                <div class="row" id="contactus_form">
                                        <h2>CONTACT US</h2>
                                        <form class="form-horizontal" role="form" action="?contactUsEmail.php" method="post">
                                                <!--<div class="">-->
                                                <!--</div>-->
                                                <!--<div class="contactus-form-group">-->

                                                        <div class="col-sm-8 col-sm-offset-2 contactus-form-group">
                                                                <input id="lname" name="name" type="text" placeholder="Name" class="form-control" >
                                                        </div>
<!--                                                </div>-->
                                                <!--<div class="contactus-form-group">-->

                                                        <div class="col-sm-8 col-sm-offset-2 contactus-form-group">
                                                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@email.com" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required >
                                                        </div>
                                                <!--</div>-->
                                                <!--<div class="contactus-form-group">-->

                                                        <div class="col-sm-8 col-sm-offset-2 contactus-form-group">
                                                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                                                        </div>
                                                <!--</div>-->
                                                <!--<div class="contactus-form-group">-->

                                                        <div class="col-sm-8 col-sm-offset-2 contactus-form-group">
                                                                <textarea class="form-control" name="message" id="inputMessage" placeholder="Message"></textarea>
                                                        </div>
                                                <!--</div>-->
                                                <!--<div class="contactus-form-group">-->
                                                        <div class="col-sm-offset-2 col-sm-8 contactus-form-group">
                                                                <button type="submit"  id="contact_submit"  class="btn btn-default"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;Submit</button>
                                                        </div>
                                                <!--</div>-->
                                        </form>
                                </div>
                        </div>
                </div>

        </div>

</div>


<!--                <div class="panel panel-default contactmax">
                        <div class="text-center header">Our Office</div>
                        <div class="panel-body text-center">
                                <h4>Address</h4>
                                <div>
                                        Phone: +64 9 276 2268 or +64 9 270 3038<br />
                                        Fax: +64 9 276 2168<br />
                                        Email: <a href="mailto:yyltd@hotmail.com">yyltd@hotmail.com</a><br />
                                        Address: 10 Hotunui Drive, Mt Wellington, Auckland, New Zealand<br />
                                        PO Box 62 092, Mt Wellington, Auckland, New Zealand
                                </div>
                                <hr />
                                <div>
                                        <iframe height="400" marginheight="0" src="https://maps.google.co.nz/maps?q=10+Hotunui+Drive,+Mt+Wellington,+Auckland,+New+Zealand&amp;ie=UTF8&amp;hq=&amp;hnear=10+Hotunui+Dr,+Mt+Wellington,+Auckland+1060,+Auckland&amp;gl=nz&amp;t=m&amp;z=14&amp;ll=-36.923918,174.849574&amp;output=embed" frameborder="0" width="600" marginwidth="0" scrolling="no"></iframe><br />
                                        <small><a style="color: #0000ff; text-align: left" href="https://maps.google.co.nz/maps?q=10+Hotunui+Drive,+Mt+Wellington,+Auckland,+New+Zealand&amp;ie=UTF8&amp;hq=&amp;hnear=10+Hotunui+Dr,+Mt+Wellington,+Auckland+1060,+Auckland&amp;gl=nz&amp;t=m&amp;z=14&amp;ll=-36.923918,174.849574&amp;source=embed">View Larger Map</a></small></div>

                        </div>
                </div>

                <div class="well well-sm contactmax">
                        <form class="form-horizontal" name="formsingin" onsubmit="return InputCheck(formsingin)" action="?contactUsEmail.php" method="post">
                                <fieldset>
                                        <legend class="text-center header">Contact us</legend>

                                        <div class="form-group">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control" > <div id="demo1"></div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control" > <div id="demo2"></div>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" required> <div id="demo3"></div>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control"><div id="demo4"></div>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea><div id="demo5"></div>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                                </div>
                                        </div>
                                </fieldset>
                        </form>
                </div>-->
















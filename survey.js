function hiddenText(id) {
    var target = id + "_1";
    var newTarget = "#" + target;
    $(newTarget).prop('required', false);
    document.getElementById(id).className = "form-group hiddenText";
}

function displayText(id) {
    var target = id + "_1";
    var newTarget = "#" + target;
    $(newTarget).prop('required', true);
    document.getElementById(id).className = "form-group displayText";
}

function validateEmail(email) {
    var emailFormat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return emailFormat.test(email);
}

function validatePhone(phoneNumber) {
    var phoneFormat = /^[\d\.\-]+$/;
    if (phoneNumber.length >= 7 && phoneFormat.test(phoneNumber)) {
        return true;
    } else {
        return false;
    }
}

$(function () {
    $('#surveyForm').on('submit', function () {
        var email = $('#email').val();
        var phoneNumber = $('#phone').val();

        if (validateEmail(email)) {
            if (validatePhone(phoneNumber)) {
                
                $.post("sendEmail.php",{
                    emailAddress: email,
                    phone: phoneNumber
                },
                function(data){
                    alert(data);
                });
                
                document.getElementById('emailError').innerHTML = "";
                document.getElementById('phoneError').innerHTML = "";
            } else {
                document.getElementById('emailError').innerHTML = "";
                document.getElementById('phoneError').innerHTML = "***Invalid Phone Number";
                return false;
            }
        } else {
            if (validatePhone(phoneNumber)) {
                document.getElementById('phoneError').innerHTML = "";
                document.getElementById('emailError').innerHTML = "***Invalid Email Address";
                return false;
            } else {
                document.getElementById('emailError').innerHTML = "***Invalid Email Address";
                document.getElementById('phoneError').innerHTML = "***Invalid Phone Number";
                return false;
            }
        }
        return false;
    });
});

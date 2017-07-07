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

function generateBoby(sectionNameList, sectionTitleList, sectionTypeList) {
    var bodyContent = '<html><body>';
    bodyContent += '<table rules="all" style="border-color: #666;" cellpadding="10">';
    for (i = 0; i < sectionNameList.length; i++) {
        if (sectionTypeList[i] == "special") {
            bodyContent = bodyContent + '<tr style="background: #eee;"><td><strong>' + sectionTitleList[i] + ':</strong></td><td>' + document.getElementsByName(sectionNameList[i])[0].value + '</td></tr>';
        } else {
            bodyContent = bodyContent + '<tr><td><strong>' + sectionTitleList[i] + ':</strong></td><td>' + document.getElementsByName(sectionNameList[i])[0].value + '</td></tr>';
        }
    }
    bodyContent += '</table>';
    bodyContent += '</body></html>';
    return bodyContent;
}

function generateReplyBody(bodyContent) {
    var position = bodyContent.indexOf("<body>") + 6;
    var replyBodyContent = bodyContent.substr(0,position) + '<h2>Your Email Has Been Sent Successfully!</h2>' + bodyContent.substr(position);
    alert(replyBodyContent);
    return replyBodyContent;
}

$(function () {
    $('#creazyForm').on('submit', function () {
        var sectionNames = document.getElementsByName("sectionNames")[0].value;
        var sectionTitles = document.getElementsByName("sectionTitles")[0].value;
        var sectionTypes = document.getElementsByName("sectionTypes")[0].value;
        var sectionNameList = sectionNames.split("##");
        var sectionTitleList = sectionTitles.split("##");
        var sectionTypeList = sectionTypes.split("##");

        var senderEmail = document.getElementsByName("email")[0].value;
        if (!validateEmail(senderEmail)) {
            document.getElementById('emailError').innerHTML = "***Invalid Email Address";
            return false;
        } else {
            document.getElementById('emailError').innerHTML = "";
        }

        if (sectionNameList.indexOf("phoneNumber") > -1) {
            var phoneNumber = document.getElementsByName("phoneNumber")[0].value;
            if (!validatePhone(phoneNumber)) {
                document.getElementById('phoneError').innerHTML = "***Invalid Phone Number";
                return false;
            } else {
                document.getElementById('phoneError').innerHTML = "";
            }
            //console.log("phoneNumber");
        }

        var receiverEmail = document.getElementsByName("receiverEmail")[0].value;
        var emailSubject = document.getElementsByName("subject")[0].value;
        var bodyContent = generateBoby(sectionNameList, sectionTitleList, sectionTypeList);
        var replyBodyContent = generateReplyBody(bodyContent);
        $.post("sendEmail_new.php", {
            receiverEmail: receiverEmail,
            senderEmail: senderEmail,
            emailSubject: emailSubject,
            bodyContent: bodyContent,
            replyBodyContent: replyBodyContent
        },
        function (data) {
            alert(data);
        });

        //最后需要返回false,阻止Form页面刷新
        return false;
    });
});
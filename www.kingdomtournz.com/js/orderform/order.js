function IsNumeric(sText)

{
    var ValidChars = "0123456789.";
    var IsNumber = true;
    var Char;


    for (i = 0; i < sText.length && IsNumber == true; i++)
    {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1)
        {
            IsNumber = false;
        }
    }
    return IsNumber;

}
;

function calcProdSubTotal() {

    var prodSubTotal = 0;

    $(".row-total-input").each(function() {

        var valString = $(this).val() || 0;

        prodSubTotal += parseFloat(valString);

    });
    var prodSubTotalnice = prodSubTotal;
//    var formTotal=document.getElementById("orderform_total");
    $("#product-subtotal").val(prodSubTotalnice);
    $("#orderform_total").val(prodSubTotalnice);
//    formTotal.val(prodSubTotalnice);
}
;

$(function() {


    $('.peoplenuminput').blur(function() {

        var $this = $(this);

        var numPallets = $this.val();
        var multiplier = $this
                .parent().parent()
                .find("td.peoplenumprice span")
                .text();
        var CrowTotal = $this
                .parent().parent()
                .find("td.child-row-total input")
                .val();
        CrowTotal = parseFloat(CrowTotal);

        if ((IsNumeric(numPallets)) && (numPallets != '')) {

            var prowTotal = numPallets * multiplier;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.people-row-total input")
                    .val(prowTotal);

            var subTotal = prowTotal + CrowTotal;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.row-total input")
                    .val(subTotal);

        } else {

            $this.css("background-color", "#ffdcdc");

        }
        ;

        calcProdSubTotal();

    });

    $('.childnuminput').blur(function() {

        var $this = $(this);

        var numPallets = $this.val();
        var multiplier = $this
                .parent().parent()
                .find("td.childnumprice span")
                .text();
        var ProwTotal = $this
                .parent().parent()
                .find("td.people-row-total input")
                .val();
        ProwTotal = parseFloat(ProwTotal);

        if ((IsNumeric(numPallets)) && (numPallets != '')) {

            var crowTotal = numPallets * multiplier;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.child-row-total input")
                    .val(crowTotal);
            var subTotal = ProwTotal + crowTotal;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.row-total input")
                    .val(subTotal);

        } else {

            $this.css("background-color", "#ffdcdc");

        }
        ;

        calcProdSubTotal();



    });

});
$(function() {

    $('.hotelroominput').blur(function() {

        var $this = $(this);
        var numPallets = $this.val();
        var multiplier = $this
                .parent().parent()
                .find("td.hotelroomnumprice span")
                .text();
        var dateF = $this
                .parent().parent()
                .find("td.tdDateF input")
                .val();
        var dateT = $this
                .parent().parent()
                .find("td.tdDateT input")
                .val();
        var diff = $this
                .parent().parent()
                .find("td.h_day input")
                .val();

        if ((IsNumeric(numPallets)) && (numPallets != '')) {

            var rowTotal = numPallets * multiplier * diff;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.row-total input")
                    .val(rowTotal);

        } else {

            $this.css("background-color", "#ffdcdc");

        }
        ;

        calcProdSubTotal();
    });

});

$(function()
{
    var one_day = 1000 * 60 * 60 * 24;
    $('.tdDateF input').change(function() {
        var $this = $(this);
        var index = ($(this).index('.tdDateF input'));
        var from = $this.val();
        var to = $('.tdDateT input').eq(index).val();
        var dateF = new Date(from);
        var dateT = new Date(to);
        if (!dateF)
        {
            dateF = new Date();
        }
        if (!dateT)
        {
            dateT = new Date();
        }
        var dateF = new Date(from);

        var ff = dateF.getTime();
        var tt = dateT.getTime();

        var diff = tt - ff;

        var diff = Math.round(diff / one_day);
     

        if (!isNaN(diff))
        {
            if (diff > 0)
            {
                $("input.h_dayinput").eq(index).val(diff);

            }

            if (diff < 0)
            {
                $("input.h_dayinput").eq(index).val(0);
                diff = 0;
            }

            gethotelTotal($this, diff);

        }

    });
    $('.tdDateT input').change(function() {
        var $this = $(this);
        var index = ($(this).index('.tdDateT input'));
        var to = $this.val();
        var from = $('.tdDateF input').eq(index).val();
        var dateF = new Date(from);
        var dateT = new Date(to);
        if (!dateF)
        {
            dateF = new Date();
        }
        if (!dateT)
        {
            dateT = new Date();
        }

        var ff = dateF.getTime();
        var tt = dateT.getTime();

        var diff = tt - ff;

        var diff = Math.round(diff / one_day);

        if (!isNaN(diff))
        {
            if (diff > 0)
            {
                $("input.h_dayinput").eq(index).val(diff);

            }
            if (diff < 0)
            {
                $("input.h_dayinput").eq(index).val(0);
                diff = 0;
            }
            gethotelTotal($this, diff)
        }

    });
    function gethotelTotal(self, diff)
    {
        var h_price = self
                .parent().parent()
                .find("td.hotelroomnumprice span")
                .text();
        var h_room = self
                .parent().parent()
                .find("td.hotelroomnumpallets input")
                .val();

        var total = h_price * h_room * diff;
        self.css("background-color", "white")
                .parent().parent()
                .find("td.row-total input")
                .val(total);
	 calcProdSubTotal();
    }

    calcProdSubTotal();
});

$(function() {

    $('.carinput').blur(function() {

        var $this = $(this);
        var numPallets = $this.val();
        var multiplier = $this
                .parent().parent()
                .find("td.carsnumprice span")
                .text();
        var dateF = $this
                .parent().parent()
                .find("td.c_tdDateF input")
                .val();
        var dateT = $this
                .parent().parent()
                .find("td.c_tdDateT input")
                .val();
        var diff = $this
                .parent().parent()
                .find("td.c_day input")
                .val();

        if ((IsNumeric(numPallets)) && (numPallets != '')) {

            var rowTotal = numPallets * multiplier * diff;

            $this
                    .css("background-color", "white")
                    .parent().parent()
                    .find("td.row-total input")
                    .val(rowTotal);

        } else {

            $this.css("background-color", "#ffdcdc");

        }
        ;

        calcProdSubTotal();
    });

});

$(function()
{
    var one_day = 1000 * 60 * 60 * 24;
    $('.c_tdDateF input').change(function() {
        var $this = $(this);
        var index = ($(this).index('.c_tdDateF input'));
        var from = $this.val();
        var to = $('.c_tdDateT input').eq(index).val();
        var dateF = new Date(from);
        var dateT = new Date(to);
        if (!dateF)
        {
            dateF = new Date();
        }
        if (!dateT)
        {
            dateT = new Date();
        }
        var dateF = new Date(from);
        var ff = dateF.getTime();
        var tt = dateT.getTime();

        var diff = tt - ff;

        var diff = Math.round(diff / one_day);

        if (!isNaN(diff))
        {
            if (diff > 0)
            {
                $("input.c_dayinput").eq(index).val(diff);

            }

            if (diff < 0)
            {
                $("input.c_dayinput").eq(index).val(0);
                diff = 0;
            }

            gethotelTotal($this, diff);

        }

    });
    $('.c_tdDateT input').change(function() {
        var $this = $(this);
        var index = ($(this).index('.c_tdDateT input'));
        var to = $this.val();
        var from = $('.c_tdDateF input').eq(index).val();
        var dateF = new Date(from);
        var dateT = new Date(to);
        if (!dateF)
        {
            dateF = new Date();
        }
        if (!dateT)
        {
            dateT = new Date();
        }
        var ff = dateF.getTime();
        var tt = dateT.getTime();

        var diff = tt - ff;

        var diff = Math.round(diff / one_day);

        if (!isNaN(diff))
        {
            if (diff > 0)
            {
                $("input.c_dayinput").eq(index).val(diff);

            }
            if (diff < 0)
            {
                $("input.c_dayinput").eq(index).val(0);
                diff = 0;
            }
            gethotelTotal($this, diff)
        }

    });
    function gethotelTotal(self, diff)
    {
        var h_price = self
                .parent().parent()
                .find("td.carsnumprice span")
                .text();
        var h_room = self
                .parent().parent()
                .find("td.carnumpallets input")
                .val();

        var total = h_price * h_room * diff;
        self.css("background-color", "white")
                .parent().parent()
                .find("td.row-total input")
                .val(total);
	calcProdSubTotal();
    }

    calcProdSubTotal();
});
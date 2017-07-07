var cart_products = Array();
var cart_productsName = Array();
var cart_quantities = Array();
var product_prices = Array();
var currency_symbol = '$';



function reloadProduct()
{
        var restoredSession = JSON.parse(localStorage.getItem('jsonDATA'));
//        alert(restoredSession);
        if (restoredSession == null)
        {

        } else
        {
                for (i = 0; i < restoredSession.length; i++)
                {
                        jsonDATA.product.push({"id": productID,
                                "name": productName,
                                "prices": prices,
                                "quantities": quantities});

                        cart_products.push(productID);
                        cart_productsName[productID] = productName;
                        product_prices[productID] = prices;
                        cart_quantities[productID] = quantities;
                } 
        }



}

function AddToCart(productName, productID, productPrice)
{

        reloadProduct();
//        var product_index = cart_products.indexOf(productID);
//        var product_index = localStorage['product'].indexOf(productID);
        if (product_index > -1)
        {
//                cart_quantities[productID]++;
//                cart_productsName[productID] = productName;
//                product_prices[productID] = productPrice;

//                localStorage[productID]['quantities']++;
//                localStorage[productID]['name'] = productName;
//                localStorage[productID]['prices'] = productPrice;
                jsonDATA.product.push({"id": productID,
                        "name": productName,
                        "prices": productPrice,
                        "quantities": 1});
        }
        else
        {
//                cart_products.push(productID);
//                cart_productsName[productID] = productName;
//                product_prices[productID] = productPrice;
//                cart_quantities[productID] = 1;
//
//                localStorage['product'].push(productID);
//                localStorage[productID]['name'] = productName;
//                localStorage[productID]['prices'] = productPrice;
//                localStorage[productID]['quantities'] = 1;
                jsonDATA.product.push({"id": productID,
                        "name": productName,
                        "prices": productPrice,
                        "quantities": 1});


        }

        ShowPopup("The product was added successfully to your cart!");
        UpdateCart();
}
function ShowPopup(successNotice)
{
        document.getElementById("popup").innerHTML = successNotice;
        document.getElementById("popup").style.display = "block";
        setTimeout(function ()
        {
                document.getElementById("popup").style.display = "none";
        }, 550);
}
//function HidePopup()
//{
//        document.getElementById("popup").style.display = "none";
//}
function UpdateCart()
{
        reloadProduct();
        var cart_html = "";
        var subtotal = 0;
        var size = cart_products.length;
        if (cart_products.length > 0)
        {
                for (i = 0; i < cart_products.length; i++)
                {
                        cart_html += '<div class="row">';
                        cart_html += '<input name="quantity[][' + cart_products[i] + ']"  id="quantity_' + cart_products[i] + '" type="text" value="' + cart_quantities[cart_products[i]] + '" maxlength="2" size="1" class="quantity-text"/>';
                        cart_html += cart_productsName[cart_products[i]];
                        cart_html += '<span class="pull-right inline">' + currency_symbol + formatCurrency(product_prices[cart_products[i]] * cart_quantities[cart_products[i]]) + '</span>';
                        cart_html += '</div>';
                        cart_html += '<hr>';
                        subtotal += product_prices[cart_products[i]] * cart_quantities[cart_products[i]];
                }

                cart_html += '<span class="pull-right">Subtotal: ' + currency_symbol + formatCurrency(subtotal) + '</span>';
                cart_html += '<div class="clearfix"></div>';





        }
        else
        {
                cart_html = "The cart is empty!";
        }
        document.getElementById("Cart").innerHTML = cart_html;
        document.getElementById("shoppingcartNumber").textContent = size;
}
function ProceedUpdate()
{
        for (i = 0; i < cart_products.length; )
        {
                var current_quantity = parseInt(document.getElementById("quantity_" + cart_products[i]).value) || 0;
                if (current_quantity == 0)
                {
                        DeleteProduct(cart_products[i]);
                } else
                {
                        cart_quantities[cart_products[i]] = current_quantity;
                        i++;
                }
        }
        UpdateCart();
}
function DeleteProduct(x)
{
        reloadProduct();

//        var product_index = cart_products.indexOf(x);
        var product_index = localStorage['product'].indexOf(productID);
        if (product_index > -1)
        {
//                cart_products.splice(product_index, 1);
//                cart_productsName[x] = null;
//                product_prices[x] = null;
//                cart_quantities[x] = 0;



                localStorage['product'].removeItem(product_index);
                localStorage[productID]['name'] = null;
                localStorage[productID]['prices'] = null;
                localStorage[productID]['quantities'] = 0;
        }

}

function CheckOut()
{

        if (cart_products.length == 0)
        {

                alert("The cart is empty!");
        }
        else
        {

                var subtotal = 0;
                var products_list = "";
                var formInput = "";
                for (i = 0; i < cart_products.length; i++)
                {

                        formInput += '<input type="hidden" value="' + cart_products[i] + '" name="productID[]" />';
                        formInput += '<input type="hidden" value="' + cart_productsName[cart_products[i]] + '" name="productName[]" />';
                        formInput += '<input type="hidden" value="' + cart_quantities[cart_products[i]] + '" name="productQuantities[]" />';
                        formInput += '<input type="hidden" value="' + product_prices[cart_products[i]] + '" name="productPrice[]" />';
                }
                document.getElementById("payment-from").innerHTML = cart_html;
        }

}
function formatCurrency(num) {
        num = isNaN(num) || num === '' || num === null ? 0.00 : num;
        return parseFloat(num).toFixed(2);
}

//(function ()
//{
//        $('#submitButton').click(function ()
//        {
//           $('#shoppingForm').submit();
//        });
//});


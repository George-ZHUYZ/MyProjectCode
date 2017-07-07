
var jsonDATA = {
        'product': []
};

function readLocal()
{
        if (null === localStorage.getItem('products'))
        {
                return;
        }

        var restoredData = JSON.parse(localStorage.getItem('products'));
        for (i = 0; i < restoredData.product.length; i++)
        {
                var productID = restoredData.product[i].id;
                var productName = restoredData.product[i].name;
                var productPrice = restoredData.product[i].prices;
                var quantities = restoredData.product[i].quantities;

                cart_products.push(productID);
                cart_productsName[productID] = productName;
                product_prices[productID] = productPrice;
                cart_quantities[productID] = quantities;
        }
        UpdateCart();
        ProceedUpdate();

}
function writeLocalFromJS()
{

        jsonDATA = {
                'product': []
        };
        for (i = 0; i < cart_products.length; i++)
        {
                var productID = cart_products[i];
                var productName = cart_productsName[productID];
                var productPrice = product_prices[productID];
                var quantities = cart_quantities[productID];

                jsonDATA.product.push({"id": productID,
                        "name": productName,
                        "prices": productPrice,
                        "quantities": quantities});

        }


        localStorage.setItem('products', JSON.stringify(jsonDATA));
}
function writeLocalFromSQL()
{

        jsonDATA = {
                'product': []
        };
        var body = $("#confirmTbody");
//         console.log($("span#price").value);
        for (i = 0; i < body.find('tr').length; i++)
        {
                var productID = body.find('tr').eq(i).find('input.quantity-number').attr('id');
                productID = productID.substr(11, productID.lenght);
                productID = parseInt(productID);


                var quantities = body.find('tr').eq(i).find('input.quantity-number').val();
                quantities = parseInt(quantities);
                var productName = body.find('tr').eq(i).find('td.productname-info span').text();

                var productPrice = body.find('tr').eq(i).find('#price').text();
                productPrice = productPrice.substr(1, productPrice.length);
                productPrice = parseFloat(productPrice);

                jsonDATA.product.push({"id": productID,
                        "name": productName,
                        "prices": productPrice,
                        "quantities": quantities});
        }

        localStorage.setItem('products', JSON.stringify(jsonDATA));
}
function AddToCart(productName, productID, productPrice)
{

        var product_index = cart_products.indexOf(productID);
        if (product_index > -1)
        {
                cart_quantities[productID]++;
                cart_productsName[productID] = productName;
                product_prices[productID] = productPrice;
        }
        else
        {
                cart_products.push(productID);
                cart_productsName[productID] = productName;
                product_prices[productID] = productPrice;
                cart_quantities[productID] = 1;
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
function UpdateCart()
{
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
        writeLocalFromJS();
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
        var product_index = cart_products.indexOf(x);

        if (product_index > -1)
        {
                cart_products.splice(product_index, 1);
                cart_productsName[x] = null;
                product_prices[x] = null;
                cart_quantities[x] = 0;
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


<?php include __DIR__ . "\header.php";?>

<h1>Stock</h1>

<input type="text" value="" name="search" id="search">


<script>
    printStock("");

    document.getElementById("search").addEventListener("keyup", function(event) {
        printStock(event.target.value);
    });

    function printStock(ev) {
        if (document.getElementById("product")) {
            document.getElementById("product").remove();
        }

        const req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState === 4) {
                let response = JSON.parse(req.responseText);

                for (let i = 0; i < response['stock'].length; ++i) {
                    let product_code = response['stock'][i]['product_code'];
                    let reg = new RegExp("^" + ev);
                    if (reg.test(product_code)) {
                        let product = response['stock'][i];
                        let productDiv = document.createElement('div');
                        productDiv.id = 'product';
                        productDiv.innerHTML = `
                    <div id="product-info">
                        <p>${product['product_code']}</p>
                        <p>${product['quantity']}</p>
                    </div>
                `;
                        document.body.appendChild(productDiv);
                    }
                }
            }
        };
        req.open('GET', '/PA/controllers/GetStock.php');
        req.send();
    }
</script>


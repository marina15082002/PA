<?php include __DIR__ . "\header.php";?>

<main>


    <h1>Stock</h1>

    <input type="text" value="" name="search" id="search">

    <div id="products">

    </div>
    <!--
        <form id="form" class="formulaire" action="distribution" method="POST" enctype='multipart/form-data'>

        </form>-->

    <form id="form" class="formulaire" action="distribution" method="POST" enctype='multipart/form-data'>
        <table class="table table-striped table-hover" id="table">
            <tr>
                <th></th>
                <th><?php echo $lang['FIELD_BARCODE']; ?></th>
                <th><?php echo $lang['FIELD_QUANTITY']; ?></th>
            </tr>
        </table>
    </form>

    <button onclick="createDistrib()">Créer une nouvelle distribution</button>

    <script>
        var products = [];

        let index = 0;
        while(document.getElementById("select" + index)) {
            if (document.getElementById("select" + index).checked){
                products.push(document.getElementById("product_code" + index).innerHTML);
            }
            index++;
        }

        printStock("");

        document.getElementById("search").addEventListener("keyup", function(event) {
            printStock(event.target.value);
        });

        function createDistrib() {
            if (products.length == 0) {
                alert("Veuillez selectionner au moins un produit");
                return;
            } else {
                for (let i = 0; i < products.length; i++) {
                    document.getElementById("form").innerHTML += "<input type='hidden' name='product" + i + "' value='" + products[i] + "'>";
                }
                document.getElementById("form").submit();
            }
        }

        function printStock(ev) {
            while (document.getElementById("product")){
                if (document.getElementById("product")) {
                    document.getElementById("product").remove();
                }
            }

            const req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4) {
                    let response = JSON.parse(req.responseText);

                    for (let i = 0; i < response['stock'].length; ++i) {

                        let product_code = response['stock'][i]['product_code'];
                        let reg = new RegExp("^" + ev);
                        if (reg.test(product_code)) {
                            /*
                            let product = response['stock'][i];
                            let productDiv = document.createElement('div');
                            productDiv.id = 'product';
                            let productInfo = document.createElement('div');
                            productInfo.id = "product-info";
                            productDiv.innerHTML = '<input type="checkbox" id="select' + i + '">';
                            productDiv.innerHTML += '<div id="product_code' + i +'">' + product['product_code'] + '</div>';
                            productDiv.innerHTML += '<div>' + product['quantity'] + '</div>';

                            productDiv.appendChild(productInfo);
                            document.getElementById("products").appendChild(productDiv);
*/
                            let table = document.getElementById("table");
                            console.log(table);
                            let product = response['stock'][i];
                            table.innerHTML += '<tr id="product"><td><input type="checkbox" id="select' + i + '"></td><td id="product_code' + i +'">' + product['product_code'] + '</td><td>' + product['quantity'] + '</td></tr>';


                            for (let j = 0; j < products.length; j++) {
                                console.log(products);
                                if (products[j] == product_code) {
                                    document.getElementById("select" + i).checked = true;
                                    break;
                                }
                            }
                            console.log(i)
                            console.log(document.getElementById("select" + i));
                            document.getElementById("select" + i).addEventListener('change', (event) => {

                                console.log(products)
                                if (event.target.checked) {
                                        products.push(product_code);
                                    } else {
                                        products.splice(products.indexOf(product_code), 1);
                                    }
                                }
                            );
                        }
                    }
                }
            };
            req.open('GET', '/PA/controllers/GetStock.php');
            req.send();
        }
    </script>
</main>


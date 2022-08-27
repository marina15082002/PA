<?php include __DIR__ . "\header.php";?>

<main>
    <style type="text/css">
        main {
            padding-top: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        form {
            width: 60vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            table-layout: fixed;
            margin-top:20px;
        }

        #products td>input {
            min-width: calc(100% - .8rem);
            max-width: calc(100% - .8rem);
        }

        /* Borders */
        #table td, #table th {
            border: 1px solid black;
            padding: 0;
        }

        #table th {
            padding: .2rem;
        }
        #table td:nth-child(2), #table th:nth-child(2) {
            border-left: none;
        }
        #table td:nth-child(1), #table th:nth-child(1) {
            border-right: none;
            width: 2rem;
        }
        #table td {
            padding: .4rem;
        }

        /* Cell sizes */
        #table th:nth-child(2) {
            width: calc(75%);
        }
        #table th:nth-child(3) {
            width: calc(35%);
        }

        .btn {
            margin-top: 2.5%;
            background-color: #6EB784FF;
            width: 10rem;
        }

        .btn:hover{
            background-color: #518863;
            border-color: #113b1a!important;
        }

        .btn:focus{
            box-shadow: 0 0 0 0.2rem rgb(97, 159, 114);
        }

        td svg {
            margin-bottom: 5%;
            margin-left: 5%;
        }

        /* Paragraph */
        main>p {
            font-size: 1.5rem;
            width: 100%;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        form>p, #informations>p {
            width: 100%;
            text-align: left;
            margin-bottom: .5rem;
        }

        .table-striped td {
            overflow: auto;
        }

        /* Responsiveness */
        @media all and (max-width: 800px) {
            form {
                width: 95vw;
            }
        }
    </style>

    <h1><?php echo $lang["TITLE_STOCK"] ;?></h1>

    <input style="width:60vw" type="text" value="" name="search" id="search" placeholder="<?php echo $lang['SEARCH']; ?>">

    <div id="products">

    </div>

    <form id="form" class="formulaire" action="distribution" method="POST" enctype='multipart/form-data'>
        <table class="table table-striped table-hover" id="table">
            <tr>
                <th></th>
                <th><?php echo $lang['FIELD_BARCODE']; ?></th>
                <th><?php echo $lang['FIELD_QUANTITY']; ?></th>
            </tr>
        </table>
    </form>

    <button onclick="createDistrib()" class="btn"><?php echo $lang['BTN_DISTRIB']; ?></button>

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
                            let table = document.getElementById("table");
                            let product = response['stock'][i];
                            let newTr = document.createElement('tr');
                            newTr.id = 'product';
                            let newTd = document.createElement('td');
                            let newInput = document.createElement('input');
                            newInput.type = "checkbox";
                            newInput.id = "select" + i;
                            newTd.appendChild(newInput);
                            newTr.appendChild(newTd);
                            newTd = document.createElement('td');
                            newTd.id = "product_code" + i;
                            newTd.innerHTML = product['product_code'];
                            newTr.appendChild(newTd);
                            newTd = document.createElement('td');
                            newTd.innerHTML = product['quantity'];
                            newTr.appendChild(newTd);
                            table.appendChild(newTr);

                            for (let j = 0; j < products.length; j++) {
                                if (products[j] == product_code) {
                                    document.getElementById("select" + i).checked = true;
                                    break;
                                }
                            }

                            document.getElementById("select" + i).addEventListener('change', (event) => {
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


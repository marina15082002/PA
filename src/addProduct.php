<?php include __DIR__ . "\header.php";?>

<h1 id = "h1"><?php echo $lang["TITLE_ADD_PRODUCT"]; ?></h1>

<main>
    <form id='form' class='formulaire' action='addProduct?index=1' method='POST' enctype='multipart/form-data'>
        <?php
        if ($table == null) {
            echo "
                    <div id='product1'>
                        <label>" . $lang['FIELD_NAME'] . "</label>
                        <input type='text' value='' id='name1' name='name1' size='35'/>
                
                        <label>" . $lang["FIELD_BARCODE"] . "</label>
                        <input type='text' value='' id='barcode1' name='barcode1' size='35'/>
                
                        <label>" . $lang["FIELD_QUANTITY"] . "</label>
                        <input type='int' value='' id='quantity1' name='quantity1'/>
                
                        <button onclick='deleteProduct(1)'>-</button>
                
                        <div style='position:absolute; visibility: collapse' id='fieldEmptyError1' class='alert alert-danger' role='alert'>" . $lang["FIELDS_EMPTY"] . "</div>
                        <div style='position:absolute; visibility: collapse' id='barcodeSyntaxError1' class='alert alert-danger' role='alert'>" . $lang['FIELD_BARCODE_SYNTAX'] . "</div>
                        <div style='position:absolute; visibility: collapse' id='quantitySyntaxError1' class='alert alert-danger' role='alert'>" . $lang['FIELD_QUANTITY_SYNTAX'] . "</div>
                    </div>
                    
                    <button type='button' id='buttonAdd' onclick='add(1)'>+</button>
                    <br>
                    ";
        } else {
            $i = 1;
            foreach ($table as $value) {
                echo "
                    <div id='product" . $i . "'>
                        <label>" . $lang['FIELD_NAME'] . "</label>
                        <input type='text' value='" . $value["product_name"] . "' id='name" . $i . "' name='name" . $i . "' size='35'/>
                
                        <label>" . $lang["FIELD_BARCODE"] . "</label>
                        <input type='text' value='" . $value["product_code"] . "' id='barcode" . $i . "' name='barcode" . $i . "' size='35'/>
                
                        <label>" . $lang["FIELD_QUANTITY"] . "</label>
                        <input type='number' value='" . $value["quantity"] . "' id='quantity" . $i . "' name='quantity" . $i . "' min='1'/>
                
                        <button onclick='deleteProduct(" . $i . ")'>-</button>
                
                        <div style='position:absolute; visibility: collapse' id='fieldEmptyError" . $i . "' class='alert alert-danger' role='alert'>" . $lang["FIELDS_EMPTY"] . "</div>
                        <div style='position:absolute; visibility: collapse' id='barcodeSyntaxError" . $i . "' class='alert alert-danger' role='alert'>" . $lang['FIELD_BARCODE_SYNTAX'] . "</div>
                         <div style='position:absolute; visibility: collapse' id='quantitySyntaxError" . $i . "' class='alert alert-danger' role='alert'>" . $lang['FIELD_QUANTITY_SYNTAX'] . "</div>
                    </div>";
                $i += 1;
            }

            echo "
                <button type='button' id='buttonAdd' onclick='add(" . ($i - 1) . ")'>+</button>
                <br>
                <script>
                    document.getElementById('form').action = 'addProduct?index=" . ($i - 1) . "';
                </script>
            ";
        }

        ?>

        <button type="button" id="buttonConfirm" onclick="check()"><?php echo $lang['BTN_CONFIRM']; ?></button>
    </form>

    <div style="visibility: collapse; position:absolute;" id="informations">
        <label id="date"><?php echo $lang['LABEL_DATE']; ?> : </label><br>
        <label id="hours"><?php echo $lang['LABEL_HOUR']; ?> : </label><br>
        <label id="email"><?php echo $lang['FIELD_EMAIL']; ?> : </label><br>
        <label id="phone"><?php echo $lang['FIELD_PHONE']; ?> : </label><br>
        <label id="country"><?php echo $lang['FIELD_COUNTRY']; ?> : </label><br>
        <label id="city"><?php echo $lang['FIELD_CITY']; ?> : </label><br>
        <label id="address"><?php echo $lang['FIELD_ADDRESS']; ?> : </label><br>

        <form class="formulaire" method="POST" action="printCollectUser" enctype="multipart/form-data">
            <input type="submit" value="<?php echo $lang['BTN_CANCEL']; ?>" class="button">
        </form>
    </div>


    <script>
            const req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4) {
                    console.log(req.responseText);

                    let response = JSON.parse(req.responseText);

                    if (response['printCollect'] != "") {
                        document.title = "<?php echo $lang['LABEL_COLLECT']; ?>";
                        document.getElementById("h1").innerHTML = "<?php echo $lang['LABEL_COLLECT']; ?>";

                        document.getElementById("informations").style.visibility = "visible";
                        document.getElementById("informations").style.position = "relative";

                        document.getElementById("date").innerHTML += response['printCollect'][0]['date'];
                        document.getElementById("hours").innerHTML += response['printCollect'][0]['hours'];
                        document.getElementById("email").innerHTML += response['printCollect'][0]['email'];
                        document.getElementById("phone").innerHTML += response['printCollect'][0]['phone'];
                        document.getElementById("country").innerHTML += response['printCollect'][0]['country'];
                        document.getElementById("city").innerHTML += response['printCollect'][0]['city'];
                        document.getElementById("address").innerHTML += response['printCollect'][0]['address'];
                    }
                }
            };
            req.open('GET', '/PA/controllers/AddProduct.php');
            req.send();

        function check() {
            let i = 1;
            while (document.getElementById("name" + i)) {
                if (document.getElementById("fieldEmptyError" + i).style.visibility === "visible") {
                    document.getElementById("fieldEmptyError" + i).style.visibility = "collapse";
                    document.getElementById("fieldEmptyError" + i).style.position = "absolute";
                } else if (document.getElementById("barcodeSyntaxError" + i).style.visibility === "visible") {
                    document.getElementById("barcodeSyntaxError" + i).style.visibility = "collapse";
                    document.getElementById("barcodeSyntaxError" + i).style.position = "absolute";
                } else if (document.getElementById("quantitySyntaxError" + i).style.visibility === "visible") {
                    document.getElementById("quantitySyntaxError" + i).style.visibility = "collapse";
                    document.getElementById("quantitySyntaxError" + i).style.position = "absolute";
                }
                i += 1;
            }

            i = 1;
            let error = false;
            let regBarCode = /^[0-9]{13}$/;
            while (document.getElementById("name" + i)) {
                if (document.getElementById("name" + i).value === "" || document.getElementById("barcode" + i).value === "" || document.getElementById("quantity" + i).value === "") {
                    document.getElementById("fieldEmptyError" + i).style.visibility = "visible";
                    document.getElementById("fieldEmptyError" + i).style.position = "relative";
                    error = "true";
                } else if (document.getElementById("barcode" + i).value.match(regBarCode) === null) {
                    document.getElementById("barcodeSyntaxError" + i).style.visibility = "visible";
                    document.getElementById("barcodeSyntaxError" + i).style.position = "relative";
                    error = "true";
                } else if (document.getElementById("quantity" + i).value < 1) {
                    document.getElementById("quantitySyntaxError" + i).style.visibility = "visible";
                    document.getElementById("quantitySyntaxError" + i).style.position = "relative";
                    error = "true";
                }
                i += 1;
            }
            if (error === false) {
                document.getElementById("form").submit();
            }
        }

        function add(index) {
            let divProduct = document.getElementById("product" + index);
            let newDivProduct = divProduct.cloneNode(true);
            newDivProduct.id = "product" + (index + 1);
            newDivProduct.children[1].name = "name" + (index + 1);
            newDivProduct.children[3].name = "barcode" + (index + 1);
            newDivProduct.children[5].name = "quantity" + (index + 1);
            newDivProduct.children[1].id = "name" + (index + 1);
            newDivProduct.children[3].id = "barcode" + (index + 1);
            newDivProduct.children[5].id = "quantity" + (index + 1);
            newDivProduct.children[7].id = "fieldEmptyError" + (index + 1);
            newDivProduct.children[8].id = "barcodeSyntaxError" + (index + 1);
            newDivProduct.children[1].value = "";
            newDivProduct.children[3].value = "";
            newDivProduct.children[5].value = "";
            newDivProduct.children[6].onclick = function() {deleteProduct(index + 1)};
            divProduct.after(newDivProduct);

            document.getElementById("buttonAdd").onclick = function() {add(index + 1)};
            document.getElementById("form").action = "addProduct?index=" + (index + 1);
        }

        function deleteProduct(index) {
            let divProduct = document.getElementById("product" + index);
            divProduct.remove();
        }
    </script>
</main>
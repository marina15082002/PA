<?php include __DIR__ . "\header.php";?>

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
    }

    #informations, #products {
        margin-bottom: 2rem;
    }

    #products td>input {
        min-width: calc(100% - .8rem);
        max-width: calc(100% - .8rem);
    }

    /* Borders */
    #products td, #products th {
        border: 1px solid black;
        padding: 0;
    }
    #products {
        border-spacing: unset;
        border-collapse: collapse;
    }
    #products th {
        padding: .2rem;
    }
    #products td:nth-child(3), #products th:nth-child(3) {
        border-right: none;
    }
    #products td:nth-child(4), #products th:nth-child(4) {
        border-left: none;
        width: 2rem;
    }

    /* Cell sizes */
    #products th:nth-child(1) {
        width: calc(50%);
    }
    #products th:nth-child(3) {
        width: calc(35%);
    }
    #products th:nth-child(3) {
        width: calc(15%);
    }

    #products input, #products button {
        all: unset;
        padding: .4rem;
    }

    /* Buttons */
    .delete-button, #buttonAdd>svg {
        cursor: pointer;
        height: 1.2rem;
        width: 1.2rem;
        vertical-align: text-bottom;
    }
    #products #buttonAdd {
        cursor: pointer;
        padding: .4rem;
        text-align: center;
        border: 1px dashed black;
        background-color: white;
    }
    .delete-button:hover {
        fill: red;
    }
    #buttonAdd:hover>svg, #buttonAdd:hover {
        fill: green;
        color: green;
    }

    #buttonConfirm, #buttonCancel {
        width: 10rem;
        max-width: 100%;
    }
    #buttonConfirm[disabled] {
        cursor: not-allowed;
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

    /* Errors */
    #products input[error="true"] {
        border: 1px solid red;
    }
</style>
<main>
    <form id='form' class='formulaire' action='addProduct?index=1' method='POST' enctype='multipart/form-data'>
        <p><?php
            if ($table == null) {
                echo $lang['NO_INCOMING_COLLECT_MSG'];
            } else {
                echo $lang['INCOMING_COLLECT_MSG'];
            }
        ?></p>
        
        <div style="display: none;" id="informations">
            <p><?php echo $lang['INFORMATION']; ?></p>

            <span id="date"><?php echo $lang['LABEL_DATE']; ?> : </span><br>
            <span id="hours"><?php echo $lang['LABEL_HOUR']; ?> : </span><br>
            <span id="email"><?php echo $lang['FIELD_EMAIL']; ?> : </span><br>
            <span id="phone"><?php echo $lang['FIELD_PHONE']; ?> : </span><br>
            <span id="country"><?php echo $lang['FIELD_COUNTRY']; ?> : </span><br>
            <span id="city"><?php echo $lang['FIELD_CITY']; ?> : </span><br>
            <span id="address"><?php echo $lang['FIELD_ADDRESS']; ?> : </span><br>

            <form class="formulaire" method="POST" action="printCollectUser" enctype="multipart/form-data">
                <input type="submit" id="buttonCancel" value="<?php echo $lang['CANCEL']; ?>" class="btn btn-block btn-primary">
            </form>
        </div>

        <p><?php echo $lang['PRODUCTS']; ?> :</p>
        <table class="table table-striped table-hover" id="products">
            <tr>
                <th><?php echo $lang['FIELD_NAME']; ?></th>
                <th><?php echo $lang['FIELD_BARCODE']; ?></th>
                <th><?php echo $lang['FIELD_QUANTITY']; ?></th>
                <th></th>
            </tr>
            <?php
                if ($table != null) {
                    $i = 1;
                    foreach ($table as $value) {
                        echo "
                        <td><input type='text' value='" . htmlspecialchars($value["product_name"], ENT_QUOTES) . "' id='name' name='name' size='35'/></td>
                        <td><input type='text' value='" . htmlspecialchars($value["product_code"], ENT_QUOTES) . "' id='barcode' name='barcode' size='35'/></td>
                        <td><input type='number' value='" . htmlspecialchars($value["product_quantity"], ENT_QUOTES) . "' id='quantity' name='quantity' min='1'/></td>
                        <td>
                            <button type='button'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='delete-button bi bi-x-square' viewBox='0 0 16 16'><path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/></svg>
                            </button>
                        </td>";
                        $i += 1;
                    }
                }
            ?>
            <tr id="buttonAddRow">
                <td colspan="4" id='buttonAdd' onclick='add()'>
                    <?php echo $lang['ADD_PRODUCT']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                </td>
            </tr>
        </table>

        <input id="buttonConfirm" type="button" value="<?php echo $lang['CONFIRM']; ?>" class="btn btn-block btn-primary" onclick="check()">
    </form>
</main>
<script>
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            console.log(req.responseText);

            let response = JSON.parse(req.responseText);

            if (response['printCollect'] != "") {
                document.title = "<?php echo $lang['LABEL_COLLECT']; ?>";

                document.getElementById("informations").style.display = "block";

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

    var form = document.getElementById("form");
    var products = document.getElementById("products");
    var button_add_row = document.getElementById("buttonAddRow");
    var button_confirm = document.getElementById("buttonConfirm");

    // Init form
    if (products.firstElementChild.children.length - 2 == 0) {
        add();
    }
    refresh_indexes();

    function check() {
        let error = false;
        let regBarCode = /^[0-9]{13}$/;
        let children = products.firstElementChild.children;
        for (let i = 1; i < children.length - 1; i++) {
            let child = children[i];

            console.log(i);
            if (child.children[0].firstElementChild.value === "") {
                child.children[0].firstElementChild.setAttribute("error", "true");
                error = true;
            } else {
                child.children[0].firstElementChild.removeAttribute("error");
            }
            if (child.children[1].firstElementChild.value === "" || child.children[1].firstElementChild.value.match(regBarCode) === null) {
                child.children[1].firstElementChild.setAttribute("error", "true");
                error = true;
            } else {
                child.children[1].firstElementChild.removeAttribute("error");
            }
            if (child.children[2].firstElementChild.value === "" || parseInt(child.children[2].firstElementChild.value) == NaN) {
                child.children[2].firstElementChild.setAttribute("error", "true");
                error = true;
            } else {
                child.children[2].firstElementChild.removeAttribute("error");
            }
        }
        if (error === false) {
            console.log("submit");
            document.getElementById("form").submit();
        }
    }

    function refresh_indexes() {
        let children = products.firstElementChild.children;
        for (let i = 1; i < children.length - 1; i++) {
            let child = children[i];
            child.id = "product" + (i + 1);
            child.children[0].firstElementChild.name = "name" + (i + 1);
            child.children[1].firstElementChild.name = "barcode" + (i + 1);
            child.children[2].firstElementChild.name = "quantity" + (i + 1);
            child.children[0].firstElementChild.id = "name" + (i + 1);
            child.children[1].firstElementChild.id = "barcode" + (i + 1);
            child.children[2].firstElementChild.id = "quantity" + (i + 1);
            child.children[0].firstElementChild.value = "";
            child.children[1].firstElementChild.value = "";
            child.children[2].firstElementChild.value = "";
            child.children[3].firstElementChild.onclick = function() { deleteProduct(i + 1) };
        }
        form.action = "addProduct?index=" + (children.length - 2);
        if (children.length - 2 == 0) {
            button_confirm.disabled = true;
        } else {
            button_confirm.disabled = false;
        }
    }

    function add() {
        let new_product = document.createElement("tr");
        new_product.innerHTML = '\
            <td><input type="text" value="" id="name" name="name" size="35"/></td>\
            <td><input type="text" value="" id="barcode" name="barcode" size="35"/></td>\
            <td><input type="number" value="" id="quantity" name="quantity" min="1"/></td>\
            <td>\
                <button type="button">\
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="delete-button bi bi-x-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>\
                </button>\
            </td>';
        buttonAddRow.parentNode.insertBefore(new_product, button_add_row);
        refresh_indexes();
    }

    function deleteProduct(index) {
        let product = document.getElementById("product" + index);
        product.remove();
        refresh_indexes();
    }
</script>

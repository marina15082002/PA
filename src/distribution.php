<?php include __DIR__ . "\header.php";?>

<h1 id = "h1"><?php echo $lang["TITLE_ADD_PRODUCT"]; ?></h1>

<form id='form' class='formulaire' action='calendarDistrib' method='POST' enctype='multipart/form-data'>
    <?php
    for ($i = 0; $i < count($tabName); $i++) {
        echo "
            <div>
                <label>" . $tabName[$i] . "</label>
                <input type='hidden' name='product" . $i . "' value='" . $tabName[$i] . "' size='35'/>
                <input id='productQuantity" . $i . "' name='quantity" . $i . "' type='number' max='" . intval($tabQuantity[$i]) . "' min='1' value='1'>
            </div>
        ";
    }
    ?>
    <input type="date" name="date" id="date" value="10/12/2002">
    <input type="text" name="address" id="address" value="">
    <div style='position:absolute; visibility: collapse' id='fieldEmpty' class='alert alert-danger' role='alert'>Vous devez saisir une adresse</div>
</form>
<button onclick="confirm()">Valider</button>

<script type="text/javascript">
    let date = new Date();
    let day = (date.getDate() < 10)? "0" + date.getDate() : date.getDate();
    let month = (date.getMonth() < 10)? "0" + date.getMonth() + 1 : date.getMonth() + 1;
    let year = date.getFullYear();
    document.getElementById("date").value = year + "-" + month + "-" + day;
    document.getElementById("date").min = year + "-" + month + "-" + day;

    function confirm() {
        let i = 0;

        if (document.getElementById("fieldEmpty").style.visibility === "visible") {
            document.getElementById("fieldEmpty").style.visibility = "collapse";
            document.getElementById("fieldEmpty").style.position = "absolute";
        }

        while (document.getElementById("productQuantity" + i)) {
            if (document.getElementById("productQuantity" + i).value < 1 || document.getElementById("productQuantity" + i).value > document.getElementById("productQuantity" + i).max) {
                return;
            } else if (document.getElementById("address").value == "") {
                document.getElementById("fieldEmpty").style.visibility = "visible";
                document.getElementById("fieldEmpty").style.position = "relative";
                return;
            }
            i++;
        }

        document.getElementById("form").submit();
    }
</script>
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
        #products th, #products td {
            padding: .4rem;
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

        #addressTable td{
            background-color: white!important;
            border: none;
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

        /* Responsiveness */
        @media all and (max-width: 800px) {
            form {
                width: 95vw;
            }
        }
    </style>

    <h1 id = "h1"><?php echo $lang["TITLE_ADD_DISTRIB"]; ?></h1>

    <form id='form' class='formulaire' action='calendarDistrib' method='POST' enctype='multipart/form-data'>
        <table class="table table-striped table-hover" id="products">
            <tr>
                <th><?php echo $lang['FIELD_BARCODE']; ?></th>
                <th><?php echo $lang['FIELD_QUANTITY']; ?></th>
            </tr>
            <?php
            for ($i = 0; $i < count($tabName); $i++) {
                echo "
                <tr>
                    <td>" . $tabName[$i] . "</td>
                    <input type='hidden' name='product" . $i . "' value='" . $tabName[$i] . "' size='35'/>
                    <td><input id='productQuantity" . $i . "' name='quantity" . $i . "' type='number' max='" . intval($tabQuantity[$i]) . "' min='1' value='1'></td>
                </tr>
            ";
            }
            ?>
        </table>
        <table class="table table-striped table-hover" id="addressTable">
            <tr>
                <td>
                    <label><?php echo $lang['TITLE_CALENDAR_PAGE']; ?> : </label>
                    <input type="date" name="date" id="date" value="10/12/2002">
                </td>
                <td>
                    <label><?php echo $lang['PDF_ADDRESS']; ?> : </label>
                    <input type="text" name="address" id="address" value="">
                </td>
            </tr>
        </table>
        <div style='position:absolute; visibility: collapse' id='fieldEmpty' class='alert alert-danger' role='alert'>Vous devez saisir une adresse</div>
    </form>
    <button onclick="confirm()" class="btn btn-block">Valider</button>

    <script type="text/javascript">
        let date = new Date();
        let day = (date.getDate() < 10)? "0" + date.getDate() : date.getDate();
        let month = (date.getMonth() < 10)? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
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
</main>

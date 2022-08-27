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
    <H1><?php echo $lang["TITLE_BARCODE"]; ?></H1>
    <br>

    <div class="row">
        <div class="col-md-1"></div>
        <table class="table table-striped table-hover col-md-10" id="products">
            <thead>
            <tr>
                <th scope="col"><?php echo $lang["LABEL_DATE"]; ?></th>
                <th scope="col"><?php echo $lang["FIELD_BARCODE"]; ?></th>
                <th scope="col"><?php echo $lang["NAME"]; ?></th>
                <th scope="col"><?php echo $lang["DOWNLOAD"]; ?></th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $scandir = scandir("appC");
                    $i = 0;
                    foreach($scandir as $fichier){
                        if (preg_match("/^[a-zA-Z0-9]+.json$/", $fichier)) {
                            echo "<tr>";
                                if ($language == "en") {
                                    echo "<th scope='row'>" . date('m/d/Y', filemtime(__DIR__ . '\..\appC\\' . $fichier)) . "</th>" ;
                                } else {
                                    echo "<th scope='row'>" . date('d/m/Y', filemtime(__DIR__ . '\..\appC\\' . $fichier)) . "</th>" ;
                                }
                                echo "<td id='code" . $i . "'></td>";
                                echo "<td id='name" . $i . "'></td>";

                                echo "
                                <script>
                                    fetch('/PA/appC/" . $fichier . "')
                                        .then(response => {
                                           return response.json();
                                        })
                                        .then(data => {
                                            document.getElementById('code" . $i . "').innerHTML = data.code;
                                            document.getElementById('name" . $i . "').innerHTML = data.name;
                                        })
                                </script>";
                                echo "<td>
                                        <a style='padding-left: 1.5rem; color:black!important' href='/PA/appC/" . $fichier . "' download='" . $fichier . "'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                                              <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                              <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
                                          </svg>
                                        </a>
                                    </td>";
                            echo "</tr>";

                            $i += 1;
                        }
                    }
                ?>

            </tbody>
        </table>
    </div>
</main>
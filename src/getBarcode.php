<?php include __DIR__ . "\head.php";?>

<main style="margin-left: 10%;margin-right: 10%">
    <H1>Récupération des codes barres</H1>
    <br>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><?php echo $lang["DATE"]; ?></th>
            <th scope="col"><?php echo $lang["CODE"]; ?></th>
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
                            echo "<th scope='row'>" . date('d/m/Y', filemtime(__DIR__ . '\..\appC\\' . $fichier)) . "</th>" ;

                            echo "<td id='code" . $i . "'></td>";
                            echo "<td id='name" . $i . "'></td>";

                            echo "
                            <script>
                                console.log('test');
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
                                    <a style='padding-left: 15%; color:black!important' href='/PA/appC/" . $fichier . "' download='" . $fichier . "'>
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

</main>
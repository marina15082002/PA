<?php include __DIR__ . "\header.php";?>

<style>
    main, form {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .formulaire {
        margin: 1.5rem 0;
    }

    .form-group>svg {
        width: 1.2rem;
        vertical-align: text-top;
    }

    .form-group>label {
        margin-bottom: .25rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    #two-colon-form {
        padding: 2rem 0;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #two-colon-form>div {
        width: 25%;
        margin: 0 2.5%;
    }

    .btn {
        width: min-content !important;
        min-width: 12rem;
    }

    #submessage {
        position: absolute;
        bottom: 2rem;
    }
</style>
<main>
    <h1>Profil</h1>
    <?php
        foreach ($table as $value) {
            if ($value['role'] == "user") {
                echo "
                <form class='formulaire' method='POST' action='profile' enctype='multipart/form-data'>
                    <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
        
                    <div id='two-colon-form'>
                        <div>
                            <div class='form-group'>
                                <label>" . $lang["FIELD_TYPE"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-gear-fill' viewBox='0 0 16 16'>
                                    <path d='M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z'/>
                                </svg>
                                <select name='type' class='form-control'>
                                    <option name='type' value=" . $lang['A_COMPANY']; if (strtoupper($value['type']) == strtoupper($lang['A_COMPANY'])){echo " selected";}; echo ">" . $lang['A_COMPANY'] . "</option>
                                    <option name='type' value=" . $lang['AN_ASSOCIATION']; if (strtoupper($value['type']) == strtoupper($lang['AN_ASSOCIATION'])){echo " selected";}; echo ">" . $lang['AN_ASSOCIATION'] . "</option>
                                    <option name='type' value=" . $lang['A_PARTICULAR']; if (strtoupper($value['type']) == strtoupper($lang['A_PARTICULAR'])){echo " selected";}; echo ">" . $lang['A_PARTICULAR'] . "</option>
                                </select>
                            </div>
        
                            <div class='form-group'>
                                <label>" . $lang["NAME"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                                    <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                                    <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                                </svg>
                                <input type='text' value='" . $value['name'] . "' placeholder='John Doe' name='name' class='form-control'/>
                            </div>
                
                            <div class='form-group'>
                                <label>" . $lang["EMAIL"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-envelope-fill image_svg' viewBox='0 0 16 16'>
                                    <path d='M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z'/>
                                </svg>
                                <input type='text' value='" . $value['email'] . "' placeholder='email@email.com' name='email' class='form-control'/>
                            </div>
                
                            <div class='form-group'>
                                <label>" . $lang["SIREN"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-bag-check-fill' viewBox='0 0 16 16'>
                                    <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z'/>
                                </svg>
                                <input type='text' value='" . $value['siren'] . "' placeholder='732 829 320' name='siren' class='form-control'/>
                            </div>
                        </div>
                        <div>
                            <div class='form-group'>
                                <label>" . $lang["PHONE"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-telephone-fill image_svg' viewBox='0 0 16 16'>
                                    <path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z'/>
                                </svg>
                                <input type='text' value='" . $value['phone'] . "' placeholder='01 23 45 67 89' name='phone' class='form-control'/>
                            </div>
        
                            <div class='form-group'>
                                <label>" . $lang["COUNTRY"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
                                    <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z'/>
                                </svg>
                                <input type='text' value='" . $value['country'] . "' placeholder='Arstotzka' name='country' class='form-control'/>
                            </div>
        
        
                            <div class='form-group'>
                                <label>" . $lang["CITY"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
                                    <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z'/>
                                </svg>
                                <input type='text' value='" . $value['city'] . "' placeholder='Paris' name='city' class='form-control'/>
                            </div>
        
                            <div class='form-group'>
                                <label>" . $lang["ADDRESS"] . "</label>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
                                    <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z'/>
                                </svg>
                                <input type='text' value='" . $value['address'] . "' placeholder='10 Downing Street' name='address' class='form-control'/>
                            </div>
                        </div>
                    </div>
                    
                    <input type='submit' value='" . $lang["BTN_MODIFY"] . "' class='btn btn-block btn-primary'>";

                    if (isset($_GET["fieldEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELDS_EMPTY"] . '</div>';
                    } else if (isset($_GET["phoneSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PHONE_SYNTAX"] . '</div>';
                    }
                    echo "</form>";
            }
        }

        if (!isset($sub[0])) {
            echo "
            <form class='formulaire' method='POST' action='subscription' enctype='multipart/form-data'>
                <input  style='display:none' type='date' id='date' name='date' value=''/>
                <input type='submit' value='" . $lang["SUBSCRIBE"] . "' style='border: 1px solid black;' class='btn btn-block'/>
            </form>";
        } else {
            echo "
            <form id='formUnsub' class='formulaire' method='POST' action='unsubscribe' enctype='multipart/form-data' style='position: relative;'>
                <label id='submessage'>" . $lang["YOUR_SUBSCRIPTION_ENDS_THE"] . " " . $sub[0]['date'] . "</label>
                <input type='hidden' value='" . $sub[0]['date'] . "' id='date_end' name='date_end' size='35'/>
                <input type='submit' id='unsubscribe' value='" . $lang["UNSUBSCRIBE"] . "' style='border: 1px solid black;' class='btn btn-block'/>
            </form>";
        }

        echo "
            <form class='formulaire' method='POST' action='deleteUser' enctype='multipart/form-data'>
                <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
                <input type='submit' value='" . $lang["BTN_DELETE"] . "' style='border: 1px solid red;' class='btn btn-block'>
            </form>
            <br/>
        ";
    ?>

    <script type="text/javascript">
        if (document.getElementById('date')) {
            let date = new Date();
            let day = (date.getDate() < 10)? "0" + date.getDate() : date.getDate();
            let month = (date.getMonth() < 10)? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
            let year = date.getFullYear() + 1;
            document.getElementById("date").value = year + "-" + month + "-" + day;
        } else {
            let date = new Date();
            let date_end = new Date(document.getElementById('date_end').value);
            const formatDate = (date)=>{
                let formatted_date = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear()
                return formatted_date;
            }
            console.log(formatDate(date));
            console.log(formatDate(date_end));
            if (formatDate(date) >= formatDate(date_end)) {
                alert("Votre abonnement a expiré");
                document.getElementById('formUnsub').submit();
            }
        }
    </script>
</main>
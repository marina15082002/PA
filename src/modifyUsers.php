<?php include __DIR__ . "\header.php";?>

<style>
    main {
        padding-top: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #users {
        width: 80vw;
        table-layout: fixed;
    }

    #users td>input {
        min-width: calc(100% - .8rem);
        max-width: calc(100% - .8rem);
    }

    #delete-form {
        display: none;
    }

    select.form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }

    /* Borders */
    #users td, #users th {
        border: 1px solid black;
        padding: 0;
    }
    #users {
        border-spacing: unset;
        border-collapse: collapse;
    }
    #users th {
        padding: .2rem;
    }
    #users td:nth-child(8), #users th:nth-child(8) {
        border-right: none;
    }
    #users td:nth-child(9), #users th:nth-child(9) {
        border-left: none;
        border-right: none;
        width: 2rem !important;
    }
    #users td:nth-child(10), #users th:nth-child(10) {
        border-left: none;
        width: 2rem !important;
    }

    /* Cell sizes */
    #users th:nth-child(2), #users th:nth-child(6), #users th:nth-child(7) {
        width: 10%;
    }

    #users input, #users button {
        all: unset;
        padding: .4rem;
    }

    /* Buttons */
    .delete-button, .submit-button {
        cursor: pointer;
        height: 1.2rem;
        width: 1.2rem;
        vertical-align: text-bottom;
    }
    .delete-button:hover {
        fill: red;
    }
    .submit-button:hover {
        fill: green;
    }

    /* Responsiveness */
    
    @media all and (max-width: 1400px) {
        #users {
            width: 95vw;
        }
    }
</style>
<main>
    <form class='formulaire' id="users-form" method='POST' action='modifyUsers' enctype='multipart/form-data'>
        <table class="table table-striped table-hover" id="users">
            <tr>
                <th><?php echo $lang["EMAIL"]; ?></th>
                <th><?php echo $lang["FIELD_TYPE"]; ?></th>
                <th><?php echo $lang["NAME"]; ?></th>
                <th><?php echo $lang["SIREN"]; ?></th>
                <th><?php echo $lang["PHONE"]; ?></th>
                <th><?php echo $lang["COUNTRY"]; ?></th>
                <th><?php echo $lang["CITY"]; ?></th>
                <th><?php echo $lang["ADDRESS"]; ?></th>
                <th></th>
                <th></th>
            </tr>
            <?php
                $i = 1;
                foreach ($table as $value) {
                    if ($value['role'] == "user") {
                        echo "
                        <tr>
                            <td>
                                <input type='hidden' value='" . $value['id'] . "' name='id'/>
                                <input type='email' value='" . $value['email'] . "' name='email'/></td>
                            <td>
                                <select name='type' class='form-control'>
                                    <option name='type' value='" . $lang['A_COMPANY'] . "'"; if (strtoupper($value['type']) == strtoupper($lang['A_COMPANY'])){echo " selected";}; echo ">" . $lang['A_COMPANY'] . "</option>
                                    <option name='type' value='" . $lang['AN_ASSOCIATION'] . "'"; if (strtoupper($value['type']) == strtoupper($lang['AN_ASSOCIATION'])){echo " selected";}; echo ">" . $lang['AN_ASSOCIATION'] . "</option>
                                    <option name='type' value='" . $lang['A_PARTICULAR'] . "'"; if (strtoupper($value['type']) == strtoupper($lang['A_PARTICULAR'])){echo " selected";}; echo ">" . $lang['A_PARTICULAR'] . "</option>
                                </select>
                            </td>
                            <td><input type='text' value='" . $value['name'] . "' name='name'/></td>
                            <td><input type='email' value='" . $value['siren'] . "' name='siren'/></td>
                            <td><input type='email' value='" . $value['phone'] . "' name='phone'/></td>
                            <td><input type='email' value='" . $value['country'] . "' name='country'/></td>
                            <td><input type='email' value='" . $value['city'] . "' name='city'/></td>
                            <td><input type='email' value='" . $value['address'] . "' name='address'/></td>
                            <td>
                                <button type='button' onclick='submit_user(" . $i . ")' title='" . $lang["BTN_MODIFY"] . "'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='submit-button bi bi-check-square-fill' viewBox='0 0 16 16'><path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z'/></svg>
                                </button>
                            </td>
                            <td>
                                <button type='button' onclick='delete_user(" . $value['id'] . ")' title='" . $lang["BTN_DELETE"] . "'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='delete-button bi bi-x-square' viewBox='0 0 16 16'><path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/></svg>
                                </button>
                            </td>
                        </tr>";

                        $i += 1;
                    }
                }
            ?>
        </table>
    </form>

    <form id="delete-form" class='formulaire' method='POST' action='deleteUsers' enctype='multipart/form-data'>
        <input id="delete-form-id" type='hidden' name='id'/>
    </form>
</main>
<script>
    function submit_user(index) {
        let form = document.getElementById('users-form');

        let children = form.firstElementChild.firstElementChild.children;
        for (let i = children.length - 1; i >= 0; i--) {
            let child = children[i];
            if (i != index) {
                child.remove();
            }
        }

        form.submit();
    }

    function delete_user(id) {
        let delete_form_id = document.getElementById('delete-form-id');
        delete_form_id.value = id;
        let form = document.getElementById('delete-form');
        form.submit();
    }
</script>

<?php include __DIR__ . "\header.php";?>

<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #users {
        width: 70vw;
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
    #users td:nth-child(5), #users th:nth-child(5) {
        border-right: none;
    }
    #users td:nth-child(6), #users th:nth-child(6) {
        border-left: none;
        border-right: none;
        width: 2rem !important;
    }
    #users td:nth-child(7), #users th:nth-child(7) {
        border-left: none;
        width: 2rem !important;
    }

    /* Cell sizes */
    #users input, #users button {
        all: unset;
        padding: .4rem;
    }

    /* Buttons */
    .delete-button, .submit-button, #buttonAdd>svg {
        cursor: pointer;
        height: 1.2rem;
        width: 1.2rem;
        vertical-align: text-bottom;
    }
    .delete-button:hover {
        fill: red;
    }
    #users #buttonAdd {
        cursor: pointer;
        padding: .4rem;
        text-align: center;
        border: 1px dashed black;
        background-color: white;
    }
    .submit-button:hover, #buttonAdd:hover>svg, #buttonAdd:hover {
        fill: green;
        color: green;
    }

    /* Responsiveness */
    
    @media all and (max-width: 1200px) {
        #users {
            width: 95vw;
        }
    }
</style>
<main>
    <form class='formulaire' id="users-form" method='POST' action='modifyAdmin' enctype='multipart/form-data'>
        <table class="table table-striped table-hover" id="users">
            <tr>
                <th><?php echo $lang["EMAIL"]; ?></th>
                <th><?php echo $lang["NAME"]; ?></th>
                <th><?php echo $lang["FIELD_POSTE"]; ?></th>
                <th><?php echo $lang["PHONE"]; ?></th>
                <th><?php echo $lang["PASSWORD"]; ?></th>
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
                                <input type='email' value='" . $value['email'] . "' name='email'/>
                            </td>
                            <td><input type='text' value='" . $value['name'] . "' name='name'/></td>
                            <td><input type='text' value='" . $value['phone'] . "' name='phone'/></td>
                            <td><input type='text' value='" . $value['poste'] . "' name='poste'/></td>
                            <td><input type='password' disabled='true' placeholder='N/A'/></td>
                            <td>
                                <button type='button' onclick='submit_user(" . $i . ", false)' title='" . $lang["BTN_MODIFY"] . "'>
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
            <tr id="buttonAddRow">
                <td colspan="7" id='buttonAdd' onclick='add()'>
                    <?php echo $lang["ADD_ADMIN"]; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                </td>
            </tr>
        </table>
    </form>
    
    <form id="delete-form" class='formulaire' method='POST' action='deleteAdmin' enctype='multipart/form-data'>
        <input id="delete-form-id" type='hidden' name='id' size='35'/>
    </form>
</main>
<script>
    function submit_user(index, create) {
        let form = document.getElementById('users-form');

        if (create) {
            form.action = "createAdmin";
        }

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

    function soft_delete_user(index) {
        let form = document.getElementById('users-form');
        let children = form.firstElementChild.firstElementChild.children;
        children[index].remove();
    }

    function add() {
        let buttonAddRow = document.getElementById('buttonAddRow');
        let form = document.getElementById('users-form');
        let id = form.firstElementChild.firstElementChild.children.length - 1;
        let new_product = document.createElement("tr");
        new_product.innerHTML = '\
            <td>\
                <input type="hidden" name="id"/>\
                <input type="email" name="email"/>\
            </td>\
            <td><input type="text" name="name"/></td>\
            <td><input type="text" name="poste"/></td>\
            <td><input type="text" name="phone"/></td>\
            <td><input type="password" name="password"/></td>\
            <td>\
                <button type="button" onclick="submit_user(' + id + ', true)" title="<?php echo $lang["BTN_MODIFY"]; ?>">\
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="submit-button bi bi-check-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/></svg>\
                </button>\
            </td>\
            <td>\
                <button type="button" onclick="soft_delete_user(' + id + ')" title="<?php echo $lang["BTN_DELETE"]; ?>">\
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="delete-button bi bi-x-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>\
                </button>\
            </td>';
        buttonAddRow.parentNode.insertBefore(new_product, buttonAddRow);
    }
</script>

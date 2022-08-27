<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/styleCalendar.css">



<style>
    body {
        background: #f6f7fc;
    }

    .center-flex {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #confirm {
        width: 10rem;
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    #confirm:hover {
        width: 10rem;
        border-color: #113b1a!important;
        margin-bottom: 3rem;
    }

    #slider {
        position: relative;
        width: 200%;
        display: flex;
        flex-direction: row;
        right: 0%;
        transition: right 0.5s ease-in-out;
    }

    .ftco-section {
        width: 100vw;
        overflow: hidden;
        padding-bottom: 2rem;
    }

    .form-control {
        border: none;
        -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        height: 54px;
        background: #fff;
        width: 20rem;
        max-width: 90vw;
    }

    .form-control:active, .form-control:focus {
        outline: none;
        -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
    }

    #formAddress svg {
        width: 1.2rem;
        vertical-align: text-top;
    }

    .btn {
        margin-top: 2.5%;
        background-color: #6EB784FF;
    }

    .btn:hover{
        background-color: #518863;
    }

    .btn:focus{
        box-shadow: 0 0 0 0.2rem rgb(97, 159, 114);
    }
</style>
<div id="slider">
    <section id="calendar" class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section"><?php echo $lang['TITLE_CALENDAR_PAGE']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="content w-100">
                    <div class="calendar-container">
                        <div class="calendar">
                            <div class="year-header">
                                <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                <span class="year" id="label"> </span>
                                <span class="right-button fa fa-chevron-right" id="next"> </span>
                            </div>
                            <table class="months-table w-100">
                                <tbody>
                                <tr class="months-row">
                                    <td class="month"><?php echo $lang['JAN']; ?></td>
                                    <td class="month"><?php echo $lang['FEB']; ?></td>
                                    <td class="month"><?php echo $lang['MAR']; ?></td>
                                    <td class="month"><?php echo $lang['APR']; ?></td>
                                    <td class="month"><?php echo $lang['MAY']; ?></td>
                                    <td class="month"><?php echo $lang['JUN']; ?></td>
                                    <td class="month"><?php echo $lang['JUL']; ?></td>
                                    <td class="month"><?php echo $lang['AUG']; ?></td>
                                    <td class="month"><?php echo $lang['SEP']; ?></td>
                                    <td class="month"><?php echo $lang['OCT']; ?></td>
                                    <td class="month"><?php echo $lang['NOV']; ?></td>
                                    <td class="month"><?php echo $lang['DEC']; ?></td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="days-table w-100">
                                <td class="day"><?php echo $lang['SUN']; ?></td>
                                <td class="day"><?php echo $lang['MON']; ?></td>
                                <td class="day"><?php echo $lang['TUE']; ?></td>
                                <td class="day"><?php echo $lang['WED']; ?></td>
                                <td class="day"><?php echo $lang['THU']; ?></td>
                                <td class="day"><?php echo $lang['FRI']; ?></td>
                                <td class="day"><?php echo $lang['SAT']; ?></td>
                            </table>
                            <div class="frame">
                                <table class="dates-table w-100">
                                    <tbody class="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="events-container">
                        <div id="div-title-hours">
                            <label id="title-hours"><?php echo $lang['LABEL_HOURS']; ?></label>
                        </div>

                        <div id="div-hours" class = "row">
                            <button  onclick="hours(9)" class="col-sm-12 hours" id="button9"><?php echo $lang['9AM']; ?></button>
                            <button  onclick="hours(10)" class="col-sm-12 hours" id="button10"><?php echo $lang['10AM']; ?></button>
                            <button  onclick="hours(11)" class="col-sm-12 hours" id="button11"><?php echo $lang['11AM']; ?></button>
                            <button  onclick="hours(12)" class="col-sm-12 hours" id="button12"><?php echo $lang['12AM']; ?></button>
                            <button  onclick="hours(14)" class="col-sm-12 hours" id="button14"><?php echo $lang['2PM']; ?></button>
                            <button  onclick="hours(15)" class="col-sm-12 hours" id="button15"><?php echo $lang['3PM']; ?></button>
                            <button  onclick="hours(16)" class="col-sm-12 hours" id="button16"><?php echo $lang['4PM']; ?></button>
                            <button  onclick="hours(17)" class="col-sm-12 hours" id="button17"><?php echo $lang['5PM']; ?></button>
                            <button  onclick="hours(18)" class="col-sm-12 hours" id="button18"><?php echo $lang['6PM']; ?></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section"><?php echo $lang['STILL_SOME_INFORMATION_TO_CHECK']; ?><h2>
            </div>
        </div>

        <form id="calendarForm" class='formulaire' action="calendar" method='POST' enctype='multipart/form-data'>
            <input type="hidden" id="day" name="day" value="">
            <input type="hidden" id="year" name="years" value="">
            <input type="hidden" id="month" name="month" value="">
            <input type="hidden" id="hours" name="hours" value="">
            <div id="formAddress" class="center-flex">
                <div>
                    <label for="phone">
                        <?php echo $lang["PHONE"] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path></svg>
                    </label>
                    <input class="form-control" type="text" id="phone" name="phone" placeholder="0612345678" value="<?php echo $_SESSION['phone']; ?>">
                    <br/>

                    <label for="country">
                        <?php echo $lang["COUNTRY"] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></svg>
                    </label>
                    <input class="form-control" type="text" id="country" name="country" placeholder="Taiwan" value="<?php echo $_SESSION['country']; ?>">
                    <br/>

                    <label for="city">
                        <?php echo $lang["CITY"] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></svg>
                    </label>
                    <input class="form-control" type="text" id="city" name="city" placeholder="Hong Kong" value="<?php echo $_SESSION['city']; ?>">
                    <br/>
                    
                    <label for="address">
                        <?php echo $lang["ADDRESS"] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></svg>
                    </label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="10 Downing Street" value="<?php echo $_SESSION['address']; ?>">
                    <br/>
                </div>
        
                <div style='position:absolute; visibility: collapse' id='fields' class='alert alert-danger' role='alert'><?php echo $lang["FIELDS_EMPTY"]; ?></div>
                <div style='position:absolute; visibility: collapse' id='phone_alert' class='alert alert-danger' role='alert'><?php echo $lang["FIELD_PHONE_SYNTAX"]; ?></div>
            </div>
        </form>
    </section>
</div>

<div class="center-flex">
    <button id="confirm" type="button" class="btn btn-block" onclick="validate()"><?php echo $lang['CONTINUE']; ?></button>
</div>

<script>
    function hours(hour) {
        document.getElementById("hours").value = hour;
        for (i = 9; i <= 18; i++) {
            if (i == 13) {
                continue;
            }
            if (i == hour) {
                document.getElementById("button" + i).setAttribute("selected", "true");
            } else {
                document.getElementById("button" + i).removeAttribute("selected");
            }
        }
    }

    function validate() {
        var date = new Date();

        if (document.getElementById("day").value === "") {
            alert("Please select a day");
        } else if (document.getElementById("day").value <= date.getDate()) {
            alert("Please select a day after today");
        } else if (document.getElementById("hours").value === "") {
            alert("Please select an hour");
        } else {
            document.getElementById("slider").style.right = "100%";
            document.getElementById("confirm").setAttribute("onclick", "submitForm()");
            document.getElementById("confirm").innerText = "<?php echo $lang['CONFIRM']; ?>";
        }
    }

    function submitForm() {
        document.getElementById("fields").style.visibility = "collapse";
        document.getElementById("phone_alert").style.visibility = "collapse";
        document.getElementById("fields").style.position = "absolute";
        document.getElementById("phone_alert").style.position = "absolute";

        if (document.getElementById("phone").value === "" || document.getElementById("country").value === "" || document.getElementById("city").value === "" || document.getElementById("address").value === "") {
            document.getElementById("fields").style.visibility = "visible";
            document.getElementById("fields").style.position = "relative";
        } else if (!document.getElementById("phone").value.match(/^[0-9]{10}$/)) {
            document.getElementById("phone_alert").style.visibility = "visible";
            document.getElementById("phone_alert").style.position = "relative";
        } else {
            document.getElementById("calendarForm").submit();
        }
    }

</script>

<script src="/PA/src/js/jquery.min.js"></script>
<script src="/PA/src/js/bootstrap.min.js"></script>
<script src="/PA/src/js/popper.js"></script>
<script src="/PA/src/js/main.js"></script>


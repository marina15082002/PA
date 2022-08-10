<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/styleCalendar.css">

<section id="calendar" class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Calendar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="content w-100">
                    <div class="calendar-container">
                        <div class="calendar">
                            <div class="year-header">
                                <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                <span class="year" id="label"></span>
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
                            <label id="title-hours""> Choisissez un horaire </label>
                        </div>

                        <div id="div-hours" class = "row">
                            <button  onclick="hours(9)" class="col-sm-12 hours" id="button9">9:00</button>
                            <button  onclick="hours(10)" class="col-sm-12 hours" id="button10">10:00</button>
                            <button  onclick="hours(11)" class="col-sm-12 hours" id="button11">11:00</button>
                            <button  onclick="hours(12)" class="col-sm-12 hours" id="button12">12:00</button>
                            <button  onclick="hours(14)" class="col-sm-12 hours" id="button14">14:00</button>
                            <button  onclick="hours(15)" class="col-sm-12 hours" id="button15">15:00</button>
                            <button  onclick="hours(16)" class="col-sm-12 hours" id="button16">16:00</button>
                            <button  onclick="hours(17)" class="col-sm-12 hours" id="button17">17:00</button>
                            <button  onclick="hours(18)" class="col-sm-12 hours" id="button18">18:00</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<form id="calendarForm" class='formulaire' action="calendar" method='POST' enctype='multipart/form-data'>
    <input type="hidden" id="day" name="day" value="">
    <input type="hidden" id="year" name="years" value="">
    <input type="hidden" id="month" name="month" value="">
    <input type="hidden" id="hours" name="hours" value="">
    <div id="formAddress" style="visibility: collapse">
        <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>">
        <input type="text" id="country" name="country" value="<?php echo $_SESSION['country']; ?>">
        <input type="text" id="city" name="city" value="<?php echo $_SESSION['city']; ?>">
        <input type="text" id="address" name="address" value="<?php echo $_SESSION['address']; ?>">

        <div style='position:absolute; visibility: collapse' id='fields' class='alert alert-danger' role='alert'><?php echo $lang["FIELDS_EMPTY"]; ?></div>
        <div style='position:absolute; visibility: collapse' id='phone_alert' class='alert alert-danger' role='alert'><?php echo $lang["FIELD_PHONE_SYNTAX"]; ?></div>
    </div>
    <button id="confirm" type="button" onclick="validate()">Confirm</button>
</form>

<script>
    function hours(hour) {
        document.getElementById("hours").value = hour;
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
            document.getElementById("calendar").style.visibility = "collapse"; // Hide the calendar
            document.getElementById("calendar").style.position = "absolute";
            document.getElementById("formAddress").style.visibility = "visible"; // Show the form address
            document.getElementById("confirm").setAttribute("onclick", "submitForm()");
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


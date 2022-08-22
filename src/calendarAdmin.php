<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/styleCalendar.css">

<section id="calendar" class="ftco-section">
    <div class="row">
        <div class="col-md-12">
            <div class="content w-100" style="background: none!important;">
                <div class="calendar-container" style="float:none!important;display: block!important;">
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
            </div>
        </div>
    </div>
</section>

<table class="table">
    <thead>
    <tr>
        <th scope="col"><?php echo $lang["LABEL_TAB_HOURS"]; ?></th>
        <th scope="col"><?php echo $lang["FIELD_EMAIL"]; ?></th>
        <th scope="col"><?php echo $lang["FIELD_PHONE"]; ?></th>
        <th scope="col"><?php echo $lang["FIELD_ADDRESS"]; ?></th>
        <th scope="col"><?php echo $lang["LABEL_PRODUCTS"]; ?></th>
        <th scope="col"><?php echo $lang["LABEL_STATUS"]; ?></th>
    </tr>
    </thead>
    <tbody id="table-date">

    </tbody>
</table>

<form id="calendarForm" class='formulaire' action="calendar" method='POST' enctype='multipart/form-data'>
    <input type="text" id="day" name="day" value="">
    <input type="text" id="year" name="years" value="">
    <input type="text" id="month" name="month" value="">
    <input type="hidden" id="hours" name="hours" value="">

    <input type="text" id="phone" name="phone" value="">
    <input type="text" id="country" name="country" value="">
    <input type="text" id="city" name="city" value="">
    <input type="text" id="address" name="address" value="">

    <div style='position:absolute; visibility: collapse' id='fields' class='alert alert-danger' role='alert'><?php echo $lang["FIELDS_EMPTY"]; ?></div>
    <div style='position:absolute; visibility: collapse' id='phone_alert' class='alert alert-danger' role='alert'><?php echo $lang["FIELD_PHONE_SYNTAX"]; ?></div>

    <button id="confirm" type="button" onclick="submitForm()"><?php echo $lang['BTN_CONFIRM']; ?></button>
</form>

<label id="emailLabel" style="visibility: collapse; position: absolute;"></label>


<script>
    function hours(hour) {
        document.getElementById("hours").value = hour;
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

    function showProducts(email, idTr, idButton){
        let newTd;

        if (document.getElementById("productsTable")) {
            document.getElementById("productsTable").remove();
        }

        let newTable = document.createElement("table");
        newTable.className = "table";
        newTable.id = "productsTable";
        let newThead = document.createElement("thead");
        let newTr = document.createElement("tr");
        let newTh = document.createElement("th");
        newTh.innerHTML = "Product_code";
        newTr.appendChild(newTh);
        newTh = document.createElement("th");
        newTh.innerHTML = "Product_name";
        newTr.appendChild(newTh);
        newTh = document.createElement("th");
        newTh.innerHTML = "Quantity";
        newTr.appendChild(newTh);
        newThead.appendChild(newTr);
        newTable.appendChild(newThead);
        const req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState === 4) {
                let response = JSON.parse(req.responseText);

                for (let i = 0; i < response['tableProducts'].length; ++i) {
                    if (email === response['tableProducts'][i]['email'] ) {
                        newTr = document.createElement('tr');

                        newTd = document.createElement('td');
                        newTd.innerHTML = response['tableProducts'][i]['product_code'];
                        newTr.appendChild(newTd);

                        newTd = document.createElement('td');
                        newTd.innerHTML = response['tableProducts'][i]['product_name'];
                        newTr.appendChild(newTd);

                        newTd = document.createElement('td');
                        newTd.innerHTML = response['tableProducts'][i]['quantity'];
                        newTr.appendChild(newTd);

                        newTable.appendChild(newTr);
                    }
                }
                document.getElementById(idTr).after(newTable);
                document.getElementById(idButton).setAttribute("onclick", 'hideProducts("' + email + '", "' + idTr  + '", "' + idButton + '")');
            }
        };
        req.open('GET', '/PA/controllers/Calendar.php');
        req.send();
    }

    function hideProducts(email, idTr, idButton) {
        document.getElementById("productsTable").remove();
        document.getElementById(idButton).setAttribute('onclick', 'showProducts("' + email + '", "' + idTr  + '", "' + idButton + '")');
    }

</script>

<script src="/PA/src/js/jquery.min.js"></script>
<script src="/PA/src/js/bootstrap.min.js"></script>
<script src="/PA/src/js/popper.js"></script>

<script>
    (function($) {
        "use strict";

        // Setup the calendar with the current date
        $(document).ready(function(){
            var date = new Date();
            var today = date.getDate();
            // Set click handlers for DOM elements
            $(".right-button").click({date: date}, next_year);
            $(".left-button").click({date: date}, prev_year);
            $(".month").click({date: date}, month_click);
            // Set current month as active
            $(".months-row").children().eq(date.getMonth()).addClass("active-month");
            init_calendar(date);
        });

// Initialize the calendar by appending the HTML dates
        function init_calendar(date) {
            $(".tbody").empty();
            //$(".events-container").empty();
            var calendar_days = $(".tbody");
            var month = date.getMonth();
            var year = date.getFullYear();
            var day_count = days_in_month(month, year);
            var row = $("<tr class='table-row'></tr>");
            var today = date.getDate();
            date.setDate(1);
            var first_day = date.getDay();
            for(var i=0; i<35+first_day; i++) {
                var day = i-first_day+1;
                if(i%7===0) {
                    calendar_days.append(row);
                    row = $("<tr class='table-row'></tr>");
                }
                if(i < first_day || day > day_count) {
                    var curr_date = $("<td class='table-date nil'>"+"</td>");
                    row.append(curr_date);
                }
                else {
                    var curr_date = $("<td class='table-date'>"+day+"</td>");
                    var events = check_events(day, month+1, year);
                    if(today===day && $(".active-date").length===0) {
                        curr_date.addClass("active-date");
                        document.getElementById("day").value = day;
                        document.getElementById("month").value = month+1;
                        document.getElementById("year").value = year;
                    }

                    curr_date.attr('id', day);

                    let monthTmp = (month+1) < 10 ? "0"+(month+1) : month+1;

                    const req = new XMLHttpRequest();
                    req.onreadystatechange = function () {
                        if (req.readyState === 4) {
                            let response = JSON.parse(req.responseText);

                            for(var i=0; i<35+first_day; i++) {
                                var newDay = i-first_day+1;
                                for (let j = 0; j < response['tableCollect'].length; ++j) {
                                    if (year + '-' + monthTmp + '-' + newDay === response['tableCollect'][j]['date']) {
                                        if (!document.getElementById(newDay).classList.contains("date-event")) {
                                            document.getElementById(newDay).className += ' date-event';
                                        }

                                    }
                                }
                            }
                        }
                    };
                    req.open('GET', '/PA/controllers/Calendar.php');
                    req.send();


                    if(events.length!==0) {
                        curr_date.addClass("event-date");
                    }
                    curr_date.click({events: events, month: months[month], day:day}, date_click);
                    row.append(curr_date);
                }
            }
            calendar_days.append(row);
            $(".year").text(year);
        }

        function days_in_month(month, year) {
            var monthStart = new Date(year, month, 1);
            var monthEnd = new Date(year, month + 1, 1);
            return (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
        }

        function date_click(event) {
            $(".events-container").show(250);
            $("#dialog").hide(250);
            $(".active-date").removeClass("active-date");
            $(this).addClass("active-date");
            document.getElementById("day").value = event.data.day;

            if (document.getElementById('tableTmp')) {
                document.getElementById('tableTmp').remove();
            }

            while (document.getElementById('trTmp')) {
                document.getElementById('trTmp').remove();
            }

            let monthTmp = (document.getElementById('month').value < 10 ? '0' + document.getElementById('month').value : document.getElementById('month').value);
            let yearTmp = document.getElementById('year').value;
            let table = document.getElementById('table-date');
            let tr, td, button, email, newTable, newTr, newTd, newButton, newEmail;

            const req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4) {
                    let response = JSON.parse(req.responseText);

                    for (let i = 0; i < response['tableCollect'].length; ++i) {
                        if (yearTmp + '-' + monthTmp + '-' + event.data.day === response['tableCollect'][i]['date']) {
                            newTr = document.createElement('tr');
                            newTr.id = "tr" + i;

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableCollect'][i]['hours'] + "H00";
                            newTr.appendChild(newTd);

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableCollect'][i]['email'];
                            newTr.appendChild(newTd);

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableCollect'][i]['phone'];
                            newTr.appendChild(newTd);

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableCollect'][i]['address'];
                            newTr.appendChild(newTd);

                            newButton = document.createElement('button');
                            newButton.innerHTML = 'Voir produits';
                            newButton.id = "button" + i;
                            newButton.setAttribute('onclick', 'showProducts("' + response['tableCollect'][i]['email'] + '", "' + newTr.id  + '", "' + newButton.id + '")');
                            newTr.appendChild(newButton);

                            table.appendChild(newTr);
                        }
                    }
                }
            };
            req.open('GET', '/PA/controllers/Calendar.php');
            req.send();
        };

// Event handler for when a month is clicked
        function month_click(event) {
            $(".events-container").show(250);
            $("#dialog").hide(250);
            var date = event.data.date;
            $(".active-month").removeClass("active-month");
            $(this).addClass("active-month");
            var new_month = $(".month").index(this);
            date.setMonth(new_month);
            init_calendar(date);
            document.getElementById("month").value = new_month + 1;
        }

// Event handler for when the year right-button is clicked
        function next_year(event) {
            $("#dialog").hide(250);
            var date = event.data.date;
            var new_year = date.getFullYear()+1;
            $("year").html(new_year);
            date.setFullYear(new_year);
            init_calendar(date);
            document.getElementById("year").value = new_year;
        }

// Event handler for when the year left-button is clicked
        function prev_year(event) {
            let dateNow = new Date();

            if (event.data.date.getFullYear() > dateNow.getFullYear()) {
                $("#dialog").hide(250);
                var date = event.data.date;
                var new_year = date.getFullYear() - 1;
                $("year").html(new_year);
                date.setFullYear(new_year);
                init_calendar(date);
            }
        }



// Checks if a specific date has any events
        function check_events(day, month, year) {
            var events = [];
            for(var i=0; i<event_data["events"].length; i++) {
                var event = event_data["events"][i];
                if(event["day"]===day &&
                    event["month"]===month &&
                    event["year"]===year) {
                    events.push(event);
                }
            }
            return events;
        }

// Given data for events in JSON format
        var event_data = {
            "events": [
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10,
                    "cancelled": true
                },
                {
                    "occasion": " Repeated Test Event ",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 10
                },
                {
                    "occasion": " Test Event",
                    "invited_count": 120,
                    "year": 2020,
                    "month": 5,
                    "day": 11
                }
            ]
        };

        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

    })(jQuery);

</script>
<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/styleCalendar.css">

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

        #products td>input {
            min-width: calc(100% - .8rem);
            max-width: calc(100% - .8rem);
        }

        /* Borders */
        #products td, #products th {
            border: 1px solid black;
            padding: 0;
        }

        #products th {
            padding: .2rem;
        }
        #products td:nth-child(3), #products th:nth-child(3) {
            border-right: none;
        }
        #products td:nth-child(4), #products th:nth-child(4) {
            border-left: none;
            width: 2rem;
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

        td svg {
            margin-bottom: 5%;
            margin-left: 5%;
        }

        /* Buttons */
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

    <h1>Liste des Distributions</h1>

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

    <div class="row">
        <div class="col-0 col-md-1"></div>
        <table class="table table-striped table-hover col-md-10">
            <thead>
            <tr>
                <th scope="col"><?php echo $lang["ADDRESS"]; ?></th>
                <th scope="col"><?php echo $lang["LABEL_PRODUCTS"]; ?></th>
                <th scope="col"><?php echo $lang["LABEL_STATUS"]; ?></th>
                <th scope="col">Récapitulatif</th>
            </tr>
            </thead>
            <tbody id="table-date">

            </tbody>
        </table>
    </div>

    <label id="emailLabel" style="visibility: collapse; position: absolute;"></label>

    <svg style="visibility: collapse; position: absolute" id="checkFalse" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="red" class="bi bi-check-square-fill" viewBox="0 0 16 16">
        <path id="pathFalse" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
    </svg>

    <svg style="visibility: collapse; position: absolute" id="download" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
    </svg>

    <form style="visibility: collapse; position: absolute" id="calendarForm" class='formulaire' action="calendar" method='POST' enctype='multipart/form-data'>
        <input type="hidden" id="day" name="day" value="">
        <input type="hidden" id="year" name="years" value="">
        <input type="hidden" id="month" name="month" value="">
        <input type="hidden" id="hours" name="hours" value="">
    </form>

    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js">

    </script>

    <script type="text/javascript">
        function pdf() {
            // Default export is a4 paper, portrait, using millimeters for units
            const {jsPDF} = window.jspdf;
            let index = 25;

            const req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4) {
                    let response = JSON.parse(req.responseText);

                    const doc = new jsPDF();
                    doc.text("Récapitulatif de la livraison", 10, 10);

                    for (let i = 0; i < response['tableDistrib'].length; ++i) {
                        doc.text("Date : " + response['tableDistrib'][i]['date'], 10, index);
                        doc.text("Adresse de livraison : " + response['tableDistrib'][i]['address'], 10, index + 10);
                        index += 30;
                    }

                    doc.text("Liste des produits livrés : ", 10, index);
                    index += 10;

                    for (let i = 0; i < response['tableProducts'].length; ++i) {
                        console.log(response['tableProducts'][i]);
                        doc.text("Code barre : " + response['tableProducts'][i]['product_code'], 10, index);
                        doc.text("Quantité : " + response['tableProducts'][i]['quantity'], 10, index + 10);
                        index += 25;
                    }
                    doc.save('recap' + response["tableDistrib"][0]["id"] + '.pdf');
                }
            };
            req.open('GET', '/PA/controllers/CalendarDistrib.php');
            req.send();
        }
    </script>

    <script>
        function showProducts(id, idTr, idButton){
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
            newTh.innerHTML = "Quantity";
            newTr.appendChild(newTh);
            newThead.appendChild(newTr);
            newTable.appendChild(newThead);
            const req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4) {
                    let response = JSON.parse(req.responseText);

                    for (let i = 0; i < response['tableProducts'].length; ++i) {
                        if (id === response['tableProducts'][i]['id_distrib'] ) {
                            newTr = document.createElement('tr');

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableProducts'][i]['product_code'];
                            newTr.appendChild(newTd);

                            newTd = document.createElement('td');
                            newTd.innerHTML = response['tableProducts'][i]['quantity'];
                            newTr.appendChild(newTd);

                            newTable.appendChild(newTr);
                        }
                    }
                    document.getElementById(idTr).after(newTable);
                    document.getElementById(idButton).setAttribute("onclick", 'hideProducts("' + id + '", "' + idTr  + '", "' + idButton + '")');
                }
            };
            req.open('GET', '/PA/controllers/CalendarDistrib.php');
            req.send();
        }

        function hideProducts(id, idTr, idButton) {
            document.getElementById("productsTable").remove();
            document.getElementById(idButton).setAttribute('onclick', 'showProducts("' + id + '", "' + idTr  + '", "' + idButton + '")');
        }

        function changeStatus(old_status, index, id) {
            if (old_status === false) {
                document.getElementById("path" + index).setAttribute("d", "M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z");
                document.getElementById("svg" + index).setAttribute("fill", "green");
                document.getElementById("svg" + index).setAttribute("onclick", "changeStatus(true, " + index + ", '" + id + "')");

                let td = document.getElementById("td" + index);
                let newSVG = document.createElement('svg');
                newSVG.xmlns = "http://www.w3.org/2000/svg";
                newSVG.width = "16";
                newSVG.height = "16";
                newSVG.fill = "currentColor";
                newSVG.className = "bi bi-download";
                newSVG.viewBox = "0 0 16 16";
                newSVG.setAttribute("onclick", "pdf(" + id + ")");
                let newPath = document.createElement('path');
                newPath.setAttribute("d", "M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z");
                newSVG.appendChild(newPath);
                let newPath2 = document.createElement('path');
                newPath2.setAttribute("d", "M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z");
                newSVG.appendChild(newPath2);
                td.appendChild(newSVG);
            } else {
                document.getElementById("path" + index).setAttribute("d", "M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z");
                document.getElementById("svg" + index).setAttribute("fill", "red");
                document.getElementById("svg" + index).setAttribute("onclick", "changeStatus(false, " + index + ", '" + id + "')");

                if (document.getElementById("pdf" + index)) {
                    document.getElementById("pdf" + index).remove();
                }
            }
            fetch("/PA/controllers/SetStatusDistrib.php?status=" + (!old_status).toString() + "&id=" + id)
                .then((response) => console.log("Status changed"));
        }

    </script>

    <script src="/PA/src/js/jquery.min.js"></script>
    <script src="/PA/src/js/bootstrap.min.js"></script>
    <script src="/PA/src/js/popper.js"></script>
    <script src="/PA/src/js/pdf.js"></script>

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

                            let monthTmp = (document.getElementById('month').value < 10 ? '0' + document.getElementById('month').value : document.getElementById('month').value);
                            let table = document.getElementById('table-date');
                            table.innerHTML = "";
                            let newTr, newTd, newButton, newSVG, newPath;

                            const req = new XMLHttpRequest();
                            req.onreadystatechange = function () {
                                if (req.readyState === 4) {
                                    let response = JSON.parse(req.responseText);

                                    for (let i = 0; i < response['tableDistrib'].length; ++i) {
                                        if (year + '-' + monthTmp + '-' + day === response['tableDistrib'][i]['date']) {
                                            newTr = document.createElement('tr');
                                            newTr.id = "tr" + i;

                                            newTd = document.createElement('td');
                                            newTd.innerHTML = response['tableDistrib'][i]['address'];
                                            newTr.appendChild(newTd);

                                            newButton = document.createElement('button');
                                            newButton.innerHTML = 'Voir produits';
                                            newButton.id = "button" + i;
                                            newButton.className = "btn btn-block";
                                            newButton.setAttribute('onclick', 'showProducts("' + response['tableDistrib'][i]['id'] + '", "' + newTr.id  + '", "' + newButton.id + '")');
                                            newTr.appendChild(newButton);

                                            newTd = document.createElement('td');
                                            newSVG = document.getElementById('checkFalse').cloneNode();
                                            newSVG.style.visibility = 'visible';
                                            newSVG.style.position = 'relative';
                                            newSVG.id = "svg" + i;
                                            newPath = document.getElementById('pathFalse').cloneNode();
                                            if (response['tableDistrib'][i]['status'] == 1) {
                                                newPath.setAttribute("d", "M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z");
                                                newSVG.setAttribute("fill", "green");
                                                newSVG.setAttribute('onclick', 'changeStatus(true, ' + i + ', "' + response['tableDistrib'][i]['id'] + '")');
                                            } else {
                                                newSVG.setAttribute('onclick', 'changeStatus(false, ' + i + ', "' + response['tableDistrib'][i]['id'] + '")');
                                            }
                                            newPath.id = "path" + i;
                                            newSVG.appendChild(newPath);
                                            newTd.appendChild(newSVG);
                                            newTr.appendChild(newTd);

                                            table.appendChild(newTr);
                                        }
                                    }
                                }
                            };
                        }

                        curr_date.attr('id', day);

                        let monthTmp = (month+1) < 10 ? "0"+(month+1) : month+1;

                        const req = new XMLHttpRequest();
                        req.onreadystatechange = function () {
                            if (req.readyState === 4) {
                                let response = JSON.parse(req.responseText);

                                for(var i=0; i<35+first_day; i++) {
                                    var newDay = i-first_day+1;
                                    for (let j = 0; j < response['tableDistrib'].length; ++j) {
                                        if (year + '-' + monthTmp + '-' + newDay === response['tableDistrib'][j]['date']) {
                                            if (!document.getElementById(newDay).classList.contains("date-event")) {
                                                document.getElementById(newDay).className += ' date-event';
                                            }

                                        }
                                    }
                                }
                            }
                        };
                        req.open('GET', '/PA/controllers/CalendarDistrib.php');
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
                table.innerHTML = "";
                let newTr, newTd, newButton, newSVG, newPath;

                const req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState === 4) {
                        let response = JSON.parse(req.responseText);

                        for (let i = 0; i < response['tableDistrib'].length; ++i) {
                            if (yearTmp + '-' + monthTmp + '-' + event.data.day === response['tableDistrib'][i]['date']) {
                                newTr = document.createElement('tr');
                                newTr.id = "tr" + i;

                                newTd = document.createElement('td');
                                newTd.innerHTML = response['tableDistrib'][i]['address'];
                                newTr.appendChild(newTd);

                                newButton = document.createElement('button');
                                newButton.innerHTML = 'Voir produits';
                                newButton.id = "button" + i;
                                newButton.className = "btn btn-block";
                                newButton.setAttribute('onclick', 'showProducts("' + response['tableDistrib'][i]['id'] + '", "' + newTr.id  + '", "' + newButton.id + '")');
                                newTr.appendChild(newButton);

                                newTd = document.createElement('td');
                                newSVG = document.getElementById('checkFalse').cloneNode();
                                newSVG.style.visibility = 'visible';
                                newSVG.style.position = 'relative';
                                newSVG.id = "svg" + i;
                                newPath = document.getElementById('pathFalse').cloneNode();
                                if (response['tableDistrib'][i]['status'] == 1) {
                                    newPath.setAttribute("d", "M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z");
                                    newSVG.setAttribute("fill", "green");
                                    newSVG.setAttribute('onclick', 'changeStatus(true, ' + i + ', "' + response['tableDistrib'][i]['id'] + '")');
                                } else {
                                    newSVG.setAttribute('onclick', 'changeStatus(false, ' + i + ', "' + response['tableDistrib'][i]['id'] + '")');
                                }
                                newPath.id = "path" + i;
                                newSVG.appendChild(newPath);
                                newTd.appendChild(newSVG);
                                newTr.appendChild(newTd);

                                newTd = document.createElement('td');
                                newTd.id = "td" + i;

                                if (response['tableDistrib'][i]['status'] == 1) {
                                    let newSVG = document.getElementById('download').cloneNode();
                                    newSVG.style.visibility = 'visible';
                                    newSVG.style.position = 'relative';
                                    newSVG.id = "pdf" + i;
                                    newSVG.setAttribute("onclick", "pdf(" + response['tableDistrib'][i]['id'] + ")");
                                    newPath = document.getElementById('download').childNodes[0].cloneNode();
                                    newSVG.appendChild(newPath);
                                    let newPath2 = document.getElementById('download').childNodes[1].cloneNode();
                                    newSVG.appendChild(newPath2);
                                    newTd.appendChild(newSVG);
                                }
                                newTr.appendChild(newTd);

                                table.appendChild(newTr);
                            }
                        }
                    }
                };
                req.open('GET', '/PA/controllers/CalendarDistrib.php');
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
</main>
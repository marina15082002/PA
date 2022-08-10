<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/styleCalendar.css">

<section class="ftco-section">
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
                                    <td class="month">Jan</td>
                                    <td class="month">Feb</td>
                                    <td class="month">Mar</td>
                                    <td class="month">Apr</td>
                                    <td class="month">May</td>
                                    <td class="month">Jun</td>
                                    <td class="month">Jul</td>
                                    <td class="month">Aug</td>
                                    <td class="month">Sep</td>
                                    <td class="month">Oct</td>
                                    <td class="month">Nov</td>
                                    <td class="month">Dec</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="days-table w-100">
                                <td class="day">Sun</td>
                                <td class="day">Mon</td>
                                <td class="day">Tue</td>
                                <td class="day">Wed</td>
                                <td class="day">Thu</td>
                                <td class="day">Fri</td>
                                <td class="day">Sat</td>
                            </table>
                            <div class="frame">
                                <table class="dates-table w-100">
                                    <tbody class="tbody">
                                    </tbody>
                                </table>
                            </div>
                            <button class="button" id="add-button">Add Event</button>
                        </div>
                    </div>
                    <div class="events-container">
                        <label> Choisissez un horaire </label>
                        <div class = "row">
                            <button  class="col-sm-9" id="button9">9:00</button>
                            <button  class="col-sm-9" id="button10">10:00</button>
                            <button  class="col-sm-9" id="button11">11:00</button>
                            <button  class="col-sm-9" id="button12">12:00</button>
                            <button  class="col-sm-9" id="button14">14:00</button>
                            <button  class="col-sm-9" id="button15">15:00</button>
                            <button  class="col-sm-9" id="button16">16:00</button>
                            <button  class="col-sm-9" id="button17">17:00</button>
                            <button  class="col-sm-9" id="button18">18:00</button>
                        </div>
                    </div>

                    <!--
                    <div class="dialog" id="dialog">
                        <h2 class="dialog-header"> Add New Event </h2>
                        <form class="form" id="form">
                            <div class="form-container" align="center">
                                <label class="form-label" id="valueFromMyButton" for="name">Event name</label>
                                <input class="input" type="text" id="name" maxlength="36">
                                <label class="form-label" id="valueFromMyButton" for="count">Number of people to invite</label>
                                <input class="input" type="number" id="count" min="0" max="1000000" maxlength="7">
                                <input type="button" value="Cancel" class="button" id="cancel-button">
                                <input type="button" value="OK" class="button button-white" id="ok-button">
                            </div>
                        </form>
                    </div>
                    -->
                </div>
            </div>
        </div>
</section>

<script src="/PA/src/js/jquery.min.js"></script>
<script src="/PA/src/js/bootstrap.min.js"></script>
<script src="/PA/src/js/popper.js"></script>
<script src="/PA/src/js/main.js"></script>


<!DOCTYPE html>
<html>
    <head>
        <title>Solar Water Heating System Sizing</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href="../css files/sizing.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <!--Navigation Bar-->
        <?php
        session_start();
        require 'header.php';
        ?>

        <!--Solar Water Heating Sizing Page Contents-->
        <div class="_container">
            <div class="grid-item-1">
                <a href="index.php"><ion-icon name="arrow-back-circle"></ion-icon> Homepage 
                <a href="services.php"><ion-icon name="arrow-back-circle"></ion-icon> Services</a>
            </div>
            <div class="space2"></div>
            <hr>
            <form id="_sizing_form">
                <h2 class="grid-item-2">Please Select The Application:</h2>
                <table id="options_table">
                    <tr>
                        <th>
                            <label for="application">Application Type:</label>
                        </th>
                        <td>
                            <select name="application type" id="application">
                                <option value="none">Not selected</option>
                                <option value="residence">Private Residence</option>
                                <option value="apartment">Apartment</option>
                                <option value="club">Club</option>
                                <option value="gym">Gym</option>
                                <option value="hospital">Hospital</option>
                                <option value="hotel">Hotel</option>
                                <option value="plant">Industrial Plant</option>
                                <option value="office">Office Building</option>
                                <option value="school">School</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div id="errors1"></div><br>
                <hr>
                <h2 class="grid-item-2">Please Add Your Fixtures:</h2>
                <table id="fixtures">
                    <tr>
                        <th>Fixture</th>
                        <th>Quantity</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="fixture_list" id="fix_list1" class="selected_fixture">
                                <option value="private lavatory">Private Lavatory</option>
                                <option value="public lavatory">Public Lavatory</option>
                                <option value="bathtub">Bathtub</option>
                                <option value="dishwasher">Dishwasher</option>
                                <option value="kitchen sink">Kitchen Sink</option>
                                <option value="washing machine">Washing Machine</option>
                                <option value="shower">Shower</option>
                                <option value="service sink">Service Sink</option>
                            </select>
                        </td>
                        <td><input type="number" name="qty1" class="qty"/></td>
                    </tr>
                </table>
                <br>
                <div id="errors2"></div><br>
                <center>
                    <button id="add_load" onclick="return add_fix()">Add Load</button>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <button id="size_sys" onclick="return size_heat()">Size System</button>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <button id="reset_table" onclick="return rst_fix()">Reset</button>
                </center>
                <hr>
                <h2 class="grid-item-2">Solar Water Heating System Summary:</h2>
                <table id="heat_results">
                    <tr>
                        <th>System Heating Capacity in W</th>
                        <td id="heat_input" class="output"></td>
                    </tr>
                    <tr>
                        <th>Maximum Probable Demand in L/h</th>
                        <td id="demand" class="output"></td>
                    </tr>
                    <tr>
                        <th>Storage Capacity in Liters</th>
                        <td id="storage" class="output"></td>
                    </tr>
                </table>
                <br>
                <div id="note">Calculations are based on an average panel efficiency of 40%.</div>
            </form>
        </div>

        <?php
        require 'footer.php';
        ?>

        <!--Script for ion icons-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
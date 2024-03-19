<!doctype html>
<link rel="stylesheet" href="style.css">

<html>
    <head>
        <title>Student Interface</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
            }
            tr { 
                border: solid;
                border-width: 1px 0;
            }
            td {
                padding: 5px;
                border:1px solid black;
                text-align: center;
            }
            th {
                padding:10px;
                border: 1px solid black;
                text-align: center;
            }
 
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }
 
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }
 
            .tab button: hover {
                background-color: #ddd;
            }
 
            .tab button.active {
                background-color: #ddd;
            }
 
            .tabcontent {
                display: none;
                padding; 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
 
            .calculator {
                width: 300px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                padding: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
   
            .display {
                height: 60px;
                font-size: 24px;
                text-align: right;
                padding: 5px;
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-bottom: 10px;
                overflow: auto;
            }
   
            .buttons {
                display: grid;
                grid-template-columns: repeat(4, 3fr);
                gap: 5px;
            }

            button {
                height: 80px;
                width: 70px;
                font-size: 25px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                background-color: #f1f1f1;
            }

            button:hover {
                background-color: #e1e1e1;
            }
        </style>
    </head>
    <body>
        <?php
            $num_relations = 3;
            $num_tuples = 4;
            $x = 1;
        ?>
        <div style="padding:10px">
            <table>
                <tr>
                    <th>FD</th>
                    <th>True</th>
                    <th>False</th>
                    <th>Tuples</th>
                    <th>Cols</th>
                    <th>Cols</th>
                    <th>Obs</th>
                    <th>Active</th>
                </tr>
                <?php
                    while($x<=$num_relations) {
                ?>
                            <tr>
                                <td><div class="display" id="fDDisplay"></div></td> <!--functional dependencies drop down-->
                                <td><input type="radio" name="<?php echo $x; ?>"></td> <!--True check box-->
                                <td><input type="radio" name="<?php echo $x; ?>"></td> <!--False check box-->
                                <td><div class="display" id="tuplesDisplay"></div></td> <!--tuples drop down-->
                                <td><div class="display" id="cols1Display"></div></td> <!--implies columns-->
                                <td><div class="display" id="cols2Display"></div></td> <!--implied columns-->
                                <td><div class="display" id="obsDisplay"></div></td> <!--student observations input-->
                                <td><input type="radio" name="Active"></td> <!--active checkbox-->
                            </tr>
                <?php
                        $x++;
                    }
                ?>
            </table>
        </div>            
        <div class="tab">
                <button class="tablinks" onclick="openInput(event, 'Rows')">Row</button>
                <button class="tablinks" onclick="openInput(event, 'FD')">FD</button>
                <button class="tablinks" onclick="openInput(event, 'Tuples')">Tuples</button>
                <button class="tablinks" onclick="openInput(event, 'Obs')">Obs</button>
            </div>

            <div id="Rows" class="tabcontent">
                <button onclick="openInput(event, 'Row1')">Row 1</button>
                <button onclick="openInput(event, 'Row2')">Row 2</button>
                <button onclick="openInput(event, 'Row3')">Row 3</button>
                <button onclick="openInput(event, 'AddRow')">Add Row</button>
                <button onclick="openInput(event, 'DeleteRow')">Delete Row</button>
            </div>

            <div id="FD" class="tabcontent">
                <button onclick="setDisplayVariable('FD'), appendToDisplay('A')">A</button>
                <button onclick="setDisplayVariable('FD'), appendToDisplay('B')">B</button>
                <button onclick="setDisplayVariable('FD'), appendToDisplay('C')">C</button>
                <button onclick="setDisplayVariable('FD'), appendToDisplay('D')">D</button>
                <button onclick="setDisplayVariable('FD'), appendToDisplay('E')">E</button>
                <button onclick="setDisplayVariable('FD'), appendToDisplay('&#8594')">&#8594</button>
                <button onclick="setDisplayVariable('FD'), clearLastElement()">Del</button>
            </div>

            <div id="Tuples" class="tabcontent">
                <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_1')">t<sub>1</sub></button>
                <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_2')">t<sub>2</sub></button>
                <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_3')">t<sub>3</sub></button>
                <button onclick="setDisplayVariable('Tuples'), clearLastElement()">Del</button>
            </div>

            <div id="Obs" class="tabcontent">
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('A')">A</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('B')">B</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('C')">C</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('D')">D</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('E')">E</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('=')">=</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('&#8800')">&#8800</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('&#94')">&#94;</button>
                <button onclick="setDisplayVariable('Obs'), appendToDisplay('&#8964')">&#8964;</button>
                <button onclick="setDisplayVariable('Obs'), clearLastElement()">Del</button>
            </div>

        <script>
            function openInput( evt, inputName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i =0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(inputName).style.display = "block";
                evt.currentTarget.className += "active";
            }
            // Initialize variables to store the current display and result display state
            let currentFDDisplay = ""; // The current FD display content
            let currentCols1Display = ""; // The current Cols1 display content
            let currentCols2Display = ""; // The current Cols2 display content
            let currentTuplesDisplay = ""; // The current Tuples display content
            let currentObsDisplay = ""; // The current Obs display content
            let currentField = "FD"; // The field the button interacts with
            let beforeArrow = true; // For the Columns setting whether before or after arrow in FD

            // Function to append a value to the current display
            function appendToDisplay(value) {
                if (currentField == "FD") {
                    currentFDDisplay += value;
                    if (value == '\u{2192}') {
                        beforeArrow = false;
                    }
                    if (beforeArrow == true && value != '\u{2192}') {
                        if (currentCols1Display === "") {
                            currentCols1Display += value;
                        } else {
                            currentCols1Display += ', ' + value;
                        }
                    } else if (beforeArrow == false && value != '\u{2192}') {
                        if (currentCols2Display === "") {
                            currentCols2Display += value;
                        } else {
                            currentCols2Display += ', ' + value;
                        }
                    }
                }
                if (currentField === "Tuples") {
                    if (currentTuplesDisplay === "") {
                        currentTuplesDisplay += value;
                    } else {
                        currentTuplesDisplay += ', ' + value;
                    }
                }
                if (currentField === "Obs") {
                    currentObsDisplay += value;
                }

                updateDisplay();
            }

            // Function to set which field will be updated
            function setDisplayVariable(field) {
                if (field === "FD") {
                    currentField = "FD";
                }
                if (field === "Tuples") {
                    currentField = "Tuples";
                }
                if (field === "Obs") {
                    currentField = "Obs";
                }
            }

            // Function to update the display with the current content
            function updateDisplay() {
                if (currentField === "FD") {
                    const displayFDElement = document.getElementById("fDDisplay");
                    displayFDElement.textContent = currentFDDisplay;
                    const displayCols1Element = document.getElementById("cols1Display");
                    displayCols1Element.textContent = currentCols1Display;
                    const displayCols2Element = document.getElementById("cols2Display");
                    displayCols2Element.textContent = currentCols2Display;
                }
                if (currentField === "Tuples") {
                    const displayElement = document.getElementById("tuplesDisplay");
                    displayElement.textContent = currentTuplesDisplay;
                }
                if (currentField === "Obs") {
                    const displayElement = document.getElementById("obsDisplay");
                    displayElement.textContent = currentObsDisplay;
                }
            }

            // Function to clear the last element from the current display
            function clearLastElement() {
                if (currentField === "FD") {
                    if (currentFDDisplay.slice(-1) === '\u{2192}') {
                        beforeArrow = true;
                    }
                    if (beforeArrow && currentFDDisplay.slice(-1) != '\u{2192}') {
                        currentCols1Display = currentCols1Display.slice(0, -3);
                    } else if (!beforeArrow && currentFDDisplay.slice(-1) != '\u{2192}') {
                        currentCols2Display = currentCols2Display.slice(0, -3);
                    }
                    currentFDDisplay = currentFDDisplay.slice(0, -1);
                }
                if (currentField === "Tuples") {
                    currentTuplesDisplay = currentTuplesDisplay.slice(0, -5);
                }
                if (currentField === "Obs") {
                    currentObsDisplay = currentObsDisplay.slice(0, -1);
                }

                updateDisplay();
            }
        </script>
        <div style="padding: 10px">
            <table>
                <tr>
                    <th style=""></th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                </tr>
                <?php
                    $x = 1;
                    while($x<=$num_tuples) {
                ?>
                            <tr>
                                <td>t<sub><?php echo "$x";?></sub></td>
                                <td>a<sub><?php echo "$x";?></sub></td>
                                <td>b<sub><?php echo "$x";?></sub></td>
                                <td>c<sub><?php echo "$x";?></sub></td>
                                <td>d<sub><?php echo "$x";?></sub></td>
                                <td>e<sub><?php echo "$x";?></sub></td>
                            </tr>
                <?php
                        $x++;
                    }
                ?>
            </table>
        </div>
    </body>
</html>
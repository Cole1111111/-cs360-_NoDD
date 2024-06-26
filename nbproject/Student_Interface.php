<!doctype html>
<html>
    <head>
        <title>Student Interface</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
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
            $num_variables = 5;
            $x = 1;
        ?>
        <div style="padding:10px">
            <table id="studentInput">
                <tr>
                    <th>FD</th>
                    <th>True</th>
                    <th>False</th>
                    <th style="background-color: #7bf542;">Tuples</th>
                    <th style="background-color: #42bcf5;">Cols</th>
                    <th style="background-color: #F5F542;">Cols</th>
                    <th>Obs</th>
                    <th>Active</th>
                </tr>
                <?php
                    while($x<=$num_relations) {
                
                            echo '<tr id=' . "Row$x" . '>';
                    
                                echo '<td><div class="display" id=' . "fDDisplay$x" . '></div></td>'; //<!--functional dependencies drop down-->
                                echo '<td><input type="radio" name=' . "$x" . '></td>'; //<!--True check box-->
                                echo '<td><input type="radio" name=' . "$x" . '></td>'; //<!--False check box-->
                                echo '<td><div class="display" id=' . "tuplesDisplay$x" . '></div></td>'; //<!--tuples drop down-->
                                echo '<td><div class="display" id=' . "cols1Display$x" . '></div></td>'; //<!--implies columns-->
                                echo '<td><div class="display" id=' . "cols2Display$x" . '></div></td>'; //<!--implied columns-->
                                echo '<td><div class="display" id=' . "obsDisplay$x" . '></div></td>'; //<!--student observations input-->
                                echo '<td><input type="radio" name="Active" id=' . "$x" . ' onclick="UpdateHighlight(this.id)"></td>'; //<!--active checkbox-->
                            echo '</tr>';
                
                        $x++;
                    }
                ?>
            </table>
        </div>
        
        <!-- Buttons for filling in the Obs field in selected row -->
        <div class="tab">
            <button class="tablinks" onclick="openInput(event, 'Rows')">Row</button>
            <button class="tablinks" onclick="openInput(event, 'FD')">FD</button>
            <button class="tablinks" onclick="openInput(event, 'Tuples')">Tuples</button>
            <button class="tablinks" onclick="openInput(event, 'Obs')">Obs</button>
        </div>

        <!-- Buttons for selecting row -->
        <div id="Rows" class="tabcontent">
            
            <button id="rowButton1" onclick="setCurrentRow('1')">Row 1</button>
            <button id="rowButton2" onclick="setCurrentRow('2')">Row 2</button>
            <button id="rowButton3" onclick="setCurrentRow('3')">Row 3</button>
            <button id="addRowButton" onclick="add_row()">Add Row</button>
            <button id="delRowButton" onclick="delete_row()">Del Row</button>
        </div>

        <!-- Buttons for filling in the FD field in selected row -->
        <div id="FD" class="tabcontent">
            <button onclick="setDisplayVariable('FD'), appendToDisplay('A')">A</button>
            <button onclick="setDisplayVariable('FD'), appendToDisplay('B')">B</button>
            <button onclick="setDisplayVariable('FD'), appendToDisplay('C')">C</button>
            <button onclick="setDisplayVariable('FD'), appendToDisplay('D')">D</button>
            <button onclick="setDisplayVariable('FD'), appendToDisplay('E')">E</button>
            <button onclick="setDisplayVariable('FD'), appendToDisplay('&#8594')">&#8594</button>
            <button onclick="setDisplayVariable('FD'), clearLastElement()">Del</button>
        </div>

        <!-- Buttons for filling in the Tuples field in selected row -->
        <div id="Tuples" class="tabcontent">
            <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_1')">t<sub>1</sub></button>
            <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_2')">t<sub>2</sub></button>
            <button onclick="setDisplayVariable('Tuples'), appendToDisplay('t_3')">t<sub>3</sub></button>
            <button onclick="setDisplayVariable('Tuples'), clearLastElement()">Del</button>
        </div>

        <!-- Buttons for filling in the Obs field in selected row -->
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

        <!-- Script for button functionality -->
        <script>
            // Function that makes the different tabs for the input buttons drop down
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
            let currentFDDisplay = "";//document.getElementById("fDDisplay" + currentRow); // The current FD display content
            let currentCols1Display = ""; // The current Cols1 display content
            let currentCols2Display = ""; // The current Cols2 display content
            let currentTuplesDisplay = ""; // The current Tuples display content
            let currentObsDisplay = ""; // The current Obs display content*/
            let currentField = "FD"; // The field the button interacts with
            let currentRow = 1; // The current row that is being input too
            let beforeArrow = true; // For the Columns setting whether before or after arrow in FD
            var x = <?php echo $x; ?> - 1;
            let currentActiveRow = 0; 

            // Function to append a value to the current display
            function appendToDisplay(value) {

                if (currentField == "FD") {
                    if (value == '\u{2192}' && beforeArrow == true) {
                        beforeArrow = false;
                        currentFDDisplay += value;
                    } else if (value == '\u{2192}' && beforeArrow == false){
                        alert("Only one arrow can be in FD display at once");
                        return;
                    } else {
                        currentFDDisplay += value;
                    }

                    //first cols
                    if (beforeArrow == true && value != '\u{2192}') {
                        if (currentCols1Display === '') {
                            currentCols1Display += value;
                        } else if (currentCols1Display != '') {
                            currentCols1Display += ', ' + value;
                        }
                      
                    //second cols 
                    } else if (beforeArrow == false && value != '\u{2192}') {
                        if (currentCols2Display === "") {
                            currentCols2Display += value;
                        } else if (currentCols2Display != "") {
                            currentCols2Display += ', ' + value;
                        }
                    }
                }

                //Tuples
                if (currentField === "Tuples") {
                    if (currentTuplesDisplay === "") {
                        currentTuplesDisplay += value;
                    } else {
                        currentTuplesDisplay += ', ' + value;
                    }
                }

                //Observations
                if (currentField === "Obs") {
                    currentObsDisplay += value;
                }

                updateDisplay();
            }

            // Function to set the row that will be input into
            function setCurrentRow(row) {
                currentRow = row;

                const displayFDElement = document.getElementById("fDDisplay" + currentRow);
                currentFDDisplay = displayFDElement.textContent;

                if (currentFDDisplay.search('\u{2192}') === -1) {
                    beforeArrow = true;
                }

                const displayCols1Element = document.getElementById("cols1Display" + currentRow);
                currentCols1Display = displayCols1Element.textContent;

                const displayCols2Element = document.getElementById("cols2Display" + currentRow);
                currentCols2Display = displayCols2Element.textContent;

                const displayTuplesElement = document.getElementById("tuplesDisplay" + currentRow);
                currentTuplesDisplay = displayTuplesElement.textContent;

                const displayObsElement = document.getElementById("obsDisplay" + currentRow);
                currentObsDisplay = displayObsElement.textContent;
            }

            // Function to set which field will be updated
            function setDisplayVariable(field) {
                currentField = field;
            }

            // Function to update the display with the current content
            function updateDisplay() {
                const displayFDElement = document.getElementById("fDDisplay" + currentRow);
                displayFDElement.textContent = currentFDDisplay;

                const displayCols1Element = document.getElementById("cols1Display" + currentRow);
                displayCols1Element.textContent = currentCols1Display;
                const displayCols2Element = document.getElementById("cols2Display" + currentRow);
                displayCols2Element.textContent = currentCols2Display;

                const displayTuplesElement = document.getElementById("tuplesDisplay" + currentRow);
                displayTuplesElement.textContent = currentTuplesDisplay;

                const displayObsElement = document.getElementById("obsDisplay" + currentRow);
                displayObsElement.textContent = currentObsDisplay;

                if(currentRow == currentActiveRow){
                    UpdateHighlight(currentRow);
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

            function add_row()
            {
                x++;

                let table = document.getElementById("studentInput");

                let row = document.createElement("tr");
                row.setAttribute('id', 'Row' + x);

                let c1 = document.createElement("td");
                let d1 = document.createElement("div");

                d1.setAttribute('class', 'display');
                d1.setAttribute('id', 'fDDisplay' + x);
                c1.appendChild(d1);

                let c2 = document.createElement("td");
                let d2 = document.createElement("input");

                d2.setAttribute('type', 'radio');
                d2.setAttribute('name', x);
                c2.appendChild(d2);

                let c3 = document.createElement("td");
                let d3 = document.createElement("input");

                d3.setAttribute('type', 'radio');
                d3.setAttribute('name', x);
                c3.appendChild(d3);

                let c4 = document.createElement("td");
                let d4 = document.createElement("div");

                d4.setAttribute('class', 'display');
                d4.setAttribute('id', 'tuplesDisplay' + x);
                c4.appendChild(d4);

                let c5 = document.createElement("td");
                let d5 = document.createElement("div");

                d5.setAttribute('class', 'display');
                d5.setAttribute('id', 'cols1Display' + x);
                c5.appendChild(d5);

                let c6 = document.createElement("td");
                let d6 = document.createElement("div");

                d6.setAttribute('class', 'display');
                d6.setAttribute('id', 'cols2Display' + x);
                c6.appendChild(d6);

                let c7 = document.createElement("td");
                let d7 = document.createElement("div");

                d7.setAttribute('class', 'display');
                d7.setAttribute('id', 'obsDisplay' + x);
                c7.appendChild(d7);

                let c8 = document.createElement("td");
                let d8 = document.createElement("input");

                d8.setAttribute('type', 'radio');
                d8.setAttribute('name', 'Active');
                d8.setAttribute('id', x);
                d8.setAttribute('onclick', 'UpdateHighlight(this.id)');
                c8.appendChild(d8);

                row.appendChild(c1);
                row.appendChild(c2);
                row.appendChild(c3);
                row.appendChild(c4);
                row.appendChild(c5);
                row.appendChild(c6);
                row.appendChild(c7);
                row.appendChild(c8);

                table.appendChild(row);


                let rowButtons = document.getElementById("Rows");

                const addRowButton = document.getElementById("addRowButton");
                const delRowButton = document.getElementById("delRowButton");
                addRowButton.remove();
                delRowButton.remove();

                let rowButton = document.createElement("button");
                rowButton.setAttribute('id', 'rowButton' + x);
                rowButton.setAttribute('onclick', 'setCurrentRow(\'' + x + '\')');
                rowButton.innerText = "Row " + x;
                rowButtons.appendChild(rowButton);

                let addRow = document.createElement("button");
                addRow.setAttribute('id', 'addRowButton');
                addRow.setAttribute('onclick', 'add_row()');
                addRow.innerText = "Add Row";
                rowButtons.appendChild(addRow);

                let delRow = document.createElement("button");
                delRow.setAttribute('id', 'delRowButton');
                delRow.setAttribute('onclick', 'delete_row()');
                delRow.innerText = "Del Row";
                rowButtons.appendChild(delRow);
            }

            function delete_row()
            {
                let table = document.getElementById("studentInput");
                if(x > 1){
                    if(currentActiveRow == x){
                        ClearHighlight();
                    }

                    table.deleteRow(-1);

                    let lastRowButton = document.getElementById("rowButton" + x);
                    lastRowButton.remove();

                    x--;
                }else{
                   alert("Must have at least one row.");
                }
            }
        </script>

        <div style="padding: 10px">
            <table>
                <tr>
                    <th style=""></th>
                    <th id="HeaderA">A</th>
                    <th id="HeaderB">B</th>
                    <th id="HeaderC">C</th>
                    <th id="HeaderD">D</th>
                    <th id="HeaderE">E</th>
                </tr>
                <?php
                    $x = 1;
                    while($x<=$num_tuples) {
                ?>
                            <tr>
                                <td id=<?php echo"t$x" ?>>t<sub><?php echo "$x";?></sub></td>
                                <td id=<?php echo"A$x" ?>>a<sub><?php echo "$x";?></sub></td>
                                <td id=<?php echo"B$x" ?>>b<sub><?php echo "$x";?></sub></td>
                                <td id=<?php echo"C$x" ?>>c<sub><?php echo "$x";?></sub></td>
                                <td id=<?php echo"D$x" ?>>d<sub><?php echo "$x";?></sub></td>
                                <td id=<?php echo"E$x" ?>>e<sub><?php echo "$x";?></sub></td>
                            </tr>
                <?php
                        $x++;
                    }
                ?>
            </table>
        </div>

        <script>
            function UpdateHighlight(activeRow){
                currentActiveRow = activeRow;

                const displayTuples = document.getElementById("tuplesDisplay" + activeRow); //get current tuples string
                currentTuplesDisplay = displayTuples.textContent;
                
                const displayCols1 = document.getElementById("cols1Display" + activeRow); //get current cols 1 string
                currentCols1Display = displayCols1.textContent;

                const displayCols2 = document.getElementById("cols2Display" + activeRow); //get current cols 2 display
                currentCols2Display = displayCols2.textContent;

                var num_variables = "<?php echo $num_variables?>"                
                var num_tuples = "<?php echo $num_tuples; ?>";

                for(let i = 0; i < num_variables; i++){ //reset all background colors to white before setting them to something else
                    document.getElementById("Header" + String.fromCharCode(65 + i)).style.backgroundColor="#ffffff";
                    for(let j = 1; j <= num_tuples; j++){
                        document.getElementById(String.fromCharCode(65 + i) + j).style.backgroundColor="#ffffff";
                    }
                }

                for(let i = 0; i < num_variables; i++){
                    if(currentCols1Display.search(String.fromCharCode(65 + i)) != -1){ //starting at "A" (char code 65) check which variables are in the cols 1 and need to be highlighted
                        document.getElementById("Header" + String.fromCharCode(65 + i)).style.backgroundColor="#42bcf5";
                    }

                    if(currentCols2Display.search(String.fromCharCode(65 + i)) != -1){ //starting at "A" (char code 65) check which variables are in the cols 2 and need to be highlighted
                        document.getElementById("Header" + String.fromCharCode(65 + i)).style.backgroundColor="#F5F542";
                    }

                    if((currentCols1Display.search(String.fromCharCode(65 + i)) != -1) && (currentCols2Display.search(String.fromCharCode(65 + i)) != -1)){
                        document.getElementById("Header" + String.fromCharCode(65 + i)).style.backgroundColor="#eba134";
                    }
                }

                for(let i = 1; i <= num_tuples; i++){
                    if(currentTuplesDisplay.search(i) != -1){ 
                        for(let j = 0; j < num_variables; j++){
                            if(currentCols1Display.search(String.fromCharCode(65 + j)) != -1){ //starting at "A" (char code 65) check which variables are in the cols 1 and need to be highlighted
                                document.getElementById(String.fromCharCode(65 + j) + i).style.backgroundColor="#42bcf5";
                            }
                            if(currentCols2Display.search(String.fromCharCode(65 + j)) != -1){ //starting at "A" (char code 65) check which variables are in the cols 2 and need to be highlighted
                                document.getElementById(String.fromCharCode(65 + j) + i).style.backgroundColor="#F5F542";
                            }

                            if((currentCols1Display.search(String.fromCharCode(65 + j)) != -1) && (currentCols2Display.search(String.fromCharCode(65 + j)) != -1)){
                                document.getElementById(String.fromCharCode(65 + j) + i).style.backgroundColor="#eba134";
                            }
                        }
                    }
                }
            }

            function ClearHighlight(){
                var num_variables = "<?php echo $num_variables?>"                
                var num_tuples = "<?php echo $num_tuples; ?>";

                for(let i = 0; i < num_variables; i++){ //set all background colors to white
                    document.getElementById("Header" + String.fromCharCode(65 + i)).style.backgroundColor="#ffffff";
                    for(let j = 1; j <= num_tuples; j++){
                        document.getElementById(String.fromCharCode(65 + i) + j).style.backgroundColor="#ffffff";
                    }
                }
            }
        </script>
    </body>
</html>
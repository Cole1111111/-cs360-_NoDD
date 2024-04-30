<!DOCTYPE html>
<html>
    <head>
        <title>SERVER MESSAGE</title>
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
        <form method="post" target="_self">
            <div>
                <!--input for variables -->
                <label for="varinput">Input Variables:</label>
                <input type="text" id="varinput" name="varinput" placeholder="ie: a,b,c,d" required>
            </div>
            <br>
            <div>
                <!--input for dependencies of variables -->
                <label for="depinput">Input Variables Dependencies:</label>
                <input type="text" id="depinput" name="depinput" placeholder="ie: {a,b,c}->{d}, {d}->{a}" required>
            </div>
            <br>
            <div>
                <input type="reset">
            </div>
            <br>
            <div>
                <input type="submit" value="Create Table">
            </div>

            
        </form>

        <?php
            $x = 1;
            if (isset($_POST['varinput'])) {
                echo "Submission received: <br>";

                // Parsing variables and dependencies
                $variables = explode(',', $_POST['varinput']);
                $dependencies = explode(',', $_POST['depinput']);
                $y = count($variables);

                // Create a table to display variables and their dependencies
                echo '<table id ="teacherInput" border="1">';
                echo '<tr>';
        
                echo '<th>' . '</th>';
                foreach ($variables as $variable) {
                    echo $variable;
                    echo '<th>' . $variable . '</th>';
                }
                echo '</tr>';
                echo '<tr id="Row' . $x . '">';
                echo '<td id="tuple">t<sub>' . $x . '</sub></td>';
                foreach ($variables as $variable) {
                    echo $variable;
                    echo '<td><div class="display" id="' . $variable . $x . '"></div></td>';
                }
                echo '</table>';
            }
        ?>
            
        <!-- Buttons for filling in the Obs field in selected row -->
        <div class="tab">
            <button class="tablinks" onclick="openInput(event, 'Rows')">Row</button>
            <button class="tablinks" onclick="openInput(event, 'Attributes')">Attr</button>
            <button class="tablinks" onclick="openInput(event, 'AttNum')">Attr Num</button>
        </div>

        <!-- Buttons for selecting row -->
        <div id="Rows" class="tabcontent">
            
            <button id="rowButton1" onclick="setCurrentRow('1')">Row 1</button>
            <button id="addRowButton" onclick="add_row()">Add Row</button>
            <button id="delRowButton" onclick="delete_row()">Del Row</button>
        </div>

        <!-- Buttons for filling in the Attributes field in selected row -->
        <div id="Attributes" class="tabcontent">
            <?php 
                foreach ($variables as $curvar) {
                    echo '<button onclick="setAttr(\'' . $curvar . '\')">' . $curvar . '</button>';
                }
            ?>
        </div>

        <!-- Buttons for filling in the AttNum field in selected row -->
        <div id="AttNum" class="tabcontent">
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="clearLastElement()">Del</button>
        </div>
        
        <!--submit to database-->
        <div>
            <input type="submit" value="submit" onclick="createFDTable()">
            <?php
                $con = mysqli_connect("localhost", "root", "", "nodd_tale");
                
                //check connection
                if(mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $attributes = implode($variables);
                $fd = implode($dependencies);
                $fDTable=$_POST['arr'];
                $query= "INSERT INTO `questions`(`ass id`, `quest num`, `attributes`, `fd`, `fd table`, `answer`) VALUES ('1', '' ,'$attributes','$fd','$fDTable','')";
                echo $fDTable;
            ?>
        </div>

        <div id="printer">

        </div>

        <!-- Script for button functionality -->
        <script>
            // Function that makes the different tabs for the input buttons drop down
            function openInput(evt, inputName) {
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
            let currentDisplay = ""; // The display the buttons append to.
            let currentRow = 1; // The current row that is being input too
            var x = <?php echo $x; ?>; // Current row number
            var y = <?php echo $y; ?>; // amount of attributes
            var attr = <?php echo json_encode($variables); ?>; // array of all attributes
            let currentField = attr[0]; // The field the button interacts with

            // Function to append a value to the current display
            function appendToDisplay(value) {

                if (currentDisplay == ""){
                    currentDisplay = value;
                } else {
                    alert("Only one value in a display at a time");
                }

                updateDisplay();
            }

            // Function to set the row that will be input into
            function setCurrentRow(row) {
                currentRow = row;
                const displayElement = document.getElementById(currentField + currentRow);
                currentDisplay = displayElement.textContent;
            }

            // Function to set which field will be updated
            function setAttr(field) {
                currentField = field;
                const displayElement = document.getElementById(currentField + currentRow);
                currentDisplay = displayElement.textContent;
            }

            // Function to update the display with the current content
            function updateDisplay() {
                const displayElement = document.getElementById(currentField + currentRow);
                let subscript = document.createElement("sub");
                subscript.innerText = currentDisplay;
                displayElement.textContent = currentField;
                displayElement.appendChild(subscript);
            }

            // Function to clear the last element from the current display
            function clearLastElement() {
                const displayElement = document.getElementById(currentField + currentRow);
                displayElement.textContent = "";
            }

            function add_row()
            {
                x++;

                let table = document.getElementById("teacherInput");

                let row = document.createElement("tr");
                row.setAttribute('id', 'Row' + x);

                let tupNum = document.createElement("td");
                tupNum.setAttribute('id', 't' + x);
                tupNum.innerText = "t";
                let subscript = document.createElement("sub");
                subscript.innerText = x;
                tupNum.appendChild(subscript);
                row.appendChild(tupNum);

                for (i = 0; i < y; i++) {
                    let c = document.createElement("td");
                    let d = document.createElement("div");

                    d.setAttribute('class', 'display');
                    d.setAttribute('id', attr[i] + x);

                    c.appendChild(d);
                    row.appendChild(c);
                }
                
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
                let table = document.getElementById("teacherInput");
                if(x > 1){
                    table.deleteRow(-1);

                    let lastRowButton = document.getElementById("rowButton" + x);
                    lastRowButton.remove();

                    x--;
                }else{
                   alert("Must have at least one row.");
                }
            }

            function createFDTable(){
                let count = 0;
                let arr = [];
                for(i = 1; i < x; i++){
                    for(j = 0; j < y; j++){
                        let display = document.getElementById(attr[j] + i);
                        if (display) {
                            let element = display.textContent;
                        } else {
                            alert("display doesnt exist?")
                        }
                        arr[count] = element.slice(-1) + ",";
                        count++;
                    }
                    arr[count - 1] = arr[count - 1].slice(0,-1) + ";";
                }
                arr.join();
                $.post({arr: arr});
            }
        </script>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
    <title>Student Input Test</title>
        <style>
 
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

        <h2>Input</h2>
        <p>Click on the buttons inside the tabbed menu to input into associated columns</p>
        <div class="calculator">
            <div class="display" id="display"></div>

            <div class="tab">
                <button class="tablinks" onclick="openInput(event, 'Rows')">Row</button>
                <button class="tablinks" onclick="openInput(event, 'FD')">FD</button>
                <button class="tablinks" onclick="openInput(event, 'Tuples')">Tuples</button>
                <button class="tablinks" onclick="openInput(event, 'Cols1')">Cols</button>
                <button class="tablinks" onclick="openInput(event, 'Cols2')">Cols</button>
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
                <button onclick="appendToDisplay('A')">A</button>
                <button onclick="appendToDisplay('B')">B</button>
                <button onclick="appendToDisplay('C')">C</button>
                <button onclick="appendToDisplay('D')">D</button>
                <button onclick="appendToDisplay('E')">E</button>
                <button onclick="appendToDisplay('&#8594')">&#8594</button>
                <button onclick="clearLastElement()">Delete</button>
            </div>

            <div id="Tuples" class="tabcontent">
                <button onclick="appendToDisplay('t1')">t<sub>1</sub></button>
                <button onclick="appendToDisplay('t2')">t<sub>2</sub></button>
                <button onclick="appendToDisplay('t3')">t<sub>3</sub></button>
                <button onclick="clearLastElement()">Delete</button>
            </div>

            <div id="Cols1" class="tabcontent">
                <button onclick="appendToDisplay('A')">A</button>
                <button onclick="appendToDisplay('B')">B</button>
                <button onclick="appendToDisplay('C')">C</button>
                <button onclick="appendToDisplay('D')">D</button>
                <button onclick="appendToDisplay('E')">E</button>
                <button onclick="clearLastElement()">Delete</button>
            </div>

            <div id="Cols2" class="tabcontent">
                <button onclick="appendToDisplay('A')">A</button>
                <button onclick="appendToDisplay('B')">B</button>
                <button onclick="appendToDisplay('C')">C</button>
                <button onclick="appendToDisplay('D')">D</button>
                <button onclick="appendToDisplay('E')">E</button>
                <button onclick="clearLastElement()">Delete</button>
            </div>

            <div id="Obs" class="tabcontent">
                <button onclick="appendToDisplay('A')">A</button>
                <button onclick="appendToDisplay('B')">B</button>
                <button onclick="appendToDisplay('C')">C</button>
                <button onclick="appendToDisplay('D')">D</button>
                <button onclick="appendToDisplay('E')">E</button>
                <button onclick="appendToDisplay('=')">=</button>
                <button onclick="appendToDisplay('&#8800')">&#8800</button>
                <button onclick="appendToDisplay('&#94')">&#94;</button>
                <button onclick="appendToDisplay('&#8964')">&#8964;</button>
                <button onclick="clearLastElement()">Delete</button>
            </div>
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
            let currentDisplay = ""; // The current display content

            // Function to append a value to the current display
            function appendToDisplay(value) {
                currentDisplay += value;

                updateDisplay();
            }

            // Function to update the display with the current content
            function updateDisplay() {
                const displayElement = document.getElementById("display");
                displayElement.textContent = currentDisplay;
            }

            // Function to clear the last element from the current display
            function clearLastElement() {
                currentDisplay = currentDisplay.slice(0, -1);

                updateDisplay();
            }
        </script>
    </body>
</html>
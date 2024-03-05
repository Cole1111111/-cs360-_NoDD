<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
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

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2>Input</h2>
<p>Click on the buttons inside the tabbed menu to input into associated columns:</p>

<div class="tab">
  <button class="tablinks" onclick="openInput(event, 'FD')">FD</button>
  <button class="tablinks" onclick="openInput(event, 'Tuples')">Tuples</button>
  <button class="tablinks" onclick="openInput(event, 'Cols1')">Cols</button>
  <button class="tablinks" onclick="openInput(event, 'Cols2')">Cols</button>
  <button class="tablinks" onclick="openInput(event, 'Obs')">Obs</button>
</div>

<div id="FD" class="tabcontent">
  <button class="tablinks" onclick="openInput(event, 'A')">A</button>
  <button class="tablinks" onclick="openInput(event, 'B')">B</button>
  <button class="tablinks" onclick="openInput(event, 'C')">C</button>
  <button class="tablinks" onclick="openInput(event, 'D')">D</button>
  <button class="tablinks" onclick="openInput(event, 'E')">E</button>
  <button class="tablinks" onclick="openInput(event, 'arrow')">&#8594</button>
</div>

<div id="Tuples" class="tabcontent">
  <button class="tablinks" onclick="openInput(event, 't1')">t<sub>1</sub></button>
  <button class="tablinks" onclick="openInput(event, 't2')">t<sub>2</sub></button>
  <button class="tablinks" onclick="openInput(event, 't3')">t<sub>3</sub></button>
</div>

<div id="Cols1" class="tabcontent">
  <button class="tablinks" onclick="openInput(event, 'A')">A</button>
  <button class="tablinks" onclick="openInput(event, 'B')">B</button>
  <button class="tablinks" onclick="openInput(event, 'C')">C</button>
  <button class="tablinks" onclick="openInput(event, 'D')">D</button>
  <button class="tablinks" onclick="openInput(event, 'E')">E</button>
</div>

<div id="Cols2" class="tabcontent">
  <button class="tablinks" onclick="openInput(event, 'A')">A</button>
  <button class="tablinks" onclick="openInput(event, 'B')">B</button>
  <button class="tablinks" onclick="openInput(event, 'C')">C</button>
  <button class="tablinks" onclick="openInput(event, 'D')">D</button>
  <button class="tablinks" onclick="openInput(event, 'E')">E</button>
</div>

<div id="Obs" class="tabcontent">
  <button class="tablinks" onclick="openInput(event, 'A')">A</button>
  <button class="tablinks" onclick="openInput(event, 'B')">B</button>
  <button class="tablinks" onclick="openInput(event, 'C')">C</button>
  <button class="tablinks" onclick="openInput(event, 'D')">D</button>
  <button class="tablinks" onclick="openInput(event, 'E')">E</button>
  <button class="tablinks" onclick="openInput(event, 'Equal')">=</button>
  <button class="tablinks" onclick="openInput(event, 'NotEqual')">&#8800</button>
  <button class="tablinks" onclick="openInput(event, 'UpCaret')">&#94;</button>
  <button class="tablinks" onclick="openInput(event, 'DownCaret')">&#8964;</button>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openInput(evt, inputName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(inputName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html>
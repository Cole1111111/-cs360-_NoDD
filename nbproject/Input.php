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
            <input type="text" id="varinput" name="varinput" placeholder="ie: a,b,c,d" required />
        </div>
        <br>
        <div>
            <!--input for dependencies of variables -->
            <label for="depinput">Input Variables Dependencies:</label>
            <input type="text" id="depinput" name="depinput" placeholder="ie: {a,b,c}->{d}, {d}->{a}" required />
        </div>
        <br>
        <div>
            <input type="reset">
        </div>
        <br>
        <div>
            <input type="submit" value="submit" />
        </div>

    </form>

    <?php
    if (isset($_POST['varinput'])) {
        echo "Submission received: <br>";

        // Parsing variables and dependencies
        $variables = explode(',', $_POST['varinput']);
        $dependencies = explode(',', $_POST['depinput']);

        // Create a table to display variables and their dependencies
        echo '<table border="1">';
        echo '<tr>';
        
        echo '<th>' . '</th>';
        foreach ($variables as $variable) {
            echo '<th>' . $variable . '</th>';

            
        }
        echo '</tr>';
        echo '</table>';
    }
    ?>
</body>




</html>

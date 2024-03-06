<!DOCTYPE html>
<html>
    <head>
        <title>SERVER MESSAGE </title>
    </head>

    <body>
        <form method = "post" target = "_slef">
        <div>
            <!--input for variables -->
            <!-- look text feild or text text area not certain what kolol was talking about but thats what he wants -->
            <label for="varinput">Input Variables:</label>
            <input type="text" id="varinput" name="varinput" placeholder="ie: a,b,c,d"required/>
        </div>
        <br>
        <div>
            <!--input for dependancies of variables -->
            <label for="depinput">Input Variables Dpendencies:</label>
            <input type="text" id="depinput" name="depinput" placeholder="ie: {a,b,c}->{d}, {d}->{a}"required/>
        </div>
        <br>
        <div>
            <input type = "reset">
        </div>
        <br>
        <div>
        <input type = "submit" value = "submit"/>
        </div>

        </form>
        <?php
            if(isset($_POST['varinput'])){
                echo "Submition recieved: ";
                print_r($_POST);
               
            }
        ?>
    </body>
</html>


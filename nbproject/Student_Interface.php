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
                border:1px solid black;
                text-align: center;
            }
            th {
                padding:10px;
                border: 1px solid black;
                text-align: center;
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
                                <td>abc->d</td> <!--functional dependencies drop down-->
                                <td><input type="radio" name="<?php echo $x; ?>"></td> <!--True check box-->
                                <td><input type="radio" name="<?php echo $x; ?>"></td> <!--False check box-->
                                <td>t<sub><?php echo "$x";?></sub></td> <!--tuples drop down-->
                                <td>abc</td> <!--implies columns-->
                                <td>d</td> <!--implied columns-->
                                <td><input type="text"></td> <!--student observations input-->
                                <td><input type="checkbox"></td> <!--active checkbox-->
                            </tr>
                <?php
                        $x++;
                    }
                ?>
            </table>
        </div>
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
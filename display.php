<?php
    echo "<h1> Display data</h1>";
    include "connection.php";
    if(isset($_REQUEST["s"])){
        $start = $_REQUEST["s"];
    }else{
        $start = 0;
    }

    $records_per_page = 25;
    $end = $start + $records_per_page;

    //$sql="select * from result limit $start,$records_per_page";
    $sql="select * from result";

    $stmt=$con->prepare($sql);
    $stmt->execute();
    //$list=$stmt->fetchall();

    $rows= $stmt->rowCount();
    $nooflinks = ($rows - ($rows % $records_per_page))/$records_per_page;


?>

<html>
<head>
<title> University </title>
</head>
<body>
    <table border=1>
    <thead>
        <th>ID</th>
        <th>Subject 1</th>
        <th>Grade 1</th>
        <th>Subject 2</th>
        <th>Grade 2</th>
        <th>Subject 3</th>
        <th>Grade 3</th>
    </thead>
    <?php
    if(isset($_REQUEST["p"])){
        $temp=$_REQUEST["p"];
        $ss  =(($temp-1) * $records_per_page);
        $sql ="select * from result limit $ss,$records_per_page"; 
    }else{
        $sql="select * from result limit $start,$records_per_page";
    }


    $stmt=$con->prepare($sql);
    $stmt->execute();
    $list=$stmt->fetchall();

    $rows=$stmt->rowCount();

        foreach($list as $r){
            echo "<tr>
            <td>".$r['id']."</td>
            <td>".$r['subject1']."</td>
            <td>".$r['subject1_grade']."</td>
            <td>".$r['subject2']."</td>
            <td>".$r['subject2_grade']."</td>
            <td>".$r['subject3']."</td>
            <td>".$r['subject3_grade']."</td>
            </tr>";
        }
    ?>
    </table>
    
    <?php
        if($start!=0){
    ?>
    <a href="display.php?s=<?php echo $start-$records_per_page;?>">BACK</a>
    <?php
        }

        for( $i=1;$i<=$nooflinks+1;$i++){
            echo "<a href='display.php?p=".$i."'>$i</a>&nbsp";
        }
    ?>
    &nbsp;
    <a href="display.php?s=<?php echo $end;?>">NEXT</a>
    

</body>
</html>

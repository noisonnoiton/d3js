<?
    session_save_path("sess");
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>D3.js</title>
</head>

<body>
<?
    if($width) {
        $_SESSION["width"] = $width;
    }
    if($height) {
        $_SESSION["height"] = $height;
    }
    
    if(! $_SESSION["width"]) {
        $_SESSION["width"] = 500;
        $_SESSION["height"] = 300;
    }
?>
    
    <form method="post" action="28.a.php">
        SVG Width <input type="text" name="width" /><br>
        SVG Height <input type="text" name="height" /><br>

        <select name="type">
            <?
            $glist = "rect,circle,scatter,line";
            $graphs = explode(",", $glist);
            
            $cnt = 0;
            
            while($graphs[$cnt]) {
                echo "<option value='$graphs[$cnt]'>$graphs[$cnt]</option>";
                $cnt++;
            }
        ?>
        </select>

        <input type="submit" value="Execute;" />

    </form>

    <?
        echo "width = $width, height = $height <br>";
    ?>

    <br>
    a.php
    <br><br>
    <?
            $a = 10;
            echo "a = $a<br>";
            
            for($i=1; $i<=10; $i++) {
                echo "$i <br>";
            }
        ?>

    AAA <br>

    <?
            $a = "홍길동";
            echo "a = $a<br>";
        
            include "28.b.php";
        
            echo "a = $a<br>";
        ?>
</body>

</html>

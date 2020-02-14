<?
    session_save_path('sess');
    session_start();
?>
<!doctype html>
<html lang="ko-kr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>

    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/custom2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <?
    // config.php
    $sess_width = "sk_width";
    $sess_height = "sk_height";
    
    if($width) {
        $_SESSION[$sess_width] = $width;
    }
    if($height) {
        $_SESSION[$sess_height] = $height;
    }
    if(!$_SESSION[$sess_width]) {
        $_SESSION[$sess_width] = 600;
        $_SESSION[$sess_height] = 600;
    }
    
    $DBHost = "localhost";
    $DBUser = "kitri";
    $DBPass = "kitri_pass";
    $DBName = "kitri_db";
    $DBChar = "utf8"; // utf8

    $conn = mysql_connect($DBHost, $DBUser, $DBPass);
    mysql_select_db($DBName, $conn) or die("DB 선택 에러");
    mysql_query("set names $DBChar");
?>

    <div class="container">
        <form method="post" enctype="multipart/form-data" action="35.main.php">
            <div class="row">
                <div class="col-md-2 col-lg-2">가로</div>
                <div class="col-md-10 col-lg-10">
                    <input type="text" class="form-control" name="width" value="<?= $_SESSION[$sess_width] ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">세로</div>
                <div class="col-md-10 col-lg-10">
                    <input type="text" class="form-control" name="height" value="<?= $_SESSION[$sess_height] ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">파일</div>
                <div class="col-md-10 col-lg-10">
                    <input type="file" class="form-control" name="upfile" />
                </div>
            </div>

            <div class="row text-center">
                <button type="submit" class="btn btn-primary">실행</button>
            </div>
        </form>
    </div>

    <?
        if($upfile) {
//            echo "upfile = $upfile <br>";
//            echo "name = $upfile_name <br>";
//            echo "size = $upfile_size <br>";
            
            copy($upfile, "test/$upfile_name");
            chmod("test/$upfile_name", 0777);
        }
    ?>
    <script>
        d3.csv('d3js-data/<?= $upfile_name ?>', function(error, data) {
            dataVisualize(data);
        });

        var svgWidth = <?= $_SESSION[$sess_width] ?>;
        var svgHeight = <?= $_SESSION[$sess_height] ?>;

        function dataVisualize(obj) {
            var max = d3.max(obj, function(el) {
                return Number(el.population);
            });
            var yScale = d3.scale.linear()
                .domain([0, max])
                .range([0, 450]);

            d3.select('svg')
                .selectAll('rect')
                .data(obj)
                .enter()
                .append('rect')
                .attr('width', 50)
                .attr('height', function(d) {
                    return yScale(d.population);
                })
                .attr('x', function(d, idx) {
                    return (idx) * 50;
                })
                .attr('y', function(d) {
                    return (svgHeight - yScale(d.population));
                })
                .style('fill', '#0000ff')
                .style('stroke', '#ff0000')
                .style('stroke-width', '1px')
                .style('opacity', .5)
                .on('click', function(d) {
                    alert(d.population);
                });
        }
    </script>
    <?
        
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
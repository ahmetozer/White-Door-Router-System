<?php
session_start();
session_destroy();
session_start();
$interface = array_key_exists('interface', $_GET) ? $_GET['interface'] : null;
?>
<html>
    <head>
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.js"></script>
        
        <script id="source" language="javascript" type="text/javascript">
		
        $(document).ready(function() {
            var renderInterfaceGraph = function (interfaceName) {
                var options = {
                    lines: { show: true },
                    points: { show: true },
                    xaxis: { mode: "time" }
                };

                var data = [];

                var placeholderName = "placeholder_" + interfaceName;

                var html = "<div id=\"" + placeholderName + "\" style=\"width:100%;height:140px;\"></div>";
                var placeholder = $(html);

                placeholder.appendTo($('body'));

                $.plot(placeholder, data, options);

                var iteration = 0;

                function fetchData() {
                    ++iteration;

                    function onDataReceived(series) {
                        // we get all the data in one go, if we only got partial
                        // data, we could merge it with what we already got
                        data = [ series ];

                        $.plot(placeholder, data, options);
                    }

                    $.ajax({
                        url: "data.php?interface=" + interfaceName,
                        method: 'GET',
                        dataType: 'json',
                        success: onDataReceived
                    });

                    setTimeout(fetchData, 3000);
                }

                fetchData();
            };

      <?php    
						echo "renderInterfaceGraph('$interface'); ";
						?>
        });
        </script>
    </head>
    <body>
    </body>
</html>

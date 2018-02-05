<?php
session_start();
session_destroy();
session_start();
$defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
 echo "<!-- Default interface $defaultinterface -->";
}
?>
<html>
    <head>
        <script type="text/javascript" src="/pages/bw/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/pages/bw/js/jquery.flot.js"></script>
        
        <script id="source" language="javascript" type="text/javascript">
		
        $(document).ready(function() {
            var renderInterfaceGraph = function (interfaceName) {
                var options = {
                    lines: { show: true },
                    points: { show: true },
                    xaxis: { mode: "time" }
                };

                var data = [];
                var livedatausage = $("#livedatausage"); 

				
				
				
                $.plot(livedatausage, data, options);
			
                var iteration = 0;

                function fetchData() {
                    ++iteration;

                    function onDataReceived(series) {
                        // we get all the data in one go, if we only got partial
                        // data, we could merge it with what we already got
                        data = [ series ];

                        $.plot($("#livedatausage"), data, options);
                    }

                    $.ajax({
                        url: "/pages/bw/usage.php?interface=" + interfaceName,
                        method: 'GET',
                        dataType: 'json',
                        success: onDataReceived
                    });

                    setTimeout(fetchData, 3000);
                }

                fetchData();
            };

      <?php    
						echo "renderInterfaceGraph('$defaultinterface'); ";
						?>
        });
        </script>
    </head>
    <body>
	<div id="livedatausage" style="width:100%;height:140px;"></div> 
    </body>
</html>

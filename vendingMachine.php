<!DOCTYPE html>
<html lang="en">

<head>
    <title> Vending Machine </title>
</head>

<body>
<?php

function calculateChange($itemCost, $payment) {
    
    if ($itemCost < 25 || $itemCost > 100 || $itemCost % 5 !== 0) {
        return "Invalid item cost. Item must cost between 25 cents and 1 dollar in 5-cent increments.";
    }

    if ($payment !== 100) {
        return "Invalid payment. The vending machine only accepts SINGLE dollar bills.";
    }

    
    $change = $payment - $itemCost;
    $quarters = (int)($change / 25);
    $change %= 25;
    $dimes = (int)($change / 10);
    $change %= 10;
    $nickels = (int)($change / 5);

    
    $changeString = "";
    if ($quarters > 0) {
        $changeString .= $quarters . " quarter(s), ";
    }
    if ($dimes > 0) {
        $changeString .= $dimes . " dime(s), ";
    }
    if ($nickels > 0) {
        $changeString .= $nickels . " nickel(s), ";
    }

    
    $changeString = rtrim($changeString, ", ");

    return $changeString;
}

$itemCost = 65; 
$payment = 100; 

echo "Change: " . calculateChange($itemCost, $payment);
?>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
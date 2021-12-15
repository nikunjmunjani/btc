<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Coin Market Cap BTC</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	
</head>
<body>

	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="col-6 justify-content-center border border-secondary rounded mt-5 p-5">
				<h5>Latest Price From CoinMarketCap</h5>
				<p>Connection Status : <strong>Connection established</strong></p>
				<p>Latest Price BTC : <strong class="btc_price">$<?= (isset($coinData[0]['bidPrice']))?$coinData[0]['bidPrice']:'000000.00'; ?></strong></p>

				<div class="mt-5 btc_price_list">
					<?php 
						foreach($coinData as $coinKey => $coinVal){
						    if($coinKey!=0){
						    	echo "<span class='d-block'> $".$coinVal['bidPrice']."</span>";
						    }
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div id='loadingmessage' class="d-none">
        <img src="<?=base_url();?>assets/images/loader.gif"/>
    </div>
</body>

<script>
	var base_url="<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/common.js"></script>
</html>
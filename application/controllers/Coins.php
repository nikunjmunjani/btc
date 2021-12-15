<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coins extends CI_Controller {

	/**
	 * @uses load landing page
	 * @author Nikunj Munjani
	*/
	public function index()
	{
		$coinData['coinData']=$this->coin->getCoinData();
		$this->load->view('coin',$coinData);
	}

	/**
	 * @uses Get BTC price
	 * @return json of data
	 * @author Nikunj Munjani
	*/
	public function getBTCPrice()
	{
		$coinData=$this->coin->getCoinData();
		if(!empty($coinData)){
			echo json_encode(array("status"=>1,"message"=>"Data found.","data"=>$coinData));
		}else{
			echo json_encode(array("status"=>0,"message"=>"Data not found."));
		}
	}

	/**
	 * @uses Get BTC price from API then update/insert in DB
	 * @return success/erros
	 * @author Nikunj Munjani
	*/
	public function updateBTCPrice()
	{
		try {

			// get last btc price
			$chkdata=$this->coin->getCoinData('',1);
	       	$current_time=time();

	       	// check if btc price update under 1 min(60 sec) or not
			if(!empty($chkdata)){
				$timeDiff= $current_time-$chkdata[0]['insert_time'];
				if($timeDiff<=60){
					// not procceed further as price updated under 1min
					echo json_encode(array("status"=>0,"message"=>"Price not updated due to time limit"));
					return;
				}
			}


			// init curl
		    $ch = curl_init();

		    //post data of curl
		    $post_data=[
		        'symbol' => 'BTCUSDT'
		    ];
		    curl_setopt($ch, CURLOPT_URL,API_URL);
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array('token:'. API_ACCESS_TOKEN) );
		    $api_result = json_decode(curl_exec($ch),true);
		    curl_close ($ch);

		    $response=["status"=>0,"message"=>"Something wrong"];
		    if(isset($api_result) && $api_result['status']==1){

		    	$coinData=$this->coin->getCoinData($api_result['data']['bidPrice'],1);
		       	
		        if (!empty($coinData)) {
		            
		            if(!empty($coinData[0]['bidPrice'])){

		            	// Update bid price if it's already added
		            	$this->db->where('id',$coinData[0]['id']);
		            	$updated=$this->db->update(TBL_COIN_PRICE,array('bidPrice'=>$api_result['data']['bidPrice'],"insert_time" => $current_time));
		                
		                if ($updated) {
		                    $response=["status"=>1,"message"=>"BTC price updated"];
		                } else {
		                    $response=["status"=>0,"message"=>"BTC price not updated"];
		                }
		            }
		        } else {
		            
		            // Insert Bid price data in DB

		            $insert_data=[
		            	"symbol" => $api_result['data']['symbol'],
		            	"bidPrice" => $api_result['data']['bidPrice'],
		            	"bidQty" => $api_result['data']['bidQty'],
		            	"askPrice" => $api_result['data']['askPrice'],
		            	"askQty" => $api_result['data']['askQty'],
		            	"insert_time" => $current_time
		            ];
		            
	            	$this->db->insert(TBL_COIN_PRICE,$insert_data);
	            	$coin_id=$this->db->insert_id();
		            if ($coin_id) {
		                $response=["status"=>1,"message"=>"BTC price added"];
		            } else {
		                $response=["status"=>0,"message"=>"BTC price not added"];
		            }
		        }
		    }

		    echo json_encode($response);

		} catch (Exception $e) {
		    echo json_encode(array("status"=>0,"message"=>"Exception: ".$e->getMessage()));
		}

	}

}

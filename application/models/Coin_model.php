<?php 

class Coin_model extends CI_Model {


	/**
	 * @uses Retrive all data in desc.
	 * @param $bidPrice
	 * @param $limit
	 * @return Array of data
	 * @author Nikunj Munjani
	*/
    public function getCoinData($bidPrice='',$limit='6')
    {
    	if(!empty($bidPrice)){
    		$this->db->where("bidPrice",$bidPrice);
    	}
    	$this->db->order_by("id","DESC");
    	$this->db->limit($limit);
    	return $this->db->get(TBL_COIN_PRICE)->result_array();
    }
}

?>
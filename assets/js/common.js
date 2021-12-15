
$(document).ready(function(){

	checkBTCPriceUpdate();
	setInterval(checkBTCPriceUpdate, 30000);
    setInterval(updateBTCPriceUpdate, 60000);


    localStorage.setItem('timestemp', new Date().getTime());

	$( document ).ajaxStart(function () {
        $('#loadingmessage').removeClass('d-none');
    });
    $( document ).ajaxStop(function () {
        $('#loadingmessage').addClass('d-none');
    });
});

function checkBTCPriceUpdate(){
   
	$.ajax({
        url: base_url+'coins/getBTCPrice',
        type:"POST",
        dataType: 'JSON',
        success:function(response){
           
            if(response.status){
                var html='';
                $.each(response.data,function(resKey,resValue){
                	if(resKey==0){
                        $(".btc_price").html("$"+resValue['bidPrice']);
                    }else{
                        html +="<span class='d-block'> $"+resValue['bidPrice']+"</span>";
                    }
                });
                $(".btc_price_list").html(html);
            }

        },
        error:function(response){
            
        }
    });  
    
}
function updateBTCPriceUpdate(){
    var oldTime=localStorage.getItem('timestemp');
    var timeDiff=new Date().getTime()-localStorage.getItem('timestemp');

    if((timeDiff/1000)>60){
        $.ajax({
            url: base_url+'coins/updateBTCPrice',
            type:"POST",
            dataType: 'JSON',
            success:function(response){
               
            },
            error:function(response){
                
            }
        });  
    }
}
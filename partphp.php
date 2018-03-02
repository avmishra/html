if($type == 'vip') 
{
        $arrayToSentRequest = array(
        "requestType" => "getVipData",
        "data" => array(
        "product_id" => 1205001
        ),
        "fields" => array("combo_ids","commission_data"),
        //"fields" => null,
        "fetch_from_db" => "",
        "requestPlatform" => "web"

        );
    }

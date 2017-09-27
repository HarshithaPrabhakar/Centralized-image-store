<?php
	extract($_GET);
	header("Content-Type:application/octet-stream");
	$header1=array("X-Auth-Token:gAAAAABZHUVkM6AAqQGYSMbXRFGzxTOIKjUjUnAWpb1UQay2PTuu1uwrefBegkeBC6eKSIHILoAWDamE3RgiiycvrZflZ6FsxH1H79usZ3WgPddKtR4aSeO8EqL2rfiCSbvSpDgu3dATUrFA2fnbnYEWo8WdzOC6UKj6V3ZwWag6Ux-jbS-3dUs");
	$header2=array("X-Auth-Token:gAAAAABZHUU3E_xbEZNUg8sP2V5OO4AwVkQrPefUC3MCYF4_mwBDnEdvyjJPELOITA1lqGBzIlc99qDmOXea95gIyebzrCHzqZ6hZZ-WQr9Q97RIpT9tT2-KYavszxS9ksaEGkabZ3rsATQ3o8VdC09x5NlaXHmGlxf5VU-PmkL5MLA34opQXJA");
	if($req=="fetch"){
		$data=array();

		$datatosend=http_build_query($data);
		
		$req1=array(
			'http'=>array(
				'method'=>'GET','header'=>$header1,'content'=>$datatosend
			)
		);
		$req2=array(
			'http'=>array(
				'method'=>'GET','header'=>$header2,'content'=>$datatosend
			)
		);
		$context1=stream_context_create($req1);
		$context2=stream_context_create($req2);
		if($cloud==1){
			$res=file_get_contents("http://10.10.3.11:9292".$file,false,$context1);
		}
		if($cloud==2){
			$res=file_get_contents("http://10.10.3.16:9292".$file,false,$context2);
		}
		echo $res;
	}
?>
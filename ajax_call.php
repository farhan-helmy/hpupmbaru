<?php 
$htmlData = array(
	"/ADMIN"=>array("HTML"=>'<div id="ADMIN" class="col-sm-3"><div class="img"><a href="http://10.150.236.102/HPUPM/web/app.php/login"><img src="icon6.png" alt="icon1" width="110px" style="margin: auto;display:block"></a></div><div class="text"><p class="text-center"><a href="http://10.150.236.102/HPUPM/web/app.php/login">ADMIN & MANAGEMENT SYSTEM </a></p></div></div>'),
	"/CCIS"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><img src="icon8.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"><p class="text-center">CRITICAL CARE INFORMATION SYSTEM (CCIS)</p></div></div>'),
	"/HIS"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><img src="icon1.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"><p class="text-center">HOSPITAL INFORMATION SYSTEM (HIS)</p></div></div>'),
	"/FIS"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><img src="icon2.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"> <p class="text-center">FINANCIAL MANAGEMENT SYSTEM (FASH)</p></div></div>'),
	"/VMAS"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><a href="http://10.150.236.12/"><img src="icon3.png" alt="icon1" width="110px" style="margin: auto;display:block"></a></div><div class="text"><p class="text-center"><a href="http://10.150.236.12/">VIRTUAL MACHINE AUTOMATED SYSTEM (VMAS)</a></p></div></div>'),
	"/RMS"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><img src="icon4.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"><p class="text-center">RESEARCH MANAGEMENT SYSTEM (RMS)</p></div></div>'),
	"/LMS"=>array("HTML"=>'<div id="LMS" class="col-sm-3"><div class="img"><a href="http://10.150.236.120/moodle2/my"><img src="icon5.png" alt="icon1" width="110px" style="margin: auto;display:block"></a></div><div class="text"><p class="text-center"><a href="http://10.150.236.120/moodle2/my">LEARNING MANAGEMENT SYSTEM (LMS)</a></p></div></div>'),
	"/HELPDESK"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><a href="http://10.150.236.151/hpupm/"><img src="icon7.png" alt="icon1" width="110px" style="margin: auto;display:block"></a></div><div class="text"><p class="text-center"><a href="http://10.150.236.151/hpupm/">HELPDESK & SUPPORT</a></p></div> </div>'),
	"/KEYCLOAK"=>array("HTML"=>'<div class="col-sm-3"><div class="img"><a href="http://10.150.236.115:8080/auth/admin/MainSSORealm/console/"><img src="icon7.png" alt="icon1" width="110px" style="margin: auto;display:block"></a></div><div class="text"><p class="text-center"><a href="http://10.150.236.115:8080/auth/admin/MainSSORealm/console/">KEYCLOAK</a></p></div> </div>')
	//"MDI"=>array("HTML"=>'<div id="LMS" class="col-sm-3"><div class="img"><img src="icon5.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"><p class="text-center"><a href="http://10.150.236.120/moodle2">MEDICAL DEVICE INTETRFACE (MDI)</a></p></div></div>'),
	//"LRMS"=>array("HTML"=>'<div id="LMS" class="col-sm-3"><div class="img"><img src="icon5.png" alt="icon1" width="110px" style="margin: auto;display:block"></div><div class="text"><p class="text-center"><a href="http://10.150.236.120/moodle2">LABOUR ROOM MANAGEMENT SYSTEM (LRMS)</a></p></div></div>')
);
if(isset($_POST['groups']) && !empty($_POST['groups'])){
	$roles = $_POST['groups'];	
	$returnData = array('status'=>TRUE,'htmlData'=>"");
	if(in_array("MASTER",$roles)){
		foreach($htmlData as $data){			
			$returnData['htmlData'] .= $data['HTML'];
		}
	}
	else{
		foreach($roles as $role){
			$returnData['htmlData'] .= $htmlData[$role]['HTML'];
		}
	}
	echo json_encode($returnData);
	exit();
}
?>

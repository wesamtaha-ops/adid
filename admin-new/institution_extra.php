<? include_once('connect.php');
$userLevel = $_SESSION['adid_status_UserLevel'];

$form = '';
if(isset($_POST['assignToUser'])){


$employee = @$_POST['assignToUser']; 

$array = implode(",",$_POST['selecteduserid']);
$array = explode(",",$array);

 for($i=0; $i < count($array); $i++){

  $query = $db->query("Update `institutions` SET security_owner='$employee' where institution_id='".$array[$i]."'  ");

 }

?>
<script type="text/javascript"> location = 'institutionslist.php'; </script>
<?

}


$groupURL = "";



 
 isset($_REQUEST['showType']) ? $_SESSION['showType'] = $_REQUEST['showType'] : $_SESSION['showType'] = 'all'  ;
 isset($_SESSION['showType']) ? $showType = $_SESSION['showType'] : $showType ='all'  ;

 isset($_REQUEST['institution_id']) ? $institutionid = $_REQUEST['institution_id'] : $institutionid ='';




$query = $db->query("SELECT * FROM audittrail where `table` = 'institutions' and (field='admin_comment' or field='admin_approval') and keyvalue='$institutionid' order by id DESC LIMIT 1  ");
$res = $db->fetch_assoc($query);
$lastApproved = $res['user'];


$query = $db->query("SELECT * FROM audittrail where `table` = 'institutions' and (field='security_approval' or field='security_comment') and keyvalue='$institutionid' order by id DESC LIMIT 1  ");
$res = $db->fetch_assoc($query);
$lastSecApproved = $res['user'];




if($userLevel == '-2'){
	if($_SESSION['adid_UserLevel'] == '1' ){
		$SecureWhere = " and security_owner IS NULL ";
	}else{
		$SecureWhere = " and security_owner='".$_SESSION['adid_UserID']."'";
	}
}else{
	$SecureWhere = "";
}



$query = $db->query("SELECT * FROM institutions where 1 = 1   $SecureWhere");
$allCount = $db->returned_rows;

$query = $db->query("SELECT * FROM institutions where admin_approval = '0' and  security_approval = '0'   $SecureWhere");
$newCount = $db->returned_rows;

$query = $db->query("SELECT * FROM institutions where admin_approval = '2'  $SecureWhere");
$rejected_by_wataniCount = $db->returned_rows;

$query = $db->query("SELECT * FROM institutions where admin_approval = '1' and  security_approval = '0' $SecureWhere");
$transferred_to_secureCount = $db->returned_rows;

$query = $db->query("SELECT * FROM institutions where admin_approval = '1' and  security_approval = '2'  $SecureWhere");
$rejected_by_securityCount = $db->returned_rows;

$query = $db->query("SELECT * FROM institutions where admin_approval = '1' and  security_approval = '1'  $SecureWhere");
$approved_by_securityCount = $db->returned_rows;



?>

<? if($_SESSION['adid_status_UserLevel'] == "-1" || $_SESSION['adid_status_UserLevel'] == "3" ){ ?>
فرز النتائج المعروضة <br> <br> 
<select onchange="location='?<? echo $groupURL; ?>showType='+this.value" style="margin: 20px auto; width: 350px; padding: 6px; margin-top: 0px; background-color: #ebf7fd; font-weight: 700;  " name="showType">
	<option <? if($showType == 'all'){ ?> selected="selected" <? } ?> value="all" > الكل (<? echo $allCount; ?>)</option>
	<option <? if($showType == 'new'){ ?> selected="selected" <? } ?> value="new" > الطلبات الجديدة (<? echo $newCount; ?>)</option>
	<option <? if($showType == 'rejected_by_watani'){ ?> selected="selected" <? } ?> value="rejected_by_watani" > تم رفضها من الإدارة (<? echo $rejected_by_wataniCount; ?>)</option>
	<option <? if($showType == 'transferred_to_secure'){ ?> selected="selected" <? } ?> value="transferred_to_secure" > تم تحويلها للموافقة الإدارية (<? echo $transferred_to_secureCount; ?>)</option>
	<option <? if($showType == 'rejected_by_security'){ ?> selected="selected" <? } ?> value="rejected_by_security" > تم رفضها إداريا (<? echo $rejected_by_securityCount; ?>)</option>
	<option <? if($showType == 'approved_by_security'){ ?> selected="selected" <? } ?> value="approved_by_security" > تمت الموافقة عليها إداريا (<? echo $approved_by_securityCount; ?>)</option>
</select>
<? } ?>

<? if($_SESSION['adid_status_UserLevel'] == "-2"){ ?>
فرز النتائج المعروضة <br> <br> 
<select onchange="location='?<? echo $groupURL; ?>showType='+this.value" style="margin: 20px auto; width: 350px; padding: 6px; margin-top: 0px; background-color: #ebf7fd; font-weight: 700;  " name="showType">

	<option <? if($showType == 'transferred_to_secure'){ ?> selected="selected" <? } ?> value="transferred_to_secure" > بانتظار الموافقة (<? echo $transferred_to_secureCount; ?>)</option>
	<option <? if($showType == 'rejected_by_security'){ ?> selected="selected" <? } ?> value="rejected_by_security" > الطلبات التي تم رفضها  (<? echo $rejected_by_securityCount; ?>)</option>
	<option <? if($showType == 'approved_by_security'){ ?> selected="selected" <? } ?> value="approved_by_security" > الطلبات التي تمت الموافقة عليها  (<? echo $approved_by_securityCount; ?>)</option>
</select>

<? 	if($_SESSION['adid_UserLevel'] == '1' ){ ?>

<br><br>

<? 
$options = '';
$query = $db->query("SELECT * FROM secure_management where type = '2' ");
	   while($res = $db->fetch_assoc($query)){  	
	$options.= '<option  value="'.$res['id'].'" >'.$res['username'].'</option>';
?>
	
<? } ?>

<? $form = '
<select  style="margin: 20px auto; width: 350px; padding: 6px; margin-top: 0px; background-color: #ebf7fd; font-weight: 700;  " name="assignToUser">
	<option value="" > اختر الموظف </option>
	'.$options.'
</select>
<input type="submit" style="padding:10px; margin-right:20px; width:100px; text-align: center " name="assign" value=" حفظ وتعيين   " >
';
?>

<? } ?>


<? } ?>













<script type="text/javascript">

setTimeout(function(){

$('#el_users_lastUpdatedBy').text('<?php echo $lastApproved; ?>');
$('#el_users_approvedBy').text('<?php echo $lastSecApproved; ?>');


var total = '<? echo $allCount; ?>';



for(var c=1; c <= total ;c++){

var item = "#el"+c+"_institutions_admin_approval span";
var itemParent = "#el"+c+"_institutions_admin_approval ";
var item2 = "#el"+c+"_institutions_admin_comment span";
var item2Parent = "#el"+c+"_institutions_admin_comment ";


var Sitem = "#el"+c+"_institutions_security_approval span";
var SitemParent = "#el"+c+"_institutions_security_approval ";
var Sitem2 = "#el"+c+"_institutions_security_comment span";
var Sitem2Parent = "#el"+c+"_institutions_security_comment ";


<?php if($_SESSION['adid_status_UserLevel'] != "-1" && $_SESSION['adid_status_UserLevel'] != "-2" ){ ?>


$("td[data-name='security_approval']").hide();
$("th[data-name='security_approval']").hide();

$("td[data-name='security_comment']").hide();
$("th[data-name='security_comment']").hide();

$("td[data-name='eco_department_approval']").hide();
$("th[data-name='eco_department_approval']").hide();

$("td[data-name='eco_departmnet_comment']").hide();
$("th[data-name='eco_departmnet_comment']").hide();

$("a[href='#tab_users7']").hide();


<?php } ?>

<?php if(  $_SESSION['adid_status_UserLevel'] == "-2" ){ ?>

$("td[data-name='admin_approval']").hide();
$("th[data-name='admin_approval']").hide();

$("td[data-name='admin_comment']").hide();
$("th[data-name='admin_comment']").hide();


$("td[data-name='security_approval']").show();
$("th[data-name='security_approval']").show();

$("td[data-name='security_comment']").show();
$("th[data-name='security_comment']").show();


$("td[data-name='forward_to_dep']").hide();
$("th[data-name='forward_to_dep']").hide();


$("td[data-name='eco_department_approval']").hide();
$("th[data-name='eco_department_approval']").hide();

$("td[data-name='eco_departmnet_comment']").hide();
$("th[data-name='eco_departmnet_comment']").hide();

$("a[href='#tab_institutions7']").hide();

$("a[href='#tab_institutions8']").hide();


<?php } ?>


if($(item).html().indexOf("موافقة") > -1 ) { $(itemParent).parent().addClass('ok'); $(item2Parent).parent().addClass('ok'); };
if($(item).html().indexOf("رفض") > -1  ) { $(itemParent).parent().addClass('reject'); $(item2Parent).parent().addClass('reject'); };
if($(item).html().indexOf("بالإنتظار") > -1  ) { $(itemParent).parent().addClass('wait'); $(item2Parent).parent().addClass('wait'); };


if($(Sitem).html().indexOf("موافقة") > -1 ) { $(SitemParent).parent().addClass('ok'); $(Sitem2Parent).parent().addClass('ok'); };
if($(Sitem).html().indexOf("رفض") > -1  ) { $(SitemParent).parent().addClass('reject'); $(Sitem2Parent).parent().addClass('reject'); };
if($(Sitem).html().indexOf("بالإنتظار") > -1  ) { $(SitemParent).parent().addClass('wait'); $(Sitem2Parent).parent().addClass('wait'); };


}



 }, 500);
</script>

<style type="text/css">
.wait { background-color: #f9f9f9 !important; }	
.ok { background-color: #d3f3c5 !important;; }	
.reject { background-color: #f3c5c5 !important; }	

.ewMultiPage { margin-top: 0px !important; }


form[name='fusersedit']  .ewMultiPage{ margin-top: -100px !important; }
form[name='fusersadd']  .ewMultiPage{ margin-top: -100px !important; }

</style>

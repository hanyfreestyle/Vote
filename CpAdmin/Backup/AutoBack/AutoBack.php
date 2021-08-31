<?php
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;
use Kunnu\Dropbox\Exceptions\DropboxClientException;




require_once '../../../library/db-config_crm.php';
require_once '../../library/_Inc_Files.php';
require "../ThirdParty/vendor/autoload.php";
define('BACKUP_FOLDER_DIR',SRV_ROOT.$AdminFolder."Backup/File/");

 


 
#################################################################################################################################
###################################################    DB  Config
#################################################################################################################################
$DB_ZipTypeIs = MySQLBackup_ZipTypeIs("zip"); /// 'sql', 'zip', 'gz', 'gzip'
$DB_NameIs = "Autojosor_";
$DB_FileName = $DB_NameIs.date('Y-m-d_H-i-s');
$DB_FileName_Extension = $DB_FileName.$DB_ZipTypeIs['Extension'];


#################################################################################################################################
###################################################   DropBox  Config
#################################################################################################################################
//($clientId, $, $accessToken = null)
$DropBox_clientId = "9wakthp8ajxy433"; 
$DropBox_clientSecret = "4jrr97hepzc1dql";
$DropBox_accessToken = "TvsRGV0r27AAAAAAAAAACqKjMTyCrarnHMU3aGcIVjp-gSoj0RqkI6Gz3KoMXv9u";
$Month = date("m",time()); $Year =  date("Y",time());
$DropBox_UploadFolder = "/JosorCrm/sqlbackup/".$Year."-".$Month;

 

#################################################################################################################################
###################################################    Creat BackUp
#################################################################################################################################
	$connection = [
		'host'=> $pfw_host,
		'database'=> $pfw_db,
		'user'=> $pfw_user ,
		'password'=> $pfw_pw,
	];
	$tables = ['*'];
//	$tables = ['tbl_user'];
    $show = ['TABLES', 'DATA'];
	$backup = new BackupMySQL($connection, $tables, $show);
	$backup->setFolder(BACKUP_FOLDER_DIR);
	$backup->setName($DB_FileName);
	$backup->run();
    $backup->zip($DB_ZipTypeIs['ZipType']);



#################################################################################################################################
###################################################    Move To DropBox
#################################################################################################################################

$app = new DropboxApp($DropBox_clientId , $DropBox_clientSecret ,$DropBox_accessToken );
$dropbox = new Dropbox($app);
$dropboxFile = new DropboxFile(BACKUP_FOLDER_DIR.$DB_FileName_Extension);
$file = $dropbox->simpleUpload($dropboxFile, $DropBox_UploadFolder."/".$DB_FileName_Extension, ['autorename' => true]);
$Satet_Upload = "1";


#################################################################################################################################
###################################################    Add To Tabel
#################################################################################################################################
$db = new DB($pfw_host,$pfw_user,$pfw_pw,$pfw_db);

$server_data  = array ('id'=> NULL ,
    'date_add'=> strtotime('today 00:00:00') ,
    'name'=> $DB_FileName ,
    'path'=> $DB_FileName_Extension ,
    'type'=> "2" ,
    'state'=> $Satet_Upload ,  
    'b_type'=> "sql" ,
);


$add_server = $db->AutoExecute("x_back_up",$server_data,AUTO_INSERT);

$Today =  strtotime('today 00:00:00');
$TheSevenDay = 7*86400;
$TestDate = $Today-$TheSevenDay ;

$MySql = "SELECT * FROM x_back_up where date_add < '$TestDate' and type = '2'  ";
$already = $db->H_Total_Count($MySql);
if($already > 0){
    $Name = $db->SelArr($MySql);
    for($i = 0; $i < count($Name); $i++) {
        $id =  $Name[$i]['id'] ;
        Image_Dell("1",$id,BACKUP_FOLDER_DIR,"x_back_up","path","");
        $db->H_DELETE_FromId("x_back_up",$id);
    }
}




$MySql = "select * from complaint where state = '0' and date_add < '$TestDate' " ;
$already = $db->H_Total_Count($MySql);
if($already > 0){
    $Name = $db->SelArr($MySql);
    for($i = 0; $i < count($Name); $i++) {
        $id =  $Name[$i]['id'] ;
        $db->H_DELETE_FromId("complaint",$id);
    }
}
 

#echo "Come";
 
?>
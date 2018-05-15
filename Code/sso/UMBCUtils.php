<?php

//code to get user info base on umbc authenticated site

class UMBCUtils {

   static function getMIMETypeFromFileName($FileName) {
      
      $path_parts = pathinfo($FileName);
      $ext = strtolower($path_parts['extension']);

   // This Section will analyze the extension of the attachment if it has been added and format the message with the right context-header and encoding
   
      switch($ext) {
         case "pdf":
            $header_format = "application/pdf";
            break;
         case "jpe":
         case "jpeg":
         case "jpg":
            $header_format = "image/jpeg";
            break;
         case "dot":
         case "doc":
            $header_format = "application/msword";
            break;
         case "xla":
         case "xlc":
         case "xlm":
         case "xls":
         case "xlt":
         case "xlw":
            $header_format = "application/vnd.ms-excel";
            break;
         case "pot":
         case "pps":
         case "ppt":
            $header_format = "application/vnd.ms-powerpoint";
            break;
         case "mpp":
            $header_format = "application/vnd.ms-project";
            break;
         case "wcm":
         case "wdb":
         case "wks":
         case "wps":
         case "mdb":
            $header_format = "application/vnd.ms-works";
            break;
         case "pub":
            $header_format = "application/x-mspublisher";
            break;
         case "bmp":
            $header_format = "image/bmp";
            break;
         case "gif":
            $header_format = "image/gif";
            break;
         case "png":
            $header_format = "image/png";
            break;
         case "tif":
         case "tiff":
            $header_format = "image/tiff";
            break;
         case "htm":
         case "html":
         case "stm":
            $header_format = "text/html";
            break;
         case "txt":
         case "js":
         case "java":
         case "c":
            $header_format = "text/plain";
            break;
         case "rtx":
           $header_format = "text/richtext";
            break;
         case "mp2":
         case "mpa":
         case "mpe":
         case "mpeg":
         case "mpg":
         case "mpv2":
           $header_format = "video/mpeg";
           break;
         case "mov":
         case "qt":
           $header_format = "video/quicktime";
           break;
         case "avi":
           $header_format = "video/x-msvideo";
           break;
         case "movie":
           $header_format = "video/x-sgi-movie";
           break;
         default;
           $header_format = "application/octet-stream";
      }
      
      return $header_format;
   }
               

   static function getAttachmentBody($body, $FileName, $Type, $random_hash, $attachment) {
      
      $output = "--PHP-mixed-$random_hash;" . "\r\n" .
               "Content-Type:  multipart/alternative; boundary='PHP-alt-$random_hash'" . "\r\n" .
               "\r\n" .
               "--PHP-alt-$random_hash" . "\r\n" .
               "Content-Type: text/plain; charset=iso-8859-1" . "\r\n" .
               "Content-Transfer-Encoding: 7bit" . "\r\n" .
               "\r\n" .
               "--PHP-alt-$random_hash" . "\r\n" .
               "Content-Type: text/html; charset=iso-8859-1" . "\r\n" .
               "Content-Transfer-Encoding: 7bit" . "\r\n" .
               "\r\n" .
               "--PHP-alt-$random_hash--" . "\r\n" .
               "\r\n" .
               "--PHP-mixed-$random_hash" . "\r\n" .
               "Content-Type: text/plain; charset=iso-8859-1" . "\r\n" .
               "Content-Transfer-Encoding: 7bit\n" . "\r\n" .
               "$body" . "\r\n" .
               "\r\n" .
               "--PHP-mixed-$random_hash" . "\r\n" .
               "Content-Type: $Type; name=".$FileName. "\r\n" .
               "Content-Transfer-Encoding: base64" . "\r\n" .
               "Content-Disposition: attachment" . "\r\n" .
               "\r\n" .
               "$attachment" . "\r\n" .
               "\r\n" .
               "--PHP-mixed-$random_hash--";
                             
   
      return $output;
   }
      
   static function outputTimeDD($startMinute,$lastMinute,$incr,$options=null) {
      $lastMinuteOfDay=24*60-1;
      
      $maxCount=0;
      $now_hour = date("G"); 
      $currMinute=$startMinute;
      $suffix='AM';
      $selectedHour=-1;
      $selectedMinute=-1;
      $selectedDayPart='';
      if ($options) {
         if (isset($options['SelectedHour'])) {
            $selectedHour=$options['SelectedHour'];
         }
         if (isset($options['SelectedMinute'])) {
            $selectedMinute=$options['SelectedMinute'];
         }
         if (isset($options['SelectedDayPart'])) {
            $selectedDayPart=$options['SelectedDayPart'];
         }
      }
      
      //echo "SelHour=$selectedHour SelMinute=$selectedMinute SelDayPart=$selectedDayPart<br />"; 
      //for ($i=$startMinute; $i < $lastMinuteOfDay ; $i+=$incr) {
      //echo "    <option value=\"$currMinute:$incr:$lastMinuteOfDay\">$currMinute:$incr:$lastMinuteOfDay</option>\n";
      while ($currMinute < $lastMinute) {
         $hour=intval($currMinute/60);
         $minute=intval($currMinute%60);
         if ($hour>=12) {
            $suffix='PM';
         }
         if ($hour<1) {
            $hour=12;
         } else {
            if ($hour > 12) {
               $hour=$hour-12;
            }
         }
         $selected='';
         if ($hour==$selectedHour && $minute==$selectedMinute && $suffix==$selectedDayPart) {
            $selected='selected';
         }
         $hourStr=sprintf('%02d', $hour);
         $minuteStr=sprintf('%02d', $minute);
         $maxCount++;
         //if ($maxCount>20) {
            //break;
         //}
         echo "    <option $selected value=\"$hourStr:$minuteStr $suffix\">$hourStr:$minuteStr $suffix</option>\n";
         
         $currMinute+=$incr;
         /*switch ($hour) {
         case 0;
             echo "    <option value=\"$i\"";
             if ($now_hour == $i) { echo " selected"; }
             echo "> 12 Midnight\n";
             break;
          case 12:
             echo "    <option value=\"$i\"";
             if ($now_hour == $i) { echo " selected"; }
             echo "> 12 Noon\n";
             break;
           case ($i< 13):
             echo "    <option value=\"$i\"";
             if ($now_hour == $i) { echo " selected"; }
             echo "> $i AM\n";
             break;
           case ($i > 12);
             echo "    <option value=\"$i\"";
             if ($now_hour == $i) { echo " selected"; }
             echo "> " . ($i-12) . " PM\n";
             break;
         }*/
       }


   }
   
   static function getShibbolethInfo() {
      
      $reqFirstName = "John";
      $reqLastName = "Doe";
      $reqEmail = "DoeJohn@umbc.edu";
      $reqCampusID = "UM999999";
      $reqUserName = "DoeJohn";
      $umbcaffiliation = "staff;alumni;employee";
      //$reqRTEmail = "DoeJohn@umbc.edu";
      
   	
   	if (isset($_SERVER['givenName'])) {
   	   $reqFirstName = htmlentities($_SERVER['givenName']);
      }
   	if (isset($_SERVER['sn'])) {
   	   $reqLastName = htmlentities($_SERVER['sn']);
      }
   	if (isset($_SERVER['umbccampusid'])) {
   	   $reqCampusID = htmlentities($_SERVER['umbccampusid']);
      }
   	if (isset($_SERVER['mail'])) {
   	   $reqEmail = htmlentities($_SERVER['mail']);
      } else {
         $reqEmail=$reqCampusID.'@umbc.edu';
      }
   	if (isset($_SERVER['umbcusername'])) {
   	   $reqUserName = htmlentities($_SERVER['umbcusername']);
      } else {
      	if (isset($_SERVER['umbcprimaryaccountuid'])) {
      	   $reqUserName = htmlentities($_SERVER['umbcprimaryaccountuid']);
         } else {
      	   if (isset($_SERVER['uid'])) {
      	      $reqUserName = htmlentities($_SERVER['uid']);
      	   }
      	}
      }
   	if (isset($_SERVER['umbcaffiliation'])) {
   	   $umbcaffiliation = htmlentities($_SERVER['umbcaffiliation']);
      }
      
      $reqRTEmail=$reqCampusID.'@umbc.edu';
               
      $shibArr=array('FirstName' => $reqFirstName,
                     'LastName' => $reqLastName,
                     'Email' => $reqEmail,
                     'RTEmail' => $reqRTEmail,
                     'CampusID' => $reqCampusID,
                     'UserName' => $reqUserName,
                     'Affiliation' => $umbcaffiliation,
      );
      
      /*$shibArr['FirstName']=$reqFirstName;  
      $shibArr['LastName']=$reqLastName;  
      $shibArr['Email']=$reqEmail;  
      $shibArr['CampusID']=$reqCampusID;  
      $shibArr['UserName']=$reqUserName;  
      $shibArr['Affiliation']=$umbcaffiliation;*/  
      
      return $shibArr;
   }
   
   static function addSuffixToFilename($pathName,$suffix) {
         
      $path_parts = pathinfo($pathName);
      
      //$dirName=$path_parts['dirname'];
      //$dirName=$path_parts['basename'];
      $ext=$path_parts['extension'];
      $fileName=$path_parts['filename']; // since PHP 5.2.0   
         
      $newFileName.=$fileName."_".$suffix;
      if (strlen($ext)>0) {
         $newFileName.=".".$ext;
      }
      
      return $newFileName;
   }
   
}

?>
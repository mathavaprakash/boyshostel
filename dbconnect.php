<?PHP
$conserver=mysql_connect("localhost", "root", "") or die(mysql_error());
$condb=mysql_select_db("bhostel") or die("cannot connect database");
date_default_timezone_set('Asia/Kolkata');
function encryptor($action,$string)
                {
                
                    $output=false;
                    $encrypt_method="AES-256-CBC";
                    $secret_key='mathavaprakash';
                    $secret_iv='gribhostel';
                    $key=hash('sha512',$secret_key);
                    $iv=substr(hash('sha512',$secret_iv),0,16);
                    if($action=='encrypt')
                    {
                            $output=openssl_encrypt($string,$encrypt_method,$key,0,$iv);
                            $output=base64_encode($output);

                    }
                    else if($action=='decrypt')
                    {
                            $output=openssl_decrypt(base64_decode($string),$encrypt_method,$key,0,$iv);
                    }

                    return $output;
              }
//$_SESSION['conserver']=mysql_connect("localhost", "root", "") or die(mysql_error());
//$_SESSION['condb']=mysql_select_db("dcsa") or die("cannot connect database");

?>
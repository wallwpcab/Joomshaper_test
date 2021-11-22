
<?php


include("vendor/autoload.php");
use Stichoza\GoogleTranslate\GoogleTranslate;

$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
$tr->setSource('bn'); // Translate from Bangla
// $tr->setSource(); // Detect language automatically
$tr->setTarget('en'); // Translate to English

var_dump($tr->translate('বাংলাদেশ'));

?>


lseif(!Hash::check($password , $user->password)){
                $res['success'] = false;
                $res['message'] = 'Please your pss';
            } 
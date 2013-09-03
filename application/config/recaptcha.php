<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['recaptcha'] = array(
  'public'=>'6LffXs4SAAAAAO5OMYa0hrqaQwsD7VMzu3VDy47l',
  'private'=>'6LffXs4SAAAAAKo-4hgTIVSiGL2B-lcxjIoH6rpO',
  //'public'=>'6LfIXs4SAAAAAND0alOnJI1M5PTDqbpTb25n812x',
  //'private'=>'6LfIXs4SAAAAAMQqOGRsKk1dgPIa4oNN8cAxoDSk',
  'RECAPTCHA_API_SERVER' =>'http://www.google.com/recaptcha/api',
  'RECAPTCHA_API_SECURE_SERVER'=>'https://www.google.com/recaptcha/api',
  'RECAPTCHA_VERIFY_SERVER' =>'www.google.com',
  'RECAPTCHA_SIGNUP_URL' => 'https://www.google.com/recaptcha/admin/create',
  'theme' => 'red'
);

/* End of file recaptcha.php */
/* Location: ./application/config/recaptchaphp */
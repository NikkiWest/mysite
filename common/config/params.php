<?php
if (YII_ENV == 'dev') {
    $version = time();
} else {
    $gitHash = trim(exec('git log --max-count=1 --format=format:%H 2> /dev/null'));
    $version = substr($gitHash,0, 8);
}
define('YII_V', $version);

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'godPw' => 'cegthghjtrn'
];

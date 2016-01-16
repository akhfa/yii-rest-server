# yii-rest-server
Repository ini adalah repository yang disetting untuk membuat ReST server pada yii2.
Pretty URL secara default aktif.<br>
## Perubahan yang dilakukan
#### Mengubah 'request' pada /config/web menjadi seperti berikut
```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => 'your cookie validation',
    'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ]
],
```
#### Menambahkan 'urlManager' pada /config/web
```php
'urlManager' => [
    'class' => 'yii\web\UrlManager',
    // Disable index.php
    'showScriptName' => false,
    // Disable r= routes
    'enablePrettyUrl' => true,
    'rules' => array(
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
],
```
#### Menambahkan file 'UserController.php' di folder controllers
```php
<?php

namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actionGetuser()
    {
        return array('user' => 'akhfa', 'hobi' => array('nonton' => 'anime'));
    }
}
```

## Cara pemanggilan
```
curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "http://localhost/yii-rest-server/web/user/getuser"
```

## Contoh respon
```json
{
  "user": "akhfa",
  "hobi": {
    "nonton": "anime"
  }
}
```


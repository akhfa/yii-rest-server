<?php
/**
 * Created by IntelliJ IDEA.
 * User: akhfa
 * Date: 16/01/16
 * Time: 8:23
 */

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


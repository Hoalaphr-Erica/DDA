<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 7:31 PM
 */

function isGuest()
{
    return Yii::$app->user->isGuest;
}

function currUserId()
{
    return Yii::$app->user->id;
}

function param($key)
{
    if (isset($myArray['paypalClientId'])) {
        // Truy cập vào phần tử "paypalClientId" ở đây
        return Yii::$app->params[$key];
    } else {
        // Xử lý trường hợp phần tử "paypalClientId" không được định nghĩa
        return null;
    }
}
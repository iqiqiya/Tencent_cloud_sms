<?php
/**
 * 标题：php对接腾讯云(采用指定模板ID单发短信)
 * 作者：iqiqiya (77sec.cn)
 * 日期：2019/8/12
 */
//开通短信服务，创建签名，创建模板  样例看图片
require "./qcloudsms_php-0.1.4/src/index.php";
header("Content-type: text/html; charset=utf-8");

// 短信应用SDK AppID
$appid = 1400******; // 1400开头	*是数字  需要修改

// 短信应用SDK AppKey
$appkey = "f124caa944***46eb68e5e768***4857";//*是数字

// 需要发送短信的手机号码
$phoneNumbers = ["177********"];//*是数字

// 短信模板ID，需要在短信应用中申请
$templateId = 263***;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

$smsSign = "齐齐的空间"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`

use Qcloud\Sms\SmsSingleSender;

try {
    $ssender = new SmsSingleSender($appid, $appkey);
    $params = ["5678"];
    $result = $ssender->sendWithParam("86", $phoneNumbers[0], $templateId,
        $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
    $rsp = json_decode($result);
    echo $result;
} catch(\Exception $e) {
    echo var_dump($e);
}
?>
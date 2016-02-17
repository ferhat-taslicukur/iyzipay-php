<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ConnectThreeDSSample();
$sample->should_initialize_threeds_with_card();
$sample->should_initialize_threeds_with_card_token();
$sample->should_auth_threeds();

class ConnectThreeDSSample extends Sample
{
    public function should_initialize_threeds_with_card()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateConnectThreeDSInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("127.0.0.1");
        $request->setConnectorName("ISBANK");
        $request->setInstallment(1);
        $request->setPaidPrice("1.0");
        $request->setPrice("1.0");
        $request->setCallbackUrl("https://www.merchant.com/callbackUrl");

        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        # make request
        $response = Iyzipay\Model\ConnectThreeDSInitialize::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_initialize_threeds_with_card_token()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateConnectThreeDSInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("127.0.0.1");
        $request->setConnectorName("ISBANK");
        $request->setInstallment(1);
        $request->setPaidPrice("1.0");
        $request->setPrice("1.0");
        $request->setCallbackUrl("https://www.merchant.com/callbackUrl");

        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardToken("cardToken");
        $paymentCard->setCardUserKey("cardUserKey");
        $request->setPaymentCard($paymentCard);

        # make request
        $response = Iyzipay\Model\ConnectThreeDSInitialize::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_auth_threeds()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateConnectThreeDSAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("12345");

        # make request
        $response = \Iyzipay\Model\ConnectThreeDSAuth::create($request, parent::options());

        # print response
        print_r($response);
    }
}
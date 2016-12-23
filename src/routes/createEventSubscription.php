<?php

$app->post('/api/AmazonRedshift/createEventSubscription', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'snsTopicArn','subscriptionName']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $credentials = new Aws\Credentials\Credentials($post_data['args']['apiKey'], $post_data['args']['apiSecret']);

    $client = new Aws\Redshift\RedshiftClient([
        'version' => 'latest',
        'region' => $post_data['args']['region'],
        'credentials' => $credentials
    ]);

    $body['SnsTopicArn'] = $post_data['args']['snsTopicArn'];
    $body['SubscriptionName'] = $post_data['args']['subscriptionName'];
    if (!empty($post_data['args']['enabled'])) {
        $body['Enabled'] = ($post_data['args']['enabled']=='true'?true:false);
    }
    if (!empty($post_data['args']['eventCategories'])) {
        $body['EventCategories'] = $post_data['args']['eventCategories'];
    }
    if (!empty($post_data['args']['severity'])) {
        $body['Severity'] = $post_data['args']['severity'];
    }
    if (!empty($post_data['args']['sourceIds'])) {
        $body['SourceIds'] = $post_data['args']['sourceIds'];
    }
    if (!empty($post_data['args']['sourceType'])) {
        $body['SourceType'] = $post_data['args']['sourceType'];
    }
    if (!empty($post_data['args']['tags'])) {
        $body['Tags'] = $post_data['args']['tags'];
    }

    try {
        $res = $client->createEventSubscription($body)->toArray();

        $result['callback'] = 'success';
        $result['contextWrites']['to'] = is_array($res) ? $res : json_decode($res);
        if (empty($result['contextWrites']['to'])) {
            $result['contextWrites']['to']['status_msg'] = "Api return no results";
        }
    } catch (RedshiftException $e) {
        // Catch an S3 specific exception.
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    } catch (\Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

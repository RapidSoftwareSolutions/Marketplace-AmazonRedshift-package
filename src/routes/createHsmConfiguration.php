<?php

$app->post('/api/AmazonRedshift/createHsmConfiguration', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'description','hsmConfigurationIdentifier','hsmIpAddress','hsmPartitionName','hsmPartitionPassword','hsmServerPublicCertificate']);
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

    $body['Description'] = $post_data['args']['description'];
    $body['HsmConfigurationIdentifier'] = $post_data['args']['hsmConfigurationIdentifier'];
    $body['HsmIpAddress'] = $post_data['args']['hsmIpAddress'];
    $body['HsmPartitionName'] = $post_data['args']['hsmPartitionName'];
    $body['HsmPartitionPassword'] = $post_data['args']['hsmPartitionPassword'];
    $body['HsmServerPublicCertificate'] = $post_data['args']['hsmServerPublicCertificate'];
    if (!empty($post_data['args']['tags'])) {
        $body['Tags'] = $post_data['args']['tags'];
    }

    try {
        $res = $client->createHsmConfiguration($body)->toArray();

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

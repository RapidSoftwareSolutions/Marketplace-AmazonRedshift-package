<?php

$app->post('/api/AmazonRedshift/describeOrderableClusterOptions', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region']);
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

    $body = [];
    if(!empty($post_data['args']['clusterVersion'])) {
        $body['ClusterVersion'] = $post_data['args']['clusterVersion'];
    }
    if(!empty($post_data['args']['marker'])) {
        $body['Marker'] = $post_data['args']['marker'];
    }
    if(!empty($post_data['args']['maxRecords'])) {
        $body['MaxRecords'] = $post_data['args']['maxRecords'];
    }
    if(!empty($post_data['args']['nodeType'])) {
        $body['NodeType'] = $post_data['args']['nodeType'];
    }

    try {
        $res = $client->describeOrderableClusterOptions($body)->toArray();

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

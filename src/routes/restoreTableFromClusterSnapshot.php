<?php

$app->post('/api/AmazonRedshift/restoreTableFromClusterSnapshot', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'clusterIdentifier','newTableName','snapshotIdentifier','sourceDatabaseName','sourceTableName']);
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

    $body['ClusterIdentifier'] = $post_data['args']['clusterIdentifier'];
    $body['NewTableName'] = $post_data['args']['newTableName'];
    $body['SnapshotIdentifier'] = $post_data['args']['snapshotIdentifier'];
    $body['SourceDatabaseName'] = $post_data['args']['sourceDatabaseName'];
    $body['SourceTableName'] = $post_data['args']['sourceTableName'];
    if(!empty($post_data['args']['sourceSchemaName'])) {
        $body['SourceSchemaName'] = $post_data['args']['sourceSchemaName'];
    }
    if(!empty($post_data['args']['targetDatabaseName'])) {
        $body['TargetDatabaseName'] = $post_data['args']['targetDatabaseName'];
    }
    if(!empty($post_data['args']['targetSchemaName'])) {
        $body['TargetSchemaName'] = $post_data['args']['targetSchemaName'];
    }

    try {
        $res = $client->restoreTableFromClusterSnapshot($body)->toArray();

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

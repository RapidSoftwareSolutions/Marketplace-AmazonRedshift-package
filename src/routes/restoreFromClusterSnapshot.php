<?php

$app->post('/api/AmazonRedshift/restoreFromClusterSnapshot', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'apiSecret', 'region', 'clusterIdentifier','snapshotIdentifier']);
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
    $body['SnapshotIdentifier'] = $post_data['args']['snapshotIdentifier'];
    if(!empty($post_data['args']['additionalInfo'])) {
        $body['AdditionalInfo'] = $post_data['args']['additionalInfo'];
    }
    if(!empty($post_data['args']['allowVersionUpgrade'])) {
        $body['AllowVersionUpgrade'] = ($post_data['args']['allowVersionUpgrade']=='true'?true:false);
    }
    if(!empty($post_data['args']['automatedSnapshotRetentionPeriod'])) {
        $body['AutomatedSnapshotRetentionPeriod'] = $post_data['args']['automatedSnapshotRetentionPeriod'];
    }
    if(!empty($post_data['args']['availabilityZone'])) {
        $body['AvailabilityZone'] = $post_data['args']['availabilityZone'];
    }
    if(!empty($post_data['args']['clusterParameterGroupName'])) {
        $body['ClusterParameterGroupName'] = $post_data['args']['clusterParameterGroupName'];
    }
    if(!empty($post_data['args']['clusterSecurityGroups'])) {
        $body['ClusterSecurityGroups'] = $post_data['args']['clusterSecurityGroups'];
    }
    if(!empty($post_data['args']['clusterSubnetGroupName'])) {
        $body['ClusterSubnetGroupName'] = $post_data['args']['clusterSubnetGroupName'];
    }
    if(!empty($post_data['args']['elasticIp'])) {
        $body['ElasticIp'] = $post_data['args']['elasticIp'];
    }
    if(!empty($post_data['args']['enhancedVpcRouting'])) {
        $body['EnhancedVpcRouting'] = ($post_data['args']['enhancedVpcRouting']=='true'?true:false);
    }
    if(!empty($post_data['args']['hsmClientCertificateIdentifier'])) {
        $body['HsmClientCertificateIdentifier'] = $post_data['args']['hsmClientCertificateIdentifier'];
    }
    if(!empty($post_data['args']['hsmConfigurationIdentifier'])) {
        $body['HsmConfigurationIdentifier'] = $post_data['args']['hsmConfigurationIdentifier'];
    }
    if(!empty($post_data['args']['iamRoles'])) {
        $body['IamRoles'] = $post_data['args']['iamRoles'];
    }
    if(!empty($post_data['args']['kmsKeyId'])) {
        $body['KmsKeyId'] = $post_data['args']['kmsKeyId'];
    }
    if(!empty($post_data['args']['nodeType'])) {
        $body['NodeType'] = $post_data['args']['nodeType'];
    }
    if(!empty($post_data['args']['ownerAccount'])) {
        $body['OwnerAccount'] = $post_data['args']['ownerAccount'];
    }
    if(!empty($post_data['args']['port'])) {
        $body['Port'] = $post_data['args']['port'];
    }
    if(!empty($post_data['args']['preferredMaintenanceWindow'])) {
        $body['PreferredMaintenanceWindow'] = $post_data['args']['preferredMaintenanceWindow'];
    }
    if(!empty($post_data['args']['publiclyAccessible'])) {
        $body['PubliclyAccessible'] = $post_data['args']['publiclyAccessible'];
    }
    if(!empty($post_data['args']['snapshotClusterIdentifier'])) {
        $body['SnapshotClusterIdentifier'] = $post_data['args']['snapshotClusterIdentifier'];
    }
    if(!empty($post_data['args']['vpcSecurityGroupIds'])) {
        $body['VpcSecurityGroupIds'] = $post_data['args']['vpcSecurityGroupIds'];
    }

    try {
        $res = $client->restoreFromClusterSnapshot($body)->toArray();

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

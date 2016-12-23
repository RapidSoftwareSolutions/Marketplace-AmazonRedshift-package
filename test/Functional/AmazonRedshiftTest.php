<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class AmazonRedshiftTest extends BaseTestCase {
    
    public function testPackage() {
        
        $routes = [
            'authorizeClusterSecurityGroupIngress',
            'authorizeSnapshotAccess',
            'copyClusterSnapshot',
            'createCluster',
            'createClusterParameterGroup',
            'createClusterSecurityGroup',
            'createClusterSnapshot',
            'createClusterSubnetGroup',
            'createEventSubscription',
            'createHsmClientCertificate',
            'createHsmConfiguration',
            'createSnapshotCopyGrant',
            'createTags',
            'describeClusterParameterGroups',
            'describeClusterParameters',
            'describeClusters',
            'describeClusterSecurityGroups',
            'describeClusterSnapshots',
            'describeClusterSubnetGroups',
            'describeClusterVersions',
            'describeDefaultClusterParameters',
            'describeEventCategories',
            'describeEvents',
            'describeEventSubscriptions',
            'describeHsmClientCertificates',
            'describeHsmConfigurations',
            'describeLoggingStatus',
            'describeOrderableClusterOptions',
            'describeReservedNodeOfferings',
            'describeReservedNodes',
            'describeResize',
            'describeSnapshotCopyGrants',
            'describeTableRestoreStatus',
            'describeTags',
            'disableLogging',
            'disableSnapshotCopy',
            'enableLogging',
            'enableSnapshotCopy',
            'modifyCluster',
            'modifyClusterIamRoles',
            'modifyClusterParameterGroup',
            'modifyClusterSubnetGroup',
            'modifyEventSubscription',
            'modifySnapshotCopyRetentionPeriod',
            'purchaseReservedNodeOffering',
            'rebootCluster',
            'resetClusterParameterGroup',
            'restoreFromClusterSnapshot',
            'restoreTableFromClusterSnapshot',
            'revokeClusterSecurityGroupIngress',
            'revokeSnapshotAccess',
            'rotateEncryptionKey',
            'deleteTags',
            'deleteSnapshotCopyGrant',
            'deleteHsmConfiguration',
            'deleteHsmClientCertificate',
            'deleteEventSubscription',
            'deleteClusterSubnetGroup',
            'deleteClusterSnapshot',
            'deleteClusterSecurityGroup',
            'deleteClusterParameterGroup',
            'deleteCluster',
        ];
        
        foreach($routes as $file) {
            $var = '{  
                        "args":{  
                            "apiKey": "AKIAIYPPUA4S4CZXJR6A",
                            "apiSecret": "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",
                            "region": "eu-west-1"
                        }
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/AmazonRedshift/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }
    
}

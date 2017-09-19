[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/AmazonRedshift/functions?utm_source=RapidAPIGitHub_AmazonRedshiftFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# AmazonRedshift Package
Amazon Redshift manages all the work of setting up, operating, and scaling a data warehouse: provisioning capacity, monitoring and backing up the cluster, and applying patches and upgrades to the Amazon Redshift engine.
* Domain: [AmazonRedshift](http://amazon.com)
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Go to [Amazon Console](https://console.aws.amazon.com/console/home)
1. Log in or create new account
2. In the dropdown from your username, select 'My Security Credentials'
3. On the left side, select 'Groups' and create a new Group with the necessary polices
4. Create new user and assign to existing group
5. After creating user you will see credentials

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## AmazonRedshift.authorizeSnapshotAccess
Authorizes the specified AWS customer account to restore the specified snapshot.

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| API key obtained from Amazon.
| apiSecret                | credentials| API secret obtained from Amazon.
| region                   | String     | Region.
| accountWithRestoreAccess | String     | The identifier of the AWS customer account authorized to restore the specified snapshot.
| snapshotIdentifier       | String     | The identifier of the snapshot the account is authorized to restore.
| snapshotClusterIdentifier| String     | The identifier of the cluster the snapshot was created from. This parameter is required if your IAM user has a policy containing a snapshot resource element that specifies anything other than * for the cluster name.

## AmazonRedshift.copyClusterSnapshot
Copies the specified automated cluster snapshot to a new manual cluster snapshot. The source must be an automated snapshot and it must be in the available state.

| Field                          | Type       | Description
|--------------------------------|------------|----------
| apiKey                         | credentials| API key obtained from Amazon.
| apiSecret                      | credentials| API secret obtained from Amazon.
| region                         | String     | Region.
| sourceSnapshotIdentifier       | String     | The identifier for the source snapshot.
| targetSnapshotIdentifier       | String     | The identifier given to the new manual snapshot.
| sourceSnapshotClusterIdentifier| String     | The identifier of the cluster the source snapshot was created from. This parameter is required if your IAM user has a policy containing a snapshot resource element that specifies anything other than * for the cluster name.

## AmazonRedshift.createCluster
Creates a new cluster.

| Field                           | Type       | Description
|---------------------------------|------------|----------
| apiKey                          | credentials| API key obtained from Amazon.
| apiSecret                       | credentials| API secret obtained from Amazon.
| region                          | String     | Region.
| clusterIdentifier               | String     | A unique identifier for the cluster. You use this identifier to refer to the cluster for any subsequent cluster operations such as deleting or modifying. The identifier also appears in the Amazon Redshift console.
| masterUsername                  | String     | The user name associated with the master user account for the cluster that is being created.
| masterUserPassword              | String     | The password associated with the master user account for the cluster that is being created.
| nodeType                        | Select     | The node type to be provisioned for the cluster. For information about node types, go to Working with Clusters in the Amazon Redshift Cluster Management Guide. Valid Values: ds1.xlarge; ds1.8xlarge; ds2.xlarge; ds2.8xlarge; dc1.large; dc1.8xlarge.
| additionalInfo                  | String     | Reserved
| allowVersionUpgrade             | String     | If true, major version upgrades can be applied during the maintenance window to the Amazon Redshift engine that is running on the cluster. Default: true
| automatedSnapshotRetentionPeriod| String     | The number of days that automated snapshots are retained. If the value is 0, automated snapshots are disabled. Even if automated snapshots are disabled, you can still create manual snapshots when you want with CreateClusterSnapshot. Default: 1
| availabilityZone                | String     | The EC2 Availability Zone (AZ) in which you want Amazon Redshift to provision the cluster. For example, if you have several EC2 instances running in a specific Availability Zone, then you might want the cluster to be provisioned in the same zone in order to decrease network latency.
| clusterParameterGroupName       | String     | The name of the parameter group to be associated with this cluster.
| clusterSecurityGroups           | JSON       | A list of security groups to be associated with this cluster. Default: The default cluster security group for Amazon Redshift.
| clusterSubnetGroupName          | String     | The name of a cluster subnet group to be associated with this cluster.
| clusterType                     | Select     | The type of the cluster. Valid Values: multi-node; single-node. Default: multi-node
| clusterVersion                  | String     | The version of the Amazon Redshift engine software that you want to deploy on the cluster. Only version 1.0 is currently available.
| dBName                          | String     | The name of the first database to be created when the cluster is created.
| elasticIp                       | String     | The Elastic IP (EIP) address for the cluster.
| encrypted                       | String     | If true, the data in the cluster is encrypted at rest. Default: false.
| enhancedVpcRouting              | String     | An option that specifies whether to create the cluster with enhanced VPC routing enabled. To create a cluster that uses enhanced VPC routing, the cluster must be in a VPC. For more information, see Enhanced VPC Routing in the Amazon Redshift Cluster Management Guide. If this option is true, enhanced VPC routing is enabled. Default: false
| hsmClientCertificateIdentifier  | String     | Specifies the name of the HSM client certificate the Amazon Redshift cluster uses to retrieve the data encryption keys stored in an HSM.
| hsmConfigurationIdentifier      | String     | Specifies the name of the HSM configuration that contains the information the Amazon Redshift cluster can use to retrieve and store keys in an HSM.
| iamRoles                        | List       | A list of AWS Identity and Access Management (IAM) roles that can be used by the cluster to access other AWS services. You must supply the IAM roles in their Amazon Resource Name (ARN) format. You can supply up to 10 IAM roles in a single request.
| kmsKeyId                        | String     | The AWS Key Management Service (KMS) key ID of the encryption key that you want to use to encrypt data in the cluster.
| numberOfNodes                   | String     | The number of compute nodes in the cluster. This parameter is required when the ClusterType parameter is specified as multi-node. Default 1
| port                            | String     | The port number on which the cluster accepts incoming connections.
| preferredMaintenanceWindow      | String     | The weekly time range (in UTC) during which automated cluster maintenance can occur. Format: ddd:hh24:mi-ddd:hh24:mi. Valid Days: Mon; Tue; Wed; Thu; Fri; Sat; Sun
| publiclyAccessible              | String     | If true, the cluster can be accessed from a public network.
| tags                            | List       | A list of tag instances. See README for more details.
| vpcSecurityGroupIds             | List       | A list of Virtual Private Cloud (VPC) security groups to be associated with the cluster. See README for more details.

#### clusterSecurityGroups format
```json
["group1", "testgroup2"]
```
#### iamRoles format
```json
["string", "string", ...]
```
#### tags format
```json
[
  {
    "Key": "string",
    "Value": "string"
  }
  ...
]
```
#### vpcSecurityGroupIds format
```json
["string", "string", ...]
```

## AmazonRedshift.createClusterParameterGroup
Creates an Amazon Redshift parameter group.

| Field               | Type       | Description
|---------------------|------------|----------
| apiKey              | credentials| API key obtained from Amazon.
| apiSecret           | credentials| API secret obtained from Amazon.
| region              | String     | Region.
| description         | String     | A description of the parameter group.
| parameterGroupFamily| String     | The Amazon Redshift engine version to which the cluster parameter group applies. The cluster engine version determines the set of parameters.
| parameterGroupName  | String     | The name of the cluster parameter group.
| tags                | List       | A list of tag instances. See README for more details.

#### tags format
```json
[
  {
    "Key": "string",
    "Value": "string"
  }
  ...
]
```

## AmazonRedshift.createClusterSnapshot
Creates a manual snapshot of the specified cluster. The cluster must be in the available state.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| clusterIdentifier | String     | The cluster identifier for which you want a snapshot.
| snapshotIdentifier| String     | A unique identifier for the snapshot that you are requesting. This identifier must be unique for all snapshots within the AWS account.
| tags              | List       | A list of tag instances. See README for more details.

## AmazonRedshift.createClusterSubnetGroup
Creates a new Amazon Redshift subnet group. You must provide a list of one or more subnets in your existing Amazon Virtual Private Cloud (Amazon VPC) when creating Amazon Redshift subnet group.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| clusterSubnetGroupName| String     | The name for the subnet group. Amazon Redshift stores the value as a lowercase string.
| description           | String     | A description for the subnet group.
| subnetIds             | List       | An array of VPC subnet IDs. A maximum of 20 subnets can be modified in a single request.
| tags                  | List       | A list of tag instances. See README for more details.

#### subnetIds format
```json
["subnet-162ab84e"]
```
#### tags format
```json
[
  {
    "Key": "string",
    "Value": "string"
  }
  ...
]
```

## AmazonRedshift.createEventSubscription
Creates an Amazon Redshift event notification subscription

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| API key obtained from Amazon.
| apiSecret       | credentials| API secret obtained from Amazon.
| region          | String     | Region.
| snsTopicArn     | String     | The Amazon Resource Name (ARN) of the Amazon SNS topic used to transmit the event notifications. The ARN is created by Amazon SNS when you create a topic and subscribe to it.
| subscriptionName| String     | The name of the event subscription to be created.
| enabled         | String     | A Boolean value; set to true to activate the subscription, set to false to create the subscription but not active it.
| eventCategories | List       | Specifies the Amazon Redshift event categories to be published by the event notification subscription. Values: Configuration, Management, Monitoring, Security
| severity        | String     | Specifies the Amazon Redshift event severity to be published by the event notification subscription. Values: ERROR, INFO
| sourceIds       | List       | A list of one or more identifiers of Amazon Redshift source objects. All of the objects must be of the same type as was specified in the source type parameter. The event subscription will return only events generated by the specified objects. If not specified, then events are returned for all objects within the source type specified.
| sourceType      | String     | The type of source that will be generating the events. For example, if you want to be notified of events generated by a cluster, you would set this parameter to cluster. If this value is not specified, events are returned for all Amazon Redshift objects in your AWS account. You must specify a source type in order to specify source IDs. Valid values: cluster, cluster-parameter-group, cluster-security-group, and cluster-snapshot.
| tags            | List       | A list of tag instances. See README for more details.

#### eventCategories format
```json
["string, "string", ...]
```
#### sourceIds format
```json
["my-cluster-1", "my-cluster-2"]
```
#### tags format
```json
[
  {
    "Key": "string",
    "Value": "string"
  }
  ...
]
```

## AmazonRedshift.createHsmClientCertificate
Creates an HSM client certificate that an Amazon Redshift cluster will use to connect to the client's HSM in order to store and retrieve the keys used to encrypt the cluster databases.

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| API key obtained from Amazon.
| apiSecret                     | credentials| API secret obtained from Amazon.
| region                        | String     | Region.
| hsmClientCertificateIdentifier| String     | The identifier to be assigned to the new HSM client certificate that the cluster will use to connect to the HSM to use the database encryption keys.
| tags                          | List       | A list of tag instances. See README for more details.

## AmazonRedshift.createHsmConfiguration
Creates an HSM configuration that contains the information required by an Amazon Redshift cluster to store and use database encryption keys in a Hardware Security Module (HSM). After creating the HSM configuration, you can specify it as a parameter when creating a cluster. The cluster will then store its encryption keys in the HSM.

| Field                     | Type       | Description
|---------------------------|------------|----------
| apiKey                    | credentials| API key obtained from Amazon.
| apiSecret                 | credentials| API secret obtained from Amazon.
| region                    | String     | Region.
| description               | String     | A text description of the HSM configuration to be created.
| hsmConfigurationIdentifier| String     | The identifier to be assigned to the new Amazon Redshift HSM configuration.
| hsmIpAddress              | String     | The IP address that the Amazon Redshift cluster must use to access the HSM.
| hsmPartitionName          | String     | The name of the partition in the HSM where the Amazon Redshift clusters will store their database encryption keys.
| hsmPartitionPassword      | String     | The password required to access the HSM partition.
| hsmServerPublicCertificate| String     | The HSMs public certificate file. When using Cloud HSM, the file name is server.pem
| tags                      | List       | A list of tag instances. See README for more details.

## AmazonRedshift.createSnapshotCopyGrant
Creates a snapshot copy grant that permits Amazon Redshift to use a customer master key (CMK) from AWS Key Management Service (AWS KMS) to encrypt copied snapshots in a destination region.

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| API key obtained from Amazon.
| apiSecret            | credentials| API secret obtained from Amazon.
| region               | String     | Region.
| snapshotCopyGrantName| String     | The name of the snapshot copy grant. This name must be unique in the region for the AWS account.
| kmsKeyId             | String     | The unique identifier of the customer master key (CMK) to which to grant Amazon Redshift permission. If no key is specified, the default key is used.
| tags                 | List       | A list of tag instances. See README for more details.

## AmazonRedshift.createTags
Adds one or more tags to a specified resource.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key obtained from Amazon.
| apiSecret   | credentials| API secret obtained from Amazon.
| region      | String     | Region.
| resourceName| String     | The Amazon Resource Name (ARN) to which you want to add the tag or tags. For example, arn:aws:redshift:us-east-1:123456789:cluster:t1.
| tags        | List       | One or more name/value pairs to add as tags to the specified resource. Each tag name is passed in with the parameter Key and the corresponding value is passed in with the parameter Value.. See README for more details.

## AmazonRedshift.describeClusterParameterGroups
Returns a list of Amazon Redshift parameter groups, including parameter groups you created and the default parameter group.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| marker            | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords        | String     | The maximum number of response records to return in each call. Default 100.
| parameterGroupName| String     | The name of a specific parameter group for which to return details. By default, details about all parameter groups and the default parameter group are returned.
| tagKeys           | List       | A tag key or keys for which you want to return all matching cluster parameter groups that are associated with the specified key or keys. See README for more details.
| tagValues         | List       | A tag value or values for which you want to return all matching cluster parameter groups that are associated with the specified tag value or values. See README for more details.

#### tagKeys format
```json
["key1", "key2"]
```
#### tagValues format
```json
["value1", "value2"]
```

## AmazonRedshift.describeClusterParameters
Returns a detailed list of parameters contained within the specified Amazon Redshift parameter group.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| parameterGroupName| String     | The name of a cluster parameter group for which to return details.
| marker            | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords        | String     | The maximum number of response records to return in each call. Default 100.
| source            | Select     | The parameter types to return. Specify user to show parameters that are different form the default. Similarly, specify engine-default to show parameters that are the same as the default parameter group. Default: All parameter types returned. Valid Values: user; engine-default

## AmazonRedshift.describeClusters
Returns properties of provisioned clusters including general cluster properties, cluster database properties, maintenance and backup properties, and security and access properties.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of a cluster whose properties you are requesting. 
| marker           | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords       | String     | The maximum number of response records to return in each call. Default 100.
| tagKeys          | List       | A tag key or keys for which you want to return all matching cluster parameter groups that are associated with the specified key or keys. See README for more details.
| tagValues        | List       | A tag value or values for which you want to return all matching cluster parameter groups that are associated with the specified tag value or values. See README for more details.

## AmazonRedshift.describeClusterSnapshots
Returns one or more snapshot objects, which contain metadata about your cluster snapshots.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| clusterIdentifier | String     | The identifier of the cluster for which information about snapshots is requested.
| endTime           | DatePicker | A time value that requests only snapshots created at or before the specified time. The time value is specified in ISO 8601 format. Example: 2012-07-16T18:00:00Z
| marker            | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords        | String     | The maximum number of response records to return in each call. Default 100.
| ownerAccount      | String     | The AWS customer account used to create or copy the snapshot. Use this field to filter the results to snapshots owned by a particular account. To describe snapshots you own, either specify your AWS customer account, or do not specify the parameter.
| snapshotIdentifier| String     | The snapshot identifier of the snapshot about which to return information.
| snapshotType      | String     | The type of snapshots for which you are requesting information. By default, snapshots of all types are returned. Valid Values: automated; manual
| startTime         | DatePicker | A value that requests only snapshots created at or after the specified time. The time value is specified in ISO 8601 format. Example: 2012-07-16T18:00:00Z
| tagKeys           | List       | A tag key or keys for which you want to return all matching cluster parameter groups that are associated with the specified key or keys. See README for more details.
| tagValues         | List       | A tag value or values for which you want to return all matching cluster parameter groups that are associated with the specified tag value or values. See README for more details.

## AmazonRedshift.describeClusterSubnetGroups
Returns one or more cluster subnet group objects, which contain metadata about your cluster subnet groups.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| clusterSubnetGroupName| String     | The name of the cluster subnet group for which information is requested.
| marker                | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords            | String     | The maximum number of response records to return in each call. Default 100.
| tagKeys               | List       | A tag key or keys for which you want to return all matching cluster parameter groups that are associated with the specified key or keys. See README for more details.
| tagValues             | List       | A tag value or values for which you want to return all matching cluster parameter groups that are associated with the specified tag value or values. See README for more details.

## AmazonRedshift.describeClusterVersions
Returns descriptions of the available Amazon Redshift cluster versions.

| Field                      | Type       | Description
|----------------------------|------------|----------
| apiKey                     | credentials| API key obtained from Amazon.
| apiSecret                  | credentials| API secret obtained from Amazon.
| region                     | String     | Region.
| clusterParameterGroupFamily| String     | The name of a specific cluster parameter group family to return details for.
| clusterVersion             | String     | The specific cluster version to return.
| marker                     | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords                 | String     | The maximum number of response records to return in each call. Default 100.

## AmazonRedshift.describeDefaultClusterParameters
Returns a list of parameter settings for the specified parameter group family.

| Field               | Type       | Description
|---------------------|------------|----------
| apiKey              | credentials| API key obtained from Amazon.
| apiSecret           | credentials| API secret obtained from Amazon.
| region              | String     | Region.
| parameterGroupFamily| String     | The name of the cluster parameter group family.
| marker              | String     | An optional parameter that specifies the starting point to return a set of response records.
| maxRecords          | String     | The maximum number of response records to return in each call. Default 100.

## AmazonRedshift.describeEventCategories
Displays a list of event categories for all event source types, or for a specified source type.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key obtained from Amazon.
| apiSecret | credentials| API secret obtained from Amazon.
| region    | String     | Region.
| sourceType| Select     | The source type, such as cluster or parameter group, to which the described event categories apply. Valid values: cluster, cluster-snapshot, cluster-parameter-group, and cluster-security-group.

## AmazonRedshift.describeEvents
Returns events related to clusters, security groups, snapshots, and parameter groups for the past 14 days.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| API key obtained from Amazon.
| apiSecret       | credentials| API secret obtained from Amazon.
| region          | String     | Region.
| duration        | String     | The number of minutes prior to the time of the request for which to retrieve events. For example, if the request is sent at 18:00 and you specify a duration of 60, then only events which have occurred after 17:00 will be returned. Default: 60
| endTime         | DatePicker | The end of the time interval for which to retrieve events, specified in ISO 8601 format. Example: 2009-07-08T18:00Z
| marker          | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords      | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| sourceIdentifier| String     | The identifier of the event source for which events will be returned. If this parameter is not specified, then all sources are included in the response.
| sourceType      | String     | The event source to retrieve events for. If no value is specified, all events are returned.
| startTime       | DatePicker | The beginning of the time interval to retrieve events for, specified in ISO 8601 format. Example: 2009-07-08T18:00Z

## AmazonRedshift.describeEventSubscriptions
Lists descriptions of all the Amazon Redshift event notifications subscription for a customer account.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| API key obtained from Amazon.
| apiSecret       | credentials| API secret obtained from Amazon.
| region          | String     | Region.
| subscriptionName| String     | The name of the Amazon Redshift event notification subscription to be described.
| marker          | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords      | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100

## AmazonRedshift.describeHsmClientCertificates
Returns information about the specified HSM client certificate. If no certificate ID is specified, returns information about all the HSM certificates owned by your AWS customer account.

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| API key obtained from Amazon.
| apiSecret                     | credentials| API secret obtained from Amazon.
| region                        | String     | Region.
| hsmClientCertificateIdentifier| String     | The identifier of a specific HSM client certificate for which you want information. If no identifier is specified, information is returned for all HSM client certificates owned by your AWS customer account.
| marker                        | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords                    | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100

## AmazonRedshift.describeHsmConfigurations
Returns information about the specified Amazon Redshift HSM configuration. If no configuration ID is specified, returns information about all the HSM configurations owned by your AWS customer account.

| Field                     | Type       | Description
|---------------------------|------------|----------
| apiKey                    | credentials| API key obtained from Amazon.
| apiSecret                 | credentials| API secret obtained from Amazon.
| region                    | String     | Region.
| hsmConfigurationIdentifier| String     | The identifier of a specific Amazon Redshift HSM configuration to be described. If no identifier is specified, information is returned for all HSM configurations owned by your AWS customer account.
| marker                    | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords                | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| tagKeys                   | List       | A tag key or keys for which you want to return all matching HSM configurations that are associated with the specified key or keys. See README for more details.
| tagValues                 | List       | A tag value or values for which you want to return all matching HSM configurations that are associated with the specified tag value or values. See README for more details.

## AmazonRedshift.describeLoggingStatus
Describes whether information, such as queries and connection attempts, is being logged for the specified Amazon Redshift cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The identifier of the cluster from which to get the logging status.

## AmazonRedshift.describeOrderableClusterOptions
Returns a list of orderable cluster options. Before you create a new cluster you can use this operation to find what options are available, such as the EC2 Availability Zones (AZ) in the specific AWS region that you can specify, and the node types you can request. 

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key obtained from Amazon.
| apiSecret     | credentials| API secret obtained from Amazon.
| region        | String     | Region.
| clusterVersion| String     | The version filter value. Specify this parameter to show only the available offerings matching the specified version. Default: All versions.
| marker        | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords    | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| nodeType      | String     | The node type filter value. Specify this parameter to show only the available offerings matching the specified node type.

## AmazonRedshift.describeReservedNodeOfferings
Returns a list of the available reserved node offerings by Amazon Redshift with their descriptions including the node type, the fixed and recurring costs of reserving the node and duration the node will be reserved for you.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| reservedNodeOfferingId| String     | The unique identifier for the offering.
| marker                | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords            | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100

## AmazonRedshift.describeReservedNodes
Returns the descriptions of the reserved nodes.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| API key obtained from Amazon.
| apiSecret     | credentials| API secret obtained from Amazon.
| region        | String     | Region.
| reservedNodeId| String     | Identifier for the node reservation.
| marker        | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords    | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100

## AmazonRedshift.describeResize
Returns information about the last resize operation for the specified cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of a cluster whose resize progress you are requesting. This parameter is case-sensitive. By default, resize operations for all clusters defined for an AWS account are returned.

## AmazonRedshift.describeSnapshotCopyGrants
Returns a list of snapshot copy grants owned by the AWS account in the destination region.

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| API key obtained from Amazon.
| apiSecret            | credentials| API secret obtained from Amazon.
| region               | String     | Region.
| snapshotCopyGrantName| String     | The name of the snapshot copy grant.
| marker               | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords           | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| tagKeys              | List       | A tag key or keys for which you want to return all matching resources that are associated with the specified key or keys. See README for more details.
| tagValues            | List       | A tag value or values for which you want to return all matching resources that are associated with the specified value or values. See README for more details.

## AmazonRedshift.describeTableRestoreStatus
Lists the status of one or more table restore requests made using the RestoreTableFromClusterSnapshot API action.

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| API key obtained from Amazon.
| apiSecret            | credentials| API secret obtained from Amazon.
| region               | String     | Region.
| clusterIdentifier    | String     | The Amazon Redshift cluster that the table is being restored to.
| marker               | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords           | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| tableRestoreRequestId| String     | The identifier of the table restore request to return status for. If you don't specify a TableRestoreRequestId value, then DescribeTableRestoreStatus returns the status of all in-progress table restore requests.

## AmazonRedshift.describeTags
Returns a list of tags. You can return tags from a specific resource by specifying an ARN, or you can return all tags for a given type of resource, such as clusters, snapshots, and so on.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key obtained from Amazon.
| apiSecret   | credentials| API secret obtained from Amazon.
| region      | String     | Region.
| resourceName| String     | The Amazon Resource Name (ARN) for which you want to describe the tag or tags. For example, arn:aws:redshift:us-east-1:123456789:cluster:t1.
| resourceType| Select     | The type of resource with which you want to view tags. Valid resource types are: Cluster, CIDR/IP, EC2 security group, Snapshot, Cluster security group, Subnet group, HSM connection, HSM certificate, Parameter group, Snapshot copy grant
| marker      | String     | An optional parameter that specifies the starting point to return a set of response records. When the results of a request exceed the value specified in MaxRecords, AWS returns a value in the Marker field of the response.
| maxRecords  | String     | The maximum number of response records to return in each call. If the number of remaining response records exceeds the specified MaxRecords value, a value is returned in a marker field of the response. You can retrieve the next set of records by retrying the command with the returned marker value. Default: 100
| tagKeys     | List       | A tag key or keys for which you want to return all matching resources that are associated with the specified key or keys. See README for more details.
| tagValues   | List       | A tag value or values for which you want to return all matching resources that are associated with the specified value or values. See README for more details.

## AmazonRedshift.disableLogging
Stops logging information, such as queries and connection attempts, for the specified Amazon Redshift cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The identifier of the cluster on which logging is to be stopped.

## AmazonRedshift.disableSnapshotCopy
Disables the automatic copying of snapshots from one region to another region for a specified cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of the source cluster that you want to disable copying of snapshots to a destination region.

## AmazonRedshift.enableLogging
Starts logging information, such as queries and connection attempts, for the specified Amazon Redshift cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| bucketName       | String     | The name of an existing S3 bucket where the log files are to be stored.
| clusterIdentifier| String     | The identifier of the cluster on which logging is to be started.
| s3KeyPrefix      | String     | The prefix applied to the log file names.

## AmazonRedshift.enableSnapshotCopy
Enables the automatic copy of snapshots from one region to another region for a specified cluster.

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| API key obtained from Amazon.
| apiSecret            | credentials| API secret obtained from Amazon.
| region               | String     | Region.
| clusterIdentifier    | String     | The identifier of the cluster on which logging is to be started.
| destinationRegion    | String     | The destination region that you want to copy snapshots to.
| retentionPeriod      | String     | The number of days to retain automated snapshots in the destination region after they are copied from the source region. Default: 7.
| snapshotCopyGrantName| String     | The name of the snapshot copy grant to use when snapshots of an AWS KMS-encrypted cluster are copied to the destination region.

## AmazonRedshift.modifyCluster
Modifies the settings for a cluster.

| Field                           | Type       | Description
|---------------------------------|------------|----------
| apiKey                          | credentials| API key obtained from Amazon.
| apiSecret                       | credentials| API secret obtained from Amazon.
| region                          | String     | Region.
| clusterIdentifier               | String     | The unique identifier of the cluster to be modified.
| allowVersionUpgrade             | String     | If true, major version upgrades will be applied automatically to the cluster during the maintenance window. Default: false
| automatedSnapshotRetentionPeriod| String     | The number of days that automated snapshots are retained. If the value is 0, automated snapshots are disabled. Even if automated snapshots are disabled, you can still create manual snapshots when you want with CreateClusterSnapshot. Default: 1
| clusterParameterGroupName       | String     | The name of the cluster parameter group to apply to this cluster.
| clusterSecurityGroups           | List       | A list of security groups to be associated with this cluster.
| clusterType                     | Select     | The type of the cluster. Valid Values: multi-node; single-node. Default: multi-node
| clusterVersion                  | String     | The new version number of the Amazon Redshift engine to upgrade to.
| elasticIp                       | String     | The Elastic IP (EIP) address for the cluster.
| enhancedVpcRouting              | String     | An option that specifies whether to create the cluster with enhanced VPC routing enabled. To create a cluster that uses enhanced VPC routing, the cluster must be in a VPC. For more information, see Enhanced VPC Routing in the Amazon Redshift Cluster Management Guide. If this option is true, enhanced VPC routing is enabled. Default: false
| hsmClientCertificateIdentifier  | String     | Specifies the name of the HSM client certificate the Amazon Redshift cluster uses to retrieve the data encryption keys stored in an HSM.
| hsmConfigurationIdentifier      | String     | Specifies the name of the HSM configuration that contains the information the Amazon Redshift cluster can use to retrieve and store keys in an HSM.
| masterUserPassword              | String     | The new password for the cluster master user.
| newClusterIdentifier            | String     | The new identifier for the cluster.
| nodeType                        | Select     | The new node type of the cluster. If you specify a new node type, you must also specify the number of nodes parameter. Valid Values: ds1.xlarge; ds1.8xlarge; ds2.xlarge; ds2.8xlarge; dc1.large; dc1.8xlarge.
| numberOfNodes                   | String     | The number of compute nodes in the cluster. This parameter is required when the ClusterType parameter is specified as multi-node. Default 1
| preferredMaintenanceWindow      | String     | The weekly time range (in UTC) during which automated cluster maintenance can occur. Format: ddd:hh24:mi-ddd:hh24:mi. Valid Days: Mon; Tue; Wed; Thu; Fri; Sat; Sun
| publiclyAccessible              | String     | If true, the cluster can be accessed from a public network.
| vpcSecurityGroupIds             | List       | A list of Virtual Private Cloud (VPC) security groups to be associated with the cluster. See README for more details.

## AmazonRedshift.modifyClusterIamRoles
Modifies the list of AWS Identity and Access Management (IAM) roles that can be used by the cluster to access other AWS services.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of the cluster for which you want to associate or disassociate IAM roles.
| addIamRoles      | List       | Array of strings. Zero or more IAM roles to associate with the cluster. The roles must be in their Amazon Resource Name (ARN) format. You can associate up to 10 IAM roles with a single cluster in a single request. See README for more details.
| removeIamRoles   | List       | Array of strings. Zero or more IAM roles in ARN format to disassociate from the cluster. You can disassociate up to 10 IAM roles from a single cluster in a single request. See README for more details.

#### addIamRoles format
```json
["string", "string", ...]
```
#### removeIamRoles format
```json
["string", "string", ...]
```
## AmazonRedshift.modifyClusterParameterGroup
Modifies the parameters of a parameter group.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| parameterGroupName| String     | The name of the parameter group to be modified.
| parameters        | List       | Array of objects. An array of parameters to be modified. A maximum of 20 parameters can be modified in a single request. For each parameter to be modified, you must supply at least the parameter name and parameter value; other name-value pairs of the parameter are optional. See README for more details.

## AmazonRedshift.modifyClusterSubnetGroup
Modifies a cluster subnet group to include the specified list of VPC subnets. The operation replaces the existing list of subnets with the new list of subnets.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| clusterSubnetGroupName| String     | The name of the subnet group to be modified.
| subnetIds             | List       | Array of strings. An array of VPC subnet IDs. A maximum of 20 subnets can be modified in a single request. See README for more details.
| description           | String     | A text description of the subnet group to be modified.

## AmazonRedshift.modifyEventSubscription
Modifies an existing Amazon Redshift event notification subscription.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| API key obtained from Amazon.
| apiSecret       | credentials| API secret obtained from Amazon.
| region          | String     | Region.
| subscriptionName| String     | The name of the modified Amazon Redshift event notification subscription.
| enabled         | String     | A Boolean value indicating if the subscription is enabled. true indicates the subscription is enabled
| eventCategories | List       | Array of strings. Specifies the Amazon Redshift event categories to be published by the event notification subscription. Values: Configuration, Management, Monitoring, Security. See README for more details.
| severity        | String     | Specifies the Amazon Redshift event severity to be published by the event notification subscription. Values: ERROR, INFO
| snsTopicArn     | String     | The Amazon Resource Name (ARN) of the SNS topic to be used by the event notification subscription.
| sourceIds       | List       | Array of strings. A list of one or more identifiers of Amazon Redshift source objects. All of the objects must be of the same type as was specified in the source type parameter. The event subscription will return only events generated by the specified objects. If not specified, then events are returned for all objects within the source type specified. Example: my-cluster-1, my-cluster-2, my-snapshot-20131010. See README for more details.
| sourceType      | Select     | The type of source that will be generating the events. For example, if you want to be notified of events generated by a cluster, you would set this parameter to cluster. If this value is not specified, events are returned for all Amazon Redshift objects in your AWS account. You must specify a source type in order to specify source IDs. Valid values: cluster, cluster-parameter-group, cluster-security-group, and cluster-snapshot.

#### eventCategories format
```json
["string", "string", ...]
```
#### sourceIds format
```json
["source1", "source2", ...]
```

## AmazonRedshift.modifySnapshotCopyRetentionPeriod
Modifies the number of days to retain automated snapshots in the destination region after they are copied from the source region.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of the cluster for which you want to change the retention period for automated snapshots that are copied to a destination region.
| retentionPeriod  | String     | The number of days to retain automated snapshots in the destination region after they are copied from the source region. Must be at least 1 and no more than 35.

## AmazonRedshift.purchaseReservedNodeOffering
Allows you to purchase reserved nodes. Amazon Redshift offers a predefined set of reserved node offerings. You can purchase one or more of the offerings. You can call the DescribeReservedNodeOfferings API to obtain the available reserved node offerings. You can call this API by providing a specific reserved node offering and the number of nodes you want to reserve.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| reservedNodeOfferingId| String     | The unique identifier of the reserved node offering you want to purchase.
| nodeCount             | String     | The number of reserved nodes that you want to purchase. Default: 1

## AmazonRedshift.rebootCluster
Reboots a cluster. This action is taken as soon as possible. It results in a momentary outage to the cluster, during which the cluster status is set to rebooting. A cluster event is created when the reboot is completed. Any pending cluster modifications (see ModifyCluster) are applied at this reboot.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The cluster identifier.

## AmazonRedshift.resetClusterParameterGroup
Sets one or more parameters of the specified parameter group to their default values and sets the source values of the parameters to "engine-default". To reset the entire parameter group specify the ResetAllParameters parameter.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| parameterGroupName| String     | The name of the cluster parameter group to be reset.
| parameters        | List       | An array of names of parameters to be reset. If ResetAllParameters option is not used, then at least one parameter name must be supplied. Constraints: A maximum of 20 parameters can be reset in a single request.
| resetAllParameters| String     | If true, all parameters in the specified parameter group will be reset to their default values. Default: true

#### parameters format
```json
[
  {
    "ParameterName": "string",
    "ParameterValue": "string",
    "Description": "string",
    "Source": "string",
    "DataType": "string",
    "AllowedValues": "string",
    "ApplyType": "static"|"dynamic",
    "IsModifiable": true|false,
    "MinimumEngineVersion": "string"
  }
  ...
]
```

## AmazonRedshift.restoreFromClusterSnapshot
Creates a new cluster from a snapshot. By default, Amazon Redshift creates the resulting cluster with the same configuration as the original cluster from which the snapshot was created, except that the new cluster is created with the default cluster security and parameter groups.

| Field                           | Type       | Description
|---------------------------------|------------|----------
| apiKey                          | credentials| API key obtained from Amazon.
| apiSecret                       | credentials| API secret obtained from Amazon.
| region                          | String     | Region.
| clusterIdentifier               | String     | The identifier of the cluster that will be created from restoring the snapshot.
| snapshotIdentifier              | String     | The name of the snapshot from which to create the new cluster. This parameter isn't case sensitive.
| additionalInfo                  | String     | Reserved
| allowVersionUpgrade             | String     | If true, major version upgrades can be applied during the maintenance window to the Amazon Redshift engine that is running on the cluster. Default: true
| automatedSnapshotRetentionPeriod| String     | The number of days that automated snapshots are retained. If the value is 0, automated snapshots are disabled. Even if automated snapshots are disabled, you can still create manual snapshots when you want with CreateClusterSnapshot. Default: The value selected for the cluster from which the snapshot was taken.
| availabilityZone                | String     | The Amazon EC2 Availability Zone in which to restore the cluster. Default: A random, system-chosen Availability Zone. Example: us-east-1a
| clusterParameterGroupName       | String     | The name of the parameter group to be associated with this cluster.
| clusterSecurityGroups           | List       | A list of security groups to be associated with this cluster. Default: The default cluster security group for Amazon Redshift. See README for more details.
| clusterSubnetGroupName          | String     | The name of the subnet group where you want to cluster restored.
| elasticIp                       | String     | The elastic IP (EIP) address for the cluster.
| enhancedVpcRouting              | String     | An option that specifies whether to create the cluster with enhanced VPC routing enabled. To create a cluster that uses enhanced VPC routing, the cluster must be in a VPC. Default: false
| hsmClientCertificateIdentifier  | String     | Specifies the name of the HSM client certificate the Amazon Redshift cluster uses to retrieve the data encryption keys stored in an HSM.
| hsmConfigurationIdentifier      | String     | Specifies the name of the HSM configuration that contains the information the Amazon Redshift cluster can use to retrieve and store keys in an HSM.
| iamRoles                        | List       | A list of AWS Identity and Access Management (IAM) roles that can be used by the cluster to access other AWS services. You must supply the IAM roles in their Amazon Resource Name (ARN) format. You can supply up to 10 IAM roles in a single request. See README for more details.
| kmsKeyId                        | String     | The AWS Key Management Service (KMS) key ID of the encryption key that you want to use to encrypt data in the cluster that you restore from a shared snapshot.
| nodeType                        | String     | The node type that the restored cluster will be provisioned with.
| ownerAccount                    | String     | The AWS customer account used to create or copy the snapshot. Required if you are restoring a snapshot you do not own, optional if you own the snapshot.
| port                            | String     | The port number on which the cluster accepts connections. Default: The same port as the original cluster.
| preferredMaintenanceWindow      | String     | The weekly time range (in UTC) during which automated cluster maintenance can occur. Format: ddd:hh24:mi-ddd:hh24:mi. Valid Days: Mon; Tue; Wed; Thu; Fri; Sat; Sun
| publiclyAccessible              | String     | If true, the cluster can be accessed from a public network.
| snapshotClusterIdentifier       | String     | The name of the cluster the source snapshot was created from. This parameter is required if your IAM user has a policy containing a snapshot resource element that specifies anything other than * for the cluster name.
| vpcSecurityGroupIds             | List       | A list of Virtual Private Cloud (VPC) security groups to be associated with the cluster. See README for more details.

## AmazonRedshift.restoreTableFromClusterSnapshot
Creates a new table from a table in an Amazon Redshift cluster snapshot. You must create the new table within the Amazon Redshift cluster that the snapshot was taken from.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| clusterIdentifier | String     | The identifier of the Amazon Redshift cluster to restore the table to.
| newTableName      | String     | The name of the table to create as a result of the current request.
| snapshotIdentifier| String     | The identifier of the snapshot to restore the table from. This snapshot must have been created from the Amazon Redshift cluster specified by the ClusterIdentifier parameter.
| sourceDatabaseName| String     | The name of the source database that contains the table to restore from.
| sourceTableName   | String     | The name of the source table to restore from.
| sourceSchemaName  | String     | The name of the source schema that contains the table to restore from. If you do not specify a SourceSchemaName value, the default is public.
| targetDatabaseName| String     | The name of the database to restore the table to.
| targetSchemaName  | String     | The name of the schema to restore the table to.

## AmazonRedshift.revokeSnapshotAccess
Removes the ability of the specified AWS customer account to restore the specified snapshot. If the account is currently restoring the snapshot, the restore will run to completion.

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| API key obtained from Amazon.
| apiSecret                | credentials| API secret obtained from Amazon.
| region                   | String     | Region.
| accountWithRestoreAccess | String     | The identifier of the AWS customer account that can no longer restore the specified snapshot.
| snapshotIdentifier       | String     | The identifier of the snapshot that the account can no longer access.
| snapshotClusterIdentifier| String     | The identifier of the cluster the snapshot was created from. This parameter is required if your IAM user has a policy containing a snapshot resource element that specifies anything other than * for the cluster name.

## AmazonRedshift.rotateEncryptionKey
Rotates the encryption keys for a cluster.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| API key obtained from Amazon.
| apiSecret        | credentials| API secret obtained from Amazon.
| region           | String     | Region.
| clusterIdentifier| String     | The unique identifier of the cluster that you want to rotate the encryption keys for.

## AmazonRedshift.deleteTags
Deletes a tag or tags from a resource. You must provide the ARN of the resource from which you want to delete the tag or tags.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key obtained from Amazon.
| apiSecret   | credentials| API secret obtained from Amazon.
| region      | String     | Region.
| resourceName| String     | The Amazon Resource Name (ARN) from which you want to remove the tag or tags. For example, arn:aws:redshift:us-east-1:123456789:cluster:t1.
| tagKeys     | List       | Array of strings. The tag key that you want to delete. See README for more details.

## AmazonRedshift.deleteSnapshotCopyGrant
Deletes the specified snapshot copy grant.

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| API key obtained from Amazon.
| apiSecret            | credentials| API secret obtained from Amazon.
| region               | String     | Region.
| snapshotCopyGrantName| String     | The name of the snapshot copy grant to delete.

## AmazonRedshift.deleteHsmConfiguration
Deletes the specified snapshot copy grant.

| Field                     | Type       | Description
|---------------------------|------------|----------
| apiKey                    | credentials| API key obtained from Amazon.
| apiSecret                 | credentials| API secret obtained from Amazon.
| region                    | String     | Region.
| hsmConfigurationIdentifier| String     | The identifier of the Amazon Redshift HSM configuration to be deleted.

## AmazonRedshift.deleteHsmClientCertificate
Deletes the specified HSM client certificate.

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| API key obtained from Amazon.
| apiSecret                     | credentials| API secret obtained from Amazon.
| region                        | String     | Region.
| hsmClientCertificateIdentifier| String     | The identifier of the HSM client certificate to be deleted.

## AmazonRedshift.deleteEventSubscription
Deletes an Amazon Redshift event notification subscription.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| API key obtained from Amazon.
| apiSecret       | credentials| API secret obtained from Amazon.
| region          | String     | Region.
| subscriptionName| String     | The name of the Amazon Redshift event notification subscription to be deleted.

## AmazonRedshift.deleteClusterSubnetGroup
Deletes the specified cluster subnet group.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| API key obtained from Amazon.
| apiSecret             | credentials| API secret obtained from Amazon.
| region                | String     | Region.
| clusterSubnetGroupName| String     | The name of the cluster subnet group name to be deleted.

## AmazonRedshift.deleteClusterSnapshot
Deletes the specified cluster subnet group.

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| API key obtained from Amazon.
| apiSecret                | credentials| API secret obtained from Amazon.
| region                   | String     | Region.
| snapshotIdentifier       | String     | The unique identifier of the manual snapshot to be deleted.
| snapshotClusterIdentifier| String     | The unique identifier of the cluster the snapshot was created from. This parameter is required if your IAM user has a policy containing a snapshot resource element that specifies anything other than * for the cluster name.

## AmazonRedshift.deleteClusterParameterGroup
Deletes a specified Amazon Redshift parameter group.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| parameterGroupName| String     | The name of the parameter group to be deleted.

## AmazonRedshift.deleteCluster
Deletes a previously provisioned cluster. A successful response from the web service indicates that the request was received correctly.

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| API key obtained from Amazon.
| apiSecret                     | credentials| API secret obtained from Amazon.
| region                        | String     | Region.
| clusterIdentifier             | String     | The identifier of the cluster to be deleted.
| finalClusterSnapshotIdentifier| String     | The identifier of the final snapshot that is to be created immediately before deleting the cluster. If this parameter is provided, SkipFinalClusterSnapshot must be false.
| skipFinalClusterSnapshot      | String     | Determines whether a final snapshot of the cluster is created before Amazon Redshift deletes the cluster. If true, a final cluster snapshot is not created. If false, a final cluster snapshot is created before the cluster is deleted. Default: false


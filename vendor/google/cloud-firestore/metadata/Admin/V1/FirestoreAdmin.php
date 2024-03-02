<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/admin/v1/firestore_admin.proto

namespace GPBMetadata\Google\Firestore\Admin\V1;

class FirestoreAdmin
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Firestore\Admin\V1\Database::initOnce();
        \GPBMetadata\Google\Firestore\Admin\V1\Field::initOnce();
        \GPBMetadata\Google\Firestore\Admin\V1\Index::initOnce();
        \GPBMetadata\Google\Firestore\Admin\V1\Operation::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�-
/google/firestore/admin/v1/firestore_admin.protogoogle.firestore.admin.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto(google/firestore/admin/v1/database.proto%google/firestore/admin/v1/field.proto%google/firestore/admin/v1/index.proto)google/firestore/admin/v1/operation.proto#google/longrunning/operations.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.proto"Q
ListDatabasesRequest9
parent (	B)�A�A#!firestore.googleapis.com/Database"�
CreateDatabaseRequest9
parent (	B)�A�A#!firestore.googleapis.com/Database:
database (2#.google.firestore.admin.v1.DatabaseB�A
database_id (	B�A"
CreateDatabaseMetadata"d
ListDatabasesResponse6
	databases (2#.google.firestore.admin.v1.Database
unreachable (	"M
GetDatabaseRequest7
name (	B)�A�A#
!firestore.googleapis.com/Database"�
UpdateDatabaseRequest:
database (2#.google.firestore.admin.v1.DatabaseB�A/
update_mask (2.google.protobuf.FieldMask"
UpdateDatabaseMetadata"^
DeleteDatabaseRequest7
name (	B)�A�A#
!firestore.googleapis.com/Database
etag (	"
DeleteDatabaseMetadata"�
CreateIndexRequest@
parent (	B0�A�A*
(firestore.googleapis.com/CollectionGroup4
index (2 .google.firestore.admin.v1.IndexB�A"�
ListIndexesRequest@
parent (	B0�A�A*
(firestore.googleapis.com/CollectionGroup
filter (	
	page_size (

page_token (	"a
ListIndexesResponse1
indexes (2 .google.firestore.admin.v1.Index
next_page_token (	"G
GetIndexRequest4
name (	B&�A�A 
firestore.googleapis.com/Index"J
DeleteIndexRequest4
name (	B&�A�A 
firestore.googleapis.com/Index"{
UpdateFieldRequest4
field (2 .google.firestore.admin.v1.FieldB�A/
update_mask (2.google.protobuf.FieldMask"G
GetFieldRequest4
name (	B&�A�A 
firestore.googleapis.com/Field"�
ListFieldsRequest@
parent (	B0�A�A*
(firestore.googleapis.com/CollectionGroup
filter (	
	page_size (

page_token (	"_
ListFieldsResponse0
fields (2 .google.firestore.admin.v1.Field
next_page_token (	"�
ExportDocumentsRequest7
name (	B)�A�A#
!firestore.googleapis.com/Database
collection_ids (	
output_uri_prefix (	
namespace_ids (	1
snapshot_time (2.google.protobuf.Timestamp"�
ImportDocumentsRequest7
name (	B)�A�A#
!firestore.googleapis.com/Database
collection_ids (	
input_uri_prefix (	
namespace_ids (	2�
FirestoreAdmin�
CreateIndex-.google.firestore.admin.v1.CreateIndexRequest.google.longrunning.Operation"~�A
IndexIndexOperationMetadata�Aparent,index���G">/v1/{parent=projects/*/databases/*/collectionGroups/*}/indexes:index�
ListIndexes-.google.firestore.admin.v1.ListIndexesRequest..google.firestore.admin.v1.ListIndexesResponse"O�Aparent���@>/v1/{parent=projects/*/databases/*/collectionGroups/*}/indexes�
GetIndex*.google.firestore.admin.v1.GetIndexRequest .google.firestore.admin.v1.Index"M�Aname���@>/v1/{name=projects/*/databases/*/collectionGroups/*/indexes/*}�
DeleteIndex-.google.firestore.admin.v1.DeleteIndexRequest.google.protobuf.Empty"M�Aname���@*>/v1/{name=projects/*/databases/*/collectionGroups/*/indexes/*}�
GetField*.google.firestore.admin.v1.GetFieldRequest .google.firestore.admin.v1.Field"L�Aname���?=/v1/{name=projects/*/databases/*/collectionGroups/*/fields/*}�
UpdateField-.google.firestore.admin.v1.UpdateFieldRequest.google.longrunning.Operation"|�A
FieldFieldOperationMetadata�Afield���L2C/v1/{field.name=projects/*/databases/*/collectionGroups/*/fields/*}:field�

ListFields,.google.firestore.admin.v1.ListFieldsRequest-.google.firestore.admin.v1.ListFieldsResponse"N�Aparent���?=/v1/{parent=projects/*/databases/*/collectionGroups/*}/fields�
ExportDocuments1.google.firestore.admin.v1.ExportDocumentsRequest.google.longrunning.Operation"x�A2
ExportDocumentsResponseExportDocumentsMetadata�Aname���6"1/v1/{name=projects/*/databases/*}:exportDocuments:*�
ImportDocuments1.google.firestore.admin.v1.ImportDocumentsRequest.google.longrunning.Operation"v�A0
google.protobuf.EmptyImportDocumentsMetadata�Aname���6"1/v1/{name=projects/*/databases/*}:importDocuments:*�
CreateDatabase0.google.firestore.admin.v1.CreateDatabaseRequest.google.longrunning.Operation"v�A"
DatabaseCreateDatabaseMetadata�Aparent,database,database_id���-"!/v1/{parent=projects/*}/databases:database�
GetDatabase-.google.firestore.admin.v1.GetDatabaseRequest#.google.firestore.admin.v1.Database"0�Aname���#!/v1/{name=projects/*/databases/*}�
ListDatabases/.google.firestore.admin.v1.ListDatabasesRequest0.google.firestore.admin.v1.ListDatabasesResponse"2�Aparent���#!/v1/{parent=projects/*}/databases�
UpdateDatabase0.google.firestore.admin.v1.UpdateDatabaseRequest.google.longrunning.Operation"x�A"
DatabaseUpdateDatabaseMetadata�Adatabase,update_mask���62*/v1/{database.name=projects/*/databases/*}:database�
DeleteDatabase0.google.firestore.admin.v1.DeleteDatabaseRequest.google.longrunning.Operation"U�A"
DatabaseDeleteDatabaseMetadata�Aname���#*!/v1/{name=projects/*/databases/*}v�Afirestore.googleapis.com�AXhttps://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/datastoreB�
com.google.firestore.admin.v1BFirestoreAdminProtoPZ9cloud.google.com/go/firestore/apiv1/admin/adminpb;adminpb�GCFS�Google.Cloud.Firestore.Admin.V1�Google\\Cloud\\Firestore\\Admin\\V1�#Google::Cloud::Firestore::Admin::V1�AL
!firestore.googleapis.com/Location\'projects/{project}/locations/{location}�Aq
(firestore.googleapis.com/CollectionGroupEprojects/{project}/databases/{database}/collectionGroups/{collection}bproto3'
        , true);

        static::$is_initialized = true;
    }
}


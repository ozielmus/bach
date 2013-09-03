<?php



/**
 * This class defines the structure of the 'sys_notifications' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.bach.map
 */
class SysNotificationsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysNotificationsTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sys_notifications');
        $this->setPhpName('SysNotifications');
        $this->setClassname('SysNotifications');
        $this->setPackage('bach');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_notification', 'IdNotification', 'INTEGER', true, null, null);
        $this->addForeignKey('id_sender', 'IdSender', 'INTEGER', 'sys_users', 'id_user', false, null, null);
        $this->addForeignKey('id_receiver', 'IdReceiver', 'INTEGER', 'sys_users', 'id_user', false, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 20, null);
        $this->addColumn('reference', 'Reference', 'VARCHAR', false, 255, null);
        $this->addColumn('message', 'Message', 'LONGVARCHAR', false, null, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 20, 'CREATED');
        $this->addColumn('created', 'Created', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysUsersRelatedByIdSender', 'SysUsers', RelationMap::MANY_TO_ONE, array('id_sender' => 'id_user', ), null, null);
        $this->addRelation('SysUsersRelatedByIdReceiver', 'SysUsers', RelationMap::MANY_TO_ONE, array('id_receiver' => 'id_user', ), null, null);
    } // buildRelations()

} // SysNotificationsTableMap

<?php



/**
 * This class defines the structure of the 'sys_users' table.
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
class SysUsersTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysUsersTableMap';

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
        $this->setName('sys_users');
        $this->setPhpName('SysUsers');
        $this->setClassname('SysUsers');
        $this->setPackage('bach');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_user', 'IdUser', 'INTEGER', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 50, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 50, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 20, 'CREATE');
        $this->addForeignKey('id_rol', 'IdRol', 'INTEGER', 'sys_roles', 'id_rol', false, null, null);
        $this->addColumn('id_image', 'IdImage', 'INTEGER', false, null, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', false, null, null);
        $this->addColumn('phone', 'Phone', 'CHAR', false, 20, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysRoles', 'SysRoles', RelationMap::MANY_TO_ONE, array('id_rol' => 'id_rol', ), null, null);
    } // buildRelations()

} // SysUsersTableMap

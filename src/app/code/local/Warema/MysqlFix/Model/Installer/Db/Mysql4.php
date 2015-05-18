<?php
class Warema_MysqlFix_Model_Installer_Db_Mysql4 extends Mage_Install_Model_Installer_Db_Mysql4
{
    /**
     * Check InnoDB support
     *
     * @return bool
     */
    public function supportEngine()
    {
        $bSupportsEngine = parent::supportEngine();
        if ($bSupportsEngine) {
            return true;
        }
        $aVariables = $this
            ->_getConnection()
            ->fetchPairs('SHOW ENGINES');
        return (isset($aVariables['InnoDB']) && $aVariables['InnoDB'] != 'NO');
    }
}
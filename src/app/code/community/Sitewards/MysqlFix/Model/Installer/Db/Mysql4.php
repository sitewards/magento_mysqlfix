<?php
class Sitewards_MysqlFix_Model_Installer_Db_Mysql4 extends Mage_Install_Model_Installer_Db_Mysql4
{
    /**
     * Checks InnoDB support in MySQL 5.6 compatible way.
     *
     * @see http://stackoverflow.com/questions/15443448/magento-install-complains-about-missing-innodb-when-it-is-available
     *
     * @return bool
     */
    public function supportEngine()
    {
        $bSupportsEngine = parent::supportEngine();
        if ($bSupportsEngine) {
            return true;
        }
        $oConnection = $this->_getConnection();
        $aVariables  = $oConnection->fetchPairs('SHOW ENGINES');
        return (isset($aVariables['InnoDB']) && $aVariables['InnoDB'] != 'NO');
    }
}
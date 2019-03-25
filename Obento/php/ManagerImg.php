<?php
/**
 * Created by PhpStorm.
 * User: Myzu
 * Date: 05/06/2018
 * Time: 05:30
 */

class ManagerImg
{
    protected $_folder;

    public function __construct($folder)
    {

        $this->setfolder($folder);
    }

    public function getList()
    {
        $liste = [];
        if ($dossier = opendir($this->getFolder())) {
            while (($fichier = readdir($dossier))) {
                if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                    $liste[] = new Img($this->getFolder() . $fichier);
                }
            }
            closedir($dossier);
        }

        return $liste;
    }

    public function getFolder()
    {
        return $this->_folder;
    }

    public function setFolder($folder)
    {
        if (is_string($folder)) {
            $this->_folder = $folder;
        }
    }


}
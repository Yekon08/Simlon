<?php
class GFichier {
  ///////////////////////////////////////////////////////////////////////////////////////
  //================================VARIABLE D'INSTANCE================================//
  ///////////////////////////////////////////////////////////////////////////////////////
  private $_file;
  private $_fileName;
  private $_fileExtension;
  private $_fileSize;
  private $_limitSize;
  private $_folder;
  private $_currentFileName;
  private $_legalExtensions = [];
  ///////////////////////////////////////////////////////////////////////////////////////
  //====================================Constructeur===================================//
  ///////////////////////////////////////////////////////////////////////////////////////

  public function __construct($fileName,$folder,$limitSize = 10000000){
    $this->_currentFileName = $fileName;
    $this->_file = $_FILES[$fileName];
    $this->_fileSize = $_FILES[$fileName]["size"];
    $this->_limitSize = $limitSize;
    $this->_folder = $folder;
    $this->_fileExtension = pathinfo("localtmp" . $this->_file["name"] ,PATHINFO_EXTENSION);
    $this->_fileName = explode('.', $this->_file["name"])[0];
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //================================ACCESSEUR/MUTATEUR=================================//
  ///////////////////////////////////////////////////////////////////////////////////////

  //ACCESSEUR:

  //MUTATEUR:

  //setter
  public function setLegalExtensions(){
    $args = func_get_args();
    for($i = 0 ; $i < count($args) ; $i++){
      array_push($this->_legalExtensions,$args[$i]);
    }
  }

  //adder
  public function addLegalEstension($extension){
    array_push($this->_legalExtensions,$extension);
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //=======================================METHODES====================================//
  ///////////////////////////////////////////////////////////////////////////////////////

  public function downloadFile(){
    if($this->isNotEmpty()){
      if($this->hasLegalExtension()){
        if($this->hasLegalSize()){
          if(!$this->fileExist()){
            if(move_uploaded_file($this->_file["tmp_name"],$this->_folder."/".$this->_fileName.".".$this->_fileExtension)){//
              echo "Téléchargement reussis.";
              return true;
            }else{
              echo "Echec du téléchargement.";
            }
            echo "<br>current file : " . $this->_currentFileName;
            echo "<br>chemin de destination : /testDownload/".$this->_fileName;
          }else{
            echo "Le fichier existe déjà";
          }
        }else{
          echo "Le fichier possede une taille non valide";
        }
      }else{
        echo "Le fichier possede une extension non autorisé";
      }
    }else{
      echo "Le fichier est vide";
    }
    return false;
  }

  public function hasLegalExtension(){
    if(in_array($this->_fileExtension,$this->_legalExtensions)){
      return true;
    }
    return false;
  }

  public function hasLegalSize(){
    if($this->_fileSize <= $this->_limitSize){
      return true;
    }else{
      return false;
    }
  }

  public function isNotEmpty(){
    if($this->_fileName != "" && $this->_fileSize > 0){
      return true;
    }else{
      return false;
    }
  }

  public function fileExist(){
    if(file_exists($this->_folder."/".$this->_fileName.".".$this->_fileExtension)){
      return true;
    }else{
      return false;
    }
  }

  public function describe(){
    echo "<pre>";
     echo "<br> _filename: " . $this->_fileName;
     echo "<br> _fileExtension: " . $this->_fileExtension;
     echo "<br> _fileSize: " . $this->_fileSize;
     echo "<br> _folder: " . $this->_folder;
     echo "<br> _legalExtension: " . print_r($this->_legalExtensions);
    echo "</pre>";
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //==================================METHODES PRIVEES ================================//
  ///////////////////////////////////////////////////////////////////////////////////////
}

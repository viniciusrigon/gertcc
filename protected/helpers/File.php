<?php
class File
{
  public static function getUploadMaxFileSize()
  {
    $maxSize = ini_get('upload_max_filesize');
    $sizeInBytes = substr($maxSize, 0, -1);
    $unit = strtolower(substr($maxSize, -1));

    switch ($unit) {
      case 'k':
        $sizeText = number_format($sizeInBytes);
        $sizeInBytes *= 1024;
        $unitText = 'KB';
        break;
      case 'm':
        $sizeText = number_format($sizeInBytes);
        $sizeInBytes *= 1048576;
        $unitText = 'MB';
        break;
      case 'g':
        $sizeText = number_format($sizeInBytes);
        $sizeInBytes *= 1073741824;
        $unitText = 'GB';
        break;
      default:
        $sizeInBytes = $maxSize;
        $sizeText = number_format($sizeInBytes);
        $unitText = 'B';
    }
    return array('bytes'=>$sizeInBytes, 'text'=>$sizeText.' '.$unitText);
  }

  /*
   * Este método cria todos os diretórios faltantes em $path
   *
   * @param string $path Caminho
   * @return string Caminho completo criado
   */
  public static function criaDiretorios($path)
  {

  }
}
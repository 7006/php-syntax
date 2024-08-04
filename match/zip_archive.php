<?php

function main($resultCode) {
  $errMsg = match ($resultCode) {
      ZipArchive::ER_EXISTS => 'File already exists.',
      ZipArchive::ER_INCONS => 'FZip archive inconsistent.',
      ZipArchive::ER_INVAL => 'Invalid argument.',
      ZipArchive::ER_MEMORY => 'Malloc failure.',
      ZipArchive::ER_NOENT => 'Invalid argument.',
      ZipArchive::ER_NOZIP => 'Not a zip archive.',
      ZipArchive::ER_OPEN => 'Can\'t open file.',
      ZipArchive::ER_READ => 'Read error.',
      ZipArchive::ER_SEEK => 'Seek error.',
      default => 'Unknown error.'
  };

  throw new \RuntimeException($errMsg);
}

main(resultCode: ZipArchive::ER_INCONS);

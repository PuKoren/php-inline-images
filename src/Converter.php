<?php
namespace InlineImages;

class Converter {
    private $path;
    function __construct($path) {
        $this->path = $path;
    }

    function convert() {
        $fetcher = new Fetcher($this->path);
        $mime = $fetcher->getMimeType();
        if (strpos($mime, 'svg') !== false) {
            return 'data:'.$mime.';'.trim($fetcher->getFileData(), " \t\n\r\0\x0B");
        } else {
            //data:image/png;base64
            return 'data:'.$mime.';base64,'.base64_encode($fetcher->getFileData());
        }
    }

    function getPath() {
      return $this->path;
    }
}

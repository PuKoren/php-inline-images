<?php
namespace InlineImages;

class Fetcher {
    private $path;
    private $data = NULL;
    private $mime = NULL;

    function __construct($path) {
        $this->path = $path;

        if (filter_var($this->path, FILTER_VALIDATE_URL)) {
          //if file path is an URL, we want to download it
            $this->fetchRemote();
        } else if (file_exists($this->path)) {
          //if file is stored locally, we directly uses it
            $this->fetchLocal();
        } else {
            throw new \Exception('Invalid Path/URL provided', 1);
        }
    }

    private function fetchRemote() {
        $ch = curl_init($this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $this->data = curl_exec($ch);
        $this->mime = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        curl_close($ch);
    }

    private function fetchLocal() {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $this->mime = finfo_file($finfo, $this->path);
        finfo_close($finfo);
        $this->data = file_get_contents($this->path, FILE_USE_INCLUDE_PATH);
    }

    function getMimeType() {
        return $this->mime;
    }

    function getFileData() {
        return $this->data;
    }
}

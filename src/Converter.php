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
            $content = explode(PHP_EOL, $fetcher->getFileData());
            $output = array();

            foreach($content as $line) {
                if (strpos($line, '<?') === false && strpos($line, '<!') === false) {
                    $output[] = str_replace('"', '\'', $line);
                }
            }

            return 'data:'.$mime.';utf-8,'.implode('', $output);
        } else {
            //data:image/png;base64
            return 'data:'.$mime.';base64,'.base64_encode($fetcher->getFileData());
        }
    }

    function getPath() {
      return $this->path;
    }
}

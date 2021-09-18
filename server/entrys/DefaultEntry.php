<?php

namespace server\entrys;

use \server\RestEntry;

/**
 * Description of DefaultEntry
 *
 * @author sascha
 */
class DefaultEntry extends RestEntry {

    private function getEntrys($path = ""): array {
        $dir = dir(__DIR__ . "/" . $path);
        $rc = [];
        while ($file = $dir->read()) {
            if ($file[0] === '.' || in_array($file, ["DefaultEntry.php", "Error404Entry.php"])) {
                continue;
            }
            if (is_dir(__DIR__.$path."/".$file)) {
                $rc = array_merge($rc, $this->getEntrys($path . "/" . $file));
            } else {
                if (endsWith($file, "Entry.php")) {
                    $rc[] = $path."/".substr($file, 0, -9);
                }
            }
        }
        return $rc;
    }

    protected function onGet(): array {
        return [
            "ENTRYS" => $this->getEntrys()
        ];
    }

}

<?php

namespace AC\Transcoding\Tests\Mock;

use AC\Transcoding\Adapter;
use AC\Transcoding\Preset;
use AC\Transcoding\File;

class DummyAdapter extends Adapter
{
    protected $key = "test_adapter";
    protected $name = "Test Adapter";
    protected $description = "Test description.";

    public function transcodeFile(File $file, Preset $preset, $outFilePath)
    {
        if (!copy($file->getRealPath(), $outFilePath)) {
            throw new \RuntimeException("Could not copy.");
        }

        return new File($outFilePath);
    }
}

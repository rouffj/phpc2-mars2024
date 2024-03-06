<?php

namespace App;

class ObjectProxy {
    private $object;
    private $cache = [];

    public function __construct($object) {
        $this->object = $object;
    }

    public function __call($method, $args) {
        // Generate a unique key for caching based on method name and arguments
        $cacheKey = $method . '_' . implode('_', $args);

        // If the result for this method with these arguments is already cached, return it
        if (array_key_exists($cacheKey, $this->cache)) {
            return $this->cache[$cacheKey];
        }

        // If not cached, call the method on the original object
        $result = call_user_func_array([$this->object, $method], $args);

        // Cache the result
        $this->cache[$cacheKey] = $result;

        return $result;
    }
}

class VideoEncoder
{
    public function encode($videoPath)
    {
        $message = "video ".$videoPath." encoding in progress...\n";
        sleep(3);
        $message .= "Video encoding finished.\n";

        return $message;
    }
}

$videoEncoder = new ObjectProxy(new VideoEncoder);
echo $videoEncoder->encode('/tmp/test.mp4');
echo $videoEncoder->encode('/tmp/test.mp4');
echo $videoEncoder->encode('/tmp/test.mp4');
echo $videoEncoder->encode('/tmp/test.mp4');
echo $videoEncoder->encode('/tmp/otherVideo.mp4');
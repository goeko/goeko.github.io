<?php
$srcDomain = "https://www.wsm-net.de";
$requestedPath = $_GET['path'];

$params = $_GET;
unset($params['path']);
$queryString = http_build_query($params);
if ($queryString) {
    $queryString = rtrim($queryString, '=');
    $requestedPath .= '?' . $queryString;
}

$cacheDirectory = "cache";

if (substr($requestedPath, -1) === '/') {
    $cachePath = $cacheDirectory . "/" . $requestedPath . "index.html";
} else {
    $cachePath = $cacheDirectory . "/" . $requestedPath;
}

$cacheDirPath = dirname($cachePath);
if (!is_dir($cacheDirPath)) {
    mkdir($cacheDirPath, 0755, true);
}

$srcFileHeaders = @get_headers($srcDomain . "/" . $requestedPath, 1);

$max_cache_time = 3600;

if (file_exists($cachePath) && (time() - filemtime($cachePath) <= $max_cache_time)) {
    if ($srcFileHeaders !== false && isset($srcFileHeaders['Content-Type'])) {
        header('Content-Type: ' . $srcFileHeaders['Content-Type']);
    } elseif (function_exists('mime_content_type')) {
        header('Content-Type: ' . mime_content_type($cachePath));
    }
    readfile($cachePath);
} else {
    $content = @file_get_contents($srcDomain . "/" . $requestedPath);
    if ($content !== false) {
        $content = preg_replace('/<base href="[^"]*"\s*\/?>/', '', $content);

        // Ersetzen Sie alle relativen Pfade durch den Pfad zum cache/ Verzeichnis
        $depth = substr_count($requestedPath, '/');
        $relativePath = str_repeat('../', $depth);
        $content = preg_replace_callback('/(href|src)="\/([^"?]+)(\?[^"]+)?"/', function($matches) use ($relativePath) {
            $pathWithoutCacheBreaker = $relativePath . $matches[2];
            $pathWithCacheBreaker = isset($matches[3]) ? $pathWithoutCacheBreaker . $matches[3] : $pathWithoutCacheBreaker;
            return $matches[1] . '="' . $pathWithCacheBreaker . '"';
        }, $content);

        file_put_contents($cachePath, $content);
        // Speichern Sie auch eine Kopie ohne Cache-Breaker
        $pathWithoutCacheBreaker = preg_replace('/\?.*$/', '', $cachePath);
        @file_put_contents($pathWithoutCacheBreaker, $content);

        if (isset($srcFileHeaders['Content-Type'])) {
            header('Content-Type: ' . $srcFileHeaders['Content-Type']);
        }
        echo $content;
        exit;
    }
}

if (file_exists($cachePath)) {
    if (function_exists('mime_content_type')) {
        header('Content-Type: ' . mime_content_type($cachePath));
    }
    readfile($cachePath);
    exit;
} else {
    echo "Es gibt keinen Cache für diese Anfrage.";
    exit;
}
?>
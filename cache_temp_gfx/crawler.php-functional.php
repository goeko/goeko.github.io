<?php
$srcDomain = "https://www.wsm-net.de";
$requestedPath = $_GET['path'];

// Entfernen Sie den path-Parameter aus $_GET, um die korrekte URL zu erstellen
$params = $_GET;
unset($params['path']);
$queryString = http_build_query($params);
if ($queryString) {
    // Entfernen Sie das zusätzliche '=' am Ende, wenn es vorhanden ist
    $queryString = rtrim($queryString, '=');
    $requestedPath .= '?' . $queryString;
}

// Definieren Sie den Pfad zum Cache-Verzeichnis
$cacheDirectory = "cache_php_functional";
$cacheFile = $cacheDirectory . "/" . md5($requestedPath);

// Überprüfen Sie, ob das Cache-Verzeichnis existiert. Wenn nicht, erstellen Sie es.
if (!is_dir($cacheDirectory)) {
    mkdir($cacheDirectory, 0755, true);
}

$srcFileHeaders = get_headers($srcDomain . "/" . $requestedPath, 1);

$max_cache_time = 3600; // 1 Stunde

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) <= $max_cache_time)) {
    if (isset($srcFileHeaders['Content-Type'])) {
        header('Content-Type: ' . $srcFileHeaders['Content-Type']);
    }
    readfile($cacheFile);
} else {
    $content = file_get_contents($srcDomain . "/" . $requestedPath);
    $content = preg_replace('/<base href="[^"]*"\s*\/?>/', '', $content);
    file_put_contents($cacheFile, $content);
    if (isset($srcFileHeaders['Content-Type'])) {
        header('Content-Type: ' . $srcFileHeaders['Content-Type']);
    }
    echo $content;
}
?>
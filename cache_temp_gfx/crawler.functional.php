<?php
$srcDomain = "https://www.wsm-net.de";
$requestedPath = $_GET['path'];

// Definieren Sie den Pfad zum Cache-Verzeichnis
$cacheDirectory = "cache";
$cacheFile = $cacheDirectory . "/" . md5($requestedPath);

// Überprüfen Sie, ob das Cache-Verzeichnis existiert. Wenn nicht, erstellen Sie es.
if (!is_dir($cacheDirectory)) {
    mkdir($cacheDirectory, 0755, true);
}

$srcFileHeaders = get_headers($srcDomain . "/" . $requestedPath, 1);

// Überprüfen Sie, ob der "Last-Modified"-Header vorhanden ist
$srcFileLastModified = isset($srcFileHeaders['Last-Modified']) ? strtotime($srcFileHeaders['Last-Modified']) : 0;

$max_cache_time = 3600; // 1 Stunde

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) <= $max_cache_time)) {
    // Setzen Sie den Content-Type-Header basierend auf der gecachten Datei
    if (isset($srcFileHeaders['Content-Type'])) {
        header('Content-Type: ' . $srcFileHeaders['Content-Type']);
    }
    // Serve from cache
    readfile($cacheFile);
} else {
    // Fetch from src domain
    $content = file_get_contents($srcDomain . "/" . $requestedPath);

    // Entfernen oder ändern Sie das <base>-Tag
    $content = preg_replace('/<base href="[^"]*"\s*\/?>/', '', $content);

    // Speichern Sie den Inhalt im Cache
    file_put_contents($cacheFile, $content);

    // Setzen Sie den Content-Type-Header basierend auf der abgerufenen Datei
    if (isset($srcFileHeaders['Content-Type'])) {
        header('Content-Type: ' . $srcFileHeaders['Content-Type']);
    }
    echo $content;
}
?>
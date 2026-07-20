<?php
var_dump($_ENV['APP_BASE_PATH'] ?? 'TIDAK ADA');
var_dump($_SERVER['APP_BASE_PATH'] ?? 'TIDAK ADA');
echo "dirname test: " . dirname(__DIR__) . "\n";

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

echo "configPath(): '" . $app->configPath() . "'\n";
echo "basePath(): '" . $app->basePath() . "'\n";

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

try {
    $kernel->call('config:cache');
    echo "SUKSES, ga ada error.\n";
} catch (\Throwable $e) {
    echo "PESAN: " . $e->getMessage() . "\n\n";
    echo "FILE: " . $e->getFile() . " baris " . $e->getLine() . "\n\n";
    echo "TRACE:\n" . $e->getTraceAsString();
}

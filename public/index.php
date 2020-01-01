<?php



use Phramework\App\Kernel;
use Phramework\Core\Database\QueryBuilder;
use Phramework\Core\Model;

// require the composer autoload file
require __DIR__ . '/../vendor/autoload.php';
// require the bootstrap file
require __DIR__ . '/../config/bootstrap.php';
// require the helpers file
require __DIR__ . '/../config/helpers.php';

echo "This is Phramework. My side project in PHP";

echo "<br>";

$info = Model::fetch(['name', 'id']);

dd($info);
foreach ($info as $data) {
    echo "My name is {$data->name} and my password is {$data->password}. <br>";
}
echo "<br>";

$uri = $_SERVER['REQUEST_URI'];

echo trim(parse_url($uri, PHP_URL_PATH), '/');
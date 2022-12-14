<h1>Resultados de la imagen</h1>
<?php
require_once './vendor/autoload.php';
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Likelihood;
use Google\Cloud\Translate\V2\TranslateClient;
$count=0;
$translate = new TranslateClient([
    'key' => 'AIzaSyCqHFKVJAgIQEkmwCmCaJZjIk8nZZKPI_A'
]);
$imageAnnotator = new ImageAnnotatorClient(
    [
        'credentials' => 'key.json'
    ]
);
$path = "https://img.freepik.com/vector-gratis/conjunto-muebles-hogar_74855-15461.jpg?w=2000";
 $image = file_get_contents($path);
 //$image= fopen($_FILES['image']['tmp_name'],'r');
 $response = $imageAnnotator->objectLocalization($image);
 $objects = $response->getLocalizedObjectAnnotations();

 foreach ($objects as $object) {

     $name = $object->getName(); ?><br><br><hr> <?php
     $score = $object->getScore();
     $vertices = $object->getBoundingPoly()->getNormalizedVertices();
     echo $count++;
     $result = $translate->translate($name, [
        'target' => 'es'
    ]);
    echo $result['text'];
    
    
    
     print('normalized bounding polygon vertices: ');
     foreach ($vertices as $vertex) {
         printf(' (%f, %f)', $vertex->getX(), $vertex->getY());
     }
     print(PHP_EOL);} ?>
<?php

namespace Application\Controller;

use Sohoa\Framework\Kit;

class Main extends Kit {

    public function indexAction() {
        echo '<html><head><title>Example page</title></head></body><p>Bouya xD</p></body></html>';
    }

    public function sampleAction() { // Routed by /Main/Sample/ with generic route

        $this->data->sample = ': Gordon foobar';
        $this->greut->render(); // Go to hoa://Application/View/Main/Foo.tpl.php
    }

}

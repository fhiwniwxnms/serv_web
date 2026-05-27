<?php 

class TeaPickerController {
    public function index() {
        require_once __DIR__ . '/../../views/picker/index.php';
    }

    public function filter() {
        $criteria = [
            'mood' => $_POST['mood'],
            'flavor' => $_POST['flavor']
        ];
        $teaModel = new Tea();
        $teas = $teaModel->getAll();
        $results = [];
        foreach ($teas as $tea) {
            $teaObj = new Tea();
            $teaObj->setMood($tea['mood']);
            $teaObj->setFlavor($tea['flavor']);
            if ($teaObj->matchesCriteria($criteria)) {
                $results[] = $tea;
            }
        }
        require_once __DIR__ . '/../../views/picker/index.php';
    }
}
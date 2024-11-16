<?php
class Node{
    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkedList{
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function add($value)
    {
        $newNode = new Node($value);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function nodes_two_vowels()
    {
        $current = $this->head;
        $nodesList = [];
        $vowels = ["a", "e", "i", "o", "u"];

        while ($current !== null) {
            $count = 0;
            for ($i = 0; $i < strlen($current->value); $i++) {
                if (in_array($current->value[$i], $vowels)) {
                    $count++;
                }
            }

            if ($count === 2) {
                $nodesList[] = $current->value;
            }

            $current = $current->next;
        }
        return $nodesList;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = json_decode($_POST['values'], true);
    $list = new LinkedList();
    foreach ($values as $value) {
        $list->add($value);
    }
    echo json_encode(['nodes_with_two_vowels' => $list->nodes_two_vowels()]);
}

?>
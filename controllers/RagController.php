<?php
require_once __DIR__ . '/../models/Retriever.php';
require_once __DIR__ . '/../models/LLM.php';

class RAGController {
    private $retriever;
    private $llm;

    public function __construct() {
        $this->retriever = new Retriever();
        $this->llm = new LLM();
    }

    public function ask() {
        $question = "";
        $answer = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = trim($_POST['question']);
            
            // 1. Recuperación
            $results = $this->retriever->search($question);
            
            // 2. Construcción del contexto
            $context = "";
            foreach ($results as $r) {
                $context .= "Producto: " . $r['product_name'] . " (" . $r['price'] . "€)\n";
                $context .= "Descripción: " . $r['description'] . "\n\n";
            }

            // 3. Generación de respuesta (usando el generador interno)
            $answer = $this->llm->generate($question, $context);

            // 4. Renderizado (usando compact como el ejemplo del profesor)
            return $this->render('rag/answer', compact('question', 'answer'));
        }

        return $this->render('rag/ask');
    }

    protected function render(string $view, array $data = []) {
        extract($data);
        include __DIR__ . '/../views/' . $view . '.php';
    }
}
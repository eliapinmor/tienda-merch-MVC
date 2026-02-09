<?php

class LLM {
    public function generate(string $question, string $context): string {
        // Si no hay contexto, damos una respuesta por defecto
        if (empty(trim($context))) {
            return "Lo siento, no he encontrado información en nuestro catálogo sobre esa consulta.";
        }

        // Simulación pedagógica: devolvemos un texto procesado (los primeros 300 caracteres)
        // Tal como sugiere el enunciado del profesor.
        return "Según nuestro catálogo de productos, esto es lo que he encontrado:\n\n" . substr($context, 0, 500) . "...";
    }
}
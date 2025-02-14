<?php

namespace App\Controller;

use App\Entity\Data; // Assurez-vous que c'est l'entité du dossier api
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    
    #[Route('/chatbot', name: 'chatbot', methods: ['POST'])]
    public function chatbot(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $userMessage = $data['message'] ?? '';

            if (!$userMessage) {
                return new JsonResponse(['response' => 'Je n’ai pas compris.'], 400);
            }

            $ollamaResponse = $this->askOllama($userMessage);

            return new JsonResponse(['response' => $ollamaResponse], 200);
        } catch (\Exception $e) {
            error_log("Exception: " . $e->getMessage());
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    private function askOllama(string $message): string
    {
        $ollamaUrl = 'http://localhost:11434/api/generate';
        $postData = json_encode([
            'model' => 'deepseek-r1:7b',
            'prompt' => $message,
            'stream' => false
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ollamaUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return "Erreur de connexion à Ollama : " . curl_error($ch);
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        return $responseData['response'] ?? "Désolé, je n’ai pas de réponse.";
    }

}
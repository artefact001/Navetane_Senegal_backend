<?php

namespace App\Http\Controllers;

use App\Services\EquipeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EquipeController extends Controller
{
    private $equipeService;

    public function __construct(EquipeService $equipeService)
    {
        $this->equipeService = $equipeService;
    }

    /**
     * Afficher la liste de toutes les équipes.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $equipes = $this->equipeService->recupererToutesLesEquipes();
        return response()->json($equipes);
    }

    /**
     * Créer une nouvelle équipe.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'nullable|string|max:255',
            'date_creer' => 'required|date',
            'zone_id' => 'required|integer|exists:zones,id',
            'user_id' => 'nullable|integer|exists:users,id'
        ]);

        $equipe = $this->equipeService->creerEquipe($data);
        return response()->json($equipe, 201);
    }

    /**
     * Afficher une équipe spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $equipe = $this->equipeService->recupererEquipeParId($id);
        return response()->json($equipe);
    }

    /**
     * Mettre à jour une équipe existante.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'nom' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'date_creer' => 'nullable|date',
            'zone_id' => 'nullable|integer|exists:zones,id',
            'user_id' => 'nullable|integer|exists:users,id'
        ]);

        $equipe = $this->equipeService->recupererEquipeParId($id);
        $equipe = $this->equipeService->mettreAJourEquipe($equipe, $data);
        return response()->json($equipe);
    }

    /**
     * Supprimer une équipe.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $equipe = $this->equipeService->recupererEquipeParId($id);
        $this->equipeService->supprimerEquipe($equipe);
        return response()->json(['message' => 'Équipe supprimée avec succès.'], 204);
    }
}

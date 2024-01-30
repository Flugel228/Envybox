<?php

namespace App\Http\Controllers;

use App\Factories\SaverFactory;
use App\Http\Requests\Feedback\StoreRequest;
use Illuminate\Http\Request;

/**
 * @phpstan-type StoreData array{name: string, appeal: string}
 */
class FeedbackController extends Controller
{
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        /** @var StoreData $data */
        $data = $request->validated();

        try {
            $factory = new SaverFactory();
            $saver = $factory->build('database');
            $saver->save($data);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Data saved successfully ']);
    }
}

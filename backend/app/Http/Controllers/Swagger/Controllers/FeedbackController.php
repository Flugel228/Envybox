<?php

namespace App\Http\Controllers\Swagger\Controllers;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/feedback",
 *     summary="Форма обратной связи",
 *     tags={"Feedback"},
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="Name"),
 *                      @OA\Property(property="appeal", type="string", example="Some text"),
 *                  ),
 *              }
 *          )
 *     ),
 *
 *     @OA\Response(
 *          response="200",
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Data saved successfully "),
 *          )
 *     ),
 *
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Invalid object type"),
 *         )
 *     )
 * ),
 */
class FeedbackController extends Controller
{
}

<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="0.1.0"
 * ),
 *
 * @OA\PathItem(
 *     path="/api/"
 * )
 */
class MainController extends Controller
{
    //
}

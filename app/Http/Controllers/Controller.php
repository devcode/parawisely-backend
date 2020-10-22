<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function fail($message = null, $code = 500, $errors = [])
    {
        return response()->json([
            'status'        => 'fail',
            'status_code'   => $code,
            'message'       => $message ? $message : 'Internal Server Error',
            'errors'        => $errors
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     *
     * @param $data
     * @param array $meta
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function success($data, $code = 200)
    {
        return response()->json([
            'status'        => 'success',
            'status_code'   => $code,
            'message'       => JsonResponse::$statusTexts[$code] = 'OKE',
            'data'          => $data,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_OK);
    }

    /**
     *
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function badRequest($message, $code = 400)
    {
        return response()->json([
            'status'        => 'Bad Request',
            'status_code'   => $code,
            'message'       => $message ? $message : 'Bad Request'
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     *
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function notFound($message = 'Not Found', $code = 404)
    {
        return response()->json([
            'status'        => 'Not Found',
            'status_code'   => $code,
            'message'       => $message
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     *
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function forbidden($message, $code = 403)
    {
        return response()->json([
            'status'        => "Forbidden",
            'status_code'   => $code,
            'message'       => $message ? $message : 'Forbidden'
        ], isset(JsonResponse::$statusTexts[$code])  ? $code : JsonResponse::HTTP_FORBIDDEN);
    }

    /**
     *
     * @param string|null $message
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function unauthorized($message, $code = 401)
    {
        return response()->json([
            'status'        => 'Unauthorized',
            'status_code'   => $code,
            'message'       => $message ? $message : 'Unauthorized'
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_UNAUTHORIZED);
    }
}

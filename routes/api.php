 <?php

 use App\Http\Controllers\PostController;
 use App\Http\Controllers\PostLikeController;
 use App\Http\Controllers\PostCommentController;
 use App\Http\Controllers\UserImageController;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserPostController;
 use App\Http\Controllers\FriendRequestController;
 use App\Http\Controllers\FriendRequestResponseController;
 use Illuminate\Support\Facades\Storage;

    Route::middleware('auth:api')->group(function () {

        Route::get('auth-user', [\App\Http\Controllers\AuthUserController::class, 'show']);

        Route::apiResources([
            '/posts' => PostController::class,
            '/posts/{post}/like' => PostLikeController::class,
            '/posts/{post}/comment' => PostCommentController::class,
            '/users' => UserController::class,
            '/users/{user}/posts' => UserPostController::class,
            '/user-images' => UserImageController::class,
            '/friend-request' => FriendRequestController::class,
            '/friend-request-response' => FriendRequestResponseController::class,
        ]);
    });


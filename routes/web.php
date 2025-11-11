<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\DestinationSubmissionController as AdminDestinationSubmissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\DestinationController;
use App\Http\Controllers\User\DestinationSubmissionController;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
| Default Redirect
|--------------------------------------------------------------------------
|
| Saat user mengakses root URL (/), sistem akan langsung mengarahkan ke
| halaman login. Jika sudah login, Laravel akan otomatis melewati
| middleware 'guest' dan menampilkan halaman sesuai hak aksesnya.
|
*/
Route::get('/', function () {
    return redirect()->route('auth.login');
});

/*
|--------------------------------------------------------------------------
| Guest Routes (Belum Login)
|--------------------------------------------------------------------------
|
| Semua route di bawah hanya bisa diakses oleh user yang belum login.
|
*/
Route::middleware('guest')->group(function () {
    Route::name('auth.')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');

        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Sudah Login)
|--------------------------------------------------------------------------
|
| Semua route di sini hanya bisa diakses setelah user login.
|
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/tentang', function () {
    return view('user.about');
})->name('user.about');

// Destination Public Routes

Route::match(['get', 'post'], 'destinasi', [DestinationController::class, 'index'])
    ->name('user.destinations.index');

Route::resource('destinasi', DestinationController::class)
    ->only(['show'])
    ->parameters(['destinasi' => 'destination:slug'])
    ->names(['show' => 'user.destinations.show']);

// Like/Unlike Destination
Route::post('destinasi/{destination}/like', [DestinationController::class, 'like'])->name('user.destinations.like');

 // Destination Submission Routes
    Route::prefix('pengajuan-destinasi')->name('destination-submission.')->group(function () {
        Route::get('/', [DestinationSubmissionController::class, 'create'])->name('create');
        Route::post('/', [DestinationSubmissionController::class, 'store'])->name('store');
    });
// Profile Routes
    Route::prefix('profil')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::patch('/{user}', [ProfileController::class, 'update'])->name('update');
    });
/*
|--------------------------------------------------------------------------
| Admin Routes (Khusus Admin)
|--------------------------------------------------------------------------
|
| Menggunakan prefix 'admin' dan middleware 'auth.admin'.
| Pastikan middleware 'auth.admin' sudah terdaftar di Kernel.php.
|
*/
Route::middleware('auth.admin')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('pengguna', UserController::class)
        ->parameters(['pengguna' => 'user'])
        ->names('users');

    // Destination Management
    Route::resource('destinasi', AdminDestinationController::class)
        ->parameters(['destinasi' => 'destination'])
        ->names('destinations');

    // Delete Destination Image
    Route::delete('destinasi/{destination}/image/{image}', [AdminDestinationController::class, 'destroyImage'])
        ->name('destinations.image.destroy');

    // Category Management
    Route::resource('kategori', CategoryController::class)
        ->parameters(['kategori' => 'category'])
        ->names('categories');

    // Destination Submission Management
    Route::prefix('pengajuan-destinasi')->name('destination-submission.')->group(function () {
        Route::get('/', [AdminDestinationSubmissionController::class, 'index'])->name('index');
        Route::get('/{destinationSubmission}', [AdminDestinationSubmissionController::class, 'edit'])->name('edit');
        Route::delete('/{destinationSubmission}', [AdminDestinationSubmissionController::class, 'destroy'])->name('destroy');
        Route::post('/{destinationSubmission}/approve', [AdminDestinationSubmissionController::class, 'approve'])->name('approve');
        Route::post('/{destinationSubmission}/reject', [AdminDestinationSubmissionController::class, 'reject'])->name('reject');
    });
});

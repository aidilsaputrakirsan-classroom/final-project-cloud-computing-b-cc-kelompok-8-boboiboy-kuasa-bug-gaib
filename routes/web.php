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
use App\Http\Controllers\User\ItineraryController;

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
                                Route::patch('/rencana-perjalanan/{itinerary}', [ItineraryController::class, 'update'])->name('user.itinerary.update');
                            Route::delete('/rencana-perjalanan/destinasi/remove', function() {
                                // Implementasi hapus destinasi dari itinerary, bisa diganti dengan controller sesuai kebutuhan
                                return response()->json(['success' => true]);
                            })->name('user.itinerary.destination.remove');
                        Route::post('/rencana-perjalanan/destinasi/add', function() {
                            // Implementasi tambah destinasi ke itinerary, bisa diganti dengan controller sesuai kebutuhan
                            return response()->json(['success' => true]);
                        })->name('user.itinerary.destination.add');
                    Route::get('/rencana-perjalanan/destinasi/search-coordinates', function() {
                        // Implementasi pencarian destinasi berdasarkan koordinat, bisa diganti dengan controller sesuai kebutuhan
                        return response()->json([]);
                    })->name('user.itinerary.destination.search.coordinates');
                Route::get('/rencana-perjalanan/destinasi/search', function() {
                    // Implementasi pencarian destinasi, bisa diganti dengan controller sesuai kebutuhan
                    return response()->json([]);
                })->name('user.itinerary.destination.search.name');
            Route::get('/rencana-perjalanan/{itinerary}/edit', [ItineraryController::class, 'edit'])->name('user.itinerary.edit');
        Route::delete('/rencana-perjalanan/{itinerary}', [ItineraryController::class, 'destroy'])->name('user.itinerary.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/tentang', function () {
    return view('user.about');
})->name('user.about');

// Destination Public Routes
// Itinerary CRUD hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/rencana-perjalanan', [ItineraryController::class, 'index'])->name('user.itinerary.index');
    Route::get('/rencana-perjalanan/create', [ItineraryController::class, 'create'])->name('user.itinerary.create');
    Route::post('/rencana-perjalanan', [ItineraryController::class, 'store'])->name('user.itinerary.store');
    Route::get('/rencana-perjalanan/{itinerary}', [ItineraryController::class, 'show'])->name('user.itinerary.show');
    // Tambahkan route edit, update, show, destroy jika diperlukan
});

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

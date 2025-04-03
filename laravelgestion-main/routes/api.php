<?php
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ParentController;


Route::get('/utilisateurs', [UtilisateurController::class, 'index']);
Route::post('/utilisateurs', [UtilisateurController::class, 'store']);
Route::get('/utilisateurs/{id}', [UtilisateurController::class, 'show']);
Route::put('/utilisateurs/{id}', [UtilisateurController::class, 'update']);
Route::delete('/utilisateurs/{id}', [UtilisateurController::class, 'destroy']);


Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::post('/classrooms', [ClassroomController::class, 'store']);
Route::delete('/classrooms/{id}', [ClassroomController::class, 'destroy']);



Route::get('/etudiants', [StudentController::class, 'index']);  
Route::post('/etudiants', [StudentController::class, 'store']);  
Route::put('/etudiants/{id}', [StudentController::class, 'update']);
Route::delete('etudiants/{id}', [StudentController::class, 'destroy']);


// routes/api.php
Route::post('professeurs/{id}/calculer-salaire', [ProfesseurController::class, 'calculerSalaire']);
Route::get('/professeurs/{id}/update-total', [ProfesseurController::class, 'updateTotalForProfessor']);


Route::get('/calculer-salaire-professeur/{id}', [ProfesseurController::class, 'calculerSalaire']);
Route::get('/professeurs', [ProfesseurController::class, 'index']); // Récupérer tous les professeurs
Route::post('/professeurs', [ProfesseurController::class, 'store']); // Ajouter un professeur
Route::put('/professeurs/{id}', [ProfesseurController::class, 'update']); // Modifier un professeur
Route::delete('/professeurs/{id}', [ProfesseurController::class, 'destroy']); // Supprimer un professeur
// Gestion des présences
// Courses routes
Route::get('/courses', [CourseController::class, 'index']); // Lister tous les cours
Route::post('/courses', [CourseController::class, 'store']); // Créer un nouveau cours
Route::get('/courses/{course}', [CourseController::class, 'show']); // Afficher un cours spécifique
Route::put('/courses/{course}', [CourseController::class, 'update']); // Mettre à jour un cours
Route::delete('/courses/{course}', [CourseController::class, 'destroy']); // Supprimer un cours

// Communication
Route::get('/courses/{course}/students', [CourseController::class, 'getStudents']);
Route::get('/courses/{course}/parents', [CourseController::class, 'getParents']);
Route::post('/messages', [MessageController::class, 'sendBulkMessage']);

Route::get('/assignments', [AssignmentController::class, 'index']);
Route::post('/assignments', [AssignmentController::class, 'store']);
Route::get('/assignments/{assignment}/submissions', [AssignmentController::class, 'getSubmissions']);
Route::post('/assignments/{assignment}/submissions', [AssignmentController::class, 'submitGrade']);
Route::get('/filieres', [FiliereController::class, 'index']);
Route::post('/filieres', [FiliereController::class, 'store']);
Route::get('/filieres/{filiereId}/classes', [FiliereController::class, 'getClasses']);
Route::put('/filieres/{id}', [FiliereController::class, 'update']);
Route::delete('/filieres/{id}', [FiliereController::class, 'destroy']);
// Routes pour les classes
Route::get('/classes/{classeId}/students', [ClasseController::class, 'getStudents']);
Route::get('/classes/{classeId}/attendances', [ClasseController::class, 'getAttendances']);
Route::post('/classes/{classeId}/attendances', [ClasseController::class, 'manageAttendances']);
Route::get('/classes/{classe}/etudiants', [ClasseController::class, 'getEtudiants']);
// Wrong (if manageAttendances doesn't exist):
    Route::post('/classes/{classe}/attendances', [ClasseController::class, 'manageAttendances']);

    // Correct (use the existing method name):
    Route::post('/classes/{classe}/attendances', [ClasseController::class, 'storeAttendances']);
   
    Route::get('/etudiants/{etudiant_id}/parent-email', [ParentController::class, 'getParentEmail']);
Route::post('/send-message', [MessageController::class, 'send']);
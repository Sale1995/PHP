<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\MentorController;
use App\Controllers\StudentController;
use App\Controllers\SessionController;
use App\Controllers\FeedbackController;
use App\Controllers\TerminController;


// Osnovni router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/mentorska_platforma/public/login' && $method === 'GET') {
    (new AuthController)->showLoginForm();
} elseif ($uri === '/mentorska_platforma/public/login' && $method === 'POST') {
    (new AuthController)->login();
} elseif ($uri === '/mentorska_platforma/public/logout') {
    (new AuthController)->logout();
} elseif ($uri === '/mentorska_platforma/public/admin/dashboard') {
    (new AdminController)->dashboard();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori') {
    (new MentorController)->index();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori/create') {
    (new MentorController)->create();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori/store') {
    (new MentorController)->store();
} elseif ($uri === '/mentorska_platforma/public/admin/ucenici') {
    (new StudentController)->index();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori/edit') {
    (new MentorController)->edit();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori/update' && $method === 'POST') {
    (new MentorController)->update();
} elseif ($uri === '/mentorska_platforma/public/admin/mentori/delete') {
    (new MentorController)->delete();
} elseif ($uri === '/mentorska_platforma/public/admin/ucenici/create') {
    (new StudentController)->create();
} else if ($uri === '/mentorska_platforma/public/admin/ucenici/store' && $method === 'POST') {
    (new StudentController)->store();
} elseif ($uri === '/mentorska_platforma/public/admin/ucenici/edit') {
    (new StudentController)->edit();
} elseif ($uri === '/mentorska_platforma/public/admin/ucenici/update' && $method === 'POST') {
    (new StudentController)->update();
} elseif ($uri === '/mentorska_platforma/public/admin/ucenici/delete') {
    (new StudentController)->delete();
} elseif ($uri === '/mentorska_platforma/public/sessions/create') {
    (new SessionController)->create();
} elseif ($uri === '/mentorska_platforma/public/sessions/store' && $method === 'POST') {
    (new SessionController)->store();
} elseif ($uri === '/mentorska_platforma/public/sessions/success') {
    echo "Uspesno ste zakazali sesiju";
} elseif ($uri === '/mentorska_platforma/public/sessions/mentor') {
    (new SessionController)->pregled();
} elseif ($uri === '/mentorska_platforma/public/sessions/prihvati') {
    (new SessionController)->prihvati();
} elseif ($uri === '/mentorska_platforma/public/sessions/odbij') {
    (new SessionController)->odbij();
} elseif ($uri === '/mentorska_platforma/public/sessions/mentor/zakazane') {
    (new SessionController)->mentorZakazane();
} elseif ($uri === '/mentorska_platforma/public/sessions/ucenik/zakazane') {
    (new SessionController)->ucenikZakazane();
} elseif ($uri === '/mentorska_platforma/public/sessions/ucenik/ostale') {
    (new SessionController)->ucenikOstale();
} elseif ($uri === '/mentorska_platforma/public/sessions/mentor/odbijene') {
    (new SessionController)->mentorOdbijene();
} elseif ($uri === '/mentorska_platforma/public/feedback/create') {
    (new FeedbackController)->create();
} elseif ($uri === '/mentorska_platforma/public/feedback/store' && $method === 'POST') {
    (new FeedbackController)->store();
} elseif ($uri === '/mentorska_platforma/public/feedback/mentor') {
    (new FeedbackController)->mentorFeedback();
} elseif ($uri === '/mentorska_platforma/public/sessions/ucenik') {
    (new SessionController)->ucenikPrihvacene();
} elseif($uri === '/mentorska_platforma/public/sessions/plati') {
    (new SessionController)->plati();
} elseif($uri === '/mentorska_platforma/public/feedback/success') {
    require_once __DIR__ . '/../app/Views/feedback/success.php';
} elseif($uri === '/mentorska_platforma/public/admin/uplate') {
    (new AdminController)->uplate();
} elseif($uri === '/mentorska_platforma/public/admin/uplate/potvrdi') {
    (new AdminController)->potvrdiUplatu();
} elseif($uri === '/mentorska_platforma/public/admin/izvestaji') {
    (new AdminController)->izvestaji();
} elseif ($uri === '/mentorska_platforma/public/sessions/admin') {
    (new SessionController)->adminSesije();
} elseif ($uri === '/mentorska_platforma/public/ucenik/dashboard') {
    (new StudentController)->dashboard();
} elseif ($uri === '/mentorska_platforma/public/mentor/dashboard') {
    (new MentorController)->dashboard();
} elseif ($uri === '/mentorska_platforma/public/termini' && $method === 'GET') {
    (new TerminController)->index();
} elseif ($uri === '/mentorska_platforma/public/termini/create' && $method === 'GET') {
    (new \App\Controllers\TerminController)->create();
} elseif ($uri === '/mentorska_platforma/public/termini/store' && $method === 'POST') {
    (new \App\Controllers\TerminController)->store();
} elseif ($uri === '/mentorska_platforma/public/termini/delete' && $method === 'GET') {
    (new \App\Controllers\TerminController)->delete();
}
    else {
    echo "404 - Stranica nije pronađena.";
}

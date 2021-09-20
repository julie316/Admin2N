<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Page de connexion
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@Verification');
Route::post('logout','Auth\LoginController@logout')->name('logout');

//Auth::routes();
// Tableau de bord
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/message', 'HomeController@mail')->name('mail');

// Utilisateurs
Route::get('/utilisateur', 'ActeurController@index')->name('utilisateur');
Route::get('/utilisateur/create', 'ActeurController@create')->name('utilisateur.create');
Route::post('/utilisateur', 'ActeurController@store')->name('utilisateur.store');
Route::get('/utilisateur/profil/{user_id}', 'ActeurController@show_profile')->name('utilisateur.show_profile');
Route::get('/utilisateur/{user_id}/edit', 'ActeurController@edit')->name('utilisateur.edit');
Route::patch('/utilisateur/profil_id/{user_id}', 'ActeurController@updateProfile')->name('updateProfile');
Route::patch('/utilisateur/{user_id}', 'ActeurController@update')->name('utilisateur.update');
Route::delete('/utilisateur/{user_id}', 'ActeurController@destroy')->name('utilisateur.destroy');

// Rubriques
Route::get('/rubrique', 'RubriqueController@index')->name('rubrique');
Route::get('/rubrique/create', 'RubriqueController@create')->name('rubrique.create');
Route::post('/rubrique', 'RubriqueController@store')->name('rubrique.store');
Route::get('/rubrique/{rub_id}/edit', 'RubriqueController@edit')->name('rubrique.edit');
Route::patch('/rubrique/{rub_id}', 'RubriqueController@update')->name('rubrique.update');
Route::delete('/rubrique/{rub_id}', 'RubriqueController@destroy')->name('rubrique.destroy');

// Dossiers
Route::get('/dossier', 'DossierController@index')->name('dossier');
Route::get('/dossier/create', 'DossierController@create')->name('dossier.create');
Route::get('/dossier/show/{dos_id}', 'DossierController@show')->name('dossier.show');
Route::post('/dossier', 'DossierController@store')->name('dossier.store');
Route::get('/dossier/{dos_id}/edit', 'DossierController@edit')->name('dossier.edit');
Route::patch('/dossier/{dos_id}', 'DossierController@update')->name('dossier.update');
Route::delete('/dossier/{dos_id}', 'DossierController@destroy')->name('dossier.destroy');

// Techniciens
Route::get('/technicien', 'TechnicienController@index')->name('technicien');
Route::get('/technicien/create', 'TechnicienController@create')->name('technicien.create');
Route::get('/technicien/show_cni/{tech_id}', 'TechnicienController@show_cni')->name('technicien.show_cni');
Route::get('/technicien/show_contrat/{tech_id}', 'TechnicienController@show_contrat')->name('technicien.show_contrat');
Route::post('/technicien', 'TechnicienController@store')->name('technicien.store');
Route::get('/technicien/{tech_id}/edit', 'TechnicienController@edit')->name('technicien.edit');
Route::patch('/technicien/{tech_id}', 'TechnicienController@update')->name('technicien.update');
Route::delete('/technicien/{tech_id}', 'TechnicienController@destroy')->name('technicien.destroy');

// Paiements
Route::get('/paiement', 'PaiementController@index')->name('paiement');
Route::get('/paiement/create', 'PaiementController@create')->name('paiement.create');
Route::get('/paiement/show/{paie_id}', 'PaiementController@show')->name('paiement.show');
Route::get('/paiement/print/{paie_id}', 'PaiementController@printPdf')->name('paiement.pdf');
Route::post('/paiement', 'PaiementController@store')->name('paiement.store');
Route::post('/paiement/loadObjet','PaiementController@loadObjet')->name('paiement.loadObjet');// Charger les libellés dans la zone d'objet
Route::post('/paiement/loadMontant','PaiementController@loadMontant')->name('paiement.loadMontant'); // Charger le montant correspondant
Route::get('/paiement/{paie_id}/edit', 'PaiementController@edit')->name('paiement.edit');
Route::get('/paiement/{paie_id}/edit_avance', 'PaiementController@edit_Avance')->name('paiement.edit_avance'); //avance
Route::patch('/paiement/save_avance', 'PaiementController@save_Avance')->name('paiement.save'); //avance
Route::patch('/paiement/{paie_id}', 'PaiementController@update')->name('paiement.update');
Route::delete('/paiement/{paie_id}', 'PaiementController@destroy')->name('paiement.destroy');

// Véhicules
Route::get('/vehicule', 'VehiculeController@index')->name('vehicule');
Route::get('/vehicule/create', 'VehiculeController@create')->name('vehicule.create');
Route::get('/vehicule/show/{veh_id}', 'VehiculeController@show')->name('vehicule.show');
Route::post('/vehicule', 'VehiculeController@store')->name('vehicule.store');
Route::get('/vehicule/pdf', 'VehiculeController@ConvertPdf')->name('vehicule.pdf');
Route::get('/vehicule/{veh_id}/edit', 'VehiculeController@edit')->name('vehicule.edit');
Route::patch('/vehicule/{veh_id}', 'VehiculeController@update')->name('vehicule.update');
Route::delete('/vehicule/{veh_id}', 'VehiculeController@destroy')->name('vehicule.destroy');

// Propriétaires
Route::get('/proprietaire', 'ProprietaireController@index')->name('proprietaire');
Route::get('/proprietaire/create', 'ProprietaireController@create')->name('proprietaire.create');
Route::post('/proprietaire', 'ProprietaireController@store')->name('proprietaire.store');
Route::get('/proprietaire/{prop_id}/edit', 'ProprietaireController@edit')->name('proprietaire.edit');
Route::patch('/proprietaire/{prop_id}', 'ProprietaireController@update')->name('proprietaire.update');
Route::delete('/proprietaire/{prop_id}', 'ProprietaireController@destroy')->name('proprietaire.destroy');

// Vidanges
Route::get('/vidange', 'VidangeController@index')->name('vidange');
Route::get('/vidange/create', 'VidangeController@create')->name('vidange.create');
Route::post('/vidange', 'VidangeController@store')->name('vidange.store');
Route::get('/vidange/{vid_id}/edit', 'VidangeController@edit')->name('vidange.edit');
Route::patch('/vidange/{vid_id}', 'VidangeController@update')->name('vidange.update');
Route::delete('/vidange/{vid_id}', 'VidangeController@destroy')->name('vidange.destroy');

// Maintenances
Route::get('/maintenance', 'MaintenanceController@index')->name('maintenance');
Route::get('/maintenance/create', 'MaintenanceController@create')->name('maintenance.create');
Route::get('/maintenance/show/{maint_id}', 'MaintenanceController@show')->name('maintenance.show');
Route::post('/maintenance', 'MaintenanceController@store')->name('maintenance.store');
Route::get('/maintenance/{maint_id}/edit', 'MaintenanceController@edit')->name('maintenance.edit');
Route::patch('/maintenance/{maint_id}', 'MaintenanceController@update')->name('maintenance.update');
Route::delete('/maintenance/{maint_id}', 'MaintenanceController@destroy')->name('maintenance.destroy');


// Caisses
// Bilan
Route::get('/bilan-financier', 'BilanController@index')->name('bilan');
Route::get('/bilanLoad', 'BilanController@loadData')->name('bilan.table');
Route::get('/bilan-financier/print', 'BilanController@printData')->name('bilan.print');

// Entrées
Route::get('/entree-caisse', 'EntreeCaisseController@index')->name('entree_caisse');
Route::get('/entree-caisse/create', 'EntreeCaisseController@create')->name('entree_caisse.create');
Route::get('/entree-caisse/liste', 'EntreeCaisseController@liste')->name('entree_caisse.liste');
Route::post('/entree-caisse', 'EntreeCaisseController@store')->name('entree_caisse.store');
Route::get('/entree-caisse/{cent_id}/edit', 'EntreeCaisseController@edit')->name('entree_caisse.edit');
Route::patch('/entree-caisse/{cent_id}', 'EntreeCaisseController@update')->name('entree_caisse.update');
Route::delete('/entree-caisse/{cent_id}', 'EntreeCaisseController@destroy')->name('entree_caisse.destroy');

// Sorties
Route::get('/sortie-caisse', 'SortieCaisseController@index')->name('sortie_caisse');
Route::get('/sortie-caisse/create', 'SortieCaisseController@create')->name('sortie_caisse.create');
Route::get('/sortie-caisse/liste', 'SortieCaisseController@liste')->name('sortie_caisse.liste');
Route::post('/sortie-caisse', 'SortieCaisseController@store')->name('sortie_caisse.store');
Route::get('/sortie-caisse/{cort_id}/edit', 'SortieCaisseController@edit')->name('sortie_caisse.edit');
Route::patch('/sortie-caisse/{cort_id}', 'SortieCaisseController@update')->name('sortie_caisse.update');
Route::delete('/sortie-caisse/{cort_id}', 'SortieCaisseController@destroy')->name('sortie_caisse.destroy');
// fin caisse


//Stocks
// Entrées
Route::get('/entree-stock', 'EntreeStockController@index')->name('entree_stock');
Route::get('/entree-stock/create', 'EntreeStockController@create')->name('entree_stock.create');
Route::get('/entree-stock/pdf', 'EntreeStockController@printStock')->name('stock.pdf');
Route::post('/entree-stock', 'EntreeStockController@store')->name('entree_stock.store');
Route::get('/entree-stock/{sent_id}/add', 'EntreeStockController@addEntrance')->name('entree_stock.add');
Route::get('/entree-stock/{sent_id}/edit', 'EntreeStockController@edit')->name('entree_stock.edit');
Route::patch('/entree-stock/ajout/{sent_id}', 'EntreeStockController@updateEntrance')->name('entree_stock.updateEntrance');
Route::patch('/entree-stock/{sent_id}', 'EntreeStockController@update')->name('entree_stock.update');
Route::delete('/entree-stock/{sent_id}', 'EntreeStockController@destroy')->name('entree_stock.destroy');

// Sorties
Route::get('/sortie-stock', 'SortieStockController@index')->name('sortie_stock');
Route::get('/sortie-stock/create', 'SortieStockController@create')->name('sortie_stock.create');
Route::get('/sortie-stock/print', 'SortieStockController@printSortie')->name('printSortie');
Route::get('/sortie-stock/pdf', 'SortieStockController@sortiePdf')->name('sortiePdf');
Route::post('/sortie-stock', 'SortieStockController@store')->name('sortie_stock.store');
Route::get('/sortie-stock/{sort_id}/edit', 'SortieStockController@edit')->name('sortie_stock.edit');
Route::patch('/sortie-stock/{sort_id}', 'SortieStockController@update')->name('sortie_stock.update');
Route::delete('/sortie-stock/{sort_id}', 'SortieStockController@destroy')->name('sortie_stock.destroy');
// fin stock
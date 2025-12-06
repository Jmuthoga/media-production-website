<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Public\AboutUsController;
use App\Http\Controllers\Public\PhotographyController;
use App\Http\Controllers\Public\VideographyController;
use App\Http\Controllers\Public\AcademyController;
use App\Http\Controllers\Public\OthersController;
use App\Http\Controllers\Public\PackagesController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAboutUsController;
use App\Http\Controllers\Admin\AdminPhotographyController;
use App\Http\Controllers\Admin\AdminVideographyController;
use App\Http\Controllers\Admin\AdminAcademyController;
use App\Http\Controllers\Admin\AdminOthersController;
use App\Http\Controllers\Admin\AdminPackagesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LiveEventController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\SettingsController;


// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');

Route::prefix('aboutus')->group(function () {
    Route::get('our-story', [AboutUsController::class, 'ourStory'])->name('about.our-story');
    Route::get('our-brands', [AboutUsController::class, 'ourBrands'])->name('about.our-brands');
    Route::get('careers', [AboutUsController::class, 'careers'])->name('about.careers');
    Route::get('internships', [AboutUsController::class, 'internships'])->name('about.internships');
});

Route::prefix('photography')->group(function () {
    Route::get('portrait', [PhotographyController::class, 'portrait'])->name('photo.portrait');
    Route::get('family', [PhotographyController::class, 'family'])->name('photo.family');
    Route::get('studio', [PhotographyController::class, 'studio'])->name('photo.studio');
    Route::get('weddings', [PhotographyController::class, 'weddings'])->name('photo.weddings');
    Route::get('parties', [PhotographyController::class, 'parties'])->name('photo.parties');
    Route::get('graduation', [PhotographyController::class, 'graduation'])->name('photo.graduation');
    Route::get('corporate', [PhotographyController::class, 'corporate'])->name('photo.corporate');
    Route::get('school', [PhotographyController::class, 'school'])->name('photo.school');
    Route::get('product', [PhotographyController::class, 'product'])->name('photo.product');
    Route::get('outdoor', [PhotographyController::class, 'outdoor'])->name('photo.outdoor');
    Route::get('social', [PhotographyController::class, 'social'])->name('photo.social');
});

Route::prefix('videography')->group(function () {
    Route::get('weddings', [VideographyController::class, 'weddings'])->name('video.weddings');
    Route::get('parties', [VideographyController::class, 'parties'])->name('video.parties');
    Route::get('school', [VideographyController::class, 'school'])->name('video.school');
    Route::get('corporate', [VideographyController::class, 'corporate'])->name('video.corporate');
    Route::get('family', [VideographyController::class, 'family'])->name('video.family');
    Route::get('product', [VideographyController::class, 'product'])->name('video.product');
    Route::get('outdoor', [VideographyController::class, 'outdoor'])->name('video.outdoor');
    Route::get('social', [VideographyController::class, 'social'])->name('video.social');
    Route::get('tiktok', [VideographyController::class, 'tiktok'])->name('video.tiktok');
    Route::get('live', [VideographyController::class, 'live'])->name('video.live');
});

Route::prefix('academy')->group(function () {
    Route::get('photography', [AcademyController::class, 'photography'])->name('academy.photography');
    Route::get('certifications', [AcademyController::class, 'certifications'])->name('academy.certifications');
});

Route::prefix('others')->group(function () {
    Route::get('printing', [OthersController::class, 'printing'])->name('others.printing');
    Route::get('radio', [OthersController::class, 'radio'])->name('others.radio');
    Route::get('commercials', [OthersController::class, 'commercials'])->name('others.commercials');
    Route::get('hirecrew', [OthersController::class, 'hirecrew'])->name('others.hirecrew');
    Route::get('eventplanning', [OthersController::class, 'eventplanning'])->name('others.eventplanning');
    Route::get('photoediting', [OthersController::class, 'photoediting'])->name('others.photoediting');
    Route::get('equipment', [OthersController::class, 'equipment'])->name('others.equipment');
    Route::get('drone', [OthersController::class, 'drone'])->name('others.drone');
});

Route::prefix('packages')->group(function () {
    // Photography
    Route::get('lifestyle', [PackagesController::class, 'photographyLifestyle'])->name('packages.photography.lifestyle');
    Route::get('wedding', [PackagesController::class, 'photographyWedding'])->name('packages.photography.wedding');
    Route::get('family', [PackagesController::class, 'photographyFamily'])->name('packages.photography.family');
    Route::get('event', [PackagesController::class, 'videographyEvent'])->name('packages.videography.event');
    Route::get('cinematic', [PackagesController::class, 'videographyCinematic'])->name('packages.videography.cinematic');
    Route::get('corporate', [PackagesController::class, 'businessCorporate'])->name('packages.business.corporate');
    Route::get('premium', [PackagesController::class, 'businessPremium'])->name('packages.business.premium');
    Route::get('custom', [PackagesController::class, 'custom'])->name('packages.custom');
});


// Blog / Live / Contact
Route::get('blog', [PublicController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PublicController::class, 'blog'])->name('blog.show');
Route::get('contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/blog', [PublicController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [PublicController::class, 'blog'])->name('blog.show');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/live', [PublicController::class, 'live'])->name('live.index');
Route::get('/live/{slug}', [PublicController::class, 'live'])->name('live.show');

// Auth routes (scaffolded by php artisan ui)
Auth::routes();

// Admin routes (protected)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // === Our Story & Mission CRUD ===
    Route::get('admin/aboutus/story', [AdminAboutUsController::class, 'index'])->name('admin.aboutus.story.index');
    Route::get('admin/aboutus/story/create', [AdminAboutUsController::class, 'create'])->name('admin.aboutus.story.create');
    Route::post('admin/aboutus/story', [AdminAboutUsController::class, 'store'])->name('admin.aboutus.story.store');
    Route::get('admin/aboutus/story/{story}/edit', [AdminAboutUsController::class, 'edit'])->name('admin.aboutus.story.edit');
    Route::put('admin/aboutus/story/{story}', [AdminAboutUsController::class, 'update'])->name('admin.aboutus.story.update');
    Route::delete('admin/aboutus/story/{story}', [AdminAboutUsController::class, 'destroy'])->name('admin.aboutus.story.destroy');

    // === Hero Section Routes ===
    Route::get('admin/aboutus/story/hero', [AdminAboutUsController::class, 'heroForm'])->name('admin.aboutus.story.hero.form');
    Route::post('admin/aboutus/story/hero', [AdminAboutUsController::class, 'heroSave'])->name('admin.aboutus.story.hero.save');
    Route::delete('admin/aboutus/story/hero/delete', [AdminAboutUsController::class, 'heroDelete'])->name('admin.aboutus.story.hero.delete');

    // === Page Info Section Routes ===
    Route::get('admin/aboutus/story/page-info', [AdminAboutUsController::class, 'pageInfoForm'])->name('admin.aboutus.story.page_info.form');
    Route::post('admin/aboutus/story/page-info', [AdminAboutUsController::class, 'pageInfoSave'])->name('admin.aboutus.story.page_info.save');

    // === FAQ & Side Feature Section Routes ===
    Route::get('admin/aboutus/story/faq', [AdminAboutUsController::class, 'faqForm'])->name('admin.aboutus.story.faq.form');
    Route::post('admin/aboutus/story/faq', [AdminAboutUsController::class, 'faqSave'])->name('admin.aboutus.story.faq.save');

    // === Our Clients Section Routes ===
    Route::get('admin/aboutus/story/clients/create', [AdminAboutUsController::class, 'clientsCreate'])->name('admin.aboutus.story.clients.create');
    Route::post('admin/aboutus/story/clients', [AdminAboutUsController::class, 'clientsStore'])->name('admin.aboutus.story.clients.store');
    Route::get('admin/aboutus/story/clients/{client}/edit', [AdminAboutUsController::class, 'clientsEdit'])->name('admin.aboutus.story.clients.edit');
    Route::put('admin/aboutus/story/clients/{client}', [AdminAboutUsController::class, 'clientsUpdate'])->name('admin.aboutus.story.clients.update');
    Route::delete('admin/aboutus/story/clients/{client}', [AdminAboutUsController::class, 'clientsDestroy'])->name('admin.aboutus.story.clients.destroy');



    // Our Brands & Achievements
    Route::get('admin/aboutus/brands', [AdminAboutUsController::class, 'brandIndex'])->name('admin.aboutus.brands.index');
    Route::get('admin/aboutus/brands/create', [AdminAboutUsController::class, 'brandCreate'])->name('admin.aboutus.brands.create');
    Route::post('admin/aboutus/brands', [AdminAboutUsController::class, 'brandStore'])->name('admin.aboutus.brands.store');
    Route::get('admin/aboutus/brands/{item}/edit', [AdminAboutUsController::class, 'brandEdit'])->name('admin.aboutus.brands.edit');
    Route::put('admin/aboutus/brands/{item}', [AdminAboutUsController::class, 'brandUpdate'])->name('admin.aboutus.brands.update');
    Route::delete('admin/aboutus/brands/{item}', [AdminAboutUsController::class, 'brandDestroy'])->name('admin.aboutus.brands.destroy');

    // Careers & Opportunities
    Route::get('admin/aboutus/careers', [AdminAboutUsController::class, 'careerIndex'])->name('admin.aboutus.careers.index');
    Route::get('admin/aboutus/careers/create', [AdminAboutUsController::class, 'careerCreate'])->name('admin.aboutus.careers.create');
    Route::post('admin/aboutus/careers', [AdminAboutUsController::class, 'careerStore'])->name('admin.aboutus.careers.store');
    Route::get('admin/aboutus/careers/{item}/edit', [AdminAboutUsController::class, 'careerEdit'])->name('admin.aboutus.careers.edit');
    Route::put('admin/aboutus/careers/{item}', [AdminAboutUsController::class, 'careerUpdate'])->name('admin.aboutus.careers.update');
    Route::delete('admin/aboutus/careers/{item}', [AdminAboutUsController::class, 'careerDestroy'])->name('admin.aboutus.careers.destroy');

    // === 1. PORTRAIT PHOTOGRAPHY ===
    Route::get('admin/photography/portrait', [AdminPhotographyController::class, 'portraitIndex'])->name('admin.photography.portrait.index');
    Route::get('admin/photography/portrait/create', [AdminPhotographyController::class, 'portraitCreate'])->name('admin.photography.portrait.create');
    Route::post('admin/photography/portrait', [AdminPhotographyController::class, 'portraitStore'])->name('admin.photography.portrait.store');
    Route::get('admin/photography/portrait/{portrait}/edit', [AdminPhotographyController::class, 'portraitEdit'])->name('admin.photography.portrait.edit');
    Route::put('admin/photography/portrait/{portrait}', [AdminPhotographyController::class, 'portraitUpdate'])->name('admin.photography.portrait.update');
    Route::delete('admin/photography/portrait/{portrait}', [AdminPhotographyController::class, 'portraitDestroy'])->name('admin.photography.portrait.destroy');

    // === PORTRAIT GALLERY MANAGEMENT ===
    Route::get('admin/photography/portrait/{portrait}/gallery', [AdminPhotographyController::class, 'portraitGallery'])
        ->name('admin.photography.portrait.gallery');

    Route::post('admin/photography/portrait/{portrait}/gallery', [AdminPhotographyController::class, 'portraitGalleryStore'])
        ->name('admin.photography.portrait.gallery.store');

    Route::delete('admin/photography/portrait/{portrait}/gallery/{index}', [AdminPhotographyController::class, 'portraitGalleryDestroy'])
        ->name('admin.photography.portrait.gallery.destroy');


    // === 2. FAMILY PHOTOGRAPHY ===
    Route::get('admin/photography/family', [AdminPhotographyController::class, 'familyIndex'])->name('admin.photography.family.index');
    Route::get('admin/photography/family/create', [AdminPhotographyController::class, 'familyCreate'])->name('admin.photography.family.create');
    Route::post('admin/photography/family', [AdminPhotographyController::class, 'familyStore'])->name('admin.photography.family.store');
    Route::get('admin/photography/family/{family}/edit', [AdminPhotographyController::class, 'familyEdit'])->name('admin.photography.family.edit');
    Route::put('admin/photography/family/{family}', [AdminPhotographyController::class, 'familyUpdate'])->name('admin.photography.family.update');
    Route::delete('admin/photography/family/{family}', [AdminPhotographyController::class, 'familyDestroy'])->name('admin.photography.family.destroy');

    // === FAMILY GALLERY MANAGEMENT ===
    Route::get('admin/photography/family/{family}/gallery', [AdminPhotographyController::class, 'familyGallery'])
        ->name('admin.photography.family.gallery');

    Route::post('admin/photography/family/{family}/gallery', [AdminPhotographyController::class, 'familyGalleryStore'])
        ->name('admin.photography.family.gallery.store');

    Route::delete('admin/photography/family/{family}/gallery/{index}', [AdminPhotographyController::class, 'familyGalleryDestroy'])
        ->name('admin.photography.family.gallery.destroy');


    // === 3. STUDIO SESSION & HIRE ===
    Route::get('admin/photography/studio', [AdminPhotographyController::class, 'studioIndex'])->name('admin.photography.studio.index');
    Route::get('admin/photography/studio/create', [AdminPhotographyController::class, 'studioCreate'])->name('admin.photography.studio.create');
    Route::post('admin/photography/studio', [AdminPhotographyController::class, 'studioStore'])->name('admin.photography.studio.store');
    Route::get('admin/photography/studio/{studio}/edit', [AdminPhotographyController::class, 'studioEdit'])->name('admin.photography.studio.edit');
    Route::put('admin/photography/studio/{studio}', [AdminPhotographyController::class, 'studioUpdate'])->name('admin.photography.studio.update');
    Route::delete('admin/photography/studio/{studio}', [AdminPhotographyController::class, 'studioDestroy'])->name('admin.photography.studio.destroy');

    // === STUDIO GALLERY MANAGEMENT ===
    Route::get('admin/photography/studio/{studio}/gallery', [AdminPhotographyController::class, 'studioGallery'])
        ->name('admin.photography.studio.gallery');

    Route::post('admin/photography/studio/{studio}/gallery', [AdminPhotographyController::class, 'studioGalleryStore'])
        ->name('admin.photography.studio.gallery.store');

    Route::delete('admin/photography/studio/{studio}/gallery/{index}', [AdminPhotographyController::class, 'studioGalleryDestroy'])
        ->name('admin.photography.studio.gallery.destroy');


    // === 4. WEDDINGS & ENGAGEMENTS ===
    Route::get('admin/photography/weddings', [AdminPhotographyController::class, 'weddingsIndex'])->name('admin.photography.weddings.index');
    Route::get('admin/photography/weddings/create', [AdminPhotographyController::class, 'weddingsCreate'])->name('admin.photography.weddings.create');
    Route::post('admin/photography/weddings', [AdminPhotographyController::class, 'weddingsStore'])->name('admin.photography.weddings.store');
    Route::get('admin/photography/weddings/{wedding}/edit', [AdminPhotographyController::class, 'weddingsEdit'])->name('admin.photography.weddings.edit');
    Route::put('admin/photography/weddings/{wedding}', [AdminPhotographyController::class, 'weddingsUpdate'])->name('admin.photography.weddings.update');
    Route::delete('admin/photography/weddings/{wedding}', [AdminPhotographyController::class, 'weddingsDestroy'])->name('admin.photography.weddings.destroy');

    // === WEDDINGS GALLERY MANAGEMENT ===
    Route::get('admin/photography/weddings/{wedding}/gallery', [AdminPhotographyController::class, 'weddingsGallery'])
        ->name('admin.photography.weddings.gallery');

    Route::post('admin/photography/weddings/{wedding}/gallery', [AdminPhotographyController::class, 'weddingsGalleryStore'])
        ->name('admin.photography.weddings.gallery.store');

    Route::delete('admin/photography/weddings/{wedding}/gallery/{index}', [AdminPhotographyController::class, 'weddingsGalleryDestroy'])
        ->name('admin.photography.weddings.gallery.destroy');


    // === 5. PARTIES & CONCERTS ===
    Route::get('admin/photography/parties', [AdminPhotographyController::class, 'partiesIndex'])->name('admin.photography.parties.index');
    Route::get('admin/photography/parties/create', [AdminPhotographyController::class, 'partiesCreate'])->name('admin.photography.parties.create');
    Route::post('admin/photography/parties', [AdminPhotographyController::class, 'partiesStore'])->name('admin.photography.parties.store');
    Route::get('admin/photography/parties/{party}/edit', [AdminPhotographyController::class, 'partiesEdit'])->name('admin.photography.parties.edit');
    Route::put('admin/photography/parties/{party}', [AdminPhotographyController::class, 'partiesUpdate'])->name('admin.photography.parties.update');
    Route::delete('admin/photography/parties/{party}', [AdminPhotographyController::class, 'partiesDestroy'])->name('admin.photography.parties.destroy');

    // === PARTIES GALLERY MANAGEMENT ===
    Route::get('admin/photography/parties/{party}/gallery', [AdminPhotographyController::class, 'partiesGallery'])
        ->name('admin.photography.parties.gallery');

    Route::post('admin/photography/parties/{party}/gallery', [AdminPhotographyController::class, 'partiesGalleryStore'])
        ->name('admin.photography.parties.gallery.store');

    Route::delete('admin/photography/parties/{party}/gallery/{index}', [AdminPhotographyController::class, 'partiesGalleryDestroy'])
        ->name('admin.photography.parties.gallery.destroy');

    // === 6. GRADUATION PHOTOGRAPHY ===
    Route::get('admin/photography/graduation', [AdminPhotographyController::class, 'graduationIndex'])->name('admin.photography.graduation.index');
    Route::get('admin/photography/graduation/create', [AdminPhotographyController::class, 'graduationCreate'])->name('admin.photography.graduation.create');
    Route::post('admin/photography/graduation', [AdminPhotographyController::class, 'graduationStore'])->name('admin.photography.graduation.store');
    Route::get('admin/photography/graduation/{graduation}/edit', [AdminPhotographyController::class, 'graduationEdit'])->name('admin.photography.graduation.edit');
    Route::put('admin/photography/graduation/{graduation}', [AdminPhotographyController::class, 'graduationUpdate'])->name('admin.photography.graduation.update');
    Route::delete('admin/photography/graduation/{graduation}', [AdminPhotographyController::class, 'graduationDestroy'])->name('admin.photography.graduation.destroy');

    // === GRADUATION GALLERY MANAGEMENT ===
    Route::get('admin/photography/graduation/{graduation}/gallery', [AdminPhotographyController::class, 'graduationGallery'])
        ->name('admin.photography.graduation.gallery');

    Route::post('admin/photography/graduation/{graduation}/gallery', [AdminPhotographyController::class, 'graduationGalleryStore'])
        ->name('admin.photography.graduation.gallery.store');

    Route::delete('admin/photography/graduation/{graduation}/gallery/{index}', [AdminPhotographyController::class, 'graduationGalleryDestroy'])
        ->name('admin.photography.graduation.gallery.destroy');


    // === 7. CORPORATE & EVENT COVERAGE ===
    Route::get('admin/photography/corporate', [AdminPhotographyController::class, 'corporateIndex'])->name('admin.photography.corporate.index');
    Route::get('admin/photography/corporate/create', [AdminPhotographyController::class, 'corporateCreate'])->name('admin.photography.corporate.create');
    Route::post('admin/photography/corporate', [AdminPhotographyController::class, 'corporateStore'])->name('admin.photography.corporate.store');
    Route::get('admin/photography/corporate/{corporate}/edit', [AdminPhotographyController::class, 'corporateEdit'])->name('admin.photography.corporate.edit');
    Route::put('admin/photography/corporate/{corporate}', [AdminPhotographyController::class, 'corporateUpdate'])->name('admin.photography.corporate.update');
    Route::delete('admin/photography/corporate/{corporate}', [AdminPhotographyController::class, 'corporateDestroy'])->name('admin.photography.corporate.destroy');


    // === 8. SCHOOL & INSTITUTION PHOTOGRAPHY ===
    Route::get('admin/photography/school', [AdminPhotographyController::class, 'schoolIndex'])->name('admin.photography.school.index');
    Route::get('admin/photography/school/create', [AdminPhotographyController::class, 'schoolCreate'])->name('admin.photography.school.create');
    Route::post('admin/photography/school', [AdminPhotographyController::class, 'schoolStore'])->name('admin.photography.school.store');
    Route::get('admin/photography/school/{school}/edit', [AdminPhotographyController::class, 'schoolEdit'])->name('admin.photography.school.edit');
    Route::put('admin/photography/school/{school}', [AdminPhotographyController::class, 'schoolUpdate'])->name('admin.photography.school.update');
    Route::delete('admin/photography/school/{school}', [AdminPhotographyController::class, 'schoolDestroy'])->name('admin.photography.school.destroy');


    // === 9. PRODUCT PHOTOGRAPHY ===
    Route::get('admin/photography/product', [AdminPhotographyController::class, 'productIndex'])->name('admin.photography.product.index');
    Route::get('admin/photography/product/create', [AdminPhotographyController::class, 'productCreate'])->name('admin.photography.product.create');
    Route::post('admin/photography/product', [AdminPhotographyController::class, 'productStore'])->name('admin.photography.product.store');
    Route::get('admin/photography/product/{product}/edit', [AdminPhotographyController::class, 'productEdit'])->name('admin.photography.product.edit');
    Route::put('admin/photography/product/{product}', [AdminPhotographyController::class, 'productUpdate'])->name('admin.photography.product.update');
    Route::delete('admin/photography/product/{product}', [AdminPhotographyController::class, 'productDestroy'])->name('admin.photography.product.destroy');


    // === 10. OUTDOOR & NATURE SHOOTS ===
    Route::get('admin/photography/outdoor', [AdminPhotographyController::class, 'outdoorIndex'])->name('admin.photography.outdoor.index');
    Route::get('admin/photography/outdoor/create', [AdminPhotographyController::class, 'outdoorCreate'])->name('admin.photography.outdoor.create');
    Route::post('admin/photography/outdoor', [AdminPhotographyController::class, 'outdoorStore'])->name('admin.photography.outdoor.store');
    Route::get('admin/photography/outdoor/{outdoor}/edit', [AdminPhotographyController::class, 'outdoorEdit'])->name('admin.photography.outdoor.edit');
    Route::put('admin/photography/outdoor/{outdoor}', [AdminPhotographyController::class, 'outdoorUpdate'])->name('admin.photography.outdoor.update');
    Route::delete('admin/photography/outdoor/{outdoor}', [AdminPhotographyController::class, 'outdoorDestroy'])->name('admin.photography.outdoor.destroy');


    // === 11. TIKTOK & SCHOOL MEDIA SHOOTS ===
    Route::get('admin/photography/tiktok', [AdminPhotographyController::class, 'tiktokIndex'])->name('admin.photography.tiktok.index');
    Route::get('admin/photography/tiktok/create', [AdminPhotographyController::class, 'tiktokCreate'])->name('admin.photography.tiktok.create');
    Route::post('admin/photography/tiktok', [AdminPhotographyController::class, 'tiktokStore'])->name('admin.photography.tiktok.store');
    Route::get('admin/photography/tiktok/{tiktok}/edit', [AdminPhotographyController::class, 'tiktokEdit'])->name('admin.photography.tiktok.edit');
    Route::put('admin/photography/tiktok/{tiktok}', [AdminPhotographyController::class, 'tiktokUpdate'])->name('admin.photography.tiktok.update');
    Route::delete('admin/photography/tiktok/{tiktok}', [AdminPhotographyController::class, 'tiktokDestroy'])->name('admin.photography.tiktok.destroy');


    // 1️⃣ Weddings & Engagements
    Route::get('/weddings-engagements', [AdminVideographyController::class, 'weddingsIndex'])->name('admin.videography.weddings.index');
    Route::get('/weddings-engagements/create', [AdminVideographyController::class, 'weddingsCreate'])->name('admin.videography.weddings.create');
    Route::post('/weddings-engagements', [AdminVideographyController::class, 'weddingsStore'])->name('admin.videography.weddings.store');
    Route::get('/weddings-engagements/{wedding}/edit', [AdminVideographyController::class, 'weddingsEdit'])->name('admin.videography.weddings.edit');
    Route::put('/weddings-engagements/{wedding}', [AdminVideographyController::class, 'weddingsUpdate'])->name('admin.videography.weddings.update');
    Route::delete('/weddings-engagements/{wedding}', [AdminVideographyController::class, 'weddingsDestroy'])->name('admin.videography.weddings.destroy');

    // 2️⃣ Parties & Concerts
    Route::get('/parties-concerts', [AdminVideographyController::class, 'partiesIndex'])->name('admin.videography.parties.index');
    Route::get('/parties-concerts/create', [AdminVideographyController::class, 'partiesCreate'])->name('admin.videography.parties.create');
    Route::post('/parties-concerts', [AdminVideographyController::class, 'partiesStore'])->name('admin.videography.parties.store');
    Route::get('/parties-concerts/{party}/edit', [AdminVideographyController::class, 'partiesEdit'])->name('admin.videography.parties.edit');
    Route::put('/parties-concerts/{party}', [AdminVideographyController::class, 'partiesUpdate'])->name('admin.videography.parties.update');
    Route::delete('/parties-concerts/{party}', [AdminVideographyController::class, 'partiesDestroy'])->name('admin.videography.parties.destroy');

    // 3️⃣ School & Graduation Events
    Route::get('/school-graduation', [AdminVideographyController::class, 'schoolIndex'])->name('admin.videography.school.index');
    Route::get('/school-graduation/create', [AdminVideographyController::class, 'schoolCreate'])->name('admin.videography.school.create');
    Route::post('/school-graduation', [AdminVideographyController::class, 'schoolStore'])->name('admin.videography.school.store');
    Route::get('/school-graduation/{school}/edit', [AdminVideographyController::class, 'schoolEdit'])->name('admin.videography.school.edit');
    Route::put('/school-graduation/{school}', [AdminVideographyController::class, 'schoolUpdate'])->name('admin.videography.school.update');
    Route::delete('/school-graduation/{school}', [AdminVideographyController::class, 'schoolDestroy'])->name('admin.videography.school.destroy');

    // 4️⃣ Corporate & Brand Events
    Route::get('/corporate-brand', [AdminVideographyController::class, 'corporateIndex'])->name('admin.videography.corporate.index');
    Route::get('/corporate-brand/create', [AdminVideographyController::class, 'corporateCreate'])->name('admin.videography.corporate.create');
    Route::post('/corporate-brand', [AdminVideographyController::class, 'corporateStore'])->name('admin.videography.corporate.store');
    Route::get('/corporate-brand/{corporate}/edit', [AdminVideographyController::class, 'corporateEdit'])->name('admin.videography.corporate.edit');
    Route::put('/corporate-brand/{corporate}', [AdminVideographyController::class, 'corporateUpdate'])->name('admin.videography.corporate.update');
    Route::delete('/corporate-brand/{corporate}', [AdminVideographyController::class, 'corporateDestroy'])->name('admin.videography.corporate.destroy');

    // 5️⃣ Family & Personal Videos
    Route::get('/family-personal', [AdminVideographyController::class, 'familyIndex'])->name('admin.videography.family.index');
    Route::get('/family-personal/create', [AdminVideographyController::class, 'familyCreate'])->name('admin.videography.family.create');
    Route::post('/family-personal', [AdminVideographyController::class, 'familyStore'])->name('admin.videography.family.store');
    Route::get('/family-personal/{family}/edit', [AdminVideographyController::class, 'familyEdit'])->name('admin.videography.family.edit');
    Route::put('/family-personal/{family}', [AdminVideographyController::class, 'familyUpdate'])->name('admin.videography.family.update');
    Route::delete('/family-personal/{family}', [AdminVideographyController::class, 'familyDestroy'])->name('admin.videography.family.destroy');

    // 6️⃣ Product Videography
    Route::get('/product-videography', [AdminVideographyController::class, 'productIndex'])->name('admin.videography.product.index');
    Route::get('/product-videography/create', [AdminVideographyController::class, 'productCreate'])->name('admin.videography.product.create');
    Route::post('/product-videography', [AdminVideographyController::class, 'productStore'])->name('admin.videography.product.store');
    Route::get('/product-videography/{product}/edit', [AdminVideographyController::class, 'productEdit'])->name('admin.videography.product.edit');
    Route::put('/product-videography/{product}', [AdminVideographyController::class, 'productUpdate'])->name('admin.videography.product.update');
    Route::delete('/product-videography/{product}', [AdminVideographyController::class, 'productDestroy'])->name('admin.videography.product.destroy');

    // 7️⃣ Outdoor & Lifestyle Shoots
    Route::get('/outdoor-lifestyle', [AdminVideographyController::class, 'outdoorIndex'])->name('admin.videography.outdoor.index');
    Route::get('/outdoor-lifestyle/create', [AdminVideographyController::class, 'outdoorCreate'])->name('admin.videography.outdoor.create');
    Route::post('/outdoor-lifestyle', [AdminVideographyController::class, 'outdoorStore'])->name('admin.videography.outdoor.store');
    Route::get('/outdoor-lifestyle/{outdoor}/edit', [AdminVideographyController::class, 'outdoorEdit'])->name('admin.videography.outdoor.edit');
    Route::put('/outdoor-lifestyle/{outdoor}', [AdminVideographyController::class, 'outdoorUpdate'])->name('admin.videography.outdoor.update');
    Route::delete('/outdoor-lifestyle/{outdoor}', [AdminVideographyController::class, 'outdoorDestroy'])->name('admin.videography.outdoor.destroy');

    // 8️⃣ Tiktok & Social Media Videos
    Route::get('/tiktok-social', [AdminVideographyController::class, 'tiktokIndex'])->name('admin.videography.tiktok.index');
    Route::get('/tiktok-social/create', [AdminVideographyController::class, 'tiktokCreate'])->name('admin.videography.tiktok.create');
    Route::post('/tiktok-social', [AdminVideographyController::class, 'tiktokStore'])->name('admin.videography.tiktok.store');
    Route::get('/tiktok-social/{tiktok}/edit', [AdminVideographyController::class, 'tiktokEdit'])->name('admin.videography.tiktok.edit');
    Route::put('/tiktok-social/{tiktok}', [AdminVideographyController::class, 'tiktokUpdate'])->name('admin.videography.tiktok.update');
    Route::delete('/tiktok-social/{tiktok}', [AdminVideographyController::class, 'tiktokDestroy'])->name('admin.videography.tiktok.destroy');

    // 9️⃣ Liveshows & Streaming
    Route::get('/liveshows-streaming', [AdminVideographyController::class, 'liveshowsIndex'])->name('admin.videography.liveshows.index');
    Route::get('/liveshows-streaming/create', [AdminVideographyController::class, 'liveshowsCreate'])->name('admin.videography.liveshows.create');
    Route::post('/liveshows-streaming', [AdminVideographyController::class, 'liveshowsStore'])->name('admin.videography.liveshows.store');
    Route::get('/liveshows-streaming/{live}/edit', [AdminVideographyController::class, 'liveshowsEdit'])->name('admin.videography.liveshows.edit');
    Route::put('/liveshows-streaming/{live}', [AdminVideographyController::class, 'liveshowsUpdate'])->name('admin.videography.liveshows.update');
    Route::delete('/liveshows-streaming/{live}', [AdminVideographyController::class, 'liveshowsDestroy'])->name('admin.videography.liveshows.destroy');

    // Photography
    Route::get('/photography', [AdminAcademyController::class, 'photographyIndex'])->name('photography.index');
    Route::get('/photography/create', [AdminAcademyController::class, 'photographyCreate'])->name('photography.create');
    Route::post('/photography', [AdminAcademyController::class, 'photographyStore'])->name('photography.store');
    Route::get('/photography/{photography}/edit', [AdminAcademyController::class, 'photographyEdit'])->name('photography.edit');
    Route::put('/photography/{photography}', [AdminAcademyController::class, 'photographyUpdate'])->name('photography.update');
    Route::delete('/photography/{photography}', [AdminAcademyController::class, 'photographyDestroy'])->name('photography.destroy');

    // Certifications
    Route::get('/certifications', [AdminAcademyController::class, 'certificationIndex'])->name('certifications.index');
    Route::get('/certifications/create', [AdminAcademyController::class, 'certificationCreate'])->name('certifications.create');
    Route::post('/certifications', [AdminAcademyController::class, 'certificationStore'])->name('certifications.store');
    Route::get('/certifications/{certification}/edit', [AdminAcademyController::class, 'certificationEdit'])->name('certifications.edit');
    Route::put('/certifications/{certification}', [AdminAcademyController::class, 'certificationUpdate'])->name('certifications.update');
    Route::delete('/certifications/{certification}', [AdminAcademyController::class, 'certificationDestroy'])->name('certifications.destroy');

    // Internships & Attachments
    Route::get('/internships', [AdminAcademyController::class, 'internshipIndex'])->name('internships.index');
    Route::get('/internships/create', [AdminAcademyController::class, 'internshipCreate'])->name('internships.create');
    Route::post('/internships', [AdminAcademyController::class, 'internshipStore'])->name('internships.store');
    Route::get('/internships/{internship}/edit', [AdminAcademyController::class, 'internshipEdit'])->name('internships.edit');
    Route::put('/internships/{internship}', [AdminAcademyController::class, 'internshipUpdate'])->name('internships.update');
    Route::delete('/internships/{internship}', [AdminAcademyController::class, 'internshipDestroy'])->name('internships.destroy');
    // Hero section (separate)
    Route::get('/internships/hero/edit', [AdminAcademyController::class, 'internshipHeroEdit'])->name('internships.hero.edit');
    Route::post('/internships/hero/update', [AdminAcademyController::class, 'internshipHeroUpdate'])->name('internships.hero.update');
    Route::get('admin/internships/hero', [AdminAcademyController::class, 'internshipHeroForm'])->name('internships.hero.form');
    Route::post('admin/internships/hero', [AdminAcademyController::class, 'internshipHeroSave'])->name('internships.hero.save');
    Route::delete('admin/internships/hero', [AdminAcademyController::class, 'internshipHeroDelete'])->name('internships.hero.delete');

    // Role-specific create/store/edit/update (pattern — repeat for stat/offer/requirement if desired)
    Route::get('/internships/roles/create', [AdminAcademyController::class, 'internshipRoleCreate'])->name('internships.roles.create');
    Route::post('/internships/roles', [AdminAcademyController::class, 'internshipRoleStore'])->name('internships.roles.store');
    Route::get('/internships/roles/{internship}/edit', [AdminAcademyController::class, 'internshipRoleEdit'])->name('internships.roles.edit');
    Route::put('/internships/roles/{internship}', [AdminAcademyController::class, 'internshipRoleUpdate'])->name('internships.roles.update');

    // Toggle role status
    Route::put('/internships/{internship}/toggle-status', [AdminAcademyController::class, 'internshipToggleStatus'])->name('internships.toggleStatus');

    // Page info (about1, about2, stats, youtube)
    Route::get('/internships/page-info', [AdminAcademyController::class, 'internshipPageInfoForm'])->name('internships.pageinfo.form');
    Route::post('/internships/page-info', [AdminAcademyController::class, 'internshipPageInfoSave'])->name('internships.pageinfo.save');




    // Printing & Branding
    Route::get('/printing', [AdminOthersController::class, 'printingIndex'])->name('printing.index');
    Route::get('/printing/create', [AdminOthersController::class, 'printingCreate'])->name('printing.create');
    Route::post('/printing', [AdminOthersController::class, 'printingStore'])->name('printing.store');
    Route::get('/printing/{printing}/edit', [AdminOthersController::class, 'printingEdit'])->name('printing.edit');
    Route::put('/printing/{printing}', [AdminOthersController::class, 'printingUpdate'])->name('printing.update');
    Route::delete('/printing/{printing}', [AdminOthersController::class, 'printingDestroy'])->name('printing.destroy');

    // Radio Hosting & Advertising
    Route::get('/radio', [AdminOthersController::class, 'radioIndex'])->name('radio.index');
    Route::get('/radio/create', [AdminOthersController::class, 'radioCreate'])->name('radio.create');
    Route::post('/radio', [AdminOthersController::class, 'radioStore'])->name('radio.store');
    Route::get('/radio/{radio}/edit', [AdminOthersController::class, 'radioEdit'])->name('radio.edit');
    Route::put('/radio/{radio}', [AdminOthersController::class, 'radioUpdate'])->name('radio.update');
    Route::delete('/radio/{radio}', [AdminOthersController::class, 'radioDestroy'])->name('radio.destroy');

    // Crew
    Route::get('/crew', [AdminOthersController::class, 'crewIndex'])->name('crew.index');
    Route::get('/crew/create', [AdminOthersController::class, 'crewCreate'])->name('crew.create');
    Route::post('/crew', [AdminOthersController::class, 'crewStore'])->name('crew.store');
    Route::get('/crew/{crew}/edit', [AdminOthersController::class, 'crewEdit'])->name('crew.edit');
    Route::put('/crew/{crew}', [AdminOthersController::class, 'crewUpdate'])->name('crew.update');
    Route::delete('/crew/{crew}', [AdminOthersController::class, 'crewDestroy'])->name('crew.destroy');

    // Event Planning
    Route::get('/event', [AdminOthersController::class, 'eventIndex'])->name('event.index');
    Route::get('/event/create', [AdminOthersController::class, 'eventCreate'])->name('event.create');
    Route::post('/event', [AdminOthersController::class, 'eventStore'])->name('event.store');
    Route::get('/event/{event}/edit', [AdminOthersController::class, 'eventEdit'])->name('event.edit');
    Route::put('/event/{event}', [AdminOthersController::class, 'eventUpdate'])->name('event.update');
    Route::delete('/event/{event}', [AdminOthersController::class, 'eventDestroy'])->name('event.destroy');

    // Photo Editing
    Route::get('/photo', [AdminOthersController::class, 'photoIndex'])->name('photo.index');
    Route::get('/photo/create', [AdminOthersController::class, 'photoCreate'])->name('photo.create');
    Route::post('/photo', [AdminOthersController::class, 'photoStore'])->name('photo.store');
    Route::get('/photo/{photo}/edit', [AdminOthersController::class, 'photoEdit'])->name('photo.edit');
    Route::put('/photo/{photo}', [AdminOthersController::class, 'photoUpdate'])->name('photo.update');
    Route::delete('/photo/{photo}', [AdminOthersController::class, 'photoDestroy'])->name('photo.destroy');

    // Drone Photography
    Route::get('/drone', [AdminOthersController::class, 'droneIndex'])->name('drone.index');
    Route::get('/drone/create', [AdminOthersController::class, 'droneCreate'])->name('drone.create');
    Route::post('/drone', [AdminOthersController::class, 'droneStore'])->name('drone.store');
    Route::get('/drone/{drone}/edit', [AdminOthersController::class, 'droneEdit'])->name('drone.edit');
    Route::put('/drone/{drone}', [AdminOthersController::class, 'droneUpdate'])->name('drone.update');
    Route::delete('/drone/{drone}', [AdminOthersController::class, 'droneDestroy'])->name('drone.destroy');

    /////////////////////// 1️⃣ Lifestyle & Portrait ///////////////////////
    Route::get('/lifestyle', [AdminPackagesController::class, 'lifestyleIndex'])->name('admin.packages.lifestyle.index');
    Route::get('/lifestyle/create', [AdminPackagesController::class, 'lifestyleCreate'])->name('admin.packages.lifestyle.create');
    Route::post('/lifestyle', [AdminPackagesController::class, 'lifestyleStore'])->name('admin.packages.lifestyle.store');
    Route::get('/lifestyle/{package}/edit', [AdminPackagesController::class, 'lifestyleEdit'])->name('admin.packages.lifestyle.edit');
    Route::put('/lifestyle/{package}', [AdminPackagesController::class, 'lifestyleUpdate'])->name('admin.packages.lifestyle.update');
    Route::delete('/lifestyle/{package}', [AdminPackagesController::class, 'lifestyleDestroy'])->name('admin.packages.lifestyle.destroy');

    /////////////////////// 2️⃣ Wedding & Engagement ///////////////////////
    Route::get('/wedding', [AdminPackagesController::class, 'weddingIndex'])->name('admin.packages.wedding.index');
    Route::get('/wedding/create', [AdminPackagesController::class, 'weddingCreate'])->name('admin.packages.wedding.create');
    Route::post('/wedding', [AdminPackagesController::class, 'weddingStore'])->name('admin.packages.wedding.store');
    Route::get('/wedding/{package}/edit', [AdminPackagesController::class, 'weddingEdit'])->name('admin.packages.wedding.edit');
    Route::put('/wedding/{package}', [AdminPackagesController::class, 'weddingUpdate'])->name('admin.packages.wedding.update');
    Route::delete('/wedding/{package}', [AdminPackagesController::class, 'weddingDestroy'])->name('admin.packages.wedding.destroy');

    /////////////////////// 3️⃣ Family & Group ///////////////////////
    Route::get('/family', [AdminPackagesController::class, 'familyIndex'])->name('admin.packages.family.index');
    Route::get('/family/create', [AdminPackagesController::class, 'familyCreate'])->name('admin.packages.family.create');
    Route::post('/family', [AdminPackagesController::class, 'familyStore'])->name('admin.packages.family.store');
    Route::get('/family/{package}/edit', [AdminPackagesController::class, 'familyEdit'])->name('admin.packages.family.edit');
    Route::put('/family/{package}', [AdminPackagesController::class, 'familyUpdate'])->name('admin.packages.family.update');
    Route::delete('/family/{package}', [AdminPackagesController::class, 'familyDestroy'])->name('admin.packages.family.destroy');

    /////////////////////// 4️⃣ Event & Ceremony Coverage ///////////////////////
    Route::get('/eventpcg', [AdminPackagesController::class, 'eventpcgIndex'])->name('admin.packages.event.index');
    Route::get('/eventpcg/create', [AdminPackagesController::class, 'eventpcgCreate'])->name('admin.packages.event.create');
    Route::post('/eventpcg', [AdminPackagesController::class, 'eventpcgStore'])->name('admin.packages.event.store');
    Route::get('/eventpcg/{package}/edit', [AdminPackagesController::class, 'eventpcgEdit'])->name('admin.packages.event.edit');
    Route::put('/eventpcg/{package}', [AdminPackagesController::class, 'eventpcgUpdate'])->name('admin.packages.event.update');
    Route::delete('/eventpgc/{package}', [AdminPackagesController::class, 'eventpcgDestroy'])->name('admin.packages.event.destroy');

    /////////////////////// 5️⃣ Cinematic Productions ///////////////////////
    Route::get('/cinematic', [AdminPackagesController::class, 'cinematicIndex'])->name('admin.packages.cinematic.index');
    Route::get('/cinematic/create', [AdminPackagesController::class, 'cinematicCreate'])->name('admin.packages.cinematic.create');
    Route::post('/cinematic', [AdminPackagesController::class, 'cinematicStore'])->name('admin.packages.cinematic.store');
    Route::get('/cinematic/{package}/edit', [AdminPackagesController::class, 'cinematicEdit'])->name('admin.packages.cinematic.edit');
    Route::put('/cinematic/{package}', [AdminPackagesController::class, 'cinematicUpdate'])->name('admin.packages.cinematic.update');
    Route::delete('/cinematic/{package}', [AdminPackagesController::class, 'cinematicDestroy'])->name('admin.packages.cinematic.destroy');

    /////////////////////// 6️⃣ Premium All-Inclusive ///////////////////////
    Route::get('/premium', [AdminPackagesController::class, 'premiumIndex'])->name('admin.packages.premium.index');
    Route::get('/premium/create', [AdminPackagesController::class, 'premiumCreate'])->name('admin.packages.premium.create');
    Route::post('/premium', [AdminPackagesController::class, 'premiumStore'])->name('admin.packages.premium.store');
    Route::get('/premium/{package}/edit', [AdminPackagesController::class, 'premiumEdit'])->name('admin.packages.premium.edit');
    Route::put('/premium/{package}', [AdminPackagesController::class, 'premiumUpdate'])->name('admin.packages.premium.update');
    Route::delete('/premium/{package}', [AdminPackagesController::class, 'premiumDestroy'])->name('admin.packages.premium.destroy');

    /////////////////////// 7️⃣ Corporate & Brand ///////////////////////
    Route::get('/corporate', [AdminPackagesController::class, 'corporateIndex'])->name('admin.packages.corporate.index');
    Route::get('/corporate/create', [AdminPackagesController::class, 'corporateCreate'])->name('admin.packages.corporate.create');
    Route::post('/corporate', [AdminPackagesController::class, 'corporateStore'])->name('admin.packages.corporate.store');
    Route::get('/corporate/{package}/edit', [AdminPackagesController::class, 'corporateEdit'])->name('admin.packages.corporate.edit');
    Route::put('/corporate/{package}', [AdminPackagesController::class, 'corporateUpdate'])->name('admin.packages.corporate.update');
    Route::delete('/corporate/{package}', [AdminPackagesController::class, 'corporateDestroy'])->name('admin.packages.corporate.destroy');


    // ======== CONTACT MESSAGES ========
    Route::get('contacts', [AdminContactController::class, 'messagesIndex'])->name('admin.contacts.index');
    Route::get('contacts/{id}', [AdminContactController::class, 'messagesShow'])->name('admin.contacts.show');
    Route::delete('contacts/{id}', [AdminContactController::class, 'messagesDestroy'])->name('admin.contacts.destroy');

    // ======== QUOTATIONS ========
    Route::get('quotations', [AdminContactController::class, 'quotationsIndex'])->name('admin.quotations.index');
    Route::get('quotations/create', [AdminContactController::class, 'quotationsCreate'])->name('admin.quotations.create');
    Route::post('quotations', [AdminContactController::class, 'quotationsStore'])->name('admin.quotations.store');
    Route::get('quotations/{id}', [AdminContactController::class, 'quotationsShow'])->name('admin.quotations.show');
    Route::get('quotations/{id}/edit', [AdminContactController::class, 'quotationsEdit'])->name('admin.quotations.edit');
    Route::put('quotations/{id}', [AdminContactController::class, 'quotationsUpdate'])->name('admin.quotations.update');
    Route::delete('quotations/{id}', [AdminContactController::class, 'quotationsDestroy'])->name('admin.quotations.destroy');

    // ===== HERO SECTION =====
    Route::get('settings/hero', [SettingsController::class, 'heroIndex'])->name('admin.settings.hero.index');
    Route::get('settings/hero/create', [SettingsController::class, 'heroCreate'])->name('admin.settings.hero.create');
    Route::post('settings/hero', [SettingsController::class, 'heroStore'])->name('admin.settings.hero.store');
    Route::get('settings/hero/{id}/edit', [SettingsController::class, 'heroEdit'])->name('admin.settings.hero.edit');
    Route::put('settings/hero/{id}', [SettingsController::class, 'heroUpdate'])->name('admin.settings.hero.update');
    Route::delete('settings/hero/{id}', [SettingsController::class, 'heroDestroy'])->name('admin.settings.hero.destroy');

    // ===== CONTACT INFORMATION =====
    Route::get('settings/contact', [SettingsController::class, 'contactIndex'])->name('admin.settings.contact.index');
    Route::get('settings/contact/create', [SettingsController::class, 'contactCreate'])->name('admin.settings.contact.create');
    Route::post('settings/contact', [SettingsController::class, 'contactStore'])->name('admin.settings.contact.store');
    Route::get('settings/contact/{id}/edit', [SettingsController::class, 'contactEdit'])->name('admin.settings.contact.edit');
    Route::put('settings/contact/{id}', [SettingsController::class, 'contactUpdate'])->name('admin.settings.contact.update');
    Route::delete('settings/contact/{id}', [SettingsController::class, 'contactDestroy'])->name('admin.settings.contact.destroy');

    // ===== SOCIAL MEDIA =====
    Route::get('settings/social', [SettingsController::class, 'socialIndex'])->name('admin.settings.social.index');
    Route::get('settings/social/create', [SettingsController::class, 'socialCreate'])->name('admin.settings.social.create');
    Route::post('settings/social', [SettingsController::class, 'socialStore'])->name('admin.settings.social.store');
    Route::get('settings/social/{id}/edit', [SettingsController::class, 'socialEdit'])->name('admin.settings.social.edit');
    Route::put('settings/social/{id}', [SettingsController::class, 'socialUpdate'])->name('admin.settings.social.update');
    Route::delete('settings/social/{id}', [SettingsController::class, 'socialDestroy'])->name('admin.settings.social.destroy');

    // ===== USER MANAGEMENT =====
    Route::get('settings/users', [SettingsController::class, 'userIndex'])->name('admin.settings.users.index');
    Route::get('settings/users/create', [SettingsController::class, 'userCreate'])->name('admin.settings.users.create');
    Route::post('settings/users', [SettingsController::class, 'userStore'])->name('admin.settings.users.store');
    Route::get('settings/users/{id}/edit', [SettingsController::class, 'userEdit'])->name('admin.settings.users.edit');
    Route::put('settings/users/{id}', [SettingsController::class, 'userUpdate'])->name('admin.settings.users.update');
    Route::delete('settings/users/{id}', [SettingsController::class, 'userDestroy'])->name('admin.settings.users.destroy');
});

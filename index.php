<?php
// ====================== index.php ======================
// Universal Lending PRO v1.0 — Professional Lending & Loan Services Landing Page
// FULL VERSION WITHOUT ANY CUTS | WhatsApp + Viber + Telegram + Floating Button + Contacts Bar
// Improved & Optimized for ThemeForest 2026 + Ruslan Bilohash
$json = json_decode(file_get_contents('content.json'), true);
$success = isset($_GET['success']) && $_GET['success'] == 1;
$error = isset($_GET['error']) && $_GET['error'] == 1
           ? ($json['order_form']['error_text'] ?? 'Something went wrong. Please try again.')
           : '';
// Clean phone for messengers
$clean_phone = preg_replace('/[^0-9]/', '', $json['general']['phone'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $json['custom_code']['head'] ?? '' ?>
    <title><?= htmlspecialchars($json['meta']['title'] ?? 'Fast Personal Loans & Credit') ?></title>
    <meta name="description" content="<?= htmlspecialchars($json['meta']['description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($json['meta']['keywords'] ?? '') ?>">
    <meta name="robots" content="<?= htmlspecialchars($json['meta']['robots'] ?? 'index, follow') ?>">
    <meta name="author" content="<?= htmlspecialchars($json['meta']['author'] ?? '') ?>">
    <meta name="theme-color" content="<?= htmlspecialchars($json['meta']['theme_color'] ?? '#10b981') ?>">
    <link rel="canonical" href="<?= htmlspecialchars($json['meta']['canonical'] ?? '') ?>">

    <!-- Open Graph + Twitter -->
    <meta property="og:title" content="<?= htmlspecialchars($json['og']['title'] ?? '') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($json['og']['description'] ?? '') ?>">
    <meta property="og:image" content="<?= htmlspecialchars($json['og']['image'] ?? '') ?>">
    <meta property="og:image:width" content="<?= htmlspecialchars($json['og']['image_width'] ?? '1200') ?>">
    <meta property="og:image:height" content="<?= htmlspecialchars($json['og']['image_height'] ?? '630') ?>">
    <meta property="og:url" content="<?= htmlspecialchars($json['og']['url'] ?? '') ?>">
    <meta property="og:type" content="<?= htmlspecialchars($json['og']['type'] ?? 'website') ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($json['og']['locale'] ?? 'en_US') ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($json['og']['site_name'] ?? '') ?>">
    <meta name="twitter:card" content="<?= htmlspecialchars($json['twitter']['card'] ?? 'summary_large_image') ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($json['twitter']['title'] ?? '') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($json['twitter']['description'] ?? '') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($json['twitter']['image'] ?? '') ?>">

    <!-- Tailwind + Fonts + Icons + AOS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- EXTERNAL STYLES -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preload" href="assets/css/styles.css" as="style">
    <?= $json['custom_code']['style'] ?? '' ?>
</head>
<body class="font-sans bg-gray-50 text-gray-900">

    <!-- PRELOADER -->
    <div id="preloader" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center">
        <div class="w-16 h-16 border-4 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <!-- HEADER -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-handshake text-4xl text-emerald-600"></i>
                <span class="text-3xl font-bold tracking-tight"><?= htmlspecialchars($json['header']['logo_text'] ?? 'Universal Lending') ?></span>
            </div>
            <nav class="hidden md:flex items-center gap-8 text-lg font-medium">
                <?php foreach($json['header']['nav_items'] as $nav): ?>
                    <a href="<?= htmlspecialchars($nav['anchor'] ?? '#') ?>" class="hover:text-emerald-600 transition"><?= htmlspecialchars($nav['text'] ?? '') ?></a>
                <?php endforeach; ?>
            </nav>
            <div class="flex items-center gap-6">
                <div class="relative group">
                    <button onclick="toggleLang()" class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-2xl transition">
                        <span class="flag">🇬🇧</span>
                        <span class="font-semibold">EN</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <div id="langDropdown" class="hidden group-hover:block absolute right-0 mt-3 bg-white shadow-2xl rounded-3xl py-4 w-52 z-50 border border-gray-100">
                        <a href="index.php" class="flex items-center gap-4 px-6 py-3 hover:bg-emerald-50 transition"><span class="flag">🇬🇧</span><span>English</span></a>
                        <a href="lt.php" class="flex items-center gap-4 px-6 py-3 hover:bg-emerald-50 transition"><span class="flag">🇱🇹</span><span>Lietuvių</span></a>
                        <a href="no.php" class="flex items-center gap-4 px-6 py-3 hover:bg-emerald-50 transition"><span class="flag">🇳🇴</span><span>Norsk</span></a>
                        <a href="ru.php" class="flex items-center gap-4 px-6 py-3 hover:bg-emerald-50 transition"><span class="flag">🇷🇺</span><span>Русский</span></a>
                        <a href="ua.php" class="flex items-center gap-4 px-6 py-3 hover:bg-emerald-50 transition"><span class="flag">🇺🇦</span><span>Українська</span></a>
                    </div>
                </div>
                <a href="tel:<?= htmlspecialchars($json['general']['phone'] ?? '') ?>"
                   class="hidden md:flex items-center gap-2 bg-emerald-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-emerald-700 transition">
                    <i class="fa-solid fa-phone"></i> Call Now
                </a>
                <button onclick="toggleMobileMenu()" class="md:hidden text-3xl"><i class="fa-solid fa-bars"></i></button>
            </div>
        </div>
    </header>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden md:hidden fixed inset-0 bg-white z-50 pt-20 px-6 overflow-y-auto">
        <div class="flex flex-col gap-6 text-2xl font-medium">
            <?php foreach($json['header']['nav_items'] as $nav): ?>
                <a href="<?= htmlspecialchars($nav['anchor'] ?? '#') ?>" onclick="toggleMobileMenu()" class="py-4 border-b"><?= htmlspecialchars($nav['text'] ?? '') ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- HERO -->
    <section class="hero-bg h-screen flex items-center text-white">
        <div class="max-w-7xl mx-auto px-6 text-center" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold leading-none mb-6 tracking-tighter"><?= htmlspecialchars($json['hero']['h1'] ?? '') ?></h1>
            <p class="text-2xl md:text-3xl mb-10 max-w-3xl mx-auto"><?= htmlspecialchars($json['hero']['p'] ?? '') ?></p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#apply" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xl font-semibold px-10 py-6 rounded-3xl inline-flex items-center gap-3 transition shadow-xl">
                    <i class="fa-solid fa-paper-plane"></i> <?= htmlspecialchars($json['hero']['button_order'] ?? 'Apply Now') ?>
                </a>
                <a href="tel:<?= htmlspecialchars($json['general']['phone'] ?? '') ?>"
                   class="border-2 border-white hover:bg-white hover:text-gray-900 text-white text-xl font-semibold px-10 py-6 rounded-3xl inline-flex items-center gap-3 transition">
                    <i class="fa-solid fa-phone"></i> <?= htmlspecialchars($json['hero']['button_phone'] ?? 'Call Us') ?>
                </a>
            </div>
            <div class="mt-16 text-sm uppercase tracking-widest"><?= htmlspecialchars($json['hero']['bottom_text'] ?? '') ?></div>
        </div>
    </section>

    <!-- LOAN TYPES -->
    <section id="loans" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-emerald-100 text-emerald-700 px-5 py-2 rounded-full text-sm font-semibold"><?= htmlspecialchars($json['services']['badge'] ?? '') ?></span>
                <h2 class="text-5xl font-bold mt-4"><?= htmlspecialchars($json['services']['h2'] ?? '') ?></h2>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-600"><?= htmlspecialchars($json['services']['p'] ?? '') ?></p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach($json['services']['items'] as $item): ?>
                <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden card-hover" data-aos="fade-up">
                    <div class="h-56 bg-[url('<?= htmlspecialchars($item['image'] ?? '') ?>')] bg-cover loan-img"></div>
                    <div class="p-8">
                        <h3 class="text-2xl font-semibold mb-3"><?= htmlspecialchars($item['title'] ?? '') ?></h3>
                        <p class="text-gray-600"><?= htmlspecialchars($item['text'] ?? '') ?></p>
                        <div class="mt-6 text-emerald-600 font-medium"><?= htmlspecialchars($item['footer'] ?? '') ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section id="benefits" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-emerald-100 text-emerald-700 px-5 py-2 rounded-full text-sm font-semibold"><?= htmlspecialchars($json['advantages']['badge'] ?? '') ?></span>
                <h2 class="text-5xl font-bold mt-4"><?= htmlspecialchars($json['advantages']['h2'] ?? '') ?></h2>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600"><?= htmlspecialchars($json['advantages']['p'] ?? '') ?></p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($json['advantages']['items'] as $adv): ?>
                <div class="bg-white p-8 rounded-3xl card-hover" data-aos="fade-up">
                    <div class="text-5xl mb-6"><?= $adv['emoji'] ?? '' ?></div>
                    <h3 class="text-2xl font-semibold mb-3"><?= htmlspecialchars($adv['title'] ?? '') ?></h3>
                    <p class="text-gray-600"><?= htmlspecialchars($adv['text'] ?? '') ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="process" class="py-24 bg-emerald-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-white px-6 py-2 rounded-full text-emerald-700 font-semibold"><?= htmlspecialchars($json['how']['badge'] ?? '') ?></span>
                <h2 class="text-5xl font-bold mt-4"><?= htmlspecialchars($json['how']['h2'] ?? '') ?></h2>
                <p class="mt-6 max-w-xl mx-auto text-gray-600"><?= htmlspecialchars($json['how']['p'] ?? '') ?></p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach($json['how']['steps'] as $step): ?>
                <div class="text-center" data-aos="fade-up">
                    <div class="w-20 h-20 mx-auto bg-emerald-600 text-white rounded-2xl flex items-center justify-center text-4xl mb-6"><?= $step['num'] ?? '' ?></div>
                    <h3 class="font-semibold text-xl"><?= htmlspecialchars($step['title'] ?? '') ?></h3>
                    <p class="mt-3 text-gray-600"><?= htmlspecialchars($step['text'] ?? '') ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section id="gallery" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="bg-emerald-100 text-emerald-700 px-5 py-2 rounded-full text-sm font-semibold"><?= htmlspecialchars($json['gallery']['badge'] ?? '') ?></span>
                <h2 class="text-5xl font-bold mt-4"><?= htmlspecialchars($json['gallery']['h2'] ?? '') ?></h2>
                <p class="mt-6 max-w-xl mx-auto text-gray-600"><?= htmlspecialchars($json['gallery']['p'] ?? '') ?></p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php foreach($json['gallery']['images'] as $img): ?>
                <img src="<?= htmlspecialchars($img['url'] ?? '') ?>" alt="<?= htmlspecialchars($img['alt'] ?? '') ?>" class="gallery-img rounded-3xl shadow-lg w-full h-full object-cover" data-aos="zoom-in">
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    <section id="reviews" class="py-24 bg-emerald-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-12" data-aos="fade-up">
                <div>
                    <span class="text-emerald-600 font-semibold"><?= htmlspecialchars($json['reviews']['badge'] ?? '') ?></span>
                    <h2 class="text-5xl font-bold"><?= htmlspecialchars($json['reviews']['h2'] ?? '') ?></h2>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach($json['reviews']['items'] as $rev): ?>
                <div class="bg-white border border-gray-100 p-8 rounded-3xl" data-aos="fade-up">
                    <div class="flex text-yellow-400 mb-4"><?= $rev['stars'] ?? '' ?></div>
                    <p class="italic">"<?= htmlspecialchars($rev['text'] ?? '') ?>"</p>
                    <div class="mt-8 flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full"></div>
                        <div>
                            <div class="font-semibold"><?= htmlspecialchars($rev['name'] ?? '') ?></div>
                            <div class="text-sm text-gray-500"><?= htmlspecialchars($rev['info'] ?? '') ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- SEO TEXT -->
    <section class="py-20 bg-white border-t border-b">
        <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-8"><?= htmlspecialchars($json['seo_text']['h2'] ?? '') ?></h2>
            <p class="text-lg text-gray-600 leading-relaxed mb-6"><?= htmlspecialchars($json['seo_text']['p1'] ?? '') ?></p>
            <p class="text-lg text-gray-600 leading-relaxed"><?= htmlspecialchars($json['seo_text']['p2'] ?? '') ?></p>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl font-bold"><?= htmlspecialchars($json['faq']['h2'] ?? '') ?></h2>
            </div>
            <div class="space-y-6">
                <?php foreach($json['faq']['items'] as $faq): ?>
                <details class="bg-gray-50 border border-gray-200 rounded-3xl p-8 group" data-aos="fade-up">
                    <summary class="font-semibold text-xl cursor-pointer flex justify-between items-center"><?= htmlspecialchars($faq['q'] ?? '') ?></summary>
                    <p class="mt-6 text-gray-600"><?= htmlspecialchars($faq['a'] ?? '') ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- LOAN APPLICATION FORM -->
    <section id="apply" class="py-24 bg-gradient-to-br from-emerald-700 to-teal-800 text-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-5xl font-bold"><?= htmlspecialchars($json['order_form']['h2'] ?? '') ?></h2>
                <p class="mt-4 text-xl opacity-90"><?= htmlspecialchars($json['order_form']['p'] ?? '') ?></p>
            </div>
            <?php if ($success): ?>
                <div class="bg-emerald-500 text-white p-8 rounded-3xl text-center mb-8" data-aos="fade-up">
                    <i class="fa-solid fa-circle-check text-6xl mb-4"></i>
                    <h3 class="text-3xl font-bold"><?= htmlspecialchars($json['order_form']['success_title'] ?? 'Thank You!') ?></h3>
                    <p class="mt-3"><?= htmlspecialchars($json['order_form']['success_text'] ?? 'We will contact you shortly.') ?></p>
                </div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="bg-red-600 text-white p-6 rounded-3xl text-center mb-8"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="POST" action="submit.php" class="grid md:grid-cols-2 gap-8">
                <div data-aos="fade-up">
                    <label class="block text-sm mb-2"><?= htmlspecialchars($json['order_form']['labels']['name'] ?? 'Full Name') ?></label>
                    <input type="text" name="name" required class="w-full px-6 py-5 rounded-3xl bg-white/10 border border-white/30 focus:border-white outline-none text-white placeholder-white/60">
                </div>
                <div data-aos="fade-up">
                    <label class="block text-sm mb-2"><?= htmlspecialchars($json['order_form']['labels']['phone'] ?? 'Phone Number') ?></label>
                    <input type="tel" name="phone" required class="w-full px-6 py-5 rounded-3xl bg-white/10 border border-white/30 focus:border-white outline-none text-white placeholder-white/60">
                </div>
                <div class="md:col-span-2" data-aos="fade-up">
                    <label class="block text-sm mb-2"><?= htmlspecialchars($json['order_form']['labels']['message'] ?? 'Loan Amount & Purpose') ?></label>
                    <textarea name="message" rows="5" class="w-full px-6 py-5 rounded-3xl bg-white/10 border border-white/30 focus:border-white outline-none text-white placeholder-white/60"></textarea>
                </div>
                <div class="md:col-span-2 text-center" data-aos="fade-up">
                    <button type="submit" class="bg-white text-emerald-700 hover:bg-emerald-100 font-bold text-xl px-16 py-7 rounded-3xl inline-flex items-center gap-4 transition shadow-2xl">
                        <i class="fa-solid fa-paper-plane"></i> SEND APPLICATION
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- CONTACTS BAR -->
    <div class="bg-white py-8 border-t border-b">
        <div class="max-w-7xl mx-auto px-6 flex flex-wrap justify-center gap-x-10 gap-y-6 text-lg font-medium">
            <a href="tel:<?= htmlspecialchars($json['general']['phone'] ?? '') ?>"
               class="flex items-center gap-3 hover:text-emerald-600 transition">
                <i class="fa-solid fa-phone text-3xl"></i>
                <span><?= htmlspecialchars($json['general']['phone'] ?? '') ?></span>
            </a>
            <a href="https://wa.me/<?= $clean_phone ?>" target="_blank"
               class="flex items-center gap-3 hover:text-emerald-600 transition">
                <i class="fa-brands fa-whatsapp text-3xl text-green-500"></i>
                <span>WhatsApp</span>
            </a>
            <a href="viber://chat?number=<?= $clean_phone ?>" target="_blank"
               class="flex items-center gap-3 hover:text-emerald-600 transition">
                <i class="fa-brands fa-viber text-3xl text-purple-500"></i>
                <span>Viber</span>
            </a>
            <a href="https://t.me/+<?= $clean_phone ?>" target="_blank"
               class="flex items-center gap-3 hover:text-emerald-600 transition">
                <i class="fa-brands fa-telegram text-3xl text-blue-500"></i>
                <span>Telegram</span>
            </a>
            <a href="mailto:<?= htmlspecialchars($json['general']['email'] ?? '') ?>"
               class="flex items-center gap-3 hover:text-emerald-600 transition">
                <i class="fa-solid fa-envelope text-3xl"></i>
                <span><?= htmlspecialchars($json['general']['email'] ?? '') ?></span>
            </a>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
            <div>
                <div class="flex items-center gap-3 text-3xl mb-6">
                    <i class="fa-solid fa-handshake text-emerald-500"></i>
                    <span class="font-bold"><?= htmlspecialchars($json['general']['site_name'] ?? 'Universal Lending') ?></span>
                </div>
                <p class="text-gray-400"><?= htmlspecialchars($json['footer']['about'] ?? '') ?></p>
            </div>
            <div>
                <div class="font-semibold mb-4 text-emerald-400">CONTACTS</div>
                <div class="space-y-3 text-gray-300">
                    <div><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($json['general']['address'] ?? '') ?></div>
                    <a href="tel:<?= htmlspecialchars($json['general']['phone'] ?? '') ?>" class="block hover:text-white"><?= htmlspecialchars($json['general']['phone'] ?? '') ?></a>
                    <a href="mailto:<?= htmlspecialchars($json['general']['email'] ?? '') ?>" class="block hover:text-white"><?= htmlspecialchars($json['general']['email'] ?? '') ?></a>
                </div>
            </div>
            <div>
                <div class="font-semibold mb-4 text-emerald-400">WE SERVE IN THESE AREAS</div>
                <div class="text-gray-400 leading-relaxed"><?= htmlspecialchars($json['footer']['districts'] ?? '') ?></div>
            </div>
        </div>
        <div class="mt-16 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
            <p>Made with ❤️ <a href="https://bilohash.com" target="_blank" class="hover:text-white">Ruslan Bilohash</a></p>
            <p class="mt-6"><?= htmlspecialchars($json['footer']['copyright'] ?? '') ?></p>
            <?= $json['custom_code']['footer_html'] ?? '' ?>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON (не активна) -->
   <!-- <a href="https://wa.me/<?= $clean_phone ?>" target="_blank"
       class="whatsapp-float" title="Chat with us on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a> -->

    <!-- SCHEMA.ORG -->
    <script type="application/ld+json">
    <?= json_encode([
        "@context" => "https://schema.org",
        "@type" => "FinancialService",
        "name" => $json['schema']['name'] ?? '',
        "description" => $json['schema']['description'] ?? '',
        "url" => $json['schema']['url'] ?? '',
        "telephone" => $json['schema']['telephone'] ?? '',
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $json['schema']['streetAddress'] ?? '',
            "addressLocality" => $json['schema']['addressLocality'] ?? '',
            "addressCountry" => $json['schema']['addressCountry'] ?? ''
        ],
        "openingHours" => $json['schema']['openingHours'] ?? '',
        "priceRange" => $json['schema']['priceRange'] ?? '',
        "aggregateRating" => [
            "@type" => "AggregateRating",
            "ratingValue" => $json['schema']['ratingValue'] ?? '5',
            "reviewCount" => $json['schema']['reviewCount'] ?? '100'
        ],
        "image" => $json['schema']['image'] ?? ''
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>

    <!-- EXTERNAL JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/main.js" defer></script>
    <?= $json['custom_code']['js'] ?? '' ?>
</body>
</html>
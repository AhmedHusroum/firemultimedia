<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barroc Intens</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans">

  <!-- Navigatiebalk -->
  <nav class="absolute top-0 left-0 right-0 p-3 text-white bg-transparent z-10">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center">
        <img src="images/logo6_groot.png" style="width: 95px" alt="afbeelding">
      <!-- Hamburger Menu voor kleine schermen -->
      <button id="menuToggle" class="lg:hidden ml-2 text-2xl text-white mr-12 focus:outline-none">
        <img src="{{ asset('images/burger-menu.svg') }}" alt="Burger Menu" style="width: 65px;">
      </button>
      <!-- Menu voor grote schermen -->
      <ul class="hidden lg:flex ml-4 space-x-4 text-xl font-light" id="navMenu">
        <li><a href="#" class="hover:text-gray-300">Home</a></li>
        <li><a href="{{route('products.index')}}" class="hover:text-gray-300">Producten</a></li>
      </ul>
    </div>
    <ul class="hidden lg:flex space-x-4 text-xl font-light">
      <li><a href="{{ route('login')}}" class="hover:text-gray-300">Inloggen</a></li>
    </ul>
    </div>
  </nav>

  <!-- Hero-sectie met achtergrondfoto -->
  <div class="bg-center relative h-screen" style="background-image: url('images/-1200-1200.jpg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="absolute inset-0 flex items-center justify-center">
      <div class="text-center text-white">
        <h1 class="text-5xl font-bold mb-2">Welkom bij Barroc Intens</h1>
        <p class="text-lg font-light">Ontdek onze hoogwaardige koffiemachines voor verhuur</p>
        <a href="{{route('products.index')}}" class="mt-4 inline-block border-2 border-yellow-400 hover:bg-yellow-400 duration-200 text-white font-bold py-2 px-6 rounded-full">Bekijk onze producten</a>
      </div>
    </div>
  </div>
  <!-- cookie privacy voorwaarden --> 
  <div id="cookieBanner" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 text-center hidden">
    <p class="text-sm">Deze website maakt gebruik van cookies. Gaat u akkoord met onze privacyvoorwaarden?</p>
    <a href="/privacy" id="showPrivacyPolicy" class="text-gray-400 hover:text-white text-sm underline">Voorwaarden</a>
    <button id="acceptCookies" class="mt-2 inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-2 px-4 rounded-full">Ja</button>
    <button id="rejectCookies" class="ml-2 inline-block border border-white text-white font-bold py-2 px-4 rounded-full">Nee</button>
  </div>
  <!-- cookie privacy voorwaarden -->


  
  <!-- Diensten-sectie -->
  <section id="services" class="py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-8">Onze Diensten</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="text-xl font-bold mb-2">Kwaliteitsmachines</h3>
          <p class="font-light">Bekijk onze selectie van hoogwaardige koffiemachines van topmerken.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="text-xl font-bold mb-2">Flexibele Huuropties</h3>
          <p class="font-light">Kies uit verschillende huurplannen die aan uw behoeften voldoen.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="text-xl font-bold mb-2">Onderhoud en Support</h3>
          <p class="font-light">Profiteer van ons onderhoud en 24/7 klantenondersteuning.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact-sectie -->
  <section id="contact" class="bg-gray-100 py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-8">Contacteer Ons</h2>
      <p>Heeft u vragen of wilt u meer informatie? Neem gerust contact met ons op.</p>
      <a href="#" class="mt-4 inline-block border-2 border-yellow-400 hover:bg-yellow-400 duration-200 py-2 px-4 font-regular rounded-full">Neem contact op</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-white font-light text-center py-4">
    <p>&copy; 2023 Barroc Intens. Alle rechten voorbehouden.</p>
  </footer>
</body>
</html>

<script>
   document.addEventListener('DOMContentLoaded', function () {
  // Hamburgermenu functionaliteit
  const menuToggle = document.getElementById('menuToggle');
  const navMenu = document.getElementById('navMenu');

  menuToggle.addEventListener('click', function () {
    navMenu.classList.toggle('hidden');
  });
});

document.addEventListener('DOMContentLoaded', function () {
  // Haal de cookie op als deze bestaat
  const cookieAccepted = localStorage.getItem('cookieAccepted');

  // Controleer of de cookie-melding al eerder is getoond
  if (!cookieAccepted) {
    const cookieBanner = document.getElementById('cookieBanner');
    const acceptCookies = document.getElementById('acceptCookies');
    const rejectCookies = document.getElementById('rejectCookies');

    // Toon de cookie-melding
    cookieBanner.classList.remove('hidden');

    // Eventlistener voor het accepteren van cookies
    acceptCookies.addEventListener('click', function () {
      // Sla de cookie op en verberg de melding
      localStorage.setItem('cookieAccepted', 'true');
      cookieBanner.classList.add('hidden');
    });

    // Eventlistener voor het weigeren van cookies
    rejectCookies.addEventListener('click', function () {
      // Eventueel kun je hier extra acties toevoegen voor het geval de gebruiker cookies weigert
      cookieBanner.classList.add('hidden');
    });
  }
});
</script>

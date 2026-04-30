<?php $pageTitle="Home • Geeks' Consulting & IT Services"; include "includes/header.php"; ?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg px-8 py-16 text-white mb-12">
  <div class="max-w-3xl">
    <div class="inline-block bg-blue-400/30 border border-blue-300 rounded-full px-4 py-2 text-sm font-semibold mb-4">
      Consulting • Delivery • Support
    </div>
    <h1 class="text-4xl md:text-5xl font-bold mb-6">We build, automate, and deploy reliable web solutions</h1>
    <p class="text-lg text-blue-100 mb-8 max-w-xl">
      Geeks' Consulting & IT Services helps teams ship faster with modern frontend work, scalable backend systems, test automation, and infrastructure setup.
    </p>
    <div class="flex gap-4 flex-wrap">
      <a href="services.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-smooth">
        Explore Services
      </a>
      <a href="contact.php" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-smooth">
        Get in Touch
      </a>
    </div>
  </div>
</div>

<!-- Key Services Cards -->
<div class="grid md:grid-cols-3 gap-6 mb-12">
  <div class="bg-white rounded-lg p-8 shadow-sm border border-gray-200 hover:shadow-md transition-smooth">
    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
      <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
    </div>
    <h2 class="text-xl font-bold text-gray-900 mb-2">What we deliver</h2>
    <p class="text-gray-600">Production-ready features, clean code, and maintainable systems that scale with your business.</p>
    <a href="services.php" class="inline-block mt-4 text-blue-600 font-semibold hover:text-blue-700 transition-smooth">
      Learn more →
    </a>
  </div>

  <div class="bg-white rounded-lg p-8 shadow-sm border border-gray-200 hover:shadow-md transition-smooth">
    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
      <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
    </div>
    <h2 class="text-xl font-bold text-gray-900 mb-2">How we help</h2>
    <p class="text-gray-600">From quick fixes to full builds—front to back, with CI/CD, automation, and DevOps best practices.</p>
    <a href="services.php" class="inline-block mt-4 text-blue-600 font-semibold hover:text-blue-700 transition-smooth">
      Our approach →
    </a>
  </div>

  <div class="bg-white rounded-lg p-8 shadow-sm border border-gray-200 hover:shadow-md transition-smooth">
    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
      <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
      </svg>
    </div>
    <h2 class="text-xl font-bold text-gray-900 mb-2">Talk to us</h2>
    <p class="text-gray-600">Reach out for consulting, project quotes, or collaboration. We're here to help your team succeed.</p>
    <a href="contact.php" class="inline-block mt-4 text-blue-600 font-semibold hover:text-blue-700 transition-smooth">
      Contact us →
    </a>
  </div>
</div>

<!-- Features Section -->
<div class="bg-white rounded-lg p-8 shadow-sm border border-gray-200 mb-12">
  <h2 class="text-2xl font-bold text-gray-900 mb-8">Our Expertise</h2>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="flex gap-4">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-500 text-white">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
          </svg>
        </div>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-900">Enterprise Architecture</h3>
        <p class="text-gray-600 text-sm">Scalable infrastructure and system design for high-performance applications.</p>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-green-500 text-white">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l1 1m-1-1l-1-1m1 1l1 1m-1-1l-1-1"></path>
          </svg>
        </div>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-900">Modern Frontend</h3>
        <p class="text-gray-600 text-sm">Responsive, accessible interfaces built with the latest technologies.</p>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-purple-500 text-white">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
          </svg>
        </div>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-900">Automation & CI/CD</h3>
        <p class="text-gray-600 text-sm">Streamlined pipelines and deployment workflows for continuous delivery.</p>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-orange-500 text-white">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-900">24/7 Support</h3>
        <p class="text-gray-600 text-sm">Ongoing maintenance, monitoring, and support for production systems.</p>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
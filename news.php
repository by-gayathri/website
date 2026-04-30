<?php $pageTitle="News & Updates • Geeks' Consulting & IT Services"; include "includes/header.php"; ?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">News & Updates</h1>
  <p class="text-gray-600">Latest announcements and service updates from Geeks' Consulting</p>
</div>

<div class="space-y-6">
  <!-- News Item 1 -->
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-smooth">
    <div class="flex items-start gap-6 p-8">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-blue-100">
          <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
          </svg>
        </div>
      </div>
      <div class="flex-1">
        <div class="flex items-center gap-3 mb-3">
          <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">Feb 2026</span>
          <span class="text-xs text-gray-500">Latest</span>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">New Consulting Packages Available</h3>
        <p class="text-gray-600">We now offer short "setup sprints" for infrastructure + CI so teams can deploy in days, not weeks. Perfect for teams looking to accelerate their deployment pipeline.</p>
        <div class="mt-4">
          <a href="contact.php" class="inline-block text-blue-600 font-semibold hover:text-blue-700 transition-smooth">Learn more →</a>
        </div>
      </div>
    </div>
  </div>

  <!-- News Item 2 -->
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-smooth">
    <div class="flex items-start gap-6 p-8">
      <div class="flex-shrink-0">
        <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-green-100">
          <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
      </div>
      <div class="flex-1">
        <div class="flex items-center gap-3 mb-3">
          <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Jan 2026</span>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Automation-First Delivery Now Standard</h3>
        <p class="text-gray-600">All new projects now include a baseline test automation plan and a lightweight release checklist. This ensures your code is tested, documented, and ready for production from day one.</p>
        <div class="mt-4">
          <a href="services.php" class="inline-block text-blue-600 font-semibold hover:text-blue-700 transition-smooth">View our services →</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Newsletter Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg p-8 text-white mt-12">
  <h2 class="text-2xl font-bold mb-2">Stay Updated</h2>
  <p class="text-blue-100 mb-6">Subscribe to our updates for news about new services and best practices</p>
  <a href="contact.php" class="inline-block px-6 py-2 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-smooth">
    Contact Us for Updates
  </a>
</div>

<?php include "includes/footer.php"; ?>
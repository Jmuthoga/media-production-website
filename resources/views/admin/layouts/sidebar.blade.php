  <div class="sidebar" id="sidebar">
      <div class="sidebar-header">
          <h6>Navigation</h6>
          <button class="toggle-btn" id="toggleSidebar" title="Toggle Sidebar">☰</button>
      </div>

      <ul class="nav flex-column px-2 mt-2">
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                  href="{{ route('admin.dashboard') }}" title="Dashboard">🏠
                  <strong><span>Dashboard</span></strong>
              </a>
          </li>

          <!-- === ABOUT US === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#aboutMenu" role="button" aria-expanded="false" aria-controls="aboutMenu">
                  <strong>🏢 <span>About</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>
          <div class="collapse ps-3" id="aboutMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.aboutus.story.index') }}">📖 Story</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.aboutus.brands.index') }}">🏆 Brands</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.aboutus.careers.index') }}">💼 Careers</a></li>
              </ul>
          </div>

          <!-- === PHOTOGRAPHY === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#photoMenu" role="button" aria-expanded="false" aria-controls="photoMenu">
                  <strong>📸 <span>Photography</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>
          <div class="collapse ps-3" id="photoMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.portrait.index') }}">🧍 Portraits</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.family.index') }}">👨‍👩‍👧 Family</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.studio.index') }}">🏠 Studio</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.weddings.index') }}">💍 Weddings</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.parties.index') }}">🎉 Parties</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.graduation.index') }}">🎓 Graduation</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.corporate.index') }}">🏢 Corporate</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.school.index') }}">🏫 School</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.product.index') }}">📦 Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.outdoor.index') }}">🌳 Outdoor</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.photography.tiktok.index') }}">🎥 Tiktok</a></li>
              </ul>
          </div>

          <!-- === VIDEOGRAPHY === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#videoMenu" role="button" aria-expanded="false" aria-controls="videoMenu">
                  <strong>🎥 <span>Videography</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="videoMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.weddings.index') }}">💍 Weddings</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.parties.index') }}">🎉 Parties</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.school.index') }}">🎓 School & Graduation</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.corporate.index') }}">🏢 Corporate & Brand</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.family.index') }}">👨‍👩‍👧 Family & Personal</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.product.index') }}">📦 Products</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.outdoor.index') }}">🌳 Outdoor & Lifestyle</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.tiktok.index') }}">🎬 Tiktok & Media</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.videography.liveshows.index') }}">📡 Liveshows</a>
                  </li>
              </ul>
          </div>

          <!-- === Academy === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#academyMenu" role="button" aria-expanded="false" aria-controls="academyMenu">
                  <strong>🎓 <span>Academy</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="academyMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('photography.index') }}">📸 Photography training</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('certifications.index') }}">🎖️ Certifications</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('internships.index') }}">💼 Internships</a>
                  </li>
              </ul>
          </div>

          <!-- === Other Services === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#othersMenu" role="button" aria-expanded="false" aria-controls="othersMenu">
                  <strong>🛠️ <span>Other Services</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="othersMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('printing.index') }}">🖨️ Print & Brand</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('radio.index') }}">📻 Radio Host & Advert</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('crew.index') }}">👷 Hire Crew</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('event.index') }}">📅 Event Plan</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('photo.index') }}">🖌️ Photo Edit & Retouch</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('drone.index') }}">🚁 Drone</a>
                  </li>
              </ul>
          </div>

          <!-- === Packages Menu === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#packagesMenu" role="button" aria-expanded="false" aria-controls="packagesMenu">
                  <strong>🎁 <span>Packages</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="packagesMenu">
              <ul class="nav flex-column small">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.lifestyle.index') }}">🌅 Lifestyle</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.wedding.index') }}">💍 Wedding</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.family.index') }}">👨‍👩‍👧 Family</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.event.index') }}">📅 Event</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.cinematic.index') }}">🎬 Cinematic</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.corporate.index') }}">🏢 Corporate</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.packages.premium.index') }}">🏆 All-Inclusive</a>
                  </li>
              </ul>
          </div>

          <!-- === Contacts & Quotations === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#contactsMenu" role="button" aria-expanded="false" aria-controls="contactsMenu">
                  <strong>✉️ <span>Contacts</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="contactsMenu">
              <ul class="nav flex-column small">
                  <!-- Messages -->
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.contacts.index') }}">📩 Messages</a>
                  </li>

                  <!-- Quotations with sub-menu -->
                  <li class="nav-item">
                      <a class="nav-link text-light d-flex justify-content-between align-items-center"
                          data-bs-toggle="collapse" href="#quotationsSubMenu" role="button" aria-expanded="false" aria-controls="quotationsSubMenu">
                          💬 Quotations
                          <span class="caret text-white">&#9662;</span>
                      </a>
                      <div class="collapse ps-3" id="quotationsSubMenu">
                          <ul class="nav flex-column small">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.quotations.index') }}">📄 All Quotations</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.quotations.create') }}">➕ Create Quotation</a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </div>

          <!-- === Website Settings === -->
          <li class="nav-item mt-3">
              <a class="nav-link text-uppercase small text-light d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
                  <strong>⚙️ <span>Settings</span></strong>
                  <span class="caret text-white">&#9662;</span>
              </a>
          </li>

          <div class="collapse ps-3" id="settingsMenu">
              <ul class="nav flex-column small">

                  <!-- Hero Section -->
                  <li class="nav-item">
                      <a class="nav-link text-light d-flex justify-content-between align-items-center"
                          data-bs-toggle="collapse" href="#heroSubMenu" role="button" aria-expanded="false" aria-controls="heroSubMenu">
                          🖼️ Hero Section
                          <span class="caret text-white">&#9662;</span>
                      </a>
                      <div class="collapse ps-3" id="heroSubMenu">
                          <ul class="nav flex-column small">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.hero.index') }}">📄 All Hero Sections</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.hero.create') }}">➕ Add Hero Section</a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <!-- Contact Information -->
                  <li class="nav-item">
                      <a class="nav-link text-light d-flex justify-content-between align-items-center"
                          data-bs-toggle="collapse" href="#contactInfoSubMenu" role="button" aria-expanded="false" aria-controls="contactInfoSubMenu">
                          📞 Contact Info
                          <span class="caret text-white">&#9662;</span>
                      </a>
                      <div class="collapse ps-3" id="contactInfoSubMenu">
                          <ul class="nav flex-column small">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.contact.index') }}">📋 All Contacts</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.contact.create') }}">➕ Add Contact Info</a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <!-- Social Media -->
                  <li class="nav-item">
                      <a class="nav-link text-light d-flex justify-content-between align-items-center"
                          data-bs-toggle="collapse" href="#socialSubMenu" role="button" aria-expanded="false" aria-controls="socialSubMenu">
                          🌐 Social Media
                          <span class="caret text-white">&#9662;</span>
                      </a>
                      <div class="collapse ps-3" id="socialSubMenu">
                          <ul class="nav flex-column small">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.social.index') }}">📱 All Social Links</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.social.create') }}">➕ Add Social Link</a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <!-- User Management -->
                  <li class="nav-item">
                      <a class="nav-link text-light d-flex justify-content-between align-items-center"
                          data-bs-toggle="collapse" href="#usersSubMenu" role="button" aria-expanded="false" aria-controls="usersSubMenu">
                          👤 User Management
                          <span class="caret text-white">&#9662;</span>
                      </a>
                      <div class="collapse ps-3" id="usersSubMenu">
                          <ul class="nav flex-column small">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.users.index') }}">👥 All Users</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.settings.users.create') }}">➕ Add User</a>
                              </li>
                          </ul>
                      </div>
                  </li>

              </ul>
          </div>
  </div>

  <script>
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('toggleSidebar');
      const mobileToggle = document.querySelector('.toggle-sidebar-btn');

      toggleBtn.addEventListener('click', () => sidebar.classList.toggle('collapsed'));
      mobileToggle.addEventListener('click', () => sidebar.classList.toggle('show'));

      document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(toggle => {
          const caret = toggle.querySelector('.caret');
          const targetId = toggle.getAttribute('href').replace('#', '');
          const collapseEl = document.getElementById(targetId);
          collapseEl.addEventListener('show.bs.collapse', () => caret.style.transform = 'rotate(180deg)');
          collapseEl.addEventListener('hide.bs.collapse', () => caret.style.transform = 'rotate(0deg)');
      });
  </script>
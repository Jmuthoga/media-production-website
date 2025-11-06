<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - @yield('title', 'Unimax Admin')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6f9;
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
      padding-top: 56px;
      overflow-x: hidden;
    }

    /* === NAVBAR === */
    .navbar {
      background: linear-gradient(135deg, #0d6efd, #041a3a);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      z-index: 1050;
    }

    /* === SIDEBAR === */
    .sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 230px;
      height: calc(100vh - 56px);
      background-color: #041a3a;
      color: #fff;
      overflow-y: auto;
      transition: all 0.3s ease;
      z-index: 1040;
      display: flex;
      flex-direction: column;
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar.mobile-hidden {
      transform: translateX(-100%);
    }

    .sidebar-header {
      padding: 10px 15px;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .sidebar-header h6 {
      font-size: 0.9rem;
      margin: 0;
      font-weight: 600;
      white-space: nowrap;
      transition: opacity 0.3s ease;
    }

    .sidebar.collapsed .sidebar-header h6 {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .toggle-btn {
      border: none;
      background: transparent;
      color: #fff;
      font-size: 1.2rem;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .toggle-btn:hover {
      transform: rotate(90deg);
    }

    .nav-link {
      color: #dcdcdc;
      padding: 8px 15px;
      border-radius: 6px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .sidebar.collapsed .nav-link strong span {
      opacity: 0;
      width: 0;
      overflow: hidden;
      display: inline-block;
    }

    .caret {
      transition: transform 0.3s ease;
    }

    /* === CONTENT === */
    .content-area {
      margin-left: 230px;
      padding: 25px;
      transition: margin-left 0.3s ease;
    }

    .sidebar.collapsed ~ .content-area {
      margin-left: 70px;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
        width: 230px;
        position: fixed;
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .content-area {
        margin-left: 0 !important;
        padding: 20px;
      }

      .navbar .toggle-sidebar-btn {
        display: inline-block;
      }
    }

    @media (min-width: 993px) {
      .navbar .toggle-sidebar-btn {
        display: none;
      }
    }

    /* Scroll */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: rgba(255, 255, 255, 0.3);
      border-radius: 4px;
    }

    .dropdown-menu {
  animation: fadeIn 0.25s ease-in-out;
    }
    @keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
    }
    .dropdown-item:hover {
    background-color: #f8f9fa;
    border-radius: 6px;
    }


    .content-area {
    flex: 1 0 auto;
    margin-left: 230px;
    padding: 25px;
    transition: margin-left 0.3s ease;
    }

    .sidebar.collapsed ~ .content-area {
    margin-left: 70px;
    }

    .admin-footer {
    flex-shrink: 0;
    position: relative;
    bottom: 0;
    width: 100%;
    font-size: 0.875rem;
    z-index: 10;
    background: #fff;
    border-top: 1px solid #dee2e6;
    }
    @media (max-width: 992px) {
    .content-area {
        margin-left: 0 !important;
    }
    }

  </style>

  @yield('head')
</head>

<body class="d-flex flex-column min-vh-100">
<!-- === NAVBAR === -->
<nav class="navbar navbar-dark fixed-top bg-dark shadow-sm">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Left: Sidebar Toggle + Brand -->
    <div class="d-flex align-items-center">
      <button class="btn btn-sm btn-light me-2 toggle-sidebar-btn">☰</button>
      <a class="navbar-brand fw-semibold" href="{{ route('admin.dashboard') }}">Unimax Admin</a>
    </div>

<!-- === USER DROPDOWN (TOP RIGHT) === -->
<div class="dropdown">
  <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="text-end me-2 d-none d-sm-block">
      <span class="fw-semibold d-block">{{ auth()->user()->name ?? 'Admin User' }}</span>
      <small class="text-light opacity-75">Administrator</small>
    </div>
    <div class="bg-light text-primary rounded-circle d-flex justify-content-center align-items-center shadow-sm"
         style="width:40px; height:40px;">
      <i class="bi bi-person-fill fs-4"></i>
    </div>
  </a>

  <ul class="dropdown-menu dropdown-menu-end mt-3 border-0 shadow-lg rounded-3 p-2" aria-labelledby="userDropdown" style="min-width: 230px;">
    <!-- Header -->
    <li class="px-3 py-2 border-bottom">
      <div class="fw-semibold text-dark mb-0">{{ auth()->user()->name ?? 'Admin User' }}</div>
      <small class="text-muted">{{ auth()->user()->email ?? 'admin@example.com' }}</small>
    </li>

    <!-- Links -->
    <li>
      <a href="" class="dropdown-item d-flex align-items-center gap-2 py-2">
        <i class="bi bi-person-circle text-primary fs-5"></i>
        <span>Profile</span>
      </a>
    </li>
    <li>
      <a href="" class="dropdown-item d-flex align-items-center gap-2 py-2">
        <i class="bi bi-gear-fill text-secondary fs-5"></i>
        <span>Settings</span>
      </a>
    </li>
    <li>
      <a href="" class="dropdown-item d-flex align-items-center gap-2 py-2">
        <i class="bi bi-bell-fill text-warning fs-5"></i>
        <span>Notifications</span>
      </a>
    </li>
    <li>
      <a href="" class="dropdown-item d-flex align-items-center gap-2 py-2">
        <i class="bi bi-question-circle-fill text-info fs-5"></i>
        <span>Help Center</span>
      </a>
    </li>

    <!-- Divider -->
    <li><hr class="dropdown-divider"></li>

    <!-- Logout -->
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger py-2">
          <i class="bi bi-box-arrow-right fs-5"></i>
          <span>Logout</span>
        </button>
      </form>
    </li>
  </ul>
</div>


  </div>
</nav>


  <!-- === SIDEBAR === -->
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

  <!-- === CONTENT AREA === -->
  <div class="content-area" id="contentArea">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @yield('content')
  </div>

<footer class="admin-footer py-3 px-4 mt-auto border-top" 
  style="background-color: #ffffff; border-top: 1px solid #ddd;">
  <div class="container-fluid text-center">
    <span class="small" style="color: #555; display: block;">
      © <span id="year"></span> <strong style="color: #000;">Unimax Admin Dashboard</strong>
    </span>
    <span class="small" style="color: #555; display: block; margin-top: 4px;">
      Powered by 
      <a href="https://www.jminnovatech.co.ke" target="_blank" style="color: #000; text-decoration: none; font-weight: 600;">
        JM Innovatech Solutions
      </a>
    </span>
  </div>
</footer>

<script>
  document.getElementById('year').textContent = new Date().getFullYear();
</script>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

  @yield('scripts')

  
</body>
</html>



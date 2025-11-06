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
                  <li>
                      <hr class="dropdown-divider">
                  </li>

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
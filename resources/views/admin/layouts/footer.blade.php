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
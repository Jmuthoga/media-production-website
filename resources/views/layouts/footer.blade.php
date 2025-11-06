<footer id="footer" class="bg-dark text-white">
    <!-- Footer Top -->
    <div class="footer-top py-5 border-bottom border-secondary">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 footer-contact mb-4 mb-md-0">
                    <h3>Unimax Photography</h3>
                    <p>
                        Nairobi, Kenya<br><br>
                        <strong>Phone:</strong> +254 700 000000<br>
                        <strong>Email:</strong> contact@unimaxphotography.co.ke<br>
                    </p>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-2 col-md-6 footer-links mb-4 mb-md-0">
                    <h4>Useful Links</h4>
                    <ul class="list-unstyled">
                        <li><i class="bx bx-chevron-right text-primary"></i> <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><i class="bx bx-chevron-right text-primary"></i> <a href="{{ route('blog.index') }}" class="text-white text-decoration-none">Blog</a></li>
                    </ul>
                </div>

                <!-- Our Services -->
                <div class="col-lg-3 col-md-6 footer-links mb-4 mb-md-0">
                    <h4>Our Services</h4>
                    <ul class="list-unstyled">
                        <li><i class="bx bx-chevron-right text-primary"></i> Wedding Photography</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Corporate & Event Coverage</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Studio & Portrait Shoots</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Drone & Aerial Videography</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Product & Commercial Photography</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Live Event Coverage</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Cinematic Productions</li>
                        <li><i class="bx bx-chevron-right text-primary"></i> Social Media Content Creation</li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Stay inspired with the latest photography tips, exclusive offers, and Unimax stories. Subscribe today.</p>
                    <form action="#" method="POST" class="d-flex">
                        <input type="email" name="email" class="form-control me-2" placeholder="Enter your email">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container d-md-flex py-4 justify-content-between align-items-center">
        <div class="text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
                &copy; {{ date('Y') }} <strong><span>Unimax Photography</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Website developed by <a href="https://jminnovatechsolution.co.ke/" class="text-primary text-decoration-none">JM Innovatech Solutions</a>
            </div>
        </div>

        <div class="d-flex align-items-center text-center text-md-end pt-3 pt-md-0">
            <!-- Social Links -->
            <a href="#" class="twitter text-white me-3"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook text-white me-3"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram text-white me-3"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="youtube text-white me-3"><i class="bx bxl-youtube"></i></a>
            <a href="#" class="linkedin text-white me-3"><i class="bx bxl-linkedin"></i></a>

            <!-- Hidden Admin Login Inline -->
            <ul class="navbar-nav ms-auto align-items-center list-unstyled d-flex mb-0" style="font-size:0.8rem; opacity:0.6;">
                @auth
                <li class="nav-item me-2"><a class="nav-link text-white p-0" href="{{ url('/admin') }}"><i class="bi bi-person-circle me-1"></i>Admin</a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline m-0 p-0">
                        @csrf
                        <button class="btn btn-outline-light btn-sm p-0 px-1">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm p-0 px-1"><i class="bi bi-person-circle me-1"></i>Admin</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

<!-- Back to Top Button -->
<a href="javascript:void(0)" id="backToTop" class="back-to-top position-fixed end-0 mb-5 me-4 bg-primary text-white d-flex justify-content-center align-items-center rounded-circle shadow-lg"
   style="width: 50px; height: 50px; bottom: 20px; z-index: 9999; transition: transform 0.3s, background-color 0.3s;">
    <i class="bi bi-arrow-up-short fs-3"></i>
</a>

<!-- Hover Effect -->
<style>
.back-to-top:hover {
    transform: translateY(-5px);
    background-color: #0d6efd;
    cursor: pointer;
}
</style>

<!-- Smooth Scroll JS -->
<script>
document.getElementById('backToTop').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent any default jump
    scrollToTop(800); // Scroll to top in 800ms
});

function scrollToTop(duration) {
    const start = window.scrollY;
    const startTime = performance.now();

    function scrollStep(timestamp) {
        const elapsed = timestamp - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const ease = 0.5 * (1 - Math.cos(Math.PI * progress)); // easeInOut
        window.scrollTo(0, start * (1 - ease));
        if (progress < 1) {
            requestAnimationFrame(scrollStep);
        }
    }

    requestAnimationFrame(scrollStep);
}
</script>


</footer>


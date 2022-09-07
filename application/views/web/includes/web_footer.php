
  <footer>
  <div class="footer-section">
    <div class="footer-col1">
      <img src="assets/images/home/Tc_Logo.png"  class="logo-img" alt="logo" width="150" height="120">
      <p class="logo-text">Enhance your knowledge with THINK-CHAMP.</p>
      <div class="social-logo"> <img src="assets/images/home/facebook.png" alt="social" class="social-icons"> </div> 
      <div class="social-logo youtube"><img src="assets/images/home/twitter.png" alt="social" class="social-icons"> </div>
      <div class="social-logo youtube"><img src="assets/images/home/instagram.png" alt="social" class="social-icons"> </div>
      <div class="social-logo youtube"><img src="assets/images/home/youtube.png" alt="social" class="social-icons"> </div>
  
    </div>
    <div class="footer-col2">
      <h2 class="footer-company">Company</h2><br>
      <ul class="footer-list">
        <li class="footer-links"><a href="<?= base_url('Privacy-Policy') ?>" class="footer-link">Privacy Policy</a></li>
        <li class="footer-links"><a href="<?= base_url('Terms-And-Service') ?>" class="footer-link">Terms & Conditions</a></li>
        <li class="footer-links"><a href="<?= base_url('Contact') ?>" class="footer-link">Reviews</a></li>
        <li class="footer-links"><a href="<?= base_url('Contact') ?>" class="footer-link">Contact Us</a></li>
      </ul>

    </div>
    <div class="footer-col3">
      <h2 class="footer-company">Headquaters</h2><br>
      <p class="headqauter-text">Nellore(Dist),Andhra Pradesh</p>
      <p class="headqauter-text">thinkchamp24@gmail.com<br>
        +91 8179641998</p>
    </div>
    <div class="footer-col4">
      <h2 class="footer-company">Newsletter Subscription</h2><br>
      <p class="headqauter-text">Subscribe</p>
      <form action="" class="newsletter">
        <input type="email" placeholder="Enter your E-mail Address" />
        <button class="subs-btn">SUBSCRIBE</button>
      </form>
    </div>
  </div>
  <hr style="color:white;">
  <p class="copyright">© 2022 THINK-CHAMP PRIVATE LIMITED</p>
</footer>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    -->
</body>

</html>
<script>
  $(window).scroll(function() {
    $('header').toggleClass('scrolled', $(this).scrollTop() > 1);
});
  </script>
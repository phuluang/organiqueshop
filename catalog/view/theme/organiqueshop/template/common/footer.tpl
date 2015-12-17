  <footer>
    <div class="container">
      <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <h5><?php echo $text_contact; ?></h5>
          <div class="contact-item">
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="info">
              <address><?php echo $config_address; ?></address>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="info">
              <a href="mailto:info@organiqueshop.net"><?php echo $config_email; ?></a>
            </div>
          </div>
          <div class="contact-item">
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="info">
              <?php echo $config_telephone; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 facebook-plugin">
          <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
          <div class="facebook-plugin">
            <div class="fb-page" data-href="https://www.facebook.com/OrganiqueTH/" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/OrganiqueTH/"><a href="https://www.facebook.com/OrganiqueTH/">Organique</a></blockquote></div></div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 follow-us">
          <h5><?php echo $text_follow_us; ?></h5>
          <a href="https://www.facebook.com/OrganiqueTH">
            <span class="fa fa-facebook-square"></span>
          </a>
          <a href="https://twitter.com/OrganiqueShop">
            <span class="fa fa-twitter-square"></span>
          </a>
          <a href="https://www.google.com/+OrganiqueshopNetTH">
            <span class="fa fa-google-plus-square"></span>
          </a>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
      <div class="powered">
        <div class="container">
          <p><?php echo $powered; ?></p>
          <div class="footer-lang-switcher">
            <?php echo $language; ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->
</div>
</body></html>

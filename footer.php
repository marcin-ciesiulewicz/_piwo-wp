<?php wp_footer(); ?>

<a href="#" class="toTop"><i class="fas fa-arrow-alt-circle-up"></i></a>

<footer class="footer <?php $class = ( ( is_front_page()  ) ? 'footer--home' : '' ); echo $class; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="footer__heading">O nas</h2>
                <p class="footer__text">Lorem ipsum dolor amet vaporware tilde thundercats you probably haven't heard of them, flannel deep v next level wayfarers shaman street art humblebrag.</p>
            </div>
            <div class="col-md-4">
                <h2 class="footer__heading">Współpraca</h2>
                <p class="footer__text"> Meggings fingerstache 3 wolf moon gentrify pour-over shabby chic listicle plaid readymade. Single-origin coffee kickstarter offal messenger bag vexillologist. </p>
            </div>
            <div class="col-md-4">
                <div class="footer__list">
                    <h2 class="footer__heading">Bądź w kontakcie</h2><a href="" class="footer__link footer__link--fb"><i class="fab fa-facebook-f"></i></a><a href="" class="footer__link footer__link--tt"><i class="fab fa-twitter"></i></a><a href="" class="footer__link footer__link--yt"><i class="fab fa-youtube"></i></a><a href="" class="footer__link footer__link--pin"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
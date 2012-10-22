<?php

namespace MFB\CmsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use MFB\CmsBundle\Entity\Block,
    MFB\CmsBundle\Entity\Types\BlockStatusType,
    MFB\CmsBundle\Entity\Types\BlockTypeType;

/**
 * Block fixtures
 */
class LoadBlockData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $blockHomeNews = new Block();
        $blockHomeNews->setTitle('Homepage News oben rechts');
        $blockHomeNews->setSlug('home-news');
        $blockHomeNews->setContent('
   <a href="/uber-uns/myclimate.html">
       <img class="warum b warum-promo" src="/img/homepage/MF_1044_Web_Banner_CO2_120926.png" style="border:none;" alt="CO2 neutral fahren" />
   </a>
        ');
        $blockHomeNews->setType(BlockTypeType::TEXT);
        $blockHomeNews->setStatus(BlockStatusType::ENABLED);
        $manager->persist($blockHomeNews);

        $blockHomeSlider = new Block();
        $blockHomeSlider->setTitle('Homepage Angebot-Slider');
        $blockHomeSlider->setSlug('homeslider');
        $blockHomeSlider->setContent('
<script type="text/javascript" src="/bundles/applicationdefault/slider.js"></script>

<!--BEGIN .caro -->
<div class="caro b">
   <div class="caronav">
       <a href="#" id="caro-prev"></a>
       <p class="nav">
       </p>
       <a href="#" id="caro-next"></a>
   </div>

   <div class="caro-wrap">
       <ul class="slides">
           <li class="slide" style="background:url(\'/img/homeslider/ZU-MU.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/ZU-KO.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/ZU-FHN.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/MU-MEE.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/MU-KO.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/MU-FR.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/KO-MU.jpg?rev=2\')"></li>
           <li class="slide" style="background:url(\'/img/homeslider/FR-FN.jpg?rev=2\')"></li>
       </ul>
       <div class="availability-images">
           <img src="/img/homeslider/ZU-MU.jpg?rev=2" alt="Zürich - München">
           <img src="/img/homeslider/ZU-KO.jpg?rev=2" alt="Zürich - Konstanz">
           <img src="/img/homeslider/ZU-FHN.jpg?rev=2" alt="Zürich - Friedrichshafen">
           <img src="/img/homeslider/MU-MEE.jpg?rev=2" alt="München - Meersburg">
           <img src="/img/homeslider/MU-KO.jpg?rev=2" alt="München - Konstanz">
           <img src="/img/homeslider/MU-FR.jpg?rev=2" alt="München - Freiburg">
           <img src="/img/homeslider/KO-MU.jpg?rev=2" alt="Konstanz - München">
           <img src="/img/homeslider/FR-FN.jpg?rev=2" alt="Freiburg - Friedrichshafen">
       </div>
   </div>
</div>
<!--END .caro -->
        ');
        $blockHomeSlider->setType(BlockTypeType::TEXT);
        $blockHomeSlider->setStatus(BlockStatusType::ENABLED);
        $manager->persist($blockHomeSlider);

        $blockSocialFacebook = new Block();
        $blockSocialFacebook->setTitle('Social Facebook');
        $blockSocialFacebook->setSlug('social-facebook');
        $blockSocialFacebook->setTitle('
<!--BEGIN .share -->
<div class="share b" style="padding-left:0;padding-right:0;">
   <ul>
       <li style="padding-left:10px;padding-right:10px;">
           <a href="https://twitter.com/meinfernbus" class="twitter-follow-button" data-show-count="false" data-lang="de">@meinfernbus folgen</a>
           <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

           <!-- Place this tag where you want the +1 button to render -->
           <g:plusone annotation="none" href="http://meinfernbus.de/"></g:plusone>

           <!-- Place this render call where appropriate -->
           <script type="text/javascript">
               window.___gcfg = {lang: \'de\'};

               (function() {
                   var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
                   po.src = \'https://apis.google.com/js/plusone.js\';
                   var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
               })();
    </script>


    </li>
    <li style="padding-top:2px;">
    <div class="fb-like-box" data-href="https://www.facebook.com/meinfernbus" data-width="292" data-height="180" data-show-faces="true" data-border-color="#FFFFFF" data-stream="false" data-header="false"></div>
    </li>
    </ul>
    </div>
    <!--END .share -->
        ');
        $blockSocialFacebook->setType(BlockTypeType::TEXT);
        $blockSocialFacebook->setStatus(BlockStatusType::ENABLED);
        $manager->persist($blockSocialFacebook);

        $blockPaymentMethods = new Block();
        $blockPaymentMethods->setTitle('Zahlungsmethoden Logos');
        $blockPaymentMethods->setSlug('payment-methods');
        $blockPaymentMethods->setTitle('
<img src="/images/gates/ec.png" alt="Electronic cash">
<img src="/images/gates/visa.png" alt="Visa">
<img src="/images/gates/mc.png" alt="MasterCard">
<a href="https://www.paypal-deutschland.de/privatkunden/los-geht-es-mit-paypal.html" target="_blank"><img src="/images/gates/paypal.png" border="0" alt="PayPal. Sicherererer."></a>
        ');
        $blockPaymentMethods->setType(BlockTypeType::TEXT);
        $blockPaymentMethods->setStatus(BlockStatusType::ENABLED);
        $manager->persist($blockPaymentMethods);

        $blockHelloStripe = new Block();
        $blockHelloStripe->setTitle('Orange newsticker');
        $blockHelloStripe->setSlug('hellostripe');
        $blockHelloStripe->setContent('
<div class="b text hello-stripe" style="display:none;">
       <marquee behavior="scroll" scrollamount="3" direction="left" width="890" id="hellotext">
           Wir freuen uns, dass sich unsere Politiker darauf geeinigt haben, grünes Licht für Fernbusse in Deutschland zu geben. Fahr grün!
           <a style="color: #FFFFFF;" href="/presse/presse-informationen-aktuell.html">
               Mehr dazu hier
           </a>
       </marquee>
       <script type="text/javascript"> var helloCookieName = \'liberalisierung\'; </script>
   <span class="message-close"></span>
</div>

<script type="text/javascript">
   $(document).ready(function() {
       // Hello stripe
       if (jQuery.cookie(helloCookieName) == null) {
           $(\'.hello-stripe\').show();
           $(\'.hello-stripe\').on(\'click\', \'.message-close\', function () {
               $(this).closest(\'.hello-stripe\').remove();
               jQuery.cookie(helloCookieName, true, {expires:3650, path:\'/\'});
           });
       }
   });
   $(document).ready(function() {
       $(\'#hellotext\').marquee(\'hellomarquee\');
   });
    </script>
        ');
        $blockHelloStripe->setType(BlockTypeType::TEXT);
        $blockHelloStripe->setStatus(BlockStatusType::ENABLED);
        $manager->persist($blockHelloStripe);

        $manager->flush();
    }

    /**
     * Get the number for sorting fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kutyásodj</title>

    <link rel="stylesheet" href="./css/style.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">

    <!--  Owl-Carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!--  AOS Library -->
    <link rel="stylesheet" href="./css/aos.css">
</head>
<body>
    <!--Navbar-->
    <?php
        include("./templates/navbar.tpl.php");
    ?>
    
    <main>

        <!-- Site Title -->

        <section class="site-title">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>Kisállat ügynökség</h3>
                <h1>Nálunk igazi családtagra találsz</h1>
                <button class="btn" id="openModal">megnézem</button>
                    <div id="myModal" class="modal">
                <div class="modal-content">
                     <span class="close">&times;</span>
                     <div class="video-container">
                     <iframe width="560" height="315" src="https://www.youtube.com/embed/fs2TM6VpUt8?si=E2a2ZAeo01rfnaAz&amp;start=10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                     
                </div>
            </div>
            </div>
        </section>


        <!--  Blog Carousel  -->

        <section>
            <div class="blog">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/macska2.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3> Miért szőrös a macska</h3>
                                <button class="btn btn-blog">tovább</button>
                                <span>friss</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                            <img src="./assets/sharpei.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>Tényleg öreg a kutyám</h3>
                                <button class="btn btn-blog">tovább</button>
                                <span>2 perce</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/english-pointer.jpeg" alt="post-1">
                            <div class="blog-title">
                                <h3>vadász</h3>
                                <button class="btn btn-blog">tovább</button>
                                <span>42 perce</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Grosser-Muensterlaender-sitzt-seitlich-auf-einer-Wiese-768x511-1.jpeg" alt="post-1">
                            <div class="blog-title">
                                <h3>Kutya helyzet</h3>
                                <button class="btn btn-blog">tovább</button>
                                <span>1 órája</span>
                            </div>
                        </div>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>

        

        <!--  Site Content -->

        <section class="container">
            <div class="site-content">
                <div class="posts">
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/bobtail.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14, 2024</span>
                                <span>2 Hozzászólás</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Mit tehetsz a kutya allergia ellen?</a>
                            <p>Sokan elkeseredetten próbáljuk megoldani a kutya allergiáját. Számtalan hónapot tölthetünk el állatorvosunkkal, hogy eljussunk az allergiát okozó esetek kiinduló pontjára, és megtaláljuk a módját a megszüntetésére.
                            </p>
                            <button class="btn post-btn">bővebben &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/camel.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;február 16, 2024</span>
                                <span>7 Hozzászólás</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Fogadj örökbe virtuális tevét</a>
                            <p>Az alapszintű ismereteket, a „Kedvtelésből tartott különleges állatok egészségügye” című tantárgyat minden állatorvostan hallgatónak fel kell vennie, azonban akik mélyebb, részletesebb ismereteket igényelnek választhatnak több fakultatív tantárgy közül is. Így az Állatorvos-tudományi Kar Tanszékei közül az Állattenyésztési, Takarmányozástani és Laborállat-tudományi Intézet; a Parazitológiai és Állattani Tanszék; a Kórbonctani és Igazságügyi Állatorvostani Tanszék hirdet meg a témában képzéseket.
                            </p>
                            <button class="btn post-btn">bővebben &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Puli.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;december 19, 2023</span>
                                <span>5 Hozzászólás</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Pulit akarok</a>
                            <p>LA puli egyike a kilenc magyar kutyafajtának, és világszerte a legismertebb terelőkutyafajta közülük. Mintegy száz éve szervezetten tenyésztik.

                                Ősei a pásztoremberek nélkülözhetetlen segítői voltak. Akár egy marhát is adtak egy-egy híres terelő kölykéért. A külsejével nem törődtek. A puli fennmaradása a szorgalmának, találékonyságának, intelligenciájának tudható be. A zord körülmények, a kemény munka edzetté, ellenállóvá és igénytelenné tették a fajtát, ezek a vonások pedig a mai napig jellemzőek a pulira.
                            <button class="btn post-btn">bővebben &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Ausztral-pasztorkutya.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Március 21, 2024</span>
                                <span>12 Hozzászólás</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Juhász- és pásztorkutyák, amit érdemes tudni 2023-ban</a>
                            <p>Ezekben a fajtákban olyan erős a terelési ösztön, hogy a terelő fajtákról ismert, hogy gyengéden terelgetik gazdáikat, különösen a család gyermekeit. Általánosságban elmondható, hogy ezek az intelligens kutyák kiváló társak, és gyönyörűen reagálnak a kiképzési gyakorlatokra.
                            </p>
                            <button class="btn post-btn">bővebben &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                   
                </div>
                <aside class="sidebar">
                    <div class="category">
                        <h2>Kategóriák</h2>
                        <ul class="category-list">
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#">Kutya</a>
                                <span>(05)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                <a href="#">Macska</a>
                                <span>(02)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                <a href="#">Egyéb állatok</a>
                                <span>(07)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                <a href="#">Gondozás</a>
                                <span>(01)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Kiképzés</a>
                                <span>(08)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Népszerű posztok</h2>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/leonbergi.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14,
                                        2019</span>
                                    <span>42 Hozzászólás</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">Ismerd meg ezt a sokoldalú kedves fajtát</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="300">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/Az-idos-kutya-taplalasa.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14,
                                        2019</span>
                                    <span>32 Hozzászólás</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">Az idősödő kutya jobb társá válhat fiatalabb társainál</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="400">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/Törpe-pincser.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14,
                                        2019</span>
                                    <span>12 Hozzászólás</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">Kutyasors</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="500">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/Rottweiler-768x516.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14,
                                        2019</span>
                                    <span>2 Hozzászólás</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">Marcona külső, mely érző szívet takar: rottweiler fajtaleírás</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="600">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/beagle.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Január 14,
                                        2019</span>
                                    <span>2 Hozzászólás</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">A vérbeli vadász, akit mindenki imád</a>
                            </div>
                        </div>
                    </div>
                    <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
                        <h2>Hírlevél</h2>
                        <div class="form-element">
                            <input type="text" class="input-element" placeholder="Email">
                            <button class="btn form-btn">Feliratkozás</button>
                        </div>
                    </div>
                    <div class="popular-tags">
                        <h2>Gyakran keresett kifejezések</h2>
                        <div class="tags flex-row">
                            <span class="tag" data-aos="flip-up" data-aos-delay="100">kutya</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="200">oltás</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="300">adomány</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="400">labrador</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="500">kennel</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="600">frizbi</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="700">tacskó</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="800">kozmetika</span>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

    </main>

  


    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>Rólunk</h2>
                <p>Az örökbefogadás komoly döntés: Egy életről döntesz.

                    Kérjük, ha számodra szimpatikus kutyát látsz, ne állj meg a fotójánál, olvass el róla minden információt!
                </p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Itt megtalálsz</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d174519.4572470812!2d19.51390587951217!3d46.885674462929444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da6108f61c3f%3A0x400c4290c1e1180!2zS2Vjc2tlbcOpdCwgTWFneWFyb3JzesOhZw!5e0!3m2!1shu!2sus!4v1712319348009!5m2!1shu!2sus" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="./assets/kaukazusi.jpg" alt="insta1">
                    <img src="./assets/vizsla-.jpg" alt="insta2">
                    <img src="./assets/akita.jpg" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="./assets/vizsla-.jpg" alt="insta4">
                    <img src="./assets/beagle.jpg" alt="insta5">
                    <img src="./assets/labi.jpg" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Kövess minket</h2>
                <p>Itt megtalálsz</p>
                <div>
                    <i class="fab fa-facebook-f"><a href="https://www.facebook.com/"></a></i>
                    <i class="fab fa-twitter"><a href="https://www.twitter.com/"></a></i>
                    <i class="fab fa-instagram"><a href="https://www.instagram.com/"></a></i>
                    <i class="fab fa-youtube"><a href="https://www.youtube.com/"></a></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                 ©2024  | made by team mind1
                <a href="https://github.com/sz-kardos/foszk_donation" target="_black">check our code <i class="fa-brands fa-github"></i>
                    Tube</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>


    <!-- Jquery Library file -->
    <script src="./js/Jquery3.7.1.min.js"></script>

    <!--  Owl-Carousel js -->
    <script src="./js/owl.carousel.min.js"></script>

    <!--  AOS js Library -->
    <script src="./js/aos.js"></script>

    <script src="./js/main.js"></script>
</body>
</html>
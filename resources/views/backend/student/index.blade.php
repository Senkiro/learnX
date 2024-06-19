<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
{{--    <link href="backend/css/styleCourses.css?v={{config('app.version')}}" >--}}
{{--    <link href="backend/css/courses.css?v={{config('app.version')}}"/>--}}


    <!-- Iconscount sdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />

    <!-- Google Fonts Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet" />
    <style>
        body{
            background-image: url("/storage/app/public/images/dashboard/bg-texture.png");
        }
    </style>
</head>

<body>

<!-- ============ BEGIN NAVBAR =============-->
<nav>
    <div class="container nav__container">
        <a href="index.html">
            <h4>EGATOR</h4>
        </a>
        <ul class="nav__menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="contact.html">Contact</a></li>
            <l1><a href="{{route('auth.logout')}}">
                    <i class="fa fa-sign-out"></i> Log out
                </a></l1>
        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
<!-- ============ END OF NAVBAR =============-->

<section class="courses">
    <h2>Our Popular Courses</h2>
    <div class="container courses__container">
        <article class="course">
            <div class="course_-image">
                <img src="./images/course1.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Social Media</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course2.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Smart Home</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course3.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course4.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course5.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course6.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course7.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course8.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course_-image">
                <img src="./images/course9.jpg" />
            </div>
            <div class="course__info">
                <h4>Responsive Admin web</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptates neque ea consequatur vitae quisquam itaque laboriosam
                    doloremque tempore explicabo quasi veritatis dolor
                </p>
                <a href="courses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

    </div>
</section>

<script>
    //change navbar styles on scroll

    window.addEventListener('scroll', () =>{
        document.querySelector('nav').classList.toggle
        ('window-scroll', window.scrollY > 0)
    })

    // show/hide faq answer

    const faqs = document.querySelectorAll('.faq');

    faqs.forEach(faq => {
        faq.addEventListener('click', ()=>{
            faq.classList.toggle('open');

            //change icon
            const icon = faq.querySelector('.faq__icon i');
            if(icon.className === 'uil uil-plus'){
                icon.className = "uil uil-minus";
            }else{
                icon.className = 'uil uil-plus';
            }
        })
    })

    // show/hide nav menu
    const menu = document.querySelector(".nav__menu");
    const menuBTN = document.querySelector("#open-menu-btn");
    const closeBTN = document.querySelector("#close-menu-btn");

    menuBTN.addEventListener('click',()=>{
        menu.style.display = "flex";
        closeBTN.style.display = "inline-block";
        menuBTN.style.display = "none";
    })

    //close nav menu
    const closeNav = ()=>{
        menu.style.display = "none";
        closeBTN.style.display = "none";
        menuBTN.style.display = "inline-block";
    }

    closeBTN.addEventListener('click', closeNav)

</script>


<footer>
    <div class="container footer__container">
        <div class="footer__1">
            <a href="http://" class="footer__logo">
                <h4>EGATOR</h4>
            </a>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, amet?
            </p>
        </div>

        <div class="footer__2">
            <h4>Permalinks</h4>
            <ul class="permalinks">
                <li><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="courses.html">COURSES</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </div>

        <div class="footer__3">
            <h4>Primacy</h4>
            <ul class="primacy">
                <li><a href="#"></a>Privacy Policy</li>
                <li><a href="#"></a>Terms and condition</li>
                <li><a href="#"></a>Refund Policy</li>
            </ul>
        </div>

        <div class="footer__4">
            <h4>Contact us</h4>
            <div class="">
                <p>+84 123456789</p>
                <p>education@gmail.com</p>
            </div>

            <ul class="footer__socials">
                <li><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                <li><a href="#"></a><i class="uil uil-instagram-alt"></i></li>
                <li><a href="#"></a><i class="uil uil-twitter"></i></li>
                <li><a href="#"></a><i class="uil uil-link"></i></li>
            </ul>
        </div>

    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; EGATOR</small>
    </div>
</footer>
<script src="./main.js"></script>
</body>

</html>

<style>
    * {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }

    :root {
        --color-primary: #6c6cff;
        --color-success: #00bf8e;
        --color-warning: #f7c94b;
        --color-danger: #f75842;
        --color-danger-variant: rgba(247, 88, 66, 0.4);
        --color-white: #fff;
        --color-light: rgba(255, 255, 255, 0.7);
        --color-black: #000;
        --color-bg: #1f2651;
        --color-bg1: #2e3267;
        --color-bg2: #424890;

        --container-width-lg: 76%;
        --container-width-md: 90%;
        --container-width-sm: 94%;

        --transition: all 400ms ease;

    }

    body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.7;
        color: var(--color-white);
        background-color: var(--color-bg);
    }

    .container {
        width: var(--container-width-lg);
        margin: 0 auto;
    }

    section {
        padding: 6rem 0;
    }

    section h2 {
        text-align: center;
        margin-bottom: 4rem;
    }

    h1, h2, h3, h4, h5 {
        line-height: 1.2;
    }

    h1 {
        font-size: 2.4rem;
    }

    h2 {
        font-size: 2.4rem;
    }

    h3 {
        font-size: 1.6rem;
    }

    h4 {
        font-size: 1.3rem;
    }

    a {
        color: var(--container-width-sm);
    }

    img {
        width: 100%;
        display: block;
        object-fit: cover;
    }

    .btn {
        display: inline-block;
        background-color: var(--color-white);
        color: var(--color-black);
        padding: 1rem 2rem;
        border: 1px solid transparent;
        font-weight: 500;
        transition: var(--transition);
    }

    .btm:hover {
        background: transparent;
        color: var(--color-white);
        border-color: var(--color-white);
    }

    .btn-primary {
        background-color: var(--color-danger);
        color: var(--color-white);
    }

    /* ======================== NAVBAR ========================= */

    nav {
        background-color: transparent;
        width: 100vw;
        height: 5rem;
        position: fixed;
        top: 0;
        z-index: 11;
    }

    /* change navbar styles on scroll using javascript */
    .window-scroll {
        background-color: var(--color-primary);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
    }

    .nav__container {
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    nav button {
        display: none;
    }

    .nav__menu {
        display: flex;
        align-items: center;
        gap: 4rem;
    }

    .nav__menu a {
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .nav__menu a:hover {
        color: var(--color-bg2);
    }

    /* ============== HEADER =================== */
    header {
        position: relative;
        top: 5rem;
        overflow: hidden;
        height: 70vh;
        margin-bottom: 5rem;
    }

    .header__container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 5rem;
        height: 100%;
    }

    .header__left p {
        margin: 1rem 0 2.4rem;

    }

    /* ============== CATEGORIES =================== */
    .categories {
        background-color: var(--color-bg1);
        height: 32rem;
    }

    .categories h1 {
        line-height: 1;
        margin-bottom: 3rem;
    }

    .categories__container {
        display: grid;
        grid-template-columns: 40% 60%;
    }

    .categories__left {
        margin-right: 4rem;
    }

    .categories__left p {
        margin: 1rem 0 3rem;
    }

    .categories__right {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.2rem;
    }

    .category {
        background: var(--color-bg2);
        padding: 2rem;
        border-radius: 2rem;
        transform: var(--transition);
    }

    .category:hover {
        box-shadow: 0 3rem 3rem rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .category:nth-child(2) .category__icon {
        background: var(--color-danger);
    }

    .category:nth-child(3) .category__icon {
        background: var(--color-success);
    }

    .category:nth-child(4) .category__icon {
        background: var(--color-warning);
    }

    .category:nth-child(5) .category__icon {
        background: var(--color-success);
    }

    .category__icon {
        background-color: var(--color-primary);
        padding: 0.7rem;
        border-radius: 0.9rem;
    }

    .category h5 {
        margin: 2rem 0 1rem;
    }

    .category p {
        font-size: 0.85rem;
    }

    /* =============== POPULAR COURSES =================== */
    .courses {
        margin-top: 10rem;
    }

    .courses__container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .course {
        background: var(--color-bg1);
        text-align: center;
        border: 1px solid transparent;
        transition: var(--transition);
    }

    .course:hover {
        background: transparent;
        border-color: var(--color-primary);
    }

    .course__info {
        padding: 2rem;
    }

    .course__info p {
        margin: 1.2rem 0 2rem;
        font-size: 0.9rem;
    }

    /* =================== FAQS ========================= */
    .faqs {
        background-color: var(--color-bg1);
        box-shadow: inset 0 0 3rem rgba(0, 0, 0, 0.5);
    }

    .faqs__container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .faq {
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 1.4rem;
        height: fit-content;
        background: var(--color-primary);
        cursor: pointer;
    }

    .faq h4 {
        font-size: 1rem;
        line-height: 2.2;
    }

    .faq__icon {
        align-self: flex-start;
        font-size: 1.2rem;
    }

    .faq p {
        margin-top: 0.8rem;
        display: none;
    }

    .faq.open p {
        display: block;
    }

    /* ============== TESTIMONIALS ========================= */
    .testimonials__container {
        overflow-x: hidden;
        position: relative;
        margin-bottom: 5rem;
    }

    .testimonial {
        padding-top: 2rem;
    }

    .avatar {
        width: 6rem;
        height: 6rem;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 1rem;
        border: 1rem solid var(--color-bg1);
    }

    .testimonial__info {
        text-align: center;
    }

    .testimonial__body {
        background: var(--color-primary);
        padding: 2rem;
        margin-top: 3rem;
        position: relative;
    }

    .testimonial__body::before {
        content: "";
        display: block;
        background: linear-gradient(135deg, transparent, var(--color-primary), var(--color-primary),var(--color-primary));
        width: 3rem;
        height: 3rem;
        position: absolute;
        left: 50%;
        top: -1.5rem;
        transform: rotate(45deg);
    }

    /* ======================== FOOTER ========================== */
    footer{
        background: var(--color-bg1);
        padding-top: 5rem;
    }

    .footer__container{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 5rem;
    }

    .footer__container > div h4 {
        margin-bottom: 1.2rem;
    }

    .footer__1 p {
        margin:  0 0 2rem;
    }

    footer ul li {
        margin-bottom: 0.7rem;
    }

    footer ul li a:hover{
        text-decoration: underline;
    }

    .footer__socials{
        display: flex;
        gap: 1rem;
        font-size: 1.2rem;
        margin-top: 2rem;
    }

    .footer__copyright{
        text-align: center;
        padding: 1.2rem 0;
        border-top: 1px solid var(--color-bg2);
    }

    /* ========================== MEDIA QUERIES (TABLETS) ============================= */
    @media screen and (max-width: 1024px) {
        .container{
            width: var(--container-width-md);
        }

        h1{
            font-size: 2.2rem;
        }

        h2{
            font-size: 1.7rem;
        }
        h3{
            font-size: 1.4rem;
        }
        h4{
            font-size: 1.2rem;
        }

        /* =================== NAVBAR ==================== */
        nav button {
            display: inline-block;
            background: transparent;
            font-size: 1.8rem;
            color: var(--color-white);
            cursor: pointer;
        }

        nav button#close-menu-btn{
            display: none;
        }

        .nav__menu{
            position: fixed;
            top: 5rem;
            right: 5%;
            height: fit-content;
            width: 18rem;
            flex-direction: column;
            gap: 0;
            display: none;
        }

        .nav__menu li{
            width: 100%;
            height: 5.8rem;
            animation: animationNavItems 400ms linear forwards;
            transform-origin: top right;
            opacity: 0;
        }


        .nav__menu li:nth-child(2){
            animation-delay: 200ms ;
        }

        .nav__menu li:nth-child(3){
            animation-delay: 400ms ;
        }

        .nav__menu li:nth-child(4){
            animation-delay: 600ms ;
        }

        @keyframes animationNavItems {
            0%{
                transform: rotateZ(-99deg) rotateX(99deg) scale(0.1);
            }

            100%{
                transform: rotateZ(0) rotateX(0) scale(1);
                opacity: 1;
            }

        }

        .nav__menu li a{
            background: var(--color-primary);
            box-shadow: -4rem 6rem 10rem rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
        }

        .nav__menu li a:hover{
            background: var(--color-bg2);
            color: var(--color-white);
        }

        /* ================ HEADER ===================== */
        height{
            height: 52vh;
            margin-bottom: 4rem;
        }

        .header__container{
            gap: 0;
            padding-bottom:3rem ;
        }

        /* ============ CATEGORIES ======================== */
        .categories{
            height: auto;
        }

        .categories__container{
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .categories__left{
            margin-right: 0;
        }
        /* ==================== POPULAR COURSES ====================== */
        .courses{
            margin-top: 0;
        }

        .courses__container{
            grid-template-columns: 1fr 1fr;
        }

        /* ==================== FAQS ===========================  */
        .faqs__container{
            grid-template-columns: 1fr;
        }

        .faq{
            padding: 1.5rem;
        }

        /* ====================== FOOTER ========================= */
        .footer__container{
            grid-template-columns: 1fr 1fr;
        }

    }

    /* ============================= MEDIA QUERIES (PHONE) ============================= */
    @media screen and (max-width: 600px) {
        .container{
            width: var(--container-width-sm);
        }

        /* =========== NAVBAR =================== */
        .nav__menu{
            right: 3%;
        }

        /* ==================== HEADER ==================== */
        header{
            height: 100vh;
        }

        .header__container{
            grid-template-columns: 1fr;
            text-align: center;
            margin-top: 0;
        }

        .header__left{
            margin-bottom: 1.3rem;

        }

        /* =============== CATEGORIES ================== */
        .categories__right{
            grid-template-columns: 1fr 1fr;
            gap: 0.7rem;
        }

        .category{
            padding: 1rem;
            border-radius: 1rem;
        }

        .category__icon{
            margin-top: 4px;
            display: inline-block;
        }

        /* =================== POPULAR COURSES =============== */
        .courses__container{
            grid-template-columns: 1fr;
        }

        /* ============= TESTIMONIAL ===================== */
        .testimonial__body{
            padding: 1.2rem;
        }

        /* ====================== FOOTER ================== */
        .footer__container1{
            grid-template-columns: 1fr;
            text-align: center;
            gap: 2rem;
        }

        .footer__1 p {
            margin: 1rem auto;
        }

        .footer__socials{
            justify-content: center;
        }
    }

    .courses{
        margin-top: 1rem ;
    }
</style>

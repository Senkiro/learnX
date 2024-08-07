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
    padding-top: 0;
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

.btn:hover {
background: transparent;
color: var(--color-white);
border-color: var(--color-white);
}

.btn-primary {
background-color: var(--color-danger);
color: var(--color-white);
}

/* ======================== COURSES ========================= */
.courses__container {
display: grid;
grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
gap: 2rem;
}

.course {
background: var(--color-bg1);
text-align: center;
border: 1px solid transparent;
transition: var(--transition);
padding: 1rem;
}

.course:hover {
background: transparent;
border-color: var(--color-primary);
}

.course__info {
padding: 1rem 0;
}

.course__info h4 {
margin: 1rem 0;
}

/* ======================== PAGINATION ========================= */
.pagination-container {
text-align: center;
margin-top: 2rem;
}

.pagination {
display: inline-block;
padding: 0;
margin: 0;
list-style: none;
}

.pagination .page-item {
display: inline;
}

.pagination .page-link {
color: var(--color-primary);
float: left;
padding: 8px 16px;
text-decoration: none;
transition: background-color .3s;
}

.pagination .page-link:hover {
background-color: var(--color-bg2);
color: var(--color-white);
}

/* ======================== MEDIA QUERIES ========================= */
@media screen and (max-width: 1024px) {
.container {
width: var(--container-width-md);
}

h1 {
font-size: 2.2rem;
}

h2 {
font-size: 1.7rem;
}

h3 {
font-size: 1.4rem;
}

h4 {
font-size: 1.2rem;
}

.courses__container {
grid-template-columns: 1fr 1fr;
}
}

@media screen and (max-width: 600px) {
.container {
width: var(--container-width-sm);
}

.courses__container {
grid-template-columns: 1fr;
}

.course {
padding: 0.5rem;
}

.course__info h4 {
font-size: 1rem;
}

.pagination .page-link {
padding: 4px 8px;
}
}
/* ======================== NAVBAR ========================= */

nav {
    background-color: transparent;
    width: 100vw;
    height: 5rem;
    position: sticky;
    top: 0;
    z-index: 11;
    padding-top: 0;
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

/* Filter Wrapper */
.filter-wrapper {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    align-items: center;
    justify-content: flex-end; /* Align to the right */
    padding: 1rem;
    border-radius: 5px;
    margin-top: 1rem; /* Adjust margin to ensure proper spacing */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add subtle shadow for better appearance */
    background-color: transparent; /* Remove white background */
}

/* Perpage Dropdown */
.perpage {
    margin-right: 1rem;
}

.perpage .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
    height: calc(1.5em + .75rem + 2px); /* Adjust height to match Bootstrap form control */
    border-radius: 5px; /* Rounded corners */
}

/* Action Group */
.action {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Align to the right */
    flex-grow: 1;
}

.input-group {
    display: flex;
    align-items: center;
    width: auto; /* Adjust width as needed */
}

.input-group .form-control {
    height: calc(1.5em + .75rem + 2px); /* Adjust height to match Bootstrap form control */
    border-radius: 5px 0 0 5px; /* Rounded corners for the input */
    flex: 1; /* Allow flexibility */
    margin-right: 0.5rem; /* Space between input and button */
}

.input-group .input-group-btn .btn {
    height: calc(1.5em + .75rem + 2px); /* Adjust height to match Bootstrap button */
    line-height: 1.5; /* Ensure text is vertically centered */
    border-radius: 5px; /* Rounded corners for the button */
    background-color: #28a745; /* Button color */
    color: #fff; /* Button text color */
    border: none; /* Remove border */
    padding: 0 1rem; /* Add padding for better click area */
}


/* Center the pagination */
.pagination {
    display: flex;
    justify-content: center; /* Center the pagination items */
    margin-top: 1rem; /* Adjust the margin as needed */
}

.pagination li {
    display: inline-block;
    margin-right: 0.5rem;
}


.cart-container {
    max-width: 300px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.cart-header, .cart-footer {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.cart-item img {
    width: 50px;
    height: 50px;
}

.cart-body {
    max-height: 300px;
    overflow-y: auto;
}

.checkout-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    text-align: center;
    display: block;
}

.cart-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1000;
}

.cart-dropdown.active {
    display: block;
}

.course {
    margin-bottom: 20px;
}
.cart-container {
    position: fixed;
    top: 0;
    right: 0;
    width: 300px;
    height: 100%;
    background-color: #fff;
    box-shadow: -2px 0 5px rgba(0,0,0,0.5);
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
    z-index: 1000;
}
.cart-container.active {
    transform: translateX(0);
}
.cart-header, .cart-item, .cart-footer {
    padding: 10px;
}
.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.cart-item img {
    width: 50px;
    height: 50px;
}
.cart-footer {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
}
.checkout-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}
.description {
    position: relative;
}
.description .more-text {
    display: none;
}


</style>

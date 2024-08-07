<script>
    document.addEventListener('DOMContentLoaded', () => {
        const readMoreLinks = document.querySelectorAll('.read-more');
        readMoreLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const description = link.closest('.description');
                const shortText = description.querySelector('.short-text');
                const moreText = description.querySelector('.more-text');

                if (moreText.style.display === 'none' || moreText.style.display === '') {
                    moreText.style.display = 'inline';
                    shortText.style.display = 'none';
                    link.textContent = 'Read less';
                } else {
                    moreText.style.display = 'none';
                    shortText.style.display = 'inline';
                    link.textContent = 'Read more';
                }
            });
        });

    });

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


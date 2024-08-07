<?php
$this->setLayout('frontend');
$this->assign('title', 'About');
?>




<div class="space"> </div>
<!-- ============================================ -->
<!--                   Contact                    -->
<!-- ============================================ -->

<section id="contact-1750">
    <div class="cs-container">
        <div class="cs-form-group">
            <div class="cs-content">
                <span class="cs-topper">Get in Touch</span>
                <h2 class="cs-title">Contact Us</h2>
            </div>
            <!--Form-->
            <form class="cs-form" id="cs-form-1750" name="Contact Form" method="post">
                <label class="cs-label">
Name *
                    <input class="cs-input" required type="text" id="name-1750" name="name" placeholder="John Doe">
                </label>
                <label class="cs-label cs-email">
Email *
                    <input class="cs-input" required type="email" id="email-1750" name="email" placeholder="name@company.com">
                </label>
                <label class="cs-label cs-phone">
Phone *
                    <input class="cs-input" required type="phone" id="phone-1750" name="phone" placeholder="+1 (206) 987-6543">
                </label>
                <label class="cs-label">
Message *
                    <textarea class="cs-input cs-textarea" required name="Message" id="message-1750" placeholder="Hello, I am interested..."></textarea>
                </label>
                <button class="cs-button-solid cs-submit" type="submit">Send Message</button>
            </form>
        </div>
        <!--Contact Info-->
        <div class="cs-info-group">
            <div class="cs-info">
                <span class="cs-topper">Location</span>
                <span class="cs-detail">234-244 Stockwell Rd, 4th Floor<br>Brixton, SW9 9SP</span>
            </div>
            <div class="cs-info">
                <span class="cs-topper">Working Hours</span>
                <span class="cs-detail">Monday - Saturday: 10:00 - 20:00</span>
                <span class="cs-detail">Sunday: Closed</span>
            </div>
            <div class="cs-info">
                <span class="cs-topper">Contact</span>
                <span class="cs-detail">M: +99 40 70 929</span>
                <span class="cs-detail">E: info@stitchgym.com</span>
            </div>
        </div>
    </div>

    <div class="cs-picture-group">
        <!--Replace with your iframe for your google business profile-->
        <iframe class="cs-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172153.33373691145!2d-122.33979794999999!3d47.608715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490102c93e83355%3A0x102565466944d59a!2sSeattle%2C%20WA!5e0!3m2!1sen!2sus!4v1717096613140!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <!--All three graphics use the same src, which is transformed in the CSS. If you want to replace the graphic with another one, simply replace all the src's with the same URL and watch the magic happen!-->
        <img class="cs-graphic cs-top cs-light" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-light.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
        <img class="cs-graphic cs-left cs-light" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-light.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
        <img class="cs-graphic cs-bottom cs-light" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-light.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >

        <!--This is a dark version. Download the images and change the fill color to match the color of the section background below it-->
        <img class="cs-graphic cs-top cs-dark" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-dark.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
        <img class="cs-graphic cs-left cs-dark" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-dark.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
        <img class="cs-graphic cs-bottom cs-dark" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/gym-hero-shape-top-dark.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
    </div>

</section>

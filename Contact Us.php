
 <?php include("./header.php") ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="Home_page.php">Home</a>
                    <span class="breadcrumb-item active">Contact Us</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.628069616962!2d81.15018311419469!3d6.9349785201683005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae460baaa1eda9d%3A0x12639776bd707794!2sCalisto%20Pharmacy!5e0!3m2!1sen!2slk!4v1658275826894!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>65/A, Kandy Road, Badulla, Srilanka</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>calistopharmacy2019@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 776688981</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


     <!-- Contact Start -->
     <div class="container-fluid">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-lg-10 mb-5 align-items-center">
                <div class="bg-light p-30 mb-30">
                  <p>Calisto Medilab, was established in 2019 as a join Proprietor business entity by Mr. John Calisto. With our six members, we have served the nation for Over 3 Generations, with lot of medicines. Our team is trained on Medicinal Product or prescription Advice and Explanation, Medical Equipment Demonstration and installation.</p>
                </div>    
                <div class="bg-light p-30 mb-30 content-center">
                    <h3>Our Mission</h3>
                    <p>Many of our consumers use online business methods. Also, due to the new technology, selling products online is a new trend among customers.  And as well as with present busy schedules and traffic situations to customers, we have established our  “Online Pharmacy” service.  </p>
                </div>    
                <div class="bg-light p-30 mb-30 justify-content-center">
                    <h3>Our Target </h3>
                    <p>We sell quality products at a profit to consumers over the Internet and gaining more customers online. </p>
                </div>    
            </div>
          
        </div>
    </div>
    <!-- Contact End -->


 
    <?php include("./footer.php") ?>
<?php
function twentytwentythree_child_enqueue_styles() {
    wp_enqueue_style('twentytwentythree-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('twentytwentythree-child-style', get_stylesheet_directory_uri() . '/style.css', array('twentytwentythree-style'));
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), null);
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');
    wp_enqueue_style('inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap', false);
    wp_enqueue_script('wizard-script', get_stylesheet_directory_uri() . '/wizard.js', array('jquery'), null, true);
    wp_enqueue_style('child-custom-style', get_stylesheet_directory_uri() . '/custom.css', array('twentytwentythree-child-style'), '1.0');
}
add_action('wp_enqueue_scripts', 'twentytwentythree_child_enqueue_styles');

function r_test_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title' => 'Test work',
    ), $atts);
    
    ob_start(); 
    ?>
    <div>
        <div class="wizard col-10 mx-auto" style="width: 770px; height: 440px; padding: 35px 80px; border-radius: 6px; background-color: #E5E5E5;">
            <nav class="nav nav-pills d-flex justify-content-start align-items-center bg-white " style="margin: 0 0 29px 0; padding: 0; color:#E5E5E5; border-radius: 6px; height: 40px; width:fit-content;">
                <a class="position-relative nav-link text-secondary step-link d-flex align-items-center pt-0 pb-0 curved-border-link " style="height: 40px;" href="javascript:void(0);" id="step-home" data-step="1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>
                    <i class="bi bi-chevron-right icon"></i>
                </a>
                <a class="active position-relative nav-link text-secondary step-link d-flex align-items-center pt-0 pb-0" style="height: 40px;" href="javascript:void(0);" id="step-contact-info-link" data-step="2">
                    <span>Contact Info</span>
                    <i class="bi bi-chevron-right icon"></i>
                </a>
                <a class="position-relative nav-link text-secondary step-link d-flex align-items-center pt-0 pb-0" style="height: 40px;" href="javascript:void(0);" id="step-quantity-link" data-step="3">
                    <span>Quantity</span>
                    <i class="bi bi-chevron-right icon"></i>
                </a>
                <a class="position-relative nav-link text-secondary step-link d-flex align-items-center pt-0 pb-0" style="height: 40px;" href="javascript:void(0);" id="step-price-link" data-step="4">
                    <span>Price</span>
                    <i class="bi bi-chevron-right icon"></i>
                </a>
                <a class="nav-link text-secondary step-link d-flex align-items-center pt-0 pb-0" style="height: 40px;" href="javascript:void(0);" id="step-done-link" data-step="5">
                    <span>Done</span>
                </a>
            </nav>
            
           
            
            <form class="row justify-content-center" id="wizard-form">
               
                <div id="step-1" class="step">
                     <h2 class="text-start " id="wizard-step-title" style="font-size: 48px; font-weight: 600px;">Contact Info</h2>
                    <div class="row mb-1 align-items-center" style="margin-bottom: 19px;">
                        <div class="col-3 d-flex align-items-center justify-content-end">
                            <label for="name" class="form-label m-0">Name</label>
                        </div>
                        <div class="col-8" style="height: 40px;">
                            <input type="text" id="name" name="name" class="form-control form-control-md" required>
                        
                        </div>
                    </div>
                    <div class="row mb-1 align-items-center" style="margin-bottom: 19px;">
                        <div class="col-3 d-flex align-items-center justify-content-end position-relative">
                            <label for="email" class="form-label align-item-start" style="margin-right:40px;">Email</label>
                            <span class="text-muted  small position-absolute" style="left:108px; top: -1px; ">required</span>
                        </div>
                        <div class="col-8 position-relative" style="height: 40px;">
                            <input type="email" id="email" name="email" class="form-control form-control-md" required>
                            <small id="email-error" class="text-danger d-none position-absolute bottom-0" style="min-height: 1.2rem; display: block;">Please enter a valid email.</small>
                        </div>
                    </div>
                    <div class="row mb-1 align-items-center" style="margin-bottom: 19px;">
                        <div class="col-3 d-flex align-items-center justify-content-end">
                            <label for="phone" class="form-label m-0">Phone</label>
                        </div>
                        <div class="col-8" style="height: 40px;">
                            <input type="tel" id="phone" name="phone" class="form-control form-control-md">
                            <small id="phone-error" class="text-danger d-none" style="min-height: 1.2rem; display: block;">Please enter a valid phone number.</small>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg" id="continue-1">Continue</button>
                </div>

                <div id="step-2" class="step" style="display: none; margin-top:-38px; padding-bottom-40px;">
                    <h2 class="text-start " style="font-size:48px; font-weight: 600px;margin-bottom:28px">Quantity</h2>
                    <div class="row  align-items-center" style="margin-bottom: 135px;">
                        <div class="col-3 d-flex align-items-center justify-content-end position-relative" >
                            <label for="quantity" class="form-label" style="margin-right:40px;">Quantity</label>
                              <span class="text-muted  small position-absolute" style="left:108px; top: -1px; ">required</span>
                        </div>
                        <div class="col-8" style="height:40px ">
                            <input type="number" id="quantity" name="quantity" class="form-control form-control-md" max="1000" required>
                            <small id="quantity-error" class="text-danger d-none" style="min-height: 1.2rem; display: block;">Please enter a valid quantity (1-1000).</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start gap-2">
                          <button type="button" class="btn btn-primary btn-lg fs-5 px-2 py-1" id="continue-2">Continue</button>
                        <button type="button" class="btn btn-secondary btn-lg  d-flex align-items-center" id="back-2"><i class="bi bi-arrow-left-short"></i>back</button>
                      
                    </div>
                </div>

              
                <div id="step-3" class="step" style="display: none; margin-top:-38px;">
                    <h2 class="text-start fs-1" style="font-size:48px; font-weight: 600px;">Price</h2>
                    <p style="font-size:130px"><strong><span id="price-display"></span></strong></p>
                    <div class="d-flex justify-content-start gap-2">
                          <button type="submit" class="btn btn-primary btn-lg" id="send-email">Send to email</button>
                        <button type="button" class="btn btn-secondary btn-lg d-flex align-items-center" id="back-3"><i class="bi bi-arrow-left-short " ></i> Back</button>
                      
                    </div>
                </div>

                
                <div id="step-4" class="step" style="display: none;">
                    <h2 class="text-start fs-1">Done</h2>
                    <p id="final-message" class="text-success" style="margin-bottom:145px"></p>
                    <button type="button" class="btn btn-success btn-sm" id="start-again">Start Again</button>
                </div>
            </form>
        </div>

        <div class="mt-5 " style="background-color: #fff; border-radius: 10px; padding: 0px 80px;">
            <h3><?php echo esc_html($atts['title']); ?> - Additional Info</h3>
            <p><?php echo $content; ?> - Additional description here.</p>
        </div>
    </div>
    <?php
    return ob_get_clean(); 
}
add_shortcode('r_test', 'r_test_shortcode');

function r_test_enqueue_scripts() {
    wp_enqueue_script('wizard-script', get_stylesheet_directory_uri() . '/wizard.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'r_test_enqueue_scripts');


add_action('phpmailer_init', 'setup_phpmailer_smtp');
function setup_phpmailer_smtp($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Port = 587;
    $phpmailer->Username = 'ygaginazy@gmail.com';
    $phpmailer->Password = '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';
}


function send_wizard_email() {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $quantity = intval($_POST['quantity']);
    $price = sanitize_text_field($_POST['price']);

    if ($price <= 1000) {
        $message = "Name: $name\nEmail: $email\nPhone: $phone\nQuantity: $quantity\nPrice: $price";
        $sent = wp_mail($email, 'Wizard Results', $message);

        if ($sent) {
            echo 'success';
        } else {
            echo 'failure - email not sent';
            error_log('Email sending failed for ' . $email); 
        }
    } else {
        echo 'failure - price exceeds $1000';
    }

    wp_die(); 
}



add_action('wp_ajax_send_wizard_email', 'send_wizard_email');
add_action('wp_ajax_nopriv_send_wizard_email', 'send_wizard_email');

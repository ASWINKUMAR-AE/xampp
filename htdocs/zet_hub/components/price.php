<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dark Mode Pricing Section</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Base styles */
    body {
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Pricing section specific styles */
    .pricing-card {
      background: #1e1e1e;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      transition: all 0.3s ease;
      border: 1px solid #333;
      position: relative;
      overflow: hidden;
    }
    
    .pricing-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }
    
    .pricing-card.featured {
      border: 1px solid #666;
      background: #252525;
    }
    
    .pricing-card h3 {
      color: #f5f5f5;
      font-weight: 600;
      margin-bottom: 20px;
      font-size: 1.5rem;
    }
    
    .price {
      font-size: 2.2rem;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 20px;
    }
    
    .price span {
      font-size: 1rem;
      color: #aaa;
      font-weight: 400;
    }
    
    .features {
      list-style: none;
      padding: 0;
      margin-bottom: 30px;
    }
    
    .features li {
      margin-bottom: 10px;
      color: #ccc;
      display: flex;
      align-items: center;
    }
    
    .features i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
    }
    
    .features .fa-check {
      color: #4CAF50;
    }
    
    .features .fa-times {
      color: #f44336;
    }
    
    .btn-pricing {
      background: linear-gradient(135deg, #555, #333);
      color: white !important;
      border: none;
      padding: 10px 25px;
      border-radius:50px !important;
      font-weight: 500;
      width: 100%;
      transition: all 0.3s;
    }
    
    .btn-pricing:hover {
      background: linear-gradient(135deg, #666, #444);
      color: white;
    }
    
    .ribbon {
      position: absolute;
      top: 10px;
      right: -30px;
      padding: 5px 30px;
      transform: rotate(45deg);
      font-size: 12px;
      font-weight: 600;
      z-index: 1;
    }
    
    /* Nav pills styling */
    .nav-pills .nav-link {
      background: #252525;
      color: #ccc;
      border-radius: 30px;
      margin: 0 5px;
      padding: 8px 20px;
      border: 1px solid #333;
      transition: all 0.3s;
    }
    
    .nav-pills .nav-link.active {
      background: linear-gradient(135deg, #555, #333);
      color: white;
      border-color: #444;
    }
    
    /* Hosting plan cards */
    .hosting-plan-card {
      background: #1e1e1e;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid #333;
      transition: all 0.3s;
    }
    
    .hosting-plan-card.featured {
      border: 1px solid #666;
      background: #252525;
    }
    
    .hosting-plan-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }
    
    .plan-header {
      padding: 20px;
      text-align: center;
      position: relative;
    }
    
    .plan-header h4 {
      font-weight: 600;
      margin: 0;
    }
    
    .popular-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      color: white;
    }
    
    .plan-features {
      padding: 20px;
    }
    
    .feature {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      color: #ccc;
    }
    
    .feature i {
      margin-right: 10px;
      font-size: 1.2rem;
    }
    
    .plan-pricing {
      padding: 0 20px 20px;
      text-align: center;
    }
    
    .price-main {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 5px;
    }
    
    .price-renewal {
      font-size: 0.9rem;
      margin-bottom: 15px;
    }
    
    .plan-select-btn {
      display: block;
      width: calc(100% - 40px);
      margin: 0 auto 20px;
      padding: 10px;
      background: linear-gradient(135deg, #555, #333);
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: 500;
      transition: all 0.3s;
    }
    
    .plan-select-btn:hover {
      background: linear-gradient(135deg, #666, #444);
    }
    
    /* Contact buttons */
    .contact-methods {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 20px;
    }
    
    .contact-btn {
      flex: 1 1 calc(50% - 5px);
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      color: white;
      text-decoration: none;
      transition: all 0.3s;
      min-width: 120px;
    }
    
    .contact-btn i {
      margin-right: 5px;
    }
    
    .contact-btn.whatsapp {
      background: #25D366;
    }
    
    .contact-btn.phone {
      background: #34B7F1;
    }
    
    .contact-btn.instagram {
      background: #E1306C;
    }
    
    .contact-btn:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
    
    /* Responsive adjustments */
    @media (max-width: 991.98px) {
      .pricing-card {
        margin-bottom: 20px;
      }
      
      .nav-pills {
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 10px;
      }
      
      .nav-item {
        flex-shrink: 0;
      }
    }
    
    @media (max-width: 767.98px) {
      .price {
        font-size: 1.8rem;
      }
      
      .contact-btn {
        flex: 1 1 100%;
      }
    }
    
    @media (max-width: 575.98px) {
      .pricing-section {
        padding: 40px 0;
      }
      
      .pricing-card {
        padding: 20px;
      }
      
      .plan-select-btn, .btn-pricing {
        padding: 8px 15px;
      }
    }
  </style>
</head>
<body>
  <section class="pricing-section" id="pricing" style="background-color: #0a0a0a; padding: 80px 0;">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="section-title" style="color: #f0f0f0; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">Our Pricing Plans</h2>
          <div class="divider" style="width: 80px; height: 4px;background: linear-gradient(90deg, #666, #999); margin: 20px auto;"></div>
          <p class="section-subtitle text-center" style="color: #a0a0a0;">Tailored solutions for businesses of all sizes</p>
        </div>
      </div>

      <!-- Industry Tabs -->
      <div class="row mb-5">
        <div class="col-12">
          <ul class="nav nav-pills justify-content-center flex-nowrap flex-sm-wrap overflow-auto pb-2" id="industryTabs" role="tablist" style="-webkit-overflow-scrolling: touch;">
            <li class="nav-item flex-shrink-0" role="presentation">
              <button class="nav-link active" id="webdev-tab" data-bs-toggle="pill" data-bs-target="#webdev" type="button" role="tab">Web Development</button>
            </li>
            <li class="nav-item flex-shrink-0" role="presentation">
              <button class="nav-link" id="cafe-tab" data-bs-toggle="pill" data-bs-target="#cafe" type="button" role="tab">Cafés & Restaurants</button>
            </li>
            <li class="nav-item flex-shrink-0" role="presentation">
              <button class="nav-link" id="medical-tab" data-bs-toggle="pill" data-bs-target="#medical" type="button" role="tab">Medical & Hospitals</button>
            </li>
            <li class="nav-item flex-shrink-0" role="presentation">
              <button class="nav-link" id="ecom-tab" data-bs-toggle="pill" data-bs-target="#ecom" type="button" role="tab">E-Commerce</button>
            </li>
          </ul>
        </div>
      </div>

      <!-- Tab Content -->
      <div class="tab-content" id="industryTabsContent">
        <!-- Web Development Tab -->
        <div class="tab-pane fade show active" id="webdev" role="tabpanel">
          <div class="row g-4 justify-content-center">
            <!-- Static Portfolio Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100 mb-4">
                <div class="ribbon" style="background: orange !important;color: #fff;">BASIC</div>
                <h3>Static Portfolio</h3>
                <div class="price">₹9,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Up to 5 Pages</li>
                  <li><i class="fas fa-check"></i> Responsive Design</li>
                  <li><i class="fas fa-check"></i> Basic SEO</li>
                  <li><i class="fas fa-check"></i> 1 Month Support</li>
                  <li><i class="fas fa-times"></i> No CMS</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Static Portfolio', 'Web Development')">See More</button>
              </div>
            </div>
            
            <!-- Dynamic Website Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card featured h-100 mb-4">
                <div class="ribbon" style="background: green !important; color: #fff;">POPULAR</div>
                <h3>Dynamic Website</h3>
                <div class="price">₹35,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Up to 10 Pages</li>
                  <li><i class="fas fa-check"></i> CMS Integration</li>
                  <li><i class="fas fa-check"></i> Advanced SEO</li>
                  <li><i class="fas fa-check"></i> Database Support</li>
                  <li><i class="fas fa-check"></i> 3 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Dynamic Website', 'Web Development')">See More</button>
              </div>
            </div>
            
            <!-- Custom Solution Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100">
                <div class="ribbon" style="background: blue !important; color: #fff;">CUSTOM</div>
                <h3>Custom Solution</h3>
                <div class="price">₹75,000+ <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Unlimited Pages</li>
                  <li><i class="fas fa-check"></i> Custom CMS</li>
                  <li><i class="fas fa-check"></i> Premium SEO</li>
                  <li><i class="fas fa-check"></i> Advanced Features</li>
                  <li><i class="fas fa-check"></i> 6 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Custom Solution', 'Web Development')">See More</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Café & Restaurants Tab -->
        <div class="tab-pane fade" id="cafe" role="tabpanel">
          <div class="row g-4 justify-content-center">
            <!-- Basic Café Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100 mb-4">
                <div class="ribbon" style="background: orange !important; color: #fff;">BASIC</div>
                <h3>Café Basic</h3>
                <div class="price">₹12,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Menu Display</li>
                  <li><i class="fas fa-check"></i> Gallery Section</li>
                  <li><i class="fas fa-check"></i> Contact & Location</li>
                  <li><i class="fas fa-check"></i> Social Media Links</li>
                  <li><i class="fas fa-times"></i> No Online Ordering</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Café Basic', 'Food Business')">See More</button>
              </div>
            </div>
            
            <!-- Restaurant Pro Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card featured h-100 mb-4">
                <div class="ribbon" style="background: green; color: #fff;">PRO</div>
                <h3>Restaurant Pro</h3>
                <div class="price">₹25,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Interactive Menu</li>
                  <li><i class="fas fa-check"></i> Online Reservations</li>
                  <li><i class="fas fa-check"></i> Food Gallery</li>
                  <li><i class="fas fa-check"></i> SEO Optimized</li>
                  <li><i class="fas fa-check"></i> 3 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Restaurant Pro', 'Food Business')">See More</button>
              </div>
            </div>
            
            <!-- E-Commerce Café Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100">
                <div class="ribbon" style="background: blue !important; color: #fff;">PREMIUM</div>
                <h3>E-Commerce Café</h3>
                <div class="price">₹45,000+ <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Online Ordering</li>
                  <li><i class="fas fa-check"></i> Payment Gateway</li>
                  <li><i class="fas fa-check"></i> Delivery Tracking</li>
                  <li><i class="fas fa-check"></i> Loyalty Program</li>
                  <li><i class="fas fa-check"></i> 6 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('E-Commerce Café', 'Food Business')">See More</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Medical & Hospitals Tab -->
        <div class="tab-pane fade" id="medical" role="tabpanel">
          <div class="row g-4 justify-content-center">
            <!-- Clinic Basic Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100 mb-4">
                <div class="ribbon" style="background: orange !important; color: #fff;">BASIC</div>
                <h3>Clinic Basic</h3>
                <div class="price">₹15,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Service Pages</li>
                  <li><i class="fas fa-check"></i> Doctor Profiles</li>
                  <li><i class="fas fa-check"></i> Appointment Form</li>
                  <li><i class="fas fa-check"></i> Contact Info</li>
                  <li><i class="fas fa-times"></i> No Online Booking</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Clinic Basic', 'Medical')">See More</button>
              </div>
            </div>
            
            <!-- Hospital Pro Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card featured h-100 mb-4">
                <div class="ribbon" style="background: green !important; color: #fff;">PRO</div>
                <h3>Hospital Pro</h3>
                <div class="price">₹35,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Department Pages</li>
                  <li><i class="fas fa-check"></i> Online Appointments</li>
                  <li><i class="fas fa-check"></i> Doctor Schedules</li>
                  <li><i class="fas fa-check"></i> Emergency Info</li>
                  <li><i class="fas fa-check"></i> 3 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Hospital Pro', 'Medical')">See More</button>
              </div>
            </div>
            
            <!-- Medical Portal Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100">
                <div class="ribbon" style="background: blue !important; color: #fff;">PREMIUM</div>
                <h3>Medical Portal</h3>
                <div class="price">₹65,000+ <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Patient Portal</li>
                  <li><i class="fas fa-check"></i> E-Prescriptions</li>
                  <li><i class="fas fa-check"></i> Medical Records</li>
                  <li><i class="fas fa-check"></i> Telemedicine</li>
                  <li><i class="fas fa-check"></i> 6 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Medical Portal', 'Medical')">See More</button>
              </div>
            </div>
          </div>
        </div>

        <!-- E-Commerce Tab -->
        <div class="tab-pane fade" id="ecom" role="tabpanel">
          <div class="row g-4 justify-content-center">
            <!-- Basic Store Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100 mb-4">
                <div class="ribbon" style="background: orange !important; color: #fff;">BASIC</div>
                <h3>Basic Store</h3>
                <div class="price">₹25,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Up to 50 Products</li>
                  <li><i class="fas fa-check"></i> Basic Checkout</li>
                  <li><i class="fas fa-check"></i> Product Categories</li>
                  <li><i class="fas fa-check"></i> Contact Form</li>
                  <li><i class="fas fa-times"></i> No Payment Gateway</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Basic Store', 'E-Commerce')">See More</button>
              </div>
            </div>
            
            <!-- Standard Shop Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card featured h-100 mb-4">
                <div class="ribbon" style="background: green !important; color: #fff;">STANDARD</div>
                <h3>Standard Shop</h3>
                <div class="price">₹55,000 <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Up to 200 Products</li>
                  <li><i class="fas fa-check"></i> Payment Gateway</li>
                  <li><i class="fas fa-check"></i> Order Tracking</li>
                  <li><i class="fas fa-check"></i> Customer Accounts</li>
                  <li><i class="fas fa-check"></i> 3 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Standard Shop', 'E-Commerce')">See More</button>
              </div>
            </div>
            
            <!-- Enterprise Commerce Card -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing-card h-100">
                <div class="ribbon" style="background: blue !important; color: #fff;">ENTERPRISE</div>
                <h3>Enterprise Commerce</h3>
                <div class="price">₹95,000+ <span>+GST</span></div>
                <ul class="features">
                  <li><i class="fas fa-check"></i> Unlimited Products</li>
                  <li><i class="fas fa-check"></i> Multi-Payment Options</li>
                  <li><i class="fas fa-check"></i> Advanced Analytics</li>
                  <li><i class="fas fa-check"></i> Vendor System</li>
                  <li><i class="fas fa-check"></i> 6 Months Support</li>
                </ul>
                <button class="btn btn-pricing" onclick="showIndustryOptions('Enterprise Commerce', 'E-Commerce')">See More</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Hosting Plans Table -->
      <div class="row mt-5">
        <div class="col-12">
          <h3 class="text-center section-title" style="color: #e0e0e0; padding-bottom: 15px; margin-bottom: 30px; position: relative;">
            Hosting & Server Plans
            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 3px; background: linear-gradient(90deg, #666, #999); border-radius: 3px;"></span>
          </h3>
          
          <div class="row g-4 justify-content-center">
            <!-- Basic Hosting Card -->
            <div class="col-md-6 col-lg-4">
              <div class="hosting-plan-card h-100">
                <div class="plan-header" style="background: linear-gradient(135deg, #252525, #333);">
                  <h4 style="color: #fff;">Basic Hosting</h4>
                  <div class="popular-badge" style="background: orange;">ENTRY LEVEL</div>
                </div>
                <div class="plan-features">
                  <div class="feature">
                    <i class="fas fa-database" style="color: #666;"></i>
                    <span>10GB SSD Storage</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-tachometer-alt" style="color: #666;"></i>
                    <span>Unmetered Bandwidth</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-globe" style="color: #666;"></i>
                    <span>1 Domain</span>
                  </div>
                </div>
                <div class="plan-pricing">
                  <div class="price-main" style="color: #666;">
                    ₹5,097.60
                    <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                  </div>
                  <div class="price-renewal" style="color: #999;">
                    Renewal: ₹11,020.02
                  </div>
                </div>
                <button class="plan-select-btn" onclick="showContactOptions('Basic Hosting')">
                  Select Plan <i class="fas fa-arrow-right"></i>
                </button>
              </div>
            </div>
            
            <!-- Business Hosting Card -->
            <div class="col-md-6 col-lg-4">
              <div class="hosting-plan-card featured h-100">
                <div class="plan-header" style="background: linear-gradient(135deg, #333, #444);">
                  <h4 style="color: #fff;">Business Hosting</h4>
                  <div class="popular-badge" style="background: green;">POPULAR</div>
                </div>
                <div class="plan-features">
                  <div class="feature">
                    <i class="fas fa-database" style="color: #666;"></i>
                    <span>50GB SSD Storage</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-tachometer-alt" style="color: #666;"></i>
                    <span>Unmetered Bandwidth</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-globe" style="color: #666;"></i>
                    <span>Unlimited Domains</span>
                  </div>
                </div>
                <div class="plan-pricing">
                  <div class="price-main" style="color: #666;">
                    ₹8,496.00
                    <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                  </div>
                  <div class="price-renewal" style="color: #999;">
                    Renewal: ₹16,992.00
                  </div>
                </div>
                <button class="plan-select-btn" onclick="showContactOptions('Business Hosting')">
                  Select Plan <i class="fas fa-arrow-right"></i>
                </button>
              </div>
            </div>
            
            <!-- Premium Hosting Card -->
            <div class="col-md-6 col-lg-4">
              <div class="hosting-plan-card h-100">
                <div class="plan-header" style="background: linear-gradient(135deg, #444, #555);">
                  <h4 style="color: #fff;">Premium Hosting</h4>
                  <div class="popular-badge" style="background: blue;">PREMIUM</div>
                </div>
                <div class="plan-features">
                  <div class="feature">
                    <i class="fas fa-database" style="color: #666;"></i>
                    <span>100GB SSD Storage</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-tachometer-alt" style="color: #666;"></i>
                    <span>Unmetered Bandwidth</span>
                  </div>
                  <div class="feature">
                    <i class="fas fa-globe" style="color: #666;"></i>
                    <span>Unlimited Domains</span>
                  </div>
                </div>
                <div class="plan-pricing">
                  <div class="price-main" style="color: #666;">
                    ₹12,744.00
                    <span style="color: #aaa; font-size: 14px;">/3 yrs (incl. GST)</span>
                  </div>
                  <div class="price-renewal" style="color: #999;">
                    Renewal: ₹25,488.00
                  </div>
                </div>
                <button class="plan-select-btn" onclick="showContactOptions('Premium Hosting')">
                  Select Plan <i class="fas fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
          
          <p class="text-center mt-4" style="color: #a0a0a0;">
            <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
            All hosting plans include a free .in domain for the first year and basic setup support.
          </p>
        </div>
      </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #1a1a1a; color: #fff; border: 1px solid #333;">
          <div class="modal-header" style="border-bottom: 1px solid #333;">
            <h5 class="modal-title" id="modalTitle">Contact Us</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
          </div>
          <div class="modal-body">
            <div id="contactOptions">
              <h6 class="text-secondary">Choose your preferred contact method:</h6>
              <div class="contact-methods">
                <a href="https://wa.me/yourwhatsappnumber" class="contact-btn whatsapp" target="_blank">
                  <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="tel:+yourphonenumber" class="contact-btn phone">
                  <i class="fas fa-phone"></i> Call Us
                </a>
                <a href="https://instagram.com/yourinstagram" class="contact-btn instagram" target="_blank">
                  <i class="fab fa-instagram"></i> Instagram
                </a>
              </div>
            </div>
            <div id="contactForm" style="display: none;">
              <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" style="background: #222; color: #fff; border: 1px solid #333;">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" style="background: #222; color: #fff; border: 1px solid #333;">
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" id="message" rows="3" style="background: #222; color: #fff; border: 1px solid #333;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="background: #666; border: none;">Submit</button>
              </form>
            </div>
          </div>
          <div class="modal-footer" style="border-top: 1px solid #333;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #333; border: none;">Close</button>
            <button type="button" class="btn btn-primary" onclick="toggleContactForm()" style="background: #666; border: none;">Or Send Message</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showIndustryOptions(plan, industry) {
      document.getElementById('modalTitle').textContent = `Interested in ${plan} (${industry})`;
      var myModal = new bootstrap.Modal(document.getElementById('contactModal'));
      myModal.show();
    }
    
    function showContactOptions(plan) {
      document.getElementById('modalTitle').textContent = `Interested in ${plan}`;
      var myModal = new bootstrap.Modal(document.getElementById('contactModal'));
      myModal.show();
    }
    
    function toggleContactForm() {
      const contactOptions = document.getElementById('contactOptions');
      const contactForm = document.getElementById('contactForm');
      
      if (contactOptions.style.display === 'none') {
        contactOptions.style.display = 'block';
        contactForm.style.display = 'none';
      } else {
        contactOptions.style.display = 'none';
        contactForm.style.display = 'block';
      }
    }
  </script>
  <style>
  /* Additional Styles */
  .pricing-card {
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
  }
  
  .pricing-card:hover {
    transform: translateY(-10px);
  }
  
  .ribbon {
    position: absolute;
    top: 10px;
    right: -30px;
    width: 120px;
    text-align: center;
    line-height: 30px;
    letter-spacing: 1px;
    transform: rotate(45deg);
    font-size: 12px;
    font-weight: bold;
  }
  
  .features {
    list-style: none;
    padding: 20px 0;
    margin: 20px 0;
  }
  
  .features li {
    padding: 8px 0;
    text-align: left;
    color: #d0d0d0;
  }
  
  .btn {
    padding: 10px 25px;
    border-radius: 30px;
    font-weight: 600;
    margin-top: 15px;
  }
  
  .btn:hover {
    background: #666 !important;
    color: #fff !important;
  }
  
  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
  }
  
  .section-subtitle {
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
  }
</style>

</body>
</html>
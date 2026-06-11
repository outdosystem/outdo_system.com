<?php include_once('header-2.php'); ?>
<link rel="stylesheet" href="css/about.css">

    

  <style>
    /* ============================================================
       SERVICE-SOFTWARE-DEVELOPMENT — Page-Specific Overrides Only
       Uses existing about.css base classes throughout.
       ============================================================ */

    /* ---- Hero: light gradient override ---- */
    .sw-hero {
      min-height: 100vh;
      background: linear-gradient(135deg, #f8f9fc 0%, #ffffff 50%, #fff5f5 100%);
      position: relative;
      display: flex;
      align-items: center;
      overflow: hidden;
      padding-top: 100px;
      padding-bottom: 60px;
    }
    .sw-hero-shapes {
      position: absolute;
      inset: 0;
      overflow: hidden;
      pointer-events: none;
    }
    .sw-circle-1 {
      position: absolute;
      width: 700px; height: 700px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(227,30,36,0.06), transparent 70%);
      top: -200px; right: -200px;
      animation: floatS 10s ease-in-out infinite;
    }
    .sw-circle-2 {
      position: absolute;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(227,30,36,0.04), transparent 70%);
      bottom: -100px; left: -100px;
      animation: floatS 14s ease-in-out infinite reverse;
    }
    .sw-dots-grid {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(circle, rgba(0,0,0,0.06) 1px, transparent 1px);
      background-size: 32px 32px;
      opacity: 0.5;
    }

    /* Hero text dark (light theme) */
    .sw-hero .hero-h1 { color: var(--text); }
    .sw-hero .hero-sub { color: var(--text-muted); }
    .sw-hero .hero-breadcrumb a { color: var(--text-muted); }
    .sw-hero .hero-breadcrumb { color: var(--text-light); }
    .sw-hero .hero-chips span { color: var(--text-muted); }
    .sw-hero .hero-badge {
      background: rgba(227,30,36,0.08);
      border-color: rgba(227,30,36,0.25);
      color: var(--red);
    }

    /* Hero image light shadow */
    .sw-hero .hero-img-main {
      box-shadow: 0 30px 80px rgba(0,0,0,0.14);
    }
    .sw-hero .hero-float {
      background: rgba(255,255,255,0.9);
      border-color: var(--border);
      color: var(--text);
      box-shadow: var(--shadow-md);
    }
    .sw-hero .hero-float span { color: var(--text-muted); }

    /* ---- Overview section ---- */
    .sw-overview { background: #fff; }
    .sw-overview-img {
      width: 100%; height: 460px;
      object-fit: cover;
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-md);
    }

    /* highlight list */
    .sw-highlight-list { list-style: none; padding: 0; margin: 0; }
    .sw-highlight-list li {
      display: flex; align-items: flex-start; gap: 12px;
      padding: 10px 0;
      border-bottom: 1px solid var(--border);
      font-size: 0.92rem;
      color: var(--text-muted);
    }
    .sw-highlight-list li:last-child { border-bottom: none; }
    .sw-highlight-list li i { color: var(--red); font-size: 1.1rem; margin-top: 2px; flex-shrink: 0; }

    /* ---- Process Timeline ---- */
    .sw-process { background: var(--bg2); }
    .sw-timeline {
      position: relative;
      display: flex;
      flex-direction: column;
      gap: 0;
      max-width: 820px;
      margin: 0 auto;
    }
    .sw-timeline::before {
      content: '';
      position: absolute;
      left: 38px;
      top: 0; bottom: 0;
      width: 2px;
      background: linear-gradient(180deg, var(--red), rgba(227,30,36,0.1));
    }
    .sw-tl-item {
      display: flex;
      gap: 24px;
      align-items: flex-start;
      padding: 20px 0;
    }
    .sw-tl-num {
      flex-shrink: 0;
      width: 76px; height: 76px;
      background: #fff;
      border: 2px solid var(--border);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      flex-direction: column;
      box-shadow: var(--shadow);
      position: relative;
      z-index: 1;
      transition: var(--trans);
    }
    .sw-tl-item:hover .sw-tl-num {
      border-color: var(--red);
      background: var(--red);
    }
    .sw-tl-num i {
      font-size: 1.4rem;
      color: var(--red);
      transition: var(--trans);
    }
    .sw-tl-item:hover .sw-tl-num i { color: #fff; }
    .sw-tl-body {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 20px 24px;
      flex: 1;
      box-shadow: var(--shadow);
      transition: var(--trans);
    }
    .sw-tl-item:hover .sw-tl-body {
      border-color: rgba(227,30,36,0.3);
      box-shadow: var(--shadow-md);
      transform: translateX(4px);
    }
    .sw-tl-body h5 {
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }
    .sw-tl-body p {
      font-size: 0.88rem;
      color: var(--text-muted);
      margin: 0;
      line-height: 1.7;
    }
    .sw-tl-step {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--red);
      margin-bottom: 2px;
    }

    /* ---- Solutions Cards ---- */
    .sw-solutions { background: #fff; }
    .sw-sol-card {
      background: var(--bg2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 32px 24px;
      height: 100%;
      transition: var(--trans);
      position: relative;
      overflow: hidden;
    }
    .sw-sol-card::before {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--red), var(--red-dark));
      transform: scaleX(0);
      transition: var(--trans);
    }
    .sw-sol-card:hover {
      background: #fff;
      box-shadow: var(--shadow-md);
      transform: translateY(-6px);
      border-color: rgba(227,30,36,0.2);
    }
    .sw-sol-card:hover::before { transform: scaleX(1); }
    .sw-sol-icon {
      width: 56px; height: 56px;
      background: var(--red-light);
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem;
      color: var(--red);
      margin-bottom: 20px;
      transition: var(--trans);
    }
    .sw-sol-card:hover .sw-sol-icon {
      background: var(--red);
      color: #fff;
    }
    .sw-sol-card h4 {
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 10px;
    }
    .sw-sol-card p {
      font-size: 0.87rem;
      color: var(--text-muted);
      margin: 0;
      line-height: 1.7;
    }

    /* ---- Tech Stack ---- */
    .sw-tech { background: var(--bg2); }
    .sw-tech-category {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 28px;
      height: 100%;
      transition: var(--trans);
    }
    .sw-tech-category:hover {
      box-shadow: var(--shadow);
      border-color: rgba(227,30,36,0.2);
    }
    .sw-tech-cat-title {
      display: flex; align-items: center; gap: 10px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--red);
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--border);
    }
    .sw-tech-cat-title i { font-size: 1rem; }
    .sw-badge-group { display: flex; flex-wrap: wrap; gap: 8px; }
    .sw-tech-badge {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--bg2);
      border: 1px solid var(--border);
      border-radius: 99px;
      padding: 5px 14px;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--text-muted);
      transition: var(--trans);
    }
    .sw-tech-badge:hover {
      border-color: var(--red);
      color: var(--red);
      background: var(--red-light);
    }

    /* ---- Why Choose — Alternating ---- */
    .sw-why { background: #fff; }
    .sw-why-block {
      display: flex;
      align-items: center;
      gap: 48px;
      padding: 48px 0;
      border-bottom: 1px solid var(--border);
    }
    .sw-why-block:last-child { border-bottom: none; }
    .sw-why-icon-wrap {
      flex-shrink: 0;
      width: 100px; height: 100px;
      background: var(--red-light);
      border-radius: 24px;
      display: flex; align-items: center; justify-content: center;
      font-size: 2.5rem;
      color: var(--red);
      transition: var(--trans);
    }
    .sw-why-block:hover .sw-why-icon-wrap {
      background: var(--red);
      color: #fff;
      transform: scale(1.05);
    }
    .sw-why-content h4 {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 10px;
    }
    .sw-why-content p {
      font-size: 0.92rem;
      color: var(--text-muted);
      margin: 0;
      line-height: 1.8;
    }
    @media (max-width: 576px) {
      .sw-why-block { flex-direction: column; gap: 20px; }
      .sw-why-icon-wrap { width: 72px; height: 72px; font-size: 1.8rem; border-radius: 18px; }
    }

    /* ---- Zigzag Workflow ---- */
    .sw-workflow { background: var(--bg2); }
    .sw-zz-item {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      align-items: center;
      margin-bottom: 60px;
    }
    .sw-zz-item:last-child { margin-bottom: 0; }
    .sw-zz-item.reverse .sw-zz-img { order: 2; }
    .sw-zz-item.reverse .sw-zz-text { order: 1; }
    .sw-zz-img img {
      width: 100%; height: 300px;
      object-fit: cover;
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-md);
    }
    .sw-zz-step-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--red-light);
      border: 1px solid rgba(227,30,36,0.2);
      color: var(--red);
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 99px;
      margin-bottom: 16px;
    }
    .sw-zz-text h3 {
      font-size: 1.4rem;
      font-weight: 800;
      color: var(--text);
      margin-bottom: 12px;
      line-height: 1.3;
    }
    .sw-zz-text p {
      font-size: 0.92rem;
      color: var(--text-muted);
      line-height: 1.8;
      margin: 0;
    }
    @media (max-width: 768px) {
      .sw-zz-item { grid-template-columns: 1fr; gap: 24px; }
      .sw-zz-item.reverse .sw-zz-img,
      .sw-zz-item.reverse .sw-zz-text { order: unset; }
    }

    /* ---- Industries ---- */
    .sw-industries { background: #fff; }
    .sw-ind-card {
      background: var(--bg2);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 28px 20px;
      text-align: center;
      height: 100%;
      transition: var(--trans);
      cursor: default;
    }
    .sw-ind-card:hover {
      background: #fff;
      border-color: var(--red);
      box-shadow: var(--shadow);
      transform: translateY(-5px);
    }
    .sw-ind-icon {
      font-size: 2.2rem;
      color: var(--red);
      margin-bottom: 12px;
      display: block;
      transition: var(--trans);
    }
    .sw-ind-card:hover .sw-ind-icon { transform: scale(1.15); }
    .sw-ind-card h5 {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }
    .sw-ind-card p {
      font-size: 0.8rem;
      color: var(--text-muted);
      margin: 0;
      line-height: 1.6;
    }

    /* ---- Stats ---- */
    .sw-stats { background: var(--bg2); }

    /* ---- FAQ ---- */
    .sw-faq-section { background: #fff; }

    /* ---- CTA ---- */
    .sw-cta {
      background: linear-gradient(135deg, #1a1a1a 0%, #2a0a0a 50%, #1a0505 100%);
      position: relative;
      overflow: hidden;
    }
    .sw-cta-shapes {
      position: absolute;
      inset: 0;
      pointer-events: none;
    }
    .sw-cta-glow-1 {
      position: absolute;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(227,30,36,0.25), transparent 70%);
      top: -200px; right: -100px;
      animation: floatS 8s ease-in-out infinite;
    }
    .sw-cta-glow-2 {
      position: absolute;
      width: 300px; height: 300px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(227,30,36,0.12), transparent 70%);
      bottom: -100px; left: -100px;
      animation: floatS 12s ease-in-out infinite reverse;
    }
    .sw-cta-grid {
      position: absolute; inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    /* Back to top */
    #backToTop {
      position: fixed;
      bottom: 30px; right: 30px;
      width: 46px; height: 46px;
      background: var(--red);
      color: #fff;
      border: none;
      border-radius: 50%;
      font-size: 1.1rem;
      display: flex; align-items: center; justify-content: center;
      box-shadow: var(--shadow-red);
      cursor: pointer;
      opacity: 0; visibility: hidden;
      transform: translateY(10px);
      transition: var(--trans);
      z-index: 999;
      text-decoration: none;
    }
    #backToTop.visible {
      opacity: 1; visibility: visible; transform: translateY(0);
    }
    #backToTop:hover { transform: translateY(-3px); }
  </style>





<!-- ============================================================
     1. HERO SECTION
============================================================ -->
<section class="sw-hero">
  <div class="sw-hero-shapes">
    <div class="sw-dots-grid"></div>
    <div class="sw-circle-1"></div>
    <div class="sw-circle-2"></div>
  </div>

  <div class="container position-relative z-1">
    <div class="row align-items-center g-5">

      <!-- Left: Text -->
      <div class="col-lg-6" data-aos="fade-right">
        <!-- Breadcrumb -->
        <div class="hero-breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right" style="font-size:.65rem;"></i>
          <a href="#">Services</a>
          <i class="bi bi-chevron-right" style="font-size:.65rem;"></i>
          <span class="active">Software Development</span>
        </div>

        <!-- Badge -->
        <div class="hero-badge mb-3">
          <span class="bdot"></span>
          Custom Software Solutions
        </div>

        <!-- Heading -->
        <h1 class="hero-h1">
          Build Software That<br />
          <span class="text-red">Drives Growth</span>
        </h1>

        <!-- Sub -->
        <p class="hero-sub">
          Outdo System crafts powerful, scalable, and reliable software tailored to the unique needs of your business — helping you automate processes, reduce costs, and accelerate growth.
        </p>

        <!-- Chips -->
        <div class="hero-chips mb-4">
          <span><i class="bi bi-check-circle-fill text-red"></i> Agile Development</span>
          <span><i class="bi bi-check-circle-fill text-red"></i> Scalable Architecture</span>
          <span><i class="bi bi-check-circle-fill text-red"></i> Ongoing Support</span>
        </div>

        <!-- Buttons -->
        <div class="d-flex flex-wrap gap-3 service-hero-buttons">
          <a href="#contact" class="btn btn-red">
            <i class="bi bi-rocket-takeoff me-2"></i>Start Your Project
          </a>
          <a href="#process" class="btn btn-outline-dark-custom">
            <i class="bi bi-play-circle me-2"></i>Our Process
          </a>
        </div>
      </div>

      <!-- Right: Image -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
        <div class="hero-img-wrap">
          <img
            src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?w=800&q=80"
            alt="Software Development"
            class="hero-img-main"
          />
          <!-- Float badge 1 -->
          <div class="hero-float hf-1">
            <i class="bi bi-lightning-charge-fill"></i>
            <div>
              <strong>500+</strong>
              <span>Projects Delivered</span>
            </div>
          </div>
          <!-- Float badge 2 -->
          <div class="hero-float hf-2">
            <i class="bi bi-shield-check-fill"></i>
            <div>
              <strong>100%</strong>
              <span>Client Satisfaction</span>
            </div>
          </div>
          <!-- Bottom badge -->
          <div class="hero-img-badge">
            <span>Experience</span>
            <strong>10+</strong>
            <span>Years</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     2. SERVICE OVERVIEW
============================================================ -->
<section class="sw-overview section-pad">
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- Left Image -->
      <div class="col-lg-5" data-aos="fade-right">
        <img
          src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&q=80"
          alt="Software Development Team"
          class="sw-overview-img"
        />
      </div>

      <!-- Right Content -->
      <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
        <div class="section-label">About This Service</div>
        <h2 class="section-title">
          Custom Software Built<br />
          <span class="text-red">For Your Business</span>
        </h2>
        <p class="section-body">
          Software development has helped businesses optimize their processes and significantly reduce operational costs. It is the process of building unique software that meets the specific needs of a business and performs tasks that otherwise have to be performed manually.
        </p>
        <p class="section-body">
          Outdo System is a well-regarded software developer in Bathinda that extends its services to a variety of industries and individuals. We are capable of developing customized software for organizations, saving them from adjusting their processes according to pre-existing generic solutions.
        </p>
        <p class="section-body mb-4">
          Along with developing custom and open source software, we also have experience in creating well-crafted software tailored to the specific needs of our clients — from conception to final delivery.
        </p>

        <!-- Key Highlights -->
        <ul class="sw-highlight-list">
          <li>
            <i class="bi bi-patch-check-fill"></i>
            <span>Customized software developed keeping your particular business objectives in mind</span>
          </li>
          <li>
            <i class="bi bi-patch-check-fill"></i>
            <span>Industry experts with adequate experience in creating powerful, reliable software</span>
          </li>
          <li>
            <i class="bi bi-patch-check-fill"></i>
            <span>We incorporate AI, AR/VR, Blockchain, IoT, and Data Analytics into our process</span>
          </li>
          <li>
            <i class="bi bi-patch-check-fill"></i>
            <span>Full lifecycle support: from business analysis and prototype to final deployment and maintenance</span>
          </li>
          <li>
            <i class="bi bi-patch-check-fill"></i>
            <span>Serving industries including education, manufacturing, accounting, healthcare, and more</span>
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     3. DEVELOPMENT PROCESS TIMELINE
============================================================ -->
<section class="sw-process section-pad" id="process">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Our Methodology</div>
      <h2 class="section-title">
        Our Software <span class="text-red">Development Cycle</span>
      </h2>
      <p class="section-subtitle">
        A well-structured, transparent process that lays the foundation for your business's improved performance and growth.
      </p>
    </div>

    <div class="sw-timeline">

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="50">
        <div class="sw-tl-num"><i class="bi bi-search"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 01</div>
          <h5>Business Analysis &amp; Research</h5>
          <p>The first step involves deeply understanding the objectives of your business and the specific requirements of the client. We conduct thorough research to gain insights into your company's processes, workflows, and pain points.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="100">
        <div class="sw-tl-num"><i class="bi bi-calendar3"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 02</div>
          <h5>Schedule &amp; Project Management</h5>
          <p>We plan a timeline, define the budget, and establish communication channels to improve efficiency. This roadmap is shared with the client for approval before any development begins.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="150">
        <div class="sw-tl-num"><i class="bi bi-window-stack"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 03</div>
          <h5>UI/UX Design &amp; Prototype</h5>
          <p>Our well-experienced team develops the first prototype keeping the client's specifications in mind. The design focuses on intuitive usability, visual appeal, and alignment with your brand identity.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="200">
        <div class="sw-tl-num"><i class="bi bi-code-slash"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 04</div>
          <h5>Development</h5>
          <p>Our developers work iteratively to build the software, incorporating clean architecture, scalable code, and the latest technology trends including AI, IoT, and Data Analytics.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="250">
        <div class="sw-tl-num"><i class="bi bi-bug-fill"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 05</div>
          <h5>Quality Assurance &amp; Testing</h5>
          <p>Our dedicated QA team rigorously tests the software, identifies bugs, and ensures performance standards are met. We strive to deliver only high-quality solutions to our clients.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="300">
        <div class="sw-tl-num"><i class="bi bi-cloud-upload-fill"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 06</div>
          <h5>Deployment</h5>
          <p>The final product is deployed to your production environment with careful attention to security, performance, and zero-downtime delivery processes.</p>
        </div>
      </div>

      <div class="sw-tl-item" data-aos="fade-up" data-aos-delay="350">
        <div class="sw-tl-num"><i class="bi bi-headset"></i></div>
        <div class="sw-tl-body">
          <div class="sw-tl-step">Step 07</div>
          <h5>Ongoing Maintenance &amp; Support</h5>
          <p>Outdo System offers continuous support and maintenance for all software we develop — ensuring it remains performant, secure, and up-to-date as your business evolves.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     4. SOLUTIONS WE BUILD
============================================================ -->
<section class="sw-solutions section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">What We Build</div>
      <h2 class="section-title">
        Software Solutions <span class="text-red">We Deliver</span>
      </h2>
      <p class="section-subtitle">
        From complex enterprise platforms to agile SaaS products — we build software that scales with your business.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-window-fullscreen"></i></div>
          <h4>Custom Web Applications</h4>
          <p>Bespoke web apps built to your exact business logic — fast, responsive, and deeply integrated with your workflows.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-building-gear"></i></div>
          <h4>Enterprise Software</h4>
          <p>Large-scale enterprise solutions designed for complex organizational needs, multi-user environments, and high data volumes.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-cloud-fill"></i></div>
          <h4>SaaS Platforms</h4>
          <p>Cloud-native Software-as-a-Service products built for multi-tenancy, subscription management, and global scalability.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-person-lines-fill"></i></div>
          <h4>CRM Systems</h4>
          <p>Customer Relationship Management platforms tailored to your sales process, helping your team close deals faster and retain customers longer.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-diagram-3-fill"></i></div>
          <h4>ERP Solutions</h4>
          <p>Integrated Enterprise Resource Planning systems that unify your finance, HR, inventory, and operations into a single powerful platform.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-plugin"></i></div>
          <h4>API Development</h4>
          <p>Robust, well-documented RESTful and GraphQL APIs that power seamless integrations between your software systems.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-cart4"></i></div>
          <h4>E-commerce Platforms</h4>
          <p>Feature-rich custom e-commerce solutions with advanced inventory management, payment gateways, and conversion-focused UX.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-phone-fill"></i></div>
          <h4>Mobile App Backends</h4>
          <p>Powerful, high-performance server-side backends and APIs that fuel iOS and Android mobile applications at scale.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="450">
        <div class="sw-sol-card">
          <div class="sw-sol-icon"><i class="bi bi-robot"></i></div>
          <h4>AI-Powered Software</h4>
          <p>Intelligent software incorporating Artificial Intelligence, Machine Learning, and Data Analytics to automate and optimize your business processes.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     5. TECHNOLOGY STACK
============================================================ -->
<section class="sw-tech section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Technologies</div>
      <h2 class="section-title">
        Our <span class="text-red">Technology Stack</span>
      </h2>
      <p class="section-subtitle">
        We work with modern, battle-tested technologies to build software that is secure, scalable, and maintainable.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-layout-text-window-reverse"></i> Frontend</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">React.js</span>
            <span class="sw-tech-badge">Vue.js</span>
            <span class="sw-tech-badge">Angular</span>
            <span class="sw-tech-badge">Next.js</span>
            <span class="sw-tech-badge">TypeScript</span>
            <span class="sw-tech-badge">Tailwind CSS</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-server"></i> Backend</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">Node.js</span>
            <span class="sw-tech-badge">Python</span>
            <span class="sw-tech-badge">PHP / Laravel</span>
            <span class="sw-tech-badge">Java Spring</span>
            <span class="sw-tech-badge">.NET Core</span>
            <span class="sw-tech-badge">Express.js</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-database-fill"></i> Database</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">MySQL</span>
            <span class="sw-tech-badge">PostgreSQL</span>
            <span class="sw-tech-badge">MongoDB</span>
            <span class="sw-tech-badge">Redis</span>
            <span class="sw-tech-badge">Firebase</span>
            <span class="sw-tech-badge">Elasticsearch</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-cloud-fill"></i> Cloud</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">AWS</span>
            <span class="sw-tech-badge">Google Cloud</span>
            <span class="sw-tech-badge">Microsoft Azure</span>
            <span class="sw-tech-badge">DigitalOcean</span>
            <span class="sw-tech-badge">Vercel</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-gear-wide-connected"></i> DevOps</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">Docker</span>
            <span class="sw-tech-badge">Kubernetes</span>
            <span class="sw-tech-badge">GitHub Actions</span>
            <span class="sw-tech-badge">Jenkins</span>
            <span class="sw-tech-badge">Terraform</span>
            <span class="sw-tech-badge">Nginx</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="sw-tech-category">
          <div class="sw-tech-cat-title"><i class="bi bi-shield-lock-fill"></i> Security</div>
          <div class="sw-badge-group">
            <span class="sw-tech-badge">SSL/TLS</span>
            <span class="sw-tech-badge">OAuth 2.0</span>
            <span class="sw-tech-badge">JWT Auth</span>
            <span class="sw-tech-badge">OWASP</span>
            <span class="sw-tech-badge">2FA / MFA</span>
            <span class="sw-tech-badge">Data Encryption</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     6. WHY CHOOSE US — Alternating Blocks
============================================================ -->
<section class="sw-why section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Why Outdo System</div>
      <h2 class="section-title">
        What Makes Us <span class="text-red">Different</span>
      </h2>
      <p class="section-subtitle">
        Delivering high-quality solutions within the promised time period has always set us apart from the rest.
      </p>
    </div>

    <div data-aos="fade-up" data-aos-delay="50">
      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-people-fill"></i></div>
        <div class="sw-why-content">
          <h4>Experienced Software Developers</h4>
          <p>Our team consists of industry experts who are adept in building, integrating, scaling, modifying, and upgrading software. With 10+ years of experience across multiple industries, we bring deep technical knowledge to every project.</p>
        </div>
      </div>

      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-layers-fill"></i></div>
        <div class="sw-why-content">
          <h4>Scalable, Future-Proof Architecture</h4>
          <p>We design software with growth in mind. Our architectures are built to handle increasing loads, new feature additions, and evolving business requirements — so your software investment remains valuable for years to come.</p>
        </div>
      </div>

      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-arrow-repeat"></i></div>
        <div class="sw-why-content">
          <h4>Agile Development Process</h4>
          <p>We follow an Agile methodology with regular sprints, demos, and feedback cycles. This ensures you're always in the loop and that the final product accurately reflects your vision at every stage.</p>
        </div>
      </div>

      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-shield-check-fill"></i></div>
        <div class="sw-why-content">
          <h4>Secure Coding Practices</h4>
          <p>Security is baked into every line of code we write. From OWASP best practices to data encryption and secure authentication, we ensure your software and your users' data are always protected.</p>
        </div>
      </div>

      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-lightning-charge-fill"></i></div>
        <div class="sw-why-content">
          <h4>Fast, On-Time Delivery</h4>
          <p>We understand that time is money. Our structured process, experienced team, and clear communication channels allow us to deliver high-quality software within agreed timelines and budgets.</p>
        </div>
      </div>

      <div class="sw-why-block">
        <div class="sw-why-icon-wrap"><i class="bi bi-headset"></i></div>
        <div class="sw-why-content">
          <h4>Ongoing Support &amp; Maintenance</h4>
          <p>Our relationship doesn't end at deployment. Outdo System provides continuous support, updates, and maintenance to ensure your software remains performant, secure, and aligned with your growing business needs.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     7. PROJECT WORKFLOW — ZIG-ZAG
============================================================ -->
<section class="sw-workflow section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">How It Works</div>
      <h2 class="section-title">
        From <span class="text-red">Idea to Deployment</span>
      </h2>
      <p class="section-subtitle">
        See how your project moves from a raw concept to a powerful, production-ready software product.
      </p>
    </div>

    <!-- ZigZag Item 1 -->
    <div class="sw-zz-item" data-aos="fade-up" data-aos-delay="50">
      <div class="sw-zz-text">
        <div class="sw-zz-step-badge"><i class="bi bi-lightbulb-fill"></i> Phase 1</div>
        <h3>Idea &amp; Discovery</h3>
        <p>It begins with a conversation. You share your vision, your business goals, and the problem you're trying to solve. We listen deeply, ask the right questions, and document the full scope of what needs to be built — ensuring complete alignment before a single line of code is written.</p>
      </div>
      <div class="sw-zz-img">
        <img
          src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80"
          alt="Idea Discovery"
        />
      </div>
    </div>

    <!-- ZigZag Item 2 -->
    <div class="sw-zz-item reverse" data-aos="fade-up" data-aos-delay="50">
      <div class="sw-zz-img">
        <img
          src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&q=80"
          alt="Planning and Design"
        />
      </div>
      <div class="sw-zz-text">
        <div class="sw-zz-step-badge"><i class="bi bi-pencil-ruler"></i> Phase 2</div>
        <h3>Planning &amp; Design</h3>
        <p>With a clear scope in hand, we create a detailed project plan, define milestones, and design the user experience. Wireframes and UI mockups are developed and reviewed with you — so you can see and feel exactly what the software will look like before development starts.</p>
      </div>
    </div>

    <!-- ZigZag Item 3 -->
    <div class="sw-zz-item" data-aos="fade-up" data-aos-delay="50">
      <div class="sw-zz-text">
        <div class="sw-zz-step-badge"><i class="bi bi-code-square"></i> Phase 3</div>
        <h3>Development &amp; Testing</h3>
        <p>Our engineers build iteratively in structured sprints. You receive regular updates and demos so you can provide feedback at every stage. Simultaneous QA testing ensures bugs are caught early and the final product meets the highest quality standards.</p>
      </div>
      <div class="sw-zz-img">
        <img
          src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?w=800&q=80"
          alt="Development"
        />
      </div>
    </div>

    <!-- ZigZag Item 4 -->
    <div class="sw-zz-item reverse" data-aos="fade-up" data-aos-delay="50">
      <div class="sw-zz-img">
        <img
          src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=800&q=80"
          alt="Deployment and Growth"
        />
      </div>
      <div class="sw-zz-text">
        <div class="sw-zz-step-badge"><i class="bi bi-graph-up-arrow"></i> Phase 4</div>
        <h3>Deployment &amp; Growth</h3>
        <p>After final sign-off, we deploy your software to a live environment with zero disruption. Post-launch, our team continues to monitor performance, address any issues, and deliver updates — ensuring your software grows alongside your business.</p>
      </div>
    </div>

  </div>
</section>

<!-- ============================================================
     8. INDUSTRIES WE SERVE
============================================================ -->
<section class="sw-industries section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Industries</div>
      <h2 class="section-title">
        Industries We <span class="text-red">Serve</span>
      </h2>
      <p class="section-subtitle">
        Our software developers have built solutions for businesses across a wide range of industries.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="50">
        <div class="sw-ind-card">
          <i class="bi bi-heart-pulse-fill sw-ind-icon"></i>
          <h5>Healthcare</h5>
          <p>Patient management, clinic software, health records</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="sw-ind-card">
          <i class="bi bi-mortarboard-fill sw-ind-icon"></i>
          <h5>Education</h5>
          <p>LMS platforms, e-learning tools, school management</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="150">
        <div class="sw-ind-card">
          <i class="bi bi-bank2 sw-ind-icon"></i>
          <h5>Finance</h5>
          <p>Accounting software, fintech apps, payment systems</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="sw-ind-card">
          <i class="bi bi-house-fill sw-ind-icon"></i>
          <h5>Real Estate</h5>
          <p>Property listings, CRM, agent portals</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="250">
        <div class="sw-ind-card">
          <i class="bi bi-bag-fill sw-ind-icon"></i>
          <h5>E-commerce</h5>
          <p>Online stores, inventory management, analytics</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="sw-ind-card">
          <i class="bi bi-truck-front-fill sw-ind-icon"></i>
          <h5>Logistics</h5>
          <p>Fleet tracking, supply chain, delivery management</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="350">
        <div class="sw-ind-card">
          <i class="bi bi-gear-fill sw-ind-icon"></i>
          <h5>Manufacturing</h5>
          <p>Production tracking, ERP, quality control systems</p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="sw-ind-card">
          <i class="bi bi-rocket-fill sw-ind-icon"></i>
          <h5>Startups</h5>
          <p>MVP development, product scaling, tech consulting</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     9. SUCCESS METRICS
============================================================ -->
<section class="sw-stats section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Our Track Record</div>
      <h2 class="section-title">
        Numbers That <span class="text-red">Speak For Us</span>
      </h2>
    </div>

    <div class="stats-grid">
      <div class="stat-card" data-aos="fade-up" data-aos-delay="50">
        <div class="sc-icon"><i class="bi bi-check-circle-fill"></i></div>
        <div class="sc-num"><span class="counter" data-target="500">0</span>+</div>
        <div class="sc-label">Projects Delivered</div>
        <div class="sc-sub">Across industries worldwide</div>
      </div>
      <div class="stat-card featured" data-aos="fade-up" data-aos-delay="100">
        <div class="sc-icon"><i class="bi bi-emoji-smile-fill"></i></div>
        <div class="sc-num"><span class="counter" data-target="320">0</span>+</div>
        <div class="sc-label">Happy Clients</div>
        <div class="sc-sub">Long-term relationships</div>
      </div>
      <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
        <div class="sc-icon"><i class="bi bi-award-fill"></i></div>
        <div class="sc-num"><span class="counter" data-target="10">0</span>+</div>
        <div class="sc-label">Years Experience</div>
        <div class="sc-sub">In software development</div>
      </div>
      <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
        <div class="sc-icon"><i class="bi bi-clock-fill"></i></div>
        <div class="sc-num"><span class="counter" data-target="24">0</span>/7</div>
        <div class="sc-label">Support Available</div>
        <div class="sc-sub">Always here when you need us</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     10. FAQ SECTION
============================================================ -->
<section class="sw-faq-section section-pad">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">FAQ</div>
      <h2 class="section-title">
        Frequently Asked <span class="text-red">Questions</span>
      </h2>
      <p class="section-subtitle">
        Have questions about our software development services? We've got answers.
      </p>
    </div>

    <div class="faq-container" data-aos="fade-up" data-aos-delay="50">

      <div class="faq-item">
        <div class="faq-question">
          What types of businesses do you develop software for?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          We develop software for businesses of all sizes — from startups launching their first MVP to large enterprises needing complex ERP and CRM systems. Our experience spans healthcare, education, finance, real estate, e-commerce, logistics, and manufacturing sectors.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How long does it take to develop custom software?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          Development timelines vary based on the scope and complexity of the project. A simple custom application may take 4–8 weeks, while a complex enterprise platform can take 4–6 months or more. During the planning phase, we provide a detailed timeline and milestone schedule for your specific project.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Do you provide maintenance and support after delivery?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          Yes. Outdo System offers comprehensive post-delivery support and maintenance packages. This includes bug fixes, performance monitoring, security updates, and feature enhancements to ensure your software continues to perform optimally as your business grows.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Can you upgrade or modify my existing software?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          Absolutely. Our developers are experienced in working with existing codebases. Whether you need to add new features, integrate third-party services, improve performance, or migrate to a modern technology stack, we can assess your current software and execute the necessary improvements.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          What technologies do you use for software development?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          We work with a comprehensive modern tech stack including React, Node.js, Python, PHP/Laravel, Java, and .NET on the backend. For databases we use MySQL, PostgreSQL, MongoDB, and more. We also incorporate emerging technologies like AI, IoT, Blockchain, and AR/VR when appropriate for your project.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How much does custom software development cost?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          Cost depends on project complexity, required features, timeline, and technology choices. Outdo System is known for delivering high-quality solutions at extremely competitive prices. We provide a detailed, transparent quote after our initial discovery session — with no hidden costs. Contact us to discuss your project and get a free estimate.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Will I own the software and source code after delivery?
          <i class="bi bi-chevron-down faq-arrow"></i>
        </div>
        <div class="faq-answer">
          Yes. Upon final payment, you own complete rights to the software and all source code developed for your project. We believe in full transparency and client ownership — your intellectual property is yours.
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     11. FINAL CTA SECTION
============================================================ -->
<section class="sw-cta section-pad" id="contact">
  <div class="sw-cta-shapes">
    <div class="sw-cta-grid"></div>
    <div class="sw-cta-glow-1"></div>
    <div class="sw-cta-glow-2"></div>
  </div>

  <div class="container position-relative z-1">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="section-label light mx-auto">Ready to Build?</div>
        <h2 class="section-title white mb-4">
          Let's Build Software That<br />
          <span style="color: #ff6b6f;">Transforms Your Business</span>
        </h2>
        <p class="section-subtitle mb-5" style="color: rgba(255,255,255,0.65); max-width: 600px; margin-left: auto; margin-right: auto;">
          Whether you're a startup with an idea or an established business looking to modernize, Outdo System has excellent software development solutions at extremely competitive prices. Let's start the conversation today.
        </p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
          <a href="mailto:info@outdosystem.com" class="btn btn-white-red">
            <i class="bi bi-envelope-fill me-2"></i>Get in Touch
          </a>
          <a href="tel:+919999999999" class="btn btn-outline-cta">
            <i class="bi bi-telephone-fill me-2"></i>Book Free Consultation
          </a>
        </div>

        <!-- Trust signals -->
        <div class="d-flex flex-wrap justify-content-center gap-4 mt-5" style="color: rgba(255,255,255,0.5); font-size: 0.82rem; font-weight: 600;">
          <span><i class="bi bi-check-circle-fill text-red me-1"></i> Free Initial Consultation</span>
          <span><i class="bi bi-check-circle-fill text-red me-1"></i> No Commitment Required</span>
          <span><i class="bi bi-check-circle-fill text-red me-1"></i> Transparent Pricing</span>
          <span><i class="bi bi-check-circle-fill text-red me-1"></i> On-Time Delivery Guarantee</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     FOOTER (Placeholder)
============================================================ -->

<?php include_once('footer.php'); ?>
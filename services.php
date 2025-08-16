<?php include './top.inc.php'; ?>

<style>
    .service-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
        z-index: 1000;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.7);
        background: linear-gradient(145deg, #0B1B3F, #152a5a);
        padding: 40px;
        border-radius: 20px;
        width: 90%;
        max-width: 600px;
        color: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(204, 222, 255, 0.1);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1001;
    }

    .popup-content.active {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }

    .popup-close {
        display: block;
        width: 100%;
        padding: 14px;
        background: rgba(204, 222, 255, 0.1);
        color: #CCDEFF;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 15px;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 16px;
        border: 1px solid rgba(204, 222, 255, 0.2);
        z-index: 1003;
    }

    .popup-close:hover {
        background: rgba(204, 222, 255, 0.2);
        transform: translateY(-2px);
    }

    .popup-close.active {
        transform: translateY(0);
        opacity: 1;
    }

    .popup-title {
        font-size: 28px;
        color: #CCDEFF;
        margin-bottom: 30px;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
    }

    .popup-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #CCDEFF;
        border-radius: 3px;
    }

    .popup-qa {
        margin-bottom: 25px;
        transform: translateY(20px);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .popup-qa.active {
        transform: translateY(0);
        opacity: 1;
    }

    .popup-qa h4 {
        color: #CCDEFF;
        margin-bottom: 12px;
        font-size: 20px;
        font-weight: 600;
    }

    .popup-qa p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        line-height: 1.6;
        padding-left: 20px;
        border-left: 3px solid rgba(204, 222, 255, 0.3);
    }

    .inquire-btn {
        position: relative;
        display: block;
        width: 100%;
        padding: 16px;
        background: linear-gradient(145deg, #CCDEFF, #a4beff);
        color: #0B1B3F;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(204, 222, 255, 0.2);
        margin-top: 0;
        margin-bottom: 10px;
        z-index: 1003;
    }

    .inquire-btn.active {
        transform: translateY(0);
        opacity: 1;
    }

    .inquire-btn:hover {
        background: linear-gradient(145deg, #ffffff, #CCDEFF);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(204, 222, 255, 0.3);
        color: #0B1B3F;
    }

    .inquire-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 10px rgba(204, 222, 255, 0.2);
    }

    @media (max-width: 768px) {
        .popup-content {
            padding: 30px 20px;
        }
        
        .popup-title {
            font-size: 24px;
        }
        
        .popup-qa h4 {
            font-size: 18px;
        }
        
        .popup-qa p {
            font-size: 15px;
        }
    }

    .learn-more-btn {
        display: none;
    }

    .popup-buttons {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s ease;
        z-index: 1002;
    }

    .popup-buttons.active {
        opacity: 1;
        transform: translateY(0);
    }

    .popup-close {
        display: block;
        width: 100%;
        padding: 14px;
        background: rgba(204, 222, 255, 0.1);
        color: #CCDEFF;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 16px;
        border: 1px solid rgba(204, 222, 255, 0.2);
        z-index: 1003;
    }

    .popup-close:hover {
        background: rgba(204, 222, 255, 0.2);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .popup-buttons {
            gap: 10px;
        }

        .inquire-btn, 
        .popup-close {
            padding: 12px;
            font-size: 15px;
        }
    }

    @media (max-width: 480px) {
        .popup-content {
            padding: 25px 15px;
        }

        .inquire-btn, 
        .popup-close {
            padding: 12px;
            font-size: 14px;
        }
    }
</style>

<!-- Start Bread Crumb Area Home 1 -->
<section class="bread-crumb-area" style="background-image: url('assets/web/our service banner.png');">
    <div class="container">
        <div class="bread-crumb-title">
            <h2 class="split-collab">Popular Services</h2>
        </div>
        <div class="bread-crumb-wrapper">
            <a href="index.php">Home</a>
            <span>
                <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.90625 7.53125L2.84375 13.625C2.53125 13.9062 2.0625 13.9062 1.78125 13.625L1.0625 12.9062C0.78125 12.625 0.78125 12.1562 1.0625 11.8438L5.875 7L1.0625 2.1875C0.78125 1.875 0.78125 1.40625 1.0625 1.125L1.78125 0.40625C2.0625 0.125 2.53125 0.125 2.84375 0.40625L8.90625 6.5C9.1875 6.78125 9.1875 7.25 8.90625 7.53125Z"
                        fill="white" />
                </svg>
            </span>
            <a href="services.php" class="current-page">Service</a>
        </div>
    </div>
</section>
<!-- End Bread Crumb Area Home 1 -->

<!-- Start Services Area Home 3 -->
<section class="services-area-home-3 services-area">
    <img src="assets/images/shep/bg-blur-shep-1.png" alt="VRE" class="services-page-services-area-shep-1 blur-1">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-lg-5">
                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Social Media Management</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Transform your social media presence with impactful strategies,<br>
                            consistent engagement, and data-driven growth solutions.</p>
                        <a href="javascript:void(0)" onclick="openPopup('Social Media Management')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Graphic Design</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Craft visually stunning designs that communicate your brand's story
                            <br>and leave a lasting impression on your audience.
                        </p>
                        <a href="javascript:void(0)" onclick="openPopup('Graphic Design')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Video Production & Editing</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Create compelling videos that captivate your audience, <br> boost
                            engagement, and bring your brand’s story to life.</p>
                        <a href="javascript:void(0)" onclick="openPopup('Video Production & Editing')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Meta Ads Management</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Maximize ROI with data-driven ad campaigns tailored to reach
                            <br>the right
                            audience and amplify your brand's impact.
                        </p>
                        <a href="javascript:void(0)" onclick="openPopup('Meta Ads Management')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">SEO Services</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Boost your online presence with tailored SEO strategies that <br>
                            improve
                            search rankings and drive organic traffic.</p>
                        <a href="javascript:void(0)" onclick="openPopup('SEO Services')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Thumbnail Designing</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Create eye-catching thumbnails that attract clicks and boost <br>
                            engagement across platforms like YouTube and social media.</p>
                        <a href="javascript:void(0)" onclick="openPopup('Thumbnail Designing')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="services-name wow bounceInUp">
                    <h4 class="font-size-1-40">Website Development & Optimization</h4>
                    <div class="services-info">
                        <p class="font-size-1-16">Build and optimize responsive, user-friendly websites <br>that
                            elevate
                            your online presence and enhance performance.</p>
                        <a href="javascript:void(0)" onclick="openPopup('Website Development & Optimization')" class="service-arrow">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12109 16.3848L9.53109 14.9748L3.95109 9.38477L16.1211 9.38476L16.1211 7.38476L3.95109 7.38477L9.54109 1.80477L8.12109 0.384765L0.121093 8.38477L8.12109 16.3848Z"
                                    fill="#CCDEFF"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="services-banner">
                    <div class="title">
                        <div class="sub-title">
                            <p>OUR SERVICES</p>
                        </div>
                        <div class="main-title">
                            <h3 class="split-collab">come on, we will <br> help you buIld your <br> dream project.
                                <span><img src="assets/images/shep/text-shep-1.png" alt=""></span>
                            </h3>
                        </div>
                    </div>
                    <div class="services-banner-inner">
                        <div class="services-img vre-reveal-one">
                            <img src="assets/web/our servuce 1.png" alt="VRE" loading="lazy"
                                class="vre-reveal-image-one">
                        </div>
                        <div class="services-img vre-reveal-one">
                            <img src="assets/web/our service 2.png" alt="VRE" loading="lazy"
                                class="vre-reveal-image-one">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Area Home 3 -->

<!-- Start Barnd Logo Area Home 3 -->
<section class="py-5 overflow-hidden">
    <div class="container">
        <!-- Add Title Section -->
        <div class="title mb-5">
            <div class="sub-title sub-title-home-2">
                <p>OUR CLIENTS</p>
            </div>
            <div class="main-title">
                <h3 class="split-collab">Trusted by Leading <br> Brands & Businesses
                    <span><img src="assets/images/shep/text-shep-3.png" alt=""></span>
                </h3>
            </div>
        </div>
        <!-- Logo Slider -->
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Outer Transparent Rectangle -->
                <div class="logo-slider-outer">
                    <div class="infinite-logo-slider">
                        <div class="logo-slide">
                            <!-- Original Logos -->
                            <img src="assets/images/logo/brand/logo1.png" alt="Client 1" class="logo">
                            <img src="assets/images/logo/brand/logo2.jpg" alt="Client 2" class="logo">
                            <img src="assets/images/logo/brand/logo3.jpg" alt="Client 3" class="logo">
                            <img src="assets/images/logo/brand/logo4.png" alt="Client 4" class="logo">
                            <img src="assets/images/logo/brand/logo5.png" alt="Client 5" class="logo">
                            <img src="assets/images/logo/brand/logo6.png" alt="Client 6" class="logo">
                            <img src="assets/images/logo/brand/logo7.jpg" alt="Client 7" class="logo">
                            <img src="assets/images/logo/brand/logo8.jpg" alt="Client 8" class="logo">
                            <img src="assets/images/logo/brand/logo9.png" alt="Client 9" class="logo">
                            <!-- Duplicate Logos for Seamless Scrolling -->
                            <img src="assets/images/logo/brand/logo1.png" alt="Client 1" class="logo">
                            <img src="assets/images/logo/brand/logo2.jpg" alt="Client 2" class="logo">
                            <img src="assets/images/logo/brand/logo3.jpg" alt="Client 3" class="logo">
                            <img src="assets/images/logo/brand/logo4.png" alt="Client 4" class="logo">
                            <img src="assets/images/logo/brand/logo5.png" alt="Client 5" class="logo">
                            <img src="assets/images/logo/brand/logo6.png" alt="Client 6" class="logo">
                            <img src="assets/images/logo/brand/logo7.jpg" alt="Client 7" class="logo">
                            <img src="assets/images/logo/brand/logo8.jpg" alt="Client 8" class="logo">
                            <img src="assets/images/logo/brand/logo9.png" alt="Client 9" class="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Outer Transparent Rectangle */
        .logo-slider-outer {
            position: relative;
            border: 3px solid #ddd;
            /* Visible rectangle border */
            border-radius: 10px;
            /* Slightly rounded corners */
            background-color: transparent;
            /* Transparent background */
            padding: 20px;
            /* Spacing inside the rectangle */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            overflow: hidden;
        }

        .infinite-logo-slider {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            -webkit-mask: linear-gradient(90deg, transparent, #fff 20%, #fff 80%, transparent);
            mask: linear-gradient(90deg, transparent, #fff 20%, #fff 80%, transparent);
        }

        .logo-slide {
            display: flex;
            animation: slide 30s linear infinite;
            /* Smooth continuous animation */
        }

        .logo-slide img {
            width: 200px;
            /* Adjusted for responsiveness */
            height: auto;
            margin-right: 20px;
            object-fit: contain;
            /* Ensures logos fit without distortion */
            background-color: #fff;
            /* Add a background for better logo contrast */
            border: 2px solid #ddd;
            /* Border around individual logos */
            border-radius: 5px;
            /* Slightly rounded corners for logos */
            padding: 10px;
            /* Add padding for a polished look */
        }

        @keyframes slide {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(-100%));
                /* Scroll entire width of logos */
            }
        }

        /* Pause on Hover */
        .infinite-logo-slider:hover .logo-slide {
            animation-play-state: paused;
        }
    </style>
</section>
<!-- End Brand Logo Area Home 3 -->


<!-- Start Marketing Area Home 2 -->
<section class="recent-work-home-2">
    <img src="assets/images/shep/bg-blur-shep-2.png" alt="VRE" class="recent-work-bg-shep-home-2 blur-1">
    <div class="container">
        <div class="title">
            <div class="sub-title sub-title-home-2">
                <p>LATEST PROJECTS</p>
            </div>
            <div class="main-title">
                <h3 class="split-collab">Let's Checkout Our Recently <br> Completed Work <span><img
                            src="assets/images/shep/text-shep-3.png" alt="VRE"></span></h3>
            </div>
        </div>
        <div class="recent-work-wrapper">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="recent-work-inner">
                        <div class="recent-work-img vre-reveal-one">
                            <img src="assets/images/home-2/recent-work-1-home-2.png" alt="VRE"
                                class="vre-reveal-image-one">
                        </div>
                        <div class="recent-work-thumb vre-slide-down-gsap">
                            <div class="recent-work-text">
                                <h5 class="font-size-1-24"><a href="project-details ">Innovative Digital
                                        Solutions</a></h5>
                                <p class="font-size-1-18">Marketing Digital </p>
                            </div>
                            <a href="project-details " class="project-view-btn">
                                <svg width="21" height="14" viewBox="0 0 21 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5279 7.90809H1.6789C1.13674 7.90809 0.697266 7.46861 0.697266 6.92646C0.697266 6.3843 1.13674 5.94482 1.6789 5.94482H19.5279C20.0701 5.94482 20.5096 6.3843 20.5096 6.92646C20.5096 7.46861 20.0701 7.90809 19.5279 7.90809Z"
                                        fill="#CCDEFF" />
                                    <path
                                        d="M14.2783 13.1578C13.7362 13.1588 13.2959 12.7201 13.2949 12.1779C13.2944 11.917 13.3979 11.6667 13.5823 11.4822L18.1391 6.92639L13.5823 2.37063C13.2057 1.98073 13.2165 1.35925 13.6064 0.9826C13.9868 0.615175 14.5899 0.615175 14.9704 0.9826L20.2202 6.23238C20.6034 6.6157 20.6034 7.23708 20.2202 7.62041L14.9704 12.8702C14.7868 13.0538 14.538 13.1573 14.2783 13.1578Z"
                                        fill="#CCDEFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mt-55">
                    <div class="recent-work-inner">
                        <div class="recent-work-img vre-reveal-one">
                            <img src="assets/images/home-2/recent-work-2-home-2.png" alt="VRE"
                                class="vre-reveal-image-one">
                        </div>
                        <div class="recent-work-thumb vre-slide-down-gsap">
                            <div class="recent-work-text">
                                <h5 class="font-size-1-24"><a href="project-details ">Digital Excellence</a></h5>
                                <p class="font-size-1-18">Efficiency Management </p>
                            </div>
                            <a href="project-details " class="project-view-btn">
                                <svg width="21" height="14" viewBox="0 0 21 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5279 7.90809H1.6789C1.13674 7.90809 0.697266 7.46861 0.697266 6.92646C0.697266 6.3843 1.13674 5.94482 1.6789 5.94482H19.5279C20.0701 5.94482 20.5096 6.3843 20.5096 6.92646C20.5096 7.46861 20.0701 7.90809 19.5279 7.90809Z"
                                        fill="#CCDEFF" />
                                    <path
                                        d="M14.2783 13.1578C13.7362 13.1588 13.2959 12.7201 13.2949 12.1779C13.2944 11.917 13.3979 11.6667 13.5823 11.4822L18.1391 6.92639L13.5823 2.37063C13.2057 1.98073 13.2165 1.35925 13.6064 0.9826C13.9868 0.615175 14.5899 0.615175 14.9704 0.9826L20.2202 6.23238C20.6034 6.6157 20.6034 7.23708 20.2202 7.62041L14.9704 12.8702C14.7868 13.0538 14.538 13.1573 14.2783 13.1578Z"
                                        fill="#CCDEFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mt-55">
                    <div class="recent-work-inner recent-work-item-3">
                        <div class="recent-work-img vre-reveal-one">
                            <img src="assets/images/home-2/recent-work-3-home-2.png" alt="VRE"
                                class="vre-reveal-image-one">
                        </div>
                        <div class="recent-work-thumb vre-slide-down-gsap">
                            <div class="recent-work-text">
                                <h5 class="font-size-1-24"><a href="project-details ">Creative Digital Campaign</a>
                                </h5>
                                <p class="font-size-1-18">Market Research </p>
                            </div>
                            <a href="project-details " class="project-view-btn">
                                <svg width="21" height="14" viewBox="0 0 21 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5279 7.90809H1.6789C1.13674 7.90809 0.697266 7.46861 0.697266 6.92646C0.697266 6.3843 1.13674 5.94482 1.6789 5.94482H19.5279C20.0701 5.94482 20.5096 6.3843 20.5096 6.92646C20.5096 7.46861 20.0701 7.90809 19.5279 7.90809Z"
                                        fill="#CCDEFF" />
                                    <path
                                        d="M14.2783 13.1578C13.7362 13.1588 13.2959 12.7201 13.2949 12.1779C13.2944 11.917 13.3979 11.6667 13.5823 11.4822L18.1391 6.92639L13.5823 2.37063C13.2057 1.98073 13.2165 1.35925 13.6064 0.9826C13.9868 0.615175 14.5899 0.615175 14.9704 0.9826L20.2202 6.23238C20.6034 6.6157 20.6034 7.23708 20.2202 7.62041L14.9704 12.8702C14.7868 13.0538 14.538 13.1573 14.2783 13.1578Z"
                                        fill="#CCDEFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mt-110">
                    <div class="recent-work-inner">
                        <div class="recent-work-img vre-reveal-one">
                            <img src="assets/images/home-2/recent-work-4-home-2.png" alt="VRE"
                                class="vre-reveal-image-one">
                        </div>
                        <div class="recent-work-thumb vre-slide-down-gsap">
                            <div class="recent-work-text">
                                <h5 class="font-size-1-24"><a href="project-details ">Structural Welding</a></h5>
                                <p class="font-size-1-18">Building Renovation </p>
                            </div>
                            <a href="project-details " class="project-view-btn">
                                <svg width="21" height="14" viewBox="0 0 21 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5279 7.90809H1.6789C1.13674 7.90809 0.697266 7.46861 0.697266 6.92646C0.697266 6.3843 1.13674 5.94482 1.6789 5.94482H19.5279C20.0701 5.94482 20.5096 6.3843 20.5096 6.92646C20.5096 7.46861 20.0701 7.90809 19.5279 7.90809Z"
                                        fill="#CCDEFF" />
                                    <path
                                        d="M14.2783 13.1578C13.7362 13.1588 13.2959 12.7201 13.2949 12.1779C13.2944 11.917 13.3979 11.6667 13.5823 11.4822L18.1391 6.92639L13.5823 2.37063C13.2057 1.98073 13.2165 1.35925 13.6064 0.9826C13.9868 0.615175 14.5899 0.615175 14.9704 0.9826L20.2202 6.23238C20.6034 6.6157 20.6034 7.23708 20.2202 7.62041L14.9704 12.8702C14.7868 13.0538 14.538 13.1573 14.2783 13.1578Z"
                                        fill="#CCDEFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Marketing Area Home 2 -->

<div class="service-popup" id="servicePopup">
    <div class="popup-content">
        <div id="popupContent">
            <!-- Dynamic content will be inserted here -->
        </div>
        <div class="popup-buttons">
            <a href="#" id="inquireButton" class="inquire-btn">Inquire Now</a>
            <button type="button" class="popup-close" onclick="closePopup()">Close</button>
        </div>
    </div>
</div>

<script>
const serviceDetails = {
    'Social Media Management': {
        title: "Transform Your Social Media Impact",
        benefits: "Expand your brand's digital footprint with strategic social media presence and engagement tactics.",
        results: "Higher follower growth, increased engagement rates, and improved brand loyalty through consistent, quality content.",
        why: "Our data-driven approach and platform-specific strategies ensure maximum impact across all social channels."
    },
    'Graphic Design': {
        title: "Design That Drives Results",
        benefits: "Stand out in a crowded market with professional, eye-catching visuals that reflect your brand identity.",
        results: "Increased brand recognition, higher engagement rates, and improved marketing material effectiveness.",
        why: "Our designers combine creativity with marketing psychology to create designs that convert."
    },
    'Video Production & Editing': {
        title: "Bring Your Story to Life",
        benefits: "Capture audience attention with professional video content that tells your brand story.",
        results: "Higher viewer retention, increased sharing rates, and improved conversion through visual storytelling.",
        why: "Professional equipment, creative expertise, and strategic video marketing knowledge all in one service."
    },
    'Meta Ads Management': {
        title: "Supercharge Your Ad Performance",
        benefits: "Reach your ideal customers with precision-targeted advertising campaigns.",
        results: "Lower acquisition costs, higher ROI, and measurable campaign performance across Meta platforms.",
        why: "Advanced targeting capabilities combined with creative optimization for maximum ad performance."
    },
    'SEO Services': {
        title: "Dominate Search Rankings",
        benefits: "Improve your website's visibility and attract organic traffic that converts.",
        results: "Higher search rankings, increased organic traffic, and better quality leads through search.",
        why: "Comprehensive SEO strategy covering technical, on-page, and off-page optimization."
    },
    'Thumbnail Designing': {
        title: "Capture Clicks with Stunning Thumbnails",
        benefits: "Maximize video click-through rates with attention-grabbing thumbnails.",
        results: "Increased video views, better audience engagement, and improved channel growth.",
        why: "Strategic design approach focused on psychology of viewer engagement and platform-specific best practices."
    },
    'Website Development & Optimization': {
        title: "Build Your Digital Foundation",
        benefits: "Create a powerful online presence with a high-performing, user-friendly website.",
        results: "Faster loading times, better user experience, and increased conversion rates.",
        why: "Full-stack development expertise combined with conversion rate optimization strategies."
    }
};

function openPopup(serviceName) {
    const popup = document.getElementById('servicePopup');
    const content = document.getElementById('popupContent');
    const details = serviceDetails[serviceName];
    
    // Update popup content with service-specific title
    content.innerHTML = `
        <h3 class="popup-title">${details.title}</h3>
        <div class="popup-qa">
            <h4>How does this benefit your business?</h4>
            <p>${details.benefits}</p>
        </div>
        <div class="popup-qa">
            <h4>What results can you expect?</h4>
            <p>${details.results}</p>
        </div>
        <div class="popup-qa">
            <h4>Why choose our service?</h4>
            <p>${details.why}</p>
        </div>
    `;
    
    // Show popup with animations
    popup.style.display = 'block';
    
    // Trigger animations with slight delays
    setTimeout(() => {
        document.querySelector('.popup-content').classList.add('active');
        
        // Animate each QA section sequentially
        const qaSections = document.querySelectorAll('.popup-qa');
        qaSections.forEach((section, index) => {
            setTimeout(() => {
                section.classList.add('active');
            }, 200 * (index + 1));
        });
        
        // Animate the button last
        setTimeout(() => {
            document.querySelector('.popup-buttons').classList.add('active');
        }, 800);
    }, 10);

    // Update WhatsApp link
    document.getElementById('inquireButton').href = 
        `https://wa.me/918799182171?text=${encodeURIComponent('Hello, I am interested in ' + serviceName + '. Please share more details.')}`;
}

function closePopup() {
    const popup = document.getElementById('servicePopup');
    const content = document.querySelector('.popup-content');
    
    content.classList.remove('active');
    document.querySelectorAll('.popup-qa, .popup-buttons').forEach(el => {
        el.classList.remove('active');
    });
    
    setTimeout(() => {
        popup.style.display = 'none';
    }, 400);
}

// Close popup when clicking outside
window.onclick = function(event) {
    if (event.target == document.getElementById('servicePopup')) {
        closePopup();
    }
}
</script>

<?php include './footer.inc.php'; ?>
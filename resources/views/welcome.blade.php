@extends('layouts.student.app')

@section('page_title', __('Homepage'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero_banner hero-inner-2 shadow rlt" style="background:#0d1f29 url({{ asset('frontend/assets/img/star-banner.png') }});" data-overlay="0">
    <div class="container">
        <!-- Type -->
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="transparent">
                    <h1 class="big-header-capt cl_2 mb-2">Study beyond the classroom</h1>
                    <p class="mb-4">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est reiciendis voluptatibus maiores alias consequatur</p>
                    <a href="#" class="btn btn-modern">Enroll Now<span><i class="ti-arrow-right"></i></span></a>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="position-relative hts-100 vw-lg-50">
                    <img class="img-fluid w-100 rounded rounded-lg-right-0" src="https://via.placeholder.com/1700x1600" alt="Image Description">
                    {{-- <img class="img-fluid w-100 rounded rounded-lg-right-0" src="https://picsum.photos/1700/1600" alt="Image Description"> --}}
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->




			
<!-- ============================ Trips Facts Start ================================== -->
<div class="trips_wrap full">
    <div class="container">
        <div class="row m-0">
        
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trips">
                    <div class="trips_icons">
                        <i class="ti-video-camera"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>100,000 online courses</h4>
                        <p>Nor again is there anyone who loves or pursues or desires</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trips">
                    <div class="trips_icons">
                        <i class="ti-medall"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>Expert instruction</h4>
                        <p>Nam libero tempore, cum soluta and nobis est eligendi optio</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trips none">
                    <div class="trips_icons">
                        <i class="ti-infinite"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>Lifetime access</h4>
                        <p>These cases are perfectly simple and easy to distinguish</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- ============================ Trips Facts Start ================================== -->


<!-- ========================== Featured Category Section =============================== -->
<section>
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>Popular Category</p>
                    <h2><span class="theme-cl">Hot & Popular</span> Category For Learn</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-1">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Development</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>23 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-2">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Business</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>58 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-3">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Accounting</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>74 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-4">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">IT & Software</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>65 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-10">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Art & Design</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>43 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-6">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Marketing</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>82 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-7">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Photography</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>25 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-8">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Health & Fitness</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>43 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="edu_cat_2 cat-9">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="#">Lifestyle</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="ti-video-clapper"></i>38 Classes</li>
                        </ul>
                    </div>
                </div>							
            </div>
        </div>
        
    </div>
</section>
<!-- ========================== Featured Category Section =============================== -->



<!-- ============================ Featured Courses Start ================================== -->
<section class="gray">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>Hot &amp; Trending</p>
                    <h2><span class="theme-cl">Recent</span> Courses by professional Instructor</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$520</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">Tableau For Beginners: Get CA Certified, Grow Your Career</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>8682 Views</li>
                            <li><i class="ti-time mr-2"></i>6h 40min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Robert Wilson</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>54 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$349</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">The Complete Business Plan Course (Includes 50 Templates)</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>9882 Views</li>
                            <li><i class="ti-time mr-2"></i>6h 30min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Shruti Hasan</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>26 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$545</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">An Entire MBA In 1 Course:Award Winning Business School Prof</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>5893 Views</li>
                            <li><i class="ti-time mr-2"></i>5h 15min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Adam Viknoi</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>52 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$420</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">The Complete Financial Analyst Course 2020</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>8582 Views</li>
                            <li><i class="ti-time mr-2"></i>4h 59min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.6 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Shilpa Shekh</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>43 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$429</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">PMP Exam Prep Seminar - PMBOK Guide 6</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>9857 Views</li>
                            <li><i class="ti-time mr-2"></i>7h 45min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.9 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Shaurya Preet</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>32 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid style_2">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="https://via.placeholder.com/700x500" class="img-fluid" alt=""></a>
                        <div class="cources_price">$249</div>
                    </div>
                    
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">Tableau 2020 A-Z:Hands-On Tableau Training For Data Science!</a></h4>
                    </div>
                    
                    <div class="cources_info_style3">
                        <ul>
                            <li><i class="ti-eye mr-2"></i>6852 Views</li>
                            <li><i class="ti-time mr-2"></i>2h 30min</li>
                            <li><i class="ti-star text-warning mr-2"></i>4.8 Reviews</li>
                        </ul>
                    </div>
                    
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Preeti Bhartiya</a></h5>
                        </div>
                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>48 lectures</div>
                    </div>
                    
                </div>	
            </div>
            
        </div>
        
    </div>
</section>
<!-- ============================ Featured Courses End ================================== -->



<!-- ========================== About Facts List Section =============================== -->
<section>
    <div class="container">
        
        <div class="row align-items-center">
        
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="about-short">
                    <div class="sec-heading mb-3">
                        <h2>Know about <span class="theme-cl">e-Learn</span> learning platform</h2>
                    </div>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et voluptatem.</p>
                    <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut</p>
                    <div class="cource_facts">
                        <ul>
                            <li><span class="theme-cl">7m</span>Active Cources</li>
                            <li><span class="theme-cl">77k</span>Student Learning</li>
                            <li><span class="theme-cl">84+</span>Free Cources</li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="list_facts_wrap_img">
                
                    <img src="https://via.placeholder.com/550x490" class="img-fluid" alt="">
                    
                </div>
            </div>

        </div>
        
    </div>
</section>
<!-- ========================== About Facts List Section =============================== -->


<!-- ============================ Featured Instructor Start ================================== -->
<section class="gray">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>Meet Instructors</p>
                    <h2><span class="theme-cl">Top & Famous</span> Instructor in Your City</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            
                <div class="four_slide-dots articles arrow_middle">
                    
                    <!-- Single Slide -->
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
                                <span>Web Designer</span>
                                <ul>
                                    <li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Slide -->
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
                                <span>Web Designer</span>
                                <ul>
                                    <li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Slide -->
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
                                <span>Web Designer</span>
                                <ul>
                                    <li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Slide -->
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
                                <span>Web Designer</span>
                                <ul>
                                    <li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Slide -->
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="instructor-detail.html">Daniel Diwansker</a></h4>
                                <span>Web Designer</span>
                                <ul>
                                    <li><a href="#" class="cl-fb"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#" class="cl-twitter"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#" class="cl-linked"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                </div>
            
            </div>
        </div>
        
    </div>
</section>
<!-- ============================ Featured Instructor End ================================== -->



<!-- ========================== Articles Section =============================== -->
<section class="">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>Our Story</p>
                    <h2><span class="theme-cl">Recent</span> Articles to You</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
                    
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                        <a href="blog-detail.html"><img src="https://via.placeholder.com/700x400" class="img-fluid" alt="" /></a>
                    </div>
                    
                    <div class="articles_grid_caption">
                        <h4>The National Minimum wage is an important part</h4>
                        <div class="articles_grid_author">
                            <div class="articles_grid_author_img"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></div>
                            <h4>Adam Willsone</h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                        <a href="blog-detail.html"><img src="https://via.placeholder.com/700x400" class="img-fluid" alt="" /></a>
                    </div>
                    
                    <div class="articles_grid_caption">
                        <h4>The National Minimum wage is an important part</h4>
                        <div class="articles_grid_author">
                            <div class="articles_grid_author_img"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></div>
                            <h4>Rikki Sen</h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single Article -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="articles_grid_style">
                    <div class="articles_grid_thumb">
                        <a href="blog-detail.html"><img src="https://via.placeholder.com/700x400" class="img-fluid" alt="" /></a>
                    </div>
                    
                    <div class="articles_grid_caption">
                        <h4>The National Minimum wage is an important part</h4>
                        <div class="articles_grid_author">
                            <div class="articles_grid_author_img"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt="" /></div>
                            <h4>Daniel Wikjones</h4>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</section>
<!-- ========================== Articles Section =============================== -->
            
<!-- ============================== Start Newsletter ================================== -->
<section class="newsletter theme-bg inverse-theme">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <div class="text-center">
                    <h2>Join Thousand of Happy Students!</h2>
                    <p>Subscribe our newsletter & get latest news and updation!</p>
                    <form class="sup-form">
                        <input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
                        <input type="submit" class="btn btn-theme" value="Get Started">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End Newsletter =============================== -->
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection

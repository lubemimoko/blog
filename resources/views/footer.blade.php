<style>
   footer p{   
    color:#b0b0b0; 
    margin: 0px;
  }
  .footer-contact-info li .info-wrapper {
    display: inline-block;
    padding-left: 10px;
}
</style>      
   <script type="text/javascript">
                     </script>
   <footer id="tw-footer" class="tw-footer">
      <div class="container">
         <div class="footer-contact">
            <div class="row">
               <div class="col-lg-5">
                  <ul class="footer-contact-info">
                     <li>
                        <span><i class="icon icon-map-marker2"></i></span>
                        <div class="info-wrapper">
                           <p class="info-title">Find Me</p>
                           <p class="info-subtitle">Lagos, Nigeria</p>
                           
                        </div>
                     </li>
                     <!-- li End -->
                  </ul>
                  <!-- Footer Info End -->
               </div>
               <!-- Col End -->
               <div class="col-lg-4">
                  <ul class="footer-contact-info">
                     <li>
                        <span><i class="icon icon-phone3"></i></span>
                        <div class="info-wrapper">
                           <p class="info-title">Call Me</p>
                           <p class="info-subtitle">2348096******, 2348138*****</p>
                        </div>
                     </li>
                     <!-- li End -->
                  </ul>
                  <!-- Footer Info End -->
               </div>
               <!-- Col End -->
               <div class="col-lg-3">
                  <ul class="footer-contact-info">
                     <li>
                        <span><i class="icon icon-envelope"></i></span>
                        <div class="info-wrapper">
                           <p class="info-title">Mail Me</p>
                           <p class="info-subtitle">lubemimoko@gmail.com</p>
                        </div>
                     </li>
                     <!-- li End -->
                  </ul>
                  <!-- Footer Info End -->
               </div>
               <!-- Col End -->
            </div>
         </div>
         <div class="footer-content">
            <div class="footer-pattern">
                <!--<img src="images/pimg/piit_logo.png" alt="piit_logo" style="width: 100px; height:100px;"> -->
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-4">
                  <div class="tw-footer-info-box">
                     
                     <div class="footer-social-link">
                        <h3 style="margin-bottom: 10px;">Follow us</h3>
                        <ul>
                           <li><a href="https://web.facebook.com/lubeimoko"><i class="fa fa-facebook"></i></a></li>
                           
                           <li><a href="https://www.instagram.com/lubemimoko/?hl=en"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                     <!-- End Social link -->
                  </div>
                  <!-- End Footer info -->
               </div>
               <!-- End Col -->
            </div>
                  </div>
                  <!-- End footer widget -->
               </div>
               <!-- End Col -->
            </div>
            <!-- End Widget Row -->
         </div>
      </div>
      <!-- End Contact Container -->


      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12">
                  <span>Copyright &copy; 2021, All Right Reserved Lubem </span>
               </div>
               <!-- End Col -->
               <div class="col-lg-6 col-md-12">
                  <div class="copyright-menu">
                     <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                     </ul>
                  </div>
               </div>
               <!-- End col -->
            </div>
            <!-- End Row -->
         </div>
         <!-- End Copyright Container -->
      </div>
      <!-- End Copyright -->
      <!-- Back to top -->
      <div class="infon" id="infon">
    
      </div>
      <div id="back-to-top" class="back-to-top">
         <!-- <button class="btn btn-dark" title="Back to Top">
            <i class="fa fa-angle-up"></i>
         </button> -->
      </div>
      <!-- End Back to top -->
   </footer>
   <!-- End Footer -->

   <!-- Javascripts File
      =============================================================================-->

   <!-- initialize jQuery Library -->
   <script src="js/jquery-2.0.0.min.js"></script>
   <!-- Popper JS -->
   <script src="js/popper.min.js"></script>
   <!-- Bootstrap jQuery -->
   <script src="js/bootstrap.min.js"></script>
   <!-- Owl Carousel -->
   <script src="js/owl-carousel.2.3.0.min.js"></script>
   <!-- Waypoint -->
   <script src="js/waypoints.min.js"></script>
   <!-- Counter Up -->
   <script src="js/jquery.counterup.min.js"></script>
   <!-- Video Popup -->
   <script src="js/jquery.magnific.popup.js"></script>
   <!-- Smooth scroll -->
   <script src="js/smoothscroll.js"></script>
   <!-- WoW js -->
   <script src="js/wow.min.js"></script>
   <!-- Template Custom -->
   <script src="js/main.js"></script>
   
    <script src="js/picturefill.min.js"></script>
        <script src="js/lightgallery.min.js"></script>
        <script src="js/lg-pager.min.js"></script>
        <script src="js/lg-autoplay.min.js"></script>
        <script src="js/lg-fullscreen.min.js"></script>
        <script src="js/lg-zoom.min.js"></script>
        <script src="js/lg-hash.min.js"></script>
        <script src="js/lg-share.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script>
            AOS.init();
         </script>
        <script type="text/javascript">            
            
            $("#eqsubmit").click(function(e){
               
                e.preventDefault();
                
                
                var username=$("#name").val();
                var email=$("#email").val();
                var enquiries=$("#message").val();
                if(username.length==0 || username=="" || 
                        email.length==0 || email=="" || enquiries.length==0 || enquiries==""){
                    $("#name").addClass("pl_class").attr("placeholder", "input your fullname");
                    $("#email").addClass("pl_class").attr("placeholder", "input your email");
                    $("#message").addClass("pl_class").attr("placeholder", "Your must type a message");
                    return;
                }
                $("#eqsubmit").attr("disabled", true);
                                
                $.ajax({
                    url: 'enquiry_r.php',
                    data: {
                       fullname: $("#name").val(),
                       email: $("#email").val(),
                       message: $("#message").val()
                    },
                    error: function(data) {
                      var $description = $('<p>').text(data.state);
                       $('#infon').append($description).show(3000, function(){
                              $(this).css("display", "none");
                          });
                          
                          $("#eqsubmit").attr("disabled", false);
                                            
                       
                    },
                    dataType: 'json',
                    success: function(data) {
                       
                                               
                       var $description = $('<p>').text(data.state);
                       $('#infon').append($description).show(3000, function(){
                              $(this).css("display", "none");
                          });
                          $("#eqsubmit").attr("disabled", false);
                    },
                    complete: function(){
                        $("#eqsubmit").attr("disabled", false);
                    },
                    type: 'POST'
                    
                 });
                 
                 
                
            });
            
            $("#btl").on('click', function(e) {
                
                var arr=[];
                var len=50;
                for(var i=0; i<len; i++){
                    var obj={};
                    obj.src="images/pimg/main/apm_pics"+i+".JPG";
                    obj.thumb="images/pimg/thumbs/ap_pics"+i+".JPG";
                    obj.subHtml='<p>PIIT Photo gallery</p>';
                    arr[i]=obj;
                }
                

                         lightGallery(document.getElementById('aniimated-thumbnials'),{
                          dynamic: true,
                          dynamicEl: arr
                      });

              });
              
              $("#courses").on("click", function(e){
                    e.preventDefault();
                    
              });
              
              
              
              
   
    
        </script>
          <!-- <button class="back-to-top fa fa-chevron-up" ></button> -->
</div>

<!-- External JavaScripts -->
<!-- <script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script src="assets/js/myJs.js"></script> -->
<!-- Revolution JavaScripts Files -->
<!-- <script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script> -->
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<!-- <script src="assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script> -->
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"assets/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},
				
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});	
</script>
</body>

</html>

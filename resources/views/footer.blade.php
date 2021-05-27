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

        <script type="text/javascript">            
           /* 
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
              
              
              
*/              
   
    
        </script>
          <!-- <button class="back-to-top fa fa-chevron-up" ></button> -->
</div>
</body>

</html>

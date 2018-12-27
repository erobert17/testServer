<!DOCTYPE html>
<html class="tinted-image" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://growyourleads.com/favicon.ico">
    <title>Open House <?php echo e($thisProperty[0]->address); ?></title>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('css/the-big-picture.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap-3-vert-offset-shim.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/font-awesome.min.css')); ?>"
    ><link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap-slider.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Khula" rel="stylesheet">

    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-slider.min.js')); ?>"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php echo e(asset('js/accounting.js')); ?>"></script>
    

    <!-- image scrolling -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/jquery.mThumbnailScroller.css')); ?>">
    
    <script src="<?php echo e(asset('js/jquery.mThumbnailScroller.min.js')); ?>"></script>
    <!-- lightbox -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/lightbox.css')); ?>">
    <script src="<?php echo e(asset('js/lightbox.js')); ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/main.css')); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- CUSTOM !!!! -->
    </head>

    <!-- thumbnail scroll CSS -->
  <style>
    .content{
      overflow: auto;
      position: relative;
      padding: 10px;
      background-color: #333;
      margin: 20px;
      width: 50%;
      height: auto;
      float: left;
    }
    .content li{
      margin: 4px;
      overflow: hidden;
    }
    .content li a{
      display: inline-block;
      border: 7px solid rgba(255,255,255,.1);
    }
    .content.light, .content.light .mTSButton{ background-color: #c2beb2; }
    .content.light li a{ border: 7px solid rgba(255,255,255,.4); }
    #content-1, #content-2{
      width: auto;
      height: 600px;
    }
    #content-1 ul li:first-child{ margin-top: 20px; }
    #content-1 ul li:last-child{ margin-bottom: 20px; }
    #content-2{ padding: 55px 10px; }
    #content-3 .mTSButton{ background-color: #333; }
    #content-5{ background-color: #444; }
    #content-6{ background-color: transparent; }
    #content-6 .mTSButton{
      background-color: rgba(0,0,0,.7);
      -moz-border-radius: 48px; -webkit-border-radius: 48px; border-radius: 48px;
    }
    #content-6 .mTSButtonLeft{ left: 5px; }
    #content-6 .mTSButtonRight{ right: 5px; }
  </style>

  <style type="text/css">
  @media(max-width:1100px){

      .houseBackground{
        background:url('<?php echo e(URL::to('/').$thisProperty[0]->path); ?>')  ;
        min-width:100%;
        min-height:650px;
        background-size: cover;
      }

  }

  @media(min-width:1101px){

      .houseBackground{
        background:url('<?php echo e(URL::to('/').$thisProperty[0]->path); ?>')  ;
        min-width:100%;
        min-height:900px;
        background-size: cover;
      }

  }

  </style>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery.datetimepicker.css')); ?>">
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.datetimepicker.full.js')); ?>"></script>


<body>
        <!-- Page Content -->
    <div class="container houseBackground">
      <div class="row vert-offset-top-3">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-sm-12">
          <h2 class="allCaps khula fontWhite">
          <?php if($userProfile->avatar_status == 1): ?>
            <img src="<?php echo e($userProfile->avatar); ?>" class="khula img-responsive center-block" style="object-fit: cover; max-width:200px;float: left;">
          <?php else: ?>
            <h5 style="font-weight:700;color: white;"><?php echo e($user->company); ?></h5>
          <?php endif; ?>
          
        </h2>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-1"></div>
      </div>

      <div class="row vert-offset-top-3">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-sm-12">
          <div class="propertyLocationSearchBox allCaps khula">
            <h5 class="font22" ><?php echo e($thisProperty[0]->address); ?></h5>
            <h5 class="font27 fontBlack bold" >$<?php echo e($thisProperty[0]->price); ?></h5>
            <?php $allBullets = json_decode($thisProperty[0]->topBullets); ?>
            <ul style="padding: 0; list-style-type: none;">
              <?php if($thisProperty[0]->topBullets != null): ?>
                <?php $__currentLoopData = $allBullets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bullet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="font22 allCaps khula"><?php echo e($bullet); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </ul>
          </div>
          <a href="#">
            <div class="vert-offset-top-1 tealScheduleButton allCaps khula propertyLocationSearchBox">Schedule A Showing</div>
          </a>
        </div>
        <div class="col-md-7"></div>
        <div class="col-md-1"></div>
      </div>
    </div>

    <div class="container"">

      <div class="row">
        <div class="col-md-12">
          <div id="demo">
          <section id="examples" style="max-width: 90%;margin-right: auto !important;margin-left: auto !important;">
          <div id="content-4" class="lp3PropPrevContain">
            <ul>
          <?php for($i=0; $i < count($thisProperty); $i++): ?>
            <?php if($thisProperty[$i]->imageName !== null): ?>
              <?php if($i == 0): ?>
                <li><a href="<?php echo e(URL::to('/') .$thisProperty[$i]->imageName); ?>" data-lightbox="propertyImages">
                  <img class="first lp3PropPrevImg" src="<?php echo e(URL::to('/') .$thisProperty[$i]->imageName); ?>">
                </a></li>
              <?php else: ?> if($i == count($thisProperty))
                <li><a href="<?php echo e(URL::to('/') .$thisProperty[$i]->imageName); ?>" data-lightbox="propertyImages">
                  <img class="last lp3PropPrevImg" src="<?php echo e(URL::to('/') .$thisProperty[$i]->imageName); ?>">
                </a></li>
              <?php endif; ?>
            <?php endif; ?>
          <?php endfor; ?>
            </ul>
          </div>
        </section></div>
        </div>
      </div>

      <div class="row vert-offset-top-3 vert-offset-bottom-2">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="row">
          
            <!--  isset($authorAvatar[0]->avatar) -->
            <?php if(isset($author[0]->userAvatar)): ?>
              <div class="col-md-3 col-sm-3"></div>
              <div class="col-md-3 col-sm-3">
                <img src="<?php echo e(URL::to('/') . $author[0]->userAvatar); ?>" class="largeUserAvatar">
              </div>
              <div class="col-md-4 col-sm-4 onSmallCenterText">
                <h4><?php echo e($author[0]->company); ?></h4>
                <h4><?php echo e($author[0]->phone); ?></h4>
                <h4><?php echo e($author[0]->email); ?></h4>
              </div>
              <div class="col-md-2 col-sm-2"></div>
            <?php elseif( isset($authorAvatar[0]->avatar) ): ?>
              <div class="col-md-3 col-sm-3"></div>
              <div class="col-md-3 col-sm-3">
                <img src="<?php echo e(URL::to('/') .$authorAvatar[0]->avatar); ?>" class="largeUserAvatar">
              </div>
              <div class="col-md-4 col-sm-4 onSmallCenterText">
                <h4><?php echo e($author[0]->company); ?></h4>
                <h4><?php echo e($author[0]->phone); ?></h4>
                <h4><?php echo e($author[0]->email); ?></h4>
              </div>
              <div class="col-md-2 col-sm-2"></div>

            <?php else: ?>
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4 onSmallCenterText">
                
                <h4><?php echo e($author[0]->company); ?></h4>
                <h4><?php echo e($author[0]->phone); ?></h4>
                <h4><?php echo e($author[0]->email); ?></h4>
              </div>
              <div class="col-md-4"></div>
            <?php endif; ?>
            
          </div>
        </div>
        
        <div class="col-md-4"></div>
      </div>

    </div>

    <div style="background-color:#f3f3f3;">

      <div class="container">
        <div class="row vert-offset-top-2 vert-offset-bottom-2">

          <div class="col-md-1"></div>
          <div class="col-md-10" style="text-align: center;"><?php echo e($thisProperty[0]->propertyDescription); ?></div>
          <div class="col-md-1"></div>

        </div>

        <div class="row vert-offset-top-2 vert-offset-bottom-2">
          
          <?php 

          $bulletsInterior = json_decode($thisProperty[0]->bulletsInterior); 
          $bulletsExterior = json_decode($thisProperty[0]->bulletsExterior); 
          $bulletsDimentions = json_decode($thisProperty[0]->bulletsDimentions); 

          ?>
          <div class="col-md-3"></div>

          <div class="col-md-7">

            <div class="row">

              <div class="col-md-4 col-sm-4 text-center">
                <strong class="fontBlack khula font17">Interior Details</strong>
                <ul style="list-style-type: none;padding: 0;">
                <?php $__currentLoopData = $bulletsInterior; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bullet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($bullet); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>

              <div class="col-md-4 col-sm-4 text-center">
                <strong class="fontBlack khula font17">Exterior Details</strong>
                <ul style="list-style-type: none;padding: 0;">
                <?php $__currentLoopData = $bulletsExterior; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bullet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($bullet); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>

              <div class="col-md-4 col-sm-4 text-center">
                <strong class="fontBlack khula font17">Dimentions Details</strong>
                <ul style="list-style-type: none;padding: 0;">
                <?php $__currentLoopData = $bulletsDimentions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bullet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($bullet); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>

            </div>

          </div>

          <div class="col-md-2"></div>   

        </div>

      </div>

    </div>


    <div class="container">
        <div id="sendTimesMessage" class="row vert-offset-top-3 vert-offset-bottom-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h2 class="scheduleShowing fontBlack khula allCaps textCenter bold vert-offset-top-2 vert-offset-bottom-2">Schedule Showing</h2>

                <div class="row">
                    <div class="col-md-4 text-center">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <p class="smallCapsText">Name <span class="redDot">*</span></p>
                      <input name="name" id="name" class="paddedInput col-sm-12">
                    </div>
                    <div class="col-md-4 text-center">
                      <p class="smallCapsText">Your Email Address <span class="redDot">*</span></p>
                      <input name="email" id="email" class="paddedInput col-sm-12">
                    </div>
                    <div class="col-md-4 text-center">
                      <p class="smallCapsText">Phone Number</p>
                      <input class="paddedInput col-sm-12" id="phone" name="phone">
                    </div>
                </div>

                <div class="row vert-offset-top-1">

                  <input type="hidden" id="propertyId" name="propertyId" value="<?php echo e($propertyId); ?>">
                  <div class="col-md-8 text-center">
                    <p class="smallCapsText">Message</p>
                    <textarea name="message" id="message" class="paddedInput col-sm-12" style="height:11em;"></textarea>
                  </div>

                  <div class="col-md-4">

                    <div class="row">
                      <div class="col-md-12 text-center">
                      
                        <p class="smallCapsText">Date First Choice</p>
                        <input id="datepicker1" name="firstChoice" class="paddedInput col-sm-12" style="font-size:10px" placeholder="MM/DD/YYYY">
                      
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 text-center">
                        <p class="smallCapsText">Date Second Choice</p>
                        <input id="datepicker2" name="secondChoice" class="paddedInput col-sm-12" style="font-size:10px" placeholder="MM/DD/YYYY">
                      </div>
                    </div>


                    <div class="row vert-offset-top-1">
                      <div class="col-md-12 text-center">
                        <button type="button" id="submitInquryTime" class="col-md-12 khula allCaps textCenter bold btn" style="color:white; font-size:15px; background: #3db673;">
                        Schedule A Showing</button>
                      </div>
                    </div>
                </div>
                
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
        
      </div>

      
      <div class="container-fluid" style="padding:0px !important;">
        
        <?php if( isset($thisProperty[0]->geolocation) ): ?>
          <div class="row">
              <div class="col-md-12" style="padding:0px !important;">
                <div id="map" style="height:320px !important; width:100% !important;"></div>
              </div>
          </div>
            <?php $locate = json_decode($thisProperty[0]->geolocation); ?>
            <script>
              function initMap() {
                var uluru = {lat: <?php echo e($locate[0]); ?>, lng: <?php echo e($locate[1]); ?>};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 17,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWXBwkxnlRt-vCeT2_rmNjrY07dNnuXEk&callback=initMap">
            </script>
        <?php endif; ?>
      </div>

    <?php if(count($properties) != 0): ?>

        <div class="container">
            <div id="inquryArea" class="row vert-offset-top-3 vert-offset-bottom-3 no-margin">
                <div class="row no-margin">
                
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <h2 class="fontBlack khula allCaps textCenter bold vert-offset-top-2 vert-offset-bottom-2">
                      Recent Properties
                    </h2>
                    <div class="col-md-2"></div>
                  </div>
                
                </div>

                <div class="row vert-offset-top-3 vert-offset-bottom-3">
                  <div class="col-md-2"></div>
                  <div class="col-md-8" style="margin-left: 1em;margin-right: 1em;">
                    
                      <div class="row vert-offset-top-1 vert-offset-top-1">
                        <?php $countImage = 0; ?>
                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <!--<?php if(isset($recentImages[$countImage])): ?>-->
                            <div class="col-md-4">
                              <a href="/openHouseLink/<?php echo e($userId); ?>/<?php echo e($prop->id); ?>">
                                <img class="col-md-12 vert-offset-bottom-1 center-block img-responsive" style="padding:0px; max-height:250px;" src="<?php echo e($recentImages[$countImage]); ?>" /><br>
                                <div class="col-sm-offset-4 col-md-offset-0">
                                  <h5 class="orangeTitle"><?php echo e($prop->address); ?></h5>
                                  <p class="blackTitle">$<?php echo e($prop->price); ?></p>
                                  <?php $allBullets = json_decode($thisProperty[0]->topBullets); ?>
                                  <div class="row">
                                    <?php if($thisProperty[0]->topBullets != null): ?>
                                        <?php for($i=0; $i < 3; $i++): ?>
                                          <?php if(isset($allBullets[$i])): ?>
                                            <div class="col-md-4">
                                              <span style="font-size: 12px;color: gray;font-weight: 900;"><?php echo e($allBullets[$i]); ?></span>
                                            </div>
                                          <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                  </div>

                                  <p class="khula"><?php 
                                
                                echo substr($prop->propertyDescription, 0, 120); ?> . . .</p>

                                </div>

                                
                              </a>
                            </div>
                            <?php $countImage++; ?>
                          
                          <!-- <?php endif; ?> -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>

                  </div>

                  <div class="col-md-2"></div>

                </div>

              </div>

        </div>
    <?php endif; ?>

    

</body>

</html>

<script>
    (function($){
      $(window).load(function(){
        
        $("#content-1").mThumbnailScroller({
          axis:"y",
          type:"hover-precise"
        });
        
        $("#content-2").mThumbnailScroller({
          axis:"y",
          type:"click-thumb",
          theme:"buttons-out"
        });
        
        $("#content-3").mThumbnailScroller({
          type:"click-50",
          theme:"buttons-in"
        });
        
        $("#content-4").mThumbnailScroller({
          theme:"hover-classic"
        });
        
        $("#content-5").mThumbnailScroller({
          type:"hover-precise"
        });
        
        $("#content-6").mThumbnailScroller({
          type:"click-25",
        });
        
      });
    })(jQuery);
  </script>
                <script type="text/javascript">
                  $(document).ready(function(){

                    $('.propertyLocationSearchBox').click(function(){
                      $('html,body').animate({
                      scrollTop: $(".scheduleShowing").offset().top},
                      'slow');
                    })
                    

                      $('#datepicker2').datetimepicker({
value:'',
lang:'en',

format: 'Y/m/d H:i',
formatTime: 'g:i a',
formatDate: 'Y/m/d',

startDate:  false, // new Date(), '1986/12/08', '-1970/01/05','-1970/01/05', 

step:15,

timepicker:true,
datepicker:true,


onSelectDate:function() {},
onSelectTime:function() {},
onChangeMonth:function() {},
onChangeDateTime:function() {},
onShow:function() {},
onClose:function() {},
onGenerate:function() {},

withoutCopyright:true,

inverseButton:false,
hours12:false,
next: 'xdsoft_next',
prev : 'xdsoft_prev',
dayOfWeekStart:0,
pick12HourFormat: false,  
yearOffset:0,
beforeShowDay: null
});
                      
                      $('#datepicker1').datetimepicker({
value:'',
lang:'en',

format: 'Y/m/d H:i',
formatTime: 'g:i a',
formatDate: 'Y/m/d',
pick12HourFormat: false,  
startDate:  false, // new Date(), '1986/12/08', '-1970/01/05','-1970/01/05', 

step:15,

timepicker:true,
datepicker:true,


onSelectDate:function() {},
onSelectTime:function() {},
onChangeMonth:function() {},
onChangeDateTime:function() {},
onShow:function() {},
onClose:function() {},
onGenerate:function() {},

withoutCopyright:true,

inverseButton:false,
hours12:false,
next: 'xdsoft_next',
prev : 'xdsoft_prev',
dayOfWeekStart:0,

yearOffset:0,
beforeShowDay: null
});

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      $('#submitInquryTime').click(function(){
                        var name = $('#sendTimesMessage #name').val();
                        var email = $('#sendTimesMessage #email').val();
                        var phone = $('#sendTimesMessage #phone').val();
                        var message = $('#sendTimesMessage #message').val();
                        var datepicker1 = $('#sendTimesMessage #datepicker1').val();
                        var datepicker2 = $('#sendTimesMessage #datepicker2').val();
                        var propertyId = $('#sendTimesMessage #propertyId').val();
                        if(name.length > 1 && email.length > 1){

                          $.ajax({
                            type: 'POST',
                            url: '/saveShowingInquiry',
                            data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "name": name,
                            "email": email,
                            "phone": phone,
                            "message": message,
                            "datepicker1": datepicker1,
                            "datepicker2": datepicker2,
                            "propertyId": propertyId
                            },
                            success:function(data) {
                              alert('Your inquiry has been sent. Thank you for your submission.');
                              $('#sendTimesMessage input').each(function(){
                                $(this).val('');
                              });
                              $('#sendTimesMessage textarea').val('');
                            }
                          }).done(function( msg ) {
                                            
                          });

                        }else{
                          alert("Name and Email are required.")
                        }

                      });

                  });
                </script>
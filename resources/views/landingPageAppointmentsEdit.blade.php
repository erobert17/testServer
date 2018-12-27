@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

<div id="fillWithNoobMessage">


</div>
@section('template_fastload_css')
@endsection

@section('content')

<script type="text/javascript">
        $(document).ready(function(){

            if({{$userHintState}} === 2){
     
                if({{$user->helpBubbleToggle}} == 1){// always 1 until user turns off all hint bubbles
                    
                    $('#fillWithNoobMessage').html("<div class='noobMessage noShowOnMobile'><p class='text-center'>There's a '<strong>Stats</strong>' link in the left menu, below this landing page's link.</p><p class='text-center'>Click it to see metrics for this landing page. </p><div class='text-center'><button id='closeHint' class='text-center'> Close </button><button id='neverShowHints' class='text-center'> Never Show These Hints </button></div></div>");

                    $(".noobMessage").delay(100).fadeIn();
                    var glow = $(".statsTab a");
                    glow.addClass('noobHintLink');
                    setInterval(function(){
                        glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
                    }, 500);

                }
            }

                    $('#closeHint').click(function(){

                        $(".noobMessage").fadeOut();  
                        $.ajax({
                          type: 'POST',
                          url: '/changeHintState',
                          data: {  "_token": "{{ csrf_token() }}",
                          "hintNumber": '3'},
                          //"email": email,
                          success:function(data) {

                          }
                        }).done(function( msg ) {  
                        $(".noobMessage").fadeOut();       
                        });

                        $(".copyLinkInput").removeClass('noobBackgroundColor');

                    });

                    $('#neverShowHints').click(function(){

                        $(".noobMessage").fadeOut();  

                        $.ajax({
                          type: 'POST',
                          url: '/neverShowHints',
                          data: {  "_token": "{{ csrf_token() }}"},
                          
                          success:function(data) {
                          }
                        }).done(function( msg ) {  
                        $(".noobMessage").fadeOut();       
                        });

                        $(".copyLinkInput").removeClass('noobBackgroundColor');

                    });

        });
    </script>
    
        <script type="text/javascript" src="{{asset('js/jscolor.js')}}"></script>
        
        <input type="hidden" name="userID" value="{{ $user->id }}" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            
            <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3 col-lg-6 col-lg-offset-3">

                <div class="panel-body panel panel-primary @role('admin', true) panel-info  @endrole">
                    <div class="centerBlock">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <strong>Your Unique Landing Page Link: &nbsp;</strong>
                            </div>
                            <div class="col-sm-4 col-md-6">
                                <input id="linkToCopy" style="width:100%" value="{{ URL::to('/').'/link'.$landingPageNumber.'/'.$userLink }}" type="text">&nbsp;
                            </div>
                            <div class="col-sm-4 col-md-2">
                                <button type="button" id="copy" data-clipboard-target="#linkToCopy" class="btn btn-success floatRight">Copy</button>
                            </div>
                        </div>
                        
                        &nbsp;<strong class="copiedLink">Copied!</strong>
                    </div>
                </div>
           
                <script type="text/javascript">
                    new Clipboard('#copy');
                    $(document).ready(function(){
                        $('#copy').click(function(){
                                $(".copiedLink").attr( "style", "display: inline !important;" )
                                setTimeout(function() { $(".copiedLink").fadeOut(); }, 5000);
                        });
                    });
                </script>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3 col-lg-6 col-lg-offset-3">

                @if( isset($warningTitle) )

                    <div class="row vert-offset-bottom-1">
                        <div class="col-md-12">
                                <div class="alert alert-warning">
                                <span class="glyphicon glyphicon-record"></span> <strong>Warning</strong>
                                <hr class="message-inner-separator">
                                <p>{!! $warningTitle !!}</p>
                            </div>
                        </div>
                    </div>

                @endif

                <div class="panel panel-primary @role('admin', true) panel-info  @endrole">
                    <div class="panel-heading">
                        
                    Appointments
                    </div>

                    <div class="panel-body">
                        <form action="/saveLandingPage{{$landingPageNumber}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-8">
                                <label>Title:<br>
                                    <input name="title" class="longInput" value="<?php if(isset($landingPage[0]->title)){echo $landingPage[0]->title;} ?>">
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label>Title Text Color<br>
                                    @if($landingPage[0]->titleColor !== NULL && strlen($landingPage[0]->titleColor) > 2 )
                                        <input id="titleColorSelect" name="titleSelect" class="jscolor 
                                    {value:'{{ $landingPage[0]->titleColor }}'}" value="jscolor {value:'{{ $landingPage[0]->titleColor }}'}" style="width: 5em;">
                                        <input id="titleColor" name="titleColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="{{ $landingPage[0]->titleColor }}" />
                                    @else
                                        <input id="titleColorSelect" name="titleSelect" class="jscolor 
                                    {required:false}" value="" style="width: 5em;">
                                        <input id="titleColor" name="titleColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="" />
                                    @endif
                                </label>
                            </div>
                        </div>

                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-8">
                                <label>Secondary Title:<br>
                                    <input name="secondaryTitle" class="longInput" value="<?php if(isset($landingPage[0]->secondaryTitle)){echo $landingPage[0]->secondaryTitle;} ?>">
                                </label>
                            </div>

                            <div class="col-md-4">
                                <label>Title Text Background Shadow<br>
                                    
                                    @if($landingPage[0]->titleShadow == 1)
                                        <input type="checkbox" style="width: 23px;height: 23px;" name="titleTextShadow" checked="checked" />
                                    @else
                                        <input type="checkbox" style="width: 23px;height: 23px;" name="titleTextShadow" />
                                    @endif
                                </label>
                            </div>
                        </div>
                        
                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-8">
                                <label>Disclaimer*<br>
                                    <input type="text" name="disclaimer" value="{{$landingPage[0]->disclaimer}}" id="disclaimer" class="longInput"/>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label>Disclaimer Text Color<br>
                                    @if($landingPage[0]->disclaimerColor !== NULL && strlen($landingPage[0]->disclaimerColor) > 2 )
                                        <input id="disclaimerSelect" name="disclaimerSelect" class="jscolor 
                                    {value:'{{ $landingPage[0]->disclaimerColor }}'}" value="jscolor {value:'{{ $landingPage[0]->disclaimerColor }}'}" style="width: 5em;">
                                        <input id="disclaimerColor" name="disclaimerColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="{{ $landingPage[0]->disclaimerColor }}" />
                                    @else
                                        <input id="disclaimerSelect" name="disclaimerSelect" class="jscolor 
                                    {required:false}" value="" style="width: 5em;">
                                        <input id="disclaimerColor" name="disclaimerColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="" />
                                    @endif
                                    
                                    
                                </label>
                            </div>
                        </div>
                    
                        <script src="{{asset('js/php-date-formatter.min.js')}}"></script>
                        <script src="{{asset('js/jquery.mousewheel.js')}}"></script>
                        <script src="{{asset('js/jquery.datetimepicker.full.js')}}"></script>

                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-12">
                                <label>Select a background color or upload a background img below.<br>
                                    @if($landingPage[0]->backgroundColor !== NULL  && strlen($landingPage[0]->backgroundColor) > 2)
                                        <input id="backgroundSelect"" class="jscolor 
                                    {value:'{{ $landingPage[0]->backgroundColor }}'}" value="jscolor {value:'{{ $landingPage[0]->backgroundColor }}'}" style="width: 5em;">
                                        <input id="backgroundColor" name="backgroundColor" class="backgroundColor selectedColor saveColorChange saveColorVal" type="hidden" value="{{$landingPage[0]->backgroundColor }}" />
                                    @else
                                        <input id="disclaimerSelect"  class="jscolor 
                                    {required:false}" value="" style="width: 5em;">
                                        <input id="backgroundColor" name="backgroundColor" class="backgroundColor selectedColor saveColorChange saveColorVal" type="hidden" value="" />
                                    @endif

                                    <button type="button" class="btn btn-danger" id="jscolorClear">Clear</button>
                                    
                                </label>
                            </div>
                        </div>

                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-12">
                                <label>Color of Submit Button<br>
                                    @if($landingPage[0]->buttonColor !== NULL && strlen($landingPage[0]->buttonColor) > 2 )
                                        <input id="buttonColorSelect" name="buttonSelect" class="jscolor 
                                    {value:'{{ $landingPage[0]->buttonColor }}'}" value="jscolor {value:'{{ $landingPage[0]->buttonColor }}'}" style="width: 5em;">
                                        <input id="buttonColor" name="buttonColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="{{ $landingPage[0]->buttonColor }}" />
                                    @else
                                        <input id="buttonColorSelect" name="buttonSelect" class="jscolor 
                                    {required:false}" value="" style="width: 5em;">
                                        <input id="buttonColor" name="buttonColor" class="selectedColor saveColorVal saveColorChange" type="hidden" value="" />
                                    @endif
                                    
                                </label>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                
                                $('body').on('change', '.jscolor', function() {
                                //$(".jscolor").change(function(){ 
                                    var changedColor = $(this).val();

                                    console.log(changedColor);
                                    $(this).parent('label').find('.selectedColor').val(changedColor);

                                });

                                $('#jscolorClear').click(function(){
                                    $(this).parent('label').find('.jscolor').val('');
                                    $(this).parent('label').find('.selectedColor').val('');
                                });
                            });
                        </script>

                        <div class="row vert-offset-bottom-1">
                            <div class="col-md-12">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                        </form>

                         <div class="row vert-offset-bottom-1">
                            <div class="col-md-12">
                                <label>Background Image:</label>
                            </div>

                            <style type="text/css">
                                .dz-preview.dz-image-preview {
                                    position: absolute !important;
                                    left: 38% !important;
                                    top: 10% !important;
                                }
                            </style>
                        
                            <div class="col-md-12">
                                <form action="/uploadBackground8" method="POST" class="dropzone needsclick dz-clickable" id="avatarDropzone">
                                    <input type="hidden" name="userID" value="{{ $user->id }}" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <?php 
                                                                $ch = curl_init('http://growyourleads.com/uploads/users/id/' .Auth::user()->id. '/backgroundLP'.$landingPageNumber.'.jpg');    

                                                                curl_setopt($ch, CURLOPT_NOBODY, true);
                                                                curl_exec($ch);
                                                                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                                                $backgroundExists = '';
                                                                if($code == 200){
                                                                   $backgroundExists = true;
                                                                   
                                                                }else{
                                                                  $backgroundExists = false;
                                                                }
                                                                ;
                                                                curl_close($ch);

                                                                ?>
                                                                
                                                                @if($backgroundExists == true)
                                                                    @if($landingPageNumber == 1)
                                                                    
                                                                        <img id="newBackground" class="user-avatar" style="border-radius: none;"  src="{{asset('uploads/users/id/' .Auth::user()->id. '/backgroundLP1.jpg')}}" />
                                                                    @elseif($landingPageNumber == 2)
                                                                    
                                                                        <img id="newBackground" class="user-avatar" style="border-radius: none;" src="{{asset('uploads/users/id/' .Auth::user()->id. '/backgroundLP2.jpg')}}" />

                                                                    @elseif($landingPageNumber == 4)
                                                                    
                                                                        <img id="newBackground" class="user-avatar" style="border-radius: none;"  src="{{asset('uploads/users/id/' .Auth::user()->id. '/backgroundLP4.jpg')}}" />

                                                                    @elseif($landingPageNumber == 5)
                                                                    
                                                                        <img id="newBackground" class="user-avatar" style="border-radius: none;" src="{{asset('uploads/users/id/' .Auth::user()->id. '/backgroundLP5.jpg')}}" />

                                                                    @endif
                                                                @elseif($landingPageNumber == 1)

                                                                    <img id="newBackground" class="user-avatar" style=" border-radius: none;" src="{{asset('uploads/placeholderBG.jpg')}}" />

                                                                @elseif($landingPageNumber == 2)

                                                                    <img id="newBackground" class="user-avatar" style=" border-radius: none;" src="{{asset('uploads/placeholderBG2.jpg')}}" />

                                                                @elseif($landingPageNumber == 4)
                                                                
                                                                    <img id="newBackground" class="user-avatar" style=" border-radius: none;" src="{{asset('uploads/placeholderBG4.jpg')}}" />
                                                                @elseif($landingPageNumber == 5)
                                                                
                                                                    <img id="newBackground" class="user-avatar" style=" border-radius: none;" src="{{asset('uploads/placeholderBG5.jpg')}}" />

                                                                @endif
                                  <div class="dz-message needsclick">
                                    Drop files here or click to upload.<br>
                                    
                                  </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            
        </div>


    </div>

    




@endsection

@section('footer_scripts')

    @include('scripts.updateBackgroundDZ')


@endsection
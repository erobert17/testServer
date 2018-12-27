

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    <?php echo Form::open(['route' => 'register', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ); ?>


                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                            <label for="first_name" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-6">
                                <?php echo Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'first_name']); ?>

                                <?php if($errors->has('first_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                            <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <?php echo Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'last_name']); ?>

                                <?php if($errors->has('last_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('company') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-sm-4 control-label">Company</label>
                            <div class="col-sm-6">
                                <?php echo Form::text('company', null, ['class' => 'form-control', 'id' => 'company', 'placeholder' => 'Company Name', 'required']); ?>

                                <?php if($errors->has('company')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('company')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-sm-4 control-label">Phone Number</label>
                            <div class="col-sm-6">
                                <?php echo Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '123-456-7899', 'required']); ?>

                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('industry') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-sm-4 control-label">Your Industry</label>
                            <div class="col-sm-6">
                                <div class="row radioSpacing">
                                    <div class="col-sm-5">
                                        <input name="industry_1" type="checkbox" value="1" checked style="width: 18px; height: 18px; top: 4px;"><strong>Realestate</strong>        
                                    </div>
                                    <div class="col-sm-5">
                                        <input name="industry_2" type="checkbox" value="2" style="width: 18px; height: 18px; top: 4px;"><strong>Ecommerce</strong>        
                                    </div>
                                
                                
                                </div>
                                <?php if($errors->has('industry')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('industry')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                            <div class="col-sm-6">
                                <?php echo Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail Address', 'required']); ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-6">
                                <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required']); ?>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-6">
                                <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => 'Confirm Password', 'required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="captchaQuestion" class="col-sm-4 control-label">Robot check</label>
                            <div class="col-sm-6">
                                <?php 
                                $toRan = count($captchaQuestions) - 1;
                                $ranNum = rand(0,$toRan);
                                $question = $captchaQuestions[$ranNum]->question;
                                $answer1 = $captchaQuestions[$ranNum]->answer1;
                                $answer2 = $captchaQuestions[$ranNum]->answer2;
                                echo $question;
                                ?>
                                <input class="form-control" name="captchaQuestion" placeholder="E = MC^2" required="" type="text">
                                
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        var answer1 = <?php echo "'".$answer1."'"; ?>;
                                        answer1 = answer1.toLowerCase();
                                        var answer2 = <?php echo "'".$answer1."'"; ?>;
                                        answer2 = answer2.toLowerCase();
                                        $('input[name=captchaQuestion]').change(function() { 
                                            var str = $(this).val();
                                            str = str.toLowerCase();
                                            
                                            if(answer1.indexOf(str) != -1){
                                                $('#registerButton').prop("disabled", false); 
                                            }else if(answer2.indexOf(str) != -1){
                                                $('#registerButton').prop("disabled", false);
                                            }

                                        });

                                    });
                                    
                                </script>
                            
                            </div>
                        </div>

                        <!--
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <div class="g-recaptcha" data-sitekey="<?php echo e(env('RE_CAP_SITE')); ?>"></div>
                            </div>
                        </div>-->

                        <div class="form-group margin-bottom-2">
                            <div class="col-sm-6 col-sm-offset-4">
                                <button type="submit" id="registerButton" class="btn btn-primary" disabled>
                                    Register
                                </button>
                            </div>
                        </div>
                        <!--
                        <p class="text-center margin-bottom-2">
                            Or Use Facebook To Register
                        </p>-->

                        <?php echo $__env->make('partials.socials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->startSection('template_title'); ?>
  Showing Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>"/>
    
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- end of global styles-->
        <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/c3/css/c3.min.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastr/css/toastr.min.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/switchery/css/switchery.min.css')); ?>" />
    <!--page level styles-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/new_dashboard.css')); ?>"/>
    
    <div class="container">
        <style type="text/css">
        .top_cards .fa-stack {
            font-size: 30px;
            padding: 17px 60px;
        }
        .fa-stack {
            position: relative;
            display: inline-block;
            width: 2em;
            height: 2em;
            line-height: 2em;
            vertical-align: middle;
        }
        </style>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="bg-success top_cards">
                    <div class="row icon_margin_left">
                        <div class="col-lg-5  col-5 icon_padd_left">
                            <div class="float-left">
                                <span class="fa-stack fa-sm">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-eye fa-stack-1x fa-inverse text-success visit_icon"></i>
                                </span>
                            </div>
                        </div>
                    <div class="col-lg-7 col-7 icon_padd_right">
                        <div class="float-right cards_content">
                            <span class="number_val" id="visitors_count"><?php echo e($views); ?></span><i class="fa fa-long-arrow-up fa-2x"></i>
                            <br>
                            <span class="card_description">Page Views</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-mint top_cards">
                    <div class="row icon_margin_left">
                        <div class="col-lg-5  col-5 icon_padd_left">
                            <div class="float-left">
                                <span class="fa-stack fa-sm">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse text-mint visit_icon"></i>
                                </span>
                            </div>
                        </div>
                    <div class="col-lg-7 col-7 icon_padd_right">
                        <div class="float-right cards_content">
                            <span class="number_val" id="visitors_count"><?php echo e(count($leads)); ?></span><i class="fa fa-long-arrow-up fa-2x"></i>
                            <br>
                            <span class="card_description">Leads</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Landing Page Leads (People who have entered their info)                          
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                    <tr>
                                        
                                        <th class="">Email</th>
                                        
                                        
                                        
                                        <th class="">Created</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td class=""><a href="mailto:<?php echo e($user->email); ?>" title="email <?php echo e($user->email); ?>"><?php echo e($lead->email); ?></a></td>
                                          
                                            
                                            
                                            <td class="hidden-xs hidden-md"><?php echo e($lead->date); ?></td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <a href="/lp4Output">
                                <button class="btn btn-primary">Download Spreadsheet</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  
    <?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
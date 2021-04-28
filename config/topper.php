<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0 text-dark"><?php echo $page_title; ?></h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <!--<button class="btn pust_notify btn-info text-white" style="" uid="<?php echo $uid; ?>" acct="Student"><i data-feather="bell"></i> Activate Notification</button>-->
            <?php 
            if(isset($count_str)){
            if($count_str > 0){ ?>
            <button data-toggle="modal" data-target="#make-comment" class="btn ml-3 btn-info text-white" style=""><i data-feather="message-circle"></i> Comments</button>
        	<?php }} ?>
        </div>
    </div>
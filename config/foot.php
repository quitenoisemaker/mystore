<!-- Modal -->
<div class="modal fade" id="make-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ask Questions !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body comment-text" style="height: 300px; overflow: auto;">
                	<?php
                	if(isset($count_str)){
                	if($count_str > 0){
                	$txts=mysqli_query($tutor, "SELECT * FROM `comments` WHERE stream_id='$row_str[stream_id]' ");
                	while($row_txt=mysqli_fetch_array($txts)){ ?>
                    <div class="badge-danger text-wrap btn-sm btn form-group">
                        <?php echo $row_txt['txt']; ?> - <small class="text-light"><?php echo timeago($row_txt['com_date']); ?></small>
                    </div><br>
                	<?php } }} ?>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <form method="POST" id="comms" class="w-100">
                        <div class="input-group">
                            <input type="text" name="txt" class="form-control form-control-lg write-txt" placeholder="Write your questions here .." required>
                            <input type="hidden" name="stream" value="<?php echo $row_str['stream_id']; ?>">
                            <input type="hidden" name="user" value="<?php echo $uid; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-load" type="submit">
                                    <span class="default-load"><i data-feather="send"></i> Send</span>
                                    <span hidden class="load-more spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">Loading...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
    <p class="text-muted text-center text-md-left">Copyright ©
        <?php echo date("Y"); ?> <a href="https://eoc.mentapps.com/online/" target="_blank"><?php echo $setup['sitename']; ?></a>. All rights reserved | Powered By <a target="_blank" href="https://mentapps.com">Mentapps</a></p>
    <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
</footer>
<!-- partial -->
</div>
</div>
<!-- core:js -->


<?php if(!isset($_GET['courses'])) { ?>
<script src="assets\vendors\core\core.js"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script src="assets\vendors\feather-icons\feather.min.js"></script>
<script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<script src="assets\js\template.js"></script>
<script src="assets\js\dashboard.js"></script>
<script src="assets\vendors\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>
<script src="assets\js\datepicker.js"></script>
<?php echo $script_attached;  ?>
<script src="assets\js\custom.js"></script>
<?php }else{ ?>
<script src="../assets\vendors\core\core.js"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script src="../assets\vendors\feather-icons\feather.min.js"></script>
<script src="../assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets\js\template.js"></script>
<script src="../assets\js\dashboard.js"></script>
<script src="../assets\vendors\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>
<script src="../assets\js\datepicker.js"></script>
<?php echo $script_attached;  ?>
<script src="../assets\js\custom.js"></script>
<?php } ?>
<script>
var OneSignal = window.OneSignal || [];
OneSignal.push(function() {
    OneSignal.init({
        appId: "<?php echo $setup['signal_key']; ?>",
        autoResubscribe: true,
        notifyButton: {
            enable: false,
        },
        allowLocalhostAsSecureOrigin: true,
    });
});
</script>
</body>

</html>
<?php
if ($msg = $this->session->flashdata('msg')) {
    $msg_class = $this->session->flashdata('msg_class');
?>
    <div class="card-block col-sm-12">
        <div class="alert <?php echo $msg_class; ?>" id="msg" data-from="top" data-align="text-center">
            <a href="#" class="closebtn" aria-label="Close" onclick="this.parentElement.style.display='none';" data-dismiss="alert">&times;</a>
            <strong><?php echo $msg; ?></strong>
        </div>
    </div>
<?php } ?>

<style>
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
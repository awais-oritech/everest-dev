<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php  echo ucfirst($Data->companyname) ;?></h4>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form class="form" method="POST" enctype='multipart/form-data'
                            action="<?php echo Request::$BASE_PATH.$md['con'].'/action/'.$Data->id?>">
                            <div class="form-group mt-5 row">
                            <input class="" type="hidden" value="<?php echo $Data->id?>" name="id" required>   
                            <label for="example-text-input" class="col-2 col-form-label">Status</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" required name="status">
                                       
                                        <option value="1" <?php echo $Data->status==1?'selected':''?>>Submited Profile</option>
                                        <option value="2" <?php echo $Data->status==2?'selected':''?>>Waiting For Payment</option>
                                        <option value="3" <?php echo $Data->status==3?'selected':''?>>Approved</option>
                                        
                                    </select>
                                </div>
                            </div>
                            

                           
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label"></label>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <a href="<?php echo Request::$BASE_PATH.$md['con']?>"
                                        class="btn btn-dark">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form class="form" method="POST" enctype='multipart/form-data'
                            action="<?php echo Request::$BASE_PATH.$md['con'].'/action/'.$Data->id?>">
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Comment</label>
                                <div class="col-10">
                               
                                    <input class="form-control" type="text" name="comment" required
                                        id="example-text-input">
                                </div>
                            </div>
                            
                           
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label"></label>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <a href="<?php echo Request::$BASE_PATH.$md['con']?>"
                                        class="btn btn-dark">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
       <?php  if(count($comments)>0){ 
        ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="">
                    <div class="">
                    <div id="comments">
                    <h2 class="text-themecolor">Comments</h2>
                    <ul>
                       <?php foreach($comments as $comment){ ?>
                        <li>
                            
                            <div class="comment_right clearfix">
                            <div class="comment_info">
                            <?php echo $comment->user_type ?>
                                </div>
                                <h4 class="text-themecolor"> <?php echo $comment->comment ?></h4>
                            </div>
                            
                        </li>
                    <?php } ?>    
                    </ul>
                </div>
                    </div>
                </div>
            </div>
        </div>     
        <?php } ?>       
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
    </div>


</div>
<style>

#comments {
    padding: 10px 0 0px 0;
    margin-bottom: 30px
    font-s
}

#comments ul {
    padding: 0;
    margin: 0;
    list-style: none
}

#comments ul li {
    padding: 25px 0 0 0;
    list-style: none
}

#comments .replied-to {
    margin-left: 35px
}

@media (max-width: 767px) {
    #comments .replied-to {
        margin-left: 20px
    }
}

.avatar {
    float: left;
    margin-right: 25px;
    width: 68px;
    height: 68px;
    overflow: hidden;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    position: relative
}

@media (max-width: 767px) {
    .avatar {
        float: none;
        margin: 0 0 5px 0
    }
}

.avatar img {
    width: 68px;
    height: auto;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.comment_right {
    /* display: table; */
    background-color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    padding: 20px 20px 0 20px;
    position: relative;
    border: 1px solid #ededed
}

.comment_right:after,
.comment_right:before {
    right: 100%;
    top: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px
}

.comment_right:after {
    
    border-color: rgba(255, 255, 255, 0);
    border-right-color: #fff;
    border-width: 15px;
    margin-top: -15px
}

.comment_right:before {
    border-color: transparent;
    border-width: 16px;
    margin-top: -16px;
    border-right-color: #ededed
}

.comment_info {
    padding-bottom: 7px
}

.comment_info span {
    padding: 0 10px
}


.comment_left {
    float: left;
    display: table;
    background-color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    padding: 20px 20px 0 20px;
    position: relative;
    border: 1px solid #ededed
}

.comment_left:after,
.comment_left:before {
    left: 100%;
    top: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px
}

.comment_left:after {
    border-color: rgba(255, 255, 255, 0);
    border-right-color: #fff;
    border-width: -15px;
    margin-top: 15px
}

.comment_left:before {
    border-color: transparent;
    border-width: -16px;
    margin-top: 16px;
    border-right-color: #ededed
}
    
</style>

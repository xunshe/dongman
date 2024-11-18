<?php
    // +----------------------------------------------------------------------
    // | 后台评论管理页面
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
 

  <div class="content-wrapper">

    <!--内容-->
        <section class="content-header">
            <h1>小白电影管理系统</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 评论管理</a></li>
                <li class="active">评论列表</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">评论列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="请输入关键字...">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body box-comments">
                            
                            <?php
                             //开始写获取所有的评论
                             
                           //写sql语句
                            $sql = "SELECT commits.id,commits.content,commits.addtime,users.avatar,users.name,movies.moviename FROM commits INNER JOIN users ON commits.user_id = users.id INNER JOIN movies ON commits.movie_id = movies.id";

                            //获取留言数据
                            $commits = fetchAll($link,$sql);

                            if(is_array($commits)) {
                                foreach ($commits as $commit) { 

                            ?>

                            <div class="box-comment">
                                <img class="img-circle img-sm"
                                     src="/dongmanguanli/<?php echo $commit['avatar']; ?>" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">
                                        <?php echo $commit['name']; ?>
                                        <span class="text-muted pull-right">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            &nbsp;
                                            <?php echo $commit['addtime']; ?>
                                        </span>
                                    </span>
                                    关于电影<a> <?php echo $commit['moviename']; ?></a>的评论：<?php echo $commit['content']; ?>
                                    <br><a class="label label-danger pull-right" onclick="del(<?php echo $commit['id'] ?>,'commits')">删除</a>
                                </div>
                            </div>

                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->

</div>


<?php include('footer-layout.php'); ?>
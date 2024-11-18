    <div class="col-md-3">
    <nav class="menu" data-ride="menu" style="width: 200px">
          <ul id="treeMenu" class="tree tree-menu" data-ride="tree">
            <li style="background-color: #f39c12">
                
                <img src="/dongmanguanli/<?php echo $_SESSION['user']['avatar'] ?>" width="50px" height="50px" class="img-circle center-block">
                <p class="text-center" style="font-size: 20px"><?php echo $_SESSION['user']['name'] ?></p>
            </li>
            <li><a href="/dongmanguanli/app/home/profile.php"><i class="fa fa-user"></i>个人资料</a></li>
            <li>
              <a href="/dongmanguanli/app/home/comments.php"><i class="fa fa-commenting-o"></i>我的留言</a>
            </li>
            <li>
              <a href="/dongmanguanli/app/home/collects.php"><i class="fa fa-star"></i>我的收藏</a>
            </li>
            <li><a href="/dongmanguanli/app/home/password.php"><i class="fa fa-unlock-alt"></i>修改密码</a></li>
          </ul>
        </nav>
    </div>
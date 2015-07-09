<?php
session_start();
session_destroy();
?>
<!-- 引入css和js-->
<?php include 'head.php'; ?>
<!-- 顶部导航栏-->
<?php include 'topbar.php';?>
<div class="container" style="min-height:600px;">
<!-- Tabs-->
  <ul id="navtab" class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#student"> 学生登录</a></li>
    <li><a data-toggle="tab" href="#teacher">教师登录</a></li>
    <li><a data-toggle="tab" href="#admin">管理员登录</a></li>
  </ul>
  <div class="tab-content" style="margin-top:40px">
    <div class="tab-pane active" id="student">
      <div class="col-md-4">
        <form method="post" action="student/slogin.php">
          <div class="form-group">
            <label for="sno">学号</label>
            <input type="text" name="sno" class="form-control" id="sno" placeholder="请输入学号">
          </div>
          <div class="form-group">
            <label for="spasswd">密码</label>
            <input type="password" name="spasswd" class="form-control" id="spasswd" placeholder="密码">
          </div>
          <div class="form-group"> <a href="#">忘记密码？</a> </div>
          <input type="submit" name="submit" value="登录" class="btn btn-default"></input>
        </form>
      </div>
    </div>
    <div class="tab-pane" id="teacher">
      <div class="col-md-4">
        <form method="post" action="teacher/tlogin.php">
          <div class="form-group">
            <label for="tno">教师工号</label>
            <input type="text" class="form-control" name="tno" id="tno" placeholder="请输工号">
          </div>
          <div class="form-group">
            <label for="tpasswd">密码</label>
            <input type="password" class="form-control" name="tpasswd" id="tpasswd" placeholder="密码">
          </div>
          <div class="form-group"> <a href="#">忘记密码？</a> </div>
          <button type="submit" name="submit" class="btn btn-default">登录</button>
        </form>
      </div>
    </div>
    <div class="tab-pane" id="admin">
      <div class="col-md-4">
        <form method="post" action="admin/alogin.php">
          <div class="form-group">
            <label for="ano">管理员</label>
            <input type="text" class="form-control" name="admin" id="ano" placeholder="请输入用户名">
          </div>
          <div class="form-group">
            <label for="apasswd">密码</label>
            <input type="password" class="form-control" name="password" id="apasswd" placeholder="密码">
          </div>
          <button type="submit" name="submit" class="btn btn-default">登录</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- 页尾信息-->
<?php include 'end.php'?>

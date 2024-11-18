 <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>版本</b> 1.0
        </div>
        <strong>漫画管理后台
    </footer>
    <div class="control-sidebar-bg"></div>
</div>

<script src="/dongmanguanli/public/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/dongmanguanli/public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/dongmanguanli/public/admin/plugins/fastclick/fastclick.js"></script>
<script src="/dongmanguanli/public/admin/dist/js/app.min.js"></script>
<script src="/dongmanguanli/public/admin/dist/js/demo.js"></script>
<script src="//cdn.bootcss.com/holder/2.9.4/holder.min.js"></script>
<script src="/dongmanguanli/public/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/dongmanguanli/public/admin/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script src="/dongmanguanli/public/js/echarts.min.js"></script>
<script>

  //删除操作的方法
  function del(id,table) {
  	if(confirm('确定删除此数据吗？')){
  		$.post('/dongmanguanli/app/admin/handler/del.handler.php',{id:id,table:table},function(data){
  				if(data.result == 1) {
  					alert(data.message);
  					window.location.reload();
  				}
  				if(data.result == 0){
  					alert(data.message);
  				}
  		},'json');
  	}else{
  		return false;
  	}
  }
</script>

</body>
</html>
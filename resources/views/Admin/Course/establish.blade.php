<form action="" onsubmit="return false;" id="formCreate">
	<div class="form-group">
		<label for="">班级名称</label>
		<input type="text" name="name" class="form-control" placeholder="请输入班级名称" id="">
		<input type="hidden" name="pid" value="">
		<input type="hidden" name="path" value="">
	</div>
	<div id="userInfo"></div>

	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="create()" class="btn btn-success">
		<input type="reset" id="reset" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>
		<button class="btn-u btn-u-small" onclick="reloadWindow();"><i class="icon-long-arrow-left"></i>&nbsp;Back</button>
		<div class="form-group">
			<label for="for select category" class="col-lg-2 control-label">Category<span class="color-red">*</span></label>
			 <div class="col-lg-8">
				<button class="btn btn-mini" id="videoCategory"></button>
			</div>
		</div>
		<div class="form-group">
			<label for="inputDescription" class="col-lg-2 control-label">Select City<span class="color-red">*</span></label>
			<div class="col-lg-8">
				<select class="form-control" id="videoCity">
	            	<option value="0">Please select category</option>
	            </select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputDescription" class="col-lg-2 control-label">Description<span class="color-red">*</span></label>
			<div class="col-lg-8">
				<input type="text" class="form-control" id="description" placeholder="Description" value="<?php echo $videoUploadData['ep_description']?>">
			</div>
		</div>
		<div class="form-group" >
			<label class="col-lg-2 control-label" for="inputVideo" style="position: relative;">Upload Video<span class="color-red">*</span>
				<div class="hide" id="videoLoadingBar" style="right: 0px;top: 50%;"></div>        
			</label>   
			<form  class="col-lg-6" action="/async-uploadFile.php" method="post" enctype="multipart/form-data">
				<input type="file" class="form-control"  name="fileUpload" id="fileUpload" style="height: auto;">
				<span>(Please Upload Mp4 Format Less than 10M)</span>
			</form>
		</div>
		<div class="form-group">
			<label for="forThumbnail" class="col-lg-2 control-label" style="position: relative;">Thumbnail<span class="color-red">*</span>
				<div class="hide" id="thumbLoadingBar" style="right: 0px;top: 50%;"></div>        
			</label>
			<div class="col-lg-6">
				<form id="imageForm" method="post" enctype="multipart/form-data" action='/async-uploadImage.php' >
					<input type="file" class="form-control"  name="imageUpload" id="imageUpload" style="height: auto;"/>
					<span>(Please Upload  jpg or png Format)</span>						
					<input type="hidden" name="uploadType" value="thumbnail">
					<input type="hidden" id="imagePrevDiv" value="videoThumbnail">
					<div id="videoThumbnail" class="previewImage">
						<img  class="col-lg-2" src="" style="display: none;"/>
					</div>
				</form>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button  class="btn-u btn-u-green" onclick="onVideoUpload();">Submit</button>
			</div>
		</div>
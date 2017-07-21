<div class="form-wrap">
<h3>Image Uploader Detail Product</h3>
    <form action="process.php" method="post" enctype="multipart/form-data" id="upload_form">
        <input name="__files[]" type="file" multiple />
        <input name="__submit__" type="submit" value="Upload"/>
    </form>
    <div id="output"><!-- error or success results --></div>
</div>

<script type="text/javascript">    
 
var max_file_size 		= 2048576;  
var allowed_file_types 	= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; 
var result_output 		= '#output'; 
var my_form_id 			= '#upload_form';  
var total_files_allowed 	= 3;  
 
$(my_form_id).on( "submit", function(event) { 
	event.preventDefault();
	var proceed = true;  
	var error = [];	 
	var total_files_size = 0;
	
	if(!window.File && window.FileReader && window.FileList && window.Blob){  
		error.push("Your browser does not support new File API! Please upgrade.");  
	}else{
		var total_selected_files = this.elements['__files[]'].files.length; 
		
	 
		if(total_selected_files > total_files_allowed){
			error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!");  
			proceed = false;  
		}

		$(this.elements['__files[]'].files).each(function(i, ifile){
			if(ifile.value !== ""){  
				if(allowed_file_types.indexOf(ifile.type) === -1){  
					error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); 
					proceed = false;  
				}

				total_files_size = total_files_size + ifile.size;  
			}
		});
		

		if(total_files_size > max_file_size){ 
			error.push( "You have "+total_selected_files+" file(s) with total size "+total_files_size+", Allowed size is " + max_file_size +", Try smaller file!");  
			proceed = false;  
		}		
		var submit_btn  = $(this).find("input[type=submit]");  
		

		if(proceed){
			submit_btn.val("Please Wait...").prop( "disabled", true);  
			var form_data = new FormData(this);  
			var post_url = $(this).attr("action");  
			var myfile="DocImage/";
			var myfiledisplay="DocImage/";
      		var NmFileSave="";
      		var ImageCatute="#ImageCatute"+<?php echo $_POST["brs"]; ?>;
			$.ajax({
				url : post_url,
				type: "POST",
				data : form_data,
				contentType: false,
				cache: false,
				processData:false,
        success: function(result){                
        $(result_output).html(result); 
        console.log(myfiledisplay+result);
        NmFileSave=myfile+result;
        if (NmFileSave!="No file was uploaded")
        {
          if (result=!"")
          {
            SaveVale(NmFileSave);
          }
        }
				submit_btn.val("Upload").prop( "disabled", false);  
      }
			});
		}
	}
	
	$(result_output).html("");  
	$(error).each(function(i){  
		$(result_output).append('<div class="error">'+error[i]+"</div>");
	});
});

function SaveVale(NmFileSave)
{
  var dataString="NmFileSave="+NmFileSave+"&vId="+<?php echo $_POST["id"]; ?>;  
  var postUrl="productPictureSave.php"; 
  var ImageCatute="";
  var idbrs; 
  var brs=<?php echo $_POST["brs"]; ?>;  
      	$.ajax({
          type: "POST",
          url: postUrl,
          data: dataString,
          cache: false,
          dataType: 'json', 
          success: function(result){         
            idbrs="#idbrs"+brs;
            ImageCatute="#ImageCatute"+brs;
            $("#lookmodal").modal('hide');
            $(ImageCatute).html('<div class="meta meta--preview"><img style="width:50px;height:50px;" class="meta__avatar" src="'+result+'" alt="" /></div>');
            $(ImageCatute).show();
            $("#lookmodal").modal('hide');
          }
    });
}
</script>

$( document ).ready(function(){

		var $uploadCrop;

		function readFile(input) {
 			if (input){
	            var reader = new FileReader();

	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	}).then(function(){
	            		console.log('jQuery bind complete');
	            	});

	            }

	            reader.readAsDataURL(input);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-into').croppie({
			viewport: {
				width: 200,
				height: 200,
				type: 'circle'
			},
            boundary: {
                width: 300,
                height: 300
            },
			enableExif: true
		});

		$('#uploading').on('change', function () { readFile(this.files[0]); });
		$('.upload-result').on('click', function (ev) {
			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'original'
			}).then(function (resp) {
                $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

				$.ajax(
                    {
                    url: 'steps-register/pic',
    		        type: 'POST',
    		        data: {'image':resp},
                    dataType:'json',
    			    success: function (data) {
    				html = '<li>'+data.message+'</li>';
    				$(".alert-danger").html(html).show();
                    }
                });
			});

			//function that changes the tab to the next
		});


});

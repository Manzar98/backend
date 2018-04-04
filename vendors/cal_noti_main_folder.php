<?php 

	session_start();
?>
		<script type="text/javascript">
		
$( document ).ready(function(){

 	var isLoadNotify = true;
    function generateNotifications(){

    		var requestAjax = $.ajax({

			type:'GET',
			url:'../methods/get-notification.php?gen_for=vendor&id=<?php echo $_SESSION['user_id']; ?>',
            success:function (res) {
            	 console.log(res);
               if (res) {
                    // debugger;
            	  var data= JSON.parse(res);

            	  console.log(data);
            	  $('ul.notify_wrap').html('');
            	  $.each(data,function(k,val){
                       console.log(val);
                          // debugger;
                      isLoadNotify = true;
			        var li_Wraps= $(`<li class="li-wrap"><i class="fa fa-times noti_x_icon"  aria-hidden="true"></i>
									  <a href="#" data-href="`+val.url+`" class="x_icon"> <img src="`+val.photo+`" alt="">
										   <h5 alt="`+val.title+`" title="`+val.title+`">`+val.title+`</h5>
										   <p alt="`+val.desc+`" title="`+val.desc+`">`+val.desc+`</p> <span>`+val.time+`</span>
									  </a><input type="hidden" id="noti_id" value="`+val.notify_id+`"/>
								   </li>`);


			        $('ul.notify_wrap').append(li_Wraps);
			        attachNotiyFunction();
			        redirectNotiyFunction();
            	  })
            	 
            }else{
                 

              isLoadNotify=true;
            }

}

		});
    }
    // if(!)
    function callNotifyFunction(){
    	if(isLoadNotify){
    			isLoadNotify=false;
    			generateNotifications()
    			callNotifyFunction();
    		}else{
    			setTimeout(function(){	
    				callNotifyFunction();
    			},5000);
    		}
    		// else{
    		// 	generateNotifications();
    		// }
    }
    callNotifyFunction()


    	function attachNotiyFunction(){
    			$('.noti_x_icon').click(function(){

              var li= $(event.currentTarget).parent('.li-wrap'); 
              var noti_id=li.find('#noti_id').val();
              
 			$.ajax({

               type:"POST",
               url: '../methods/update-notification.php',
               data :{"id":noti_id},
               success:function(data){

               	if (data=="success") {

               			li.hide();
               			// debugger;
               	}else{

               			li.show();
               	}

               
               }
			})
            
            
		      



				});
    	}

 		

 function redirectNotiyFunction(){
    			$('.x_icon').click(function(){

    				var loc =$(this).attr('data-href');
             
              var li= $(event.currentTarget).parent('.li-wrap'); 
              var noti_id=li.find('#noti_id').val();

 			$.ajax({

               type:"POST",
               url: '../methods/update-notification.php',
               data :{"id":noti_id},
               success:function(data){

               	if (data=="success") {

               			li.hide();
               			 window.location= loc;
               			 // debugger;
               	}else{

               			li.show();
               	}

               
               }
			})
            
            
		      



				});
    	 }

 })
		

	</script>
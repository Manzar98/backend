<?php
/*
$alert_array = array();
$alert_array[] = array('alert' => 'alert', 'email' => 'Test');
$alert_array[] = array('name' => 'manzar' , 'email' => 'tariq' );
print_r($alert_array);*/

function gen_page($asso_array){
  $input='';
  foreach ($asso_array as $key => $value) {
      
    if(isset($value[0]) && is_array($value[0])){

    	 $input.='<div class="row common-top">';
    	 foreach ($value as $key => $val){

          if ($val['tag']=="textarea") { 

            $input.='<div class="'.$val['2col'].'">
            <label>'.$val['label'].'</label>
            <textarea id="'.$val['id'].'" name="'.$val['name'].'" class="materialize-textarea is_validate">'.$val['value'].'</textarea>
            </div> ';
    
           }elseif ($val['tag']=="input") {
            
             $input.='<div class="'.$val['2col'].'">
            <label>'.$val['label'].'</label>
            <input id="'.$val['id'].'" name="'.$val['name'].'" class="input-field validate is_validate" value="'.$val['value'].'"/>
            </div> ';
           }    
    	 	 
    	 }
    	  $input.="</div>";
    }   
    elseif ($value["tag"]=="input") {
      $input.='<div>

              <label class="col s4">'.$value['label'].'</label>
              <div class="'.$value['classDiv'].'">
               <input type="'.$value['type'].'"  id="'.$value['id'].'" name="'.$value['name'].'" value="'.$value['value'].'" class="input-field validate"/>
                
              </div>
            </div>';
    }elseif ($value["tag"]=="textarea") {
      $input.='<div class="common-top">
						<label>'.$value['label'].'</label>
						<textarea id="'.$value['id'].'" name="'.$value['name'].'" class="materialize-textarea is_validate">'.$value['value'].'</textarea>
					</div>';
    }
  }
  return $input;
}
?>



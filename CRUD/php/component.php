<?php
	
	function inputElement($icon,$placeholder,$name,$value)
	{
		$ele = " <div class=\"input-group\">
				        <div class=\"input-group-prepend\">
				          <div class=\"input-group-text bg-dark\" style=\"color:#F9BE37;\">$icon</div>
				        </div>
				        <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" class=\"form-control\" id=\"inlineFormInputGroupUsername\" placeholder='$placeholder'>
      				</div>";

      	echo $ele;
	}

	function buttonElement($btnid,$styleclass,$text,$name,$attr)
	{
		$btn = " 
			<button name='$name''$attr' class='$styleclass' id='$btnid'>$text</button>
		 ";

		 echo $btn;
	}
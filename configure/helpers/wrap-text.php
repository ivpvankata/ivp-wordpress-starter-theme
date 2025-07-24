<?php 
	function ivp_wrap_text( $content ) {
		$content = preg_replace( '~\*(.*?)\*~s', '<span>$1</span>' , $content );
		return $content;
	}	
?>
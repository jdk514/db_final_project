<?php
/**
 * For when things go horribly, horribly wrong.
 */
if( !class_exists('TP_Error')) {
class TP_Error {

	var $type = "";
	var $message = "";
	
	function TP_Error( $type, $message ) {
		$this->construct_error( $type, $message );
	}
	
	function construct_error( $type, $message  ) {
		switch( $type ) {
			case 'db_error':
				$this->type = 'Database Error';
				$this->message = $message;
			break;
		}
	}
	
	function display( $echo = true ) {
		$output = 'You recieved the following type of error: ' . $this->type . '<br />';
		$output .= 'Error message : ' . $this->message;

		if( $echo )
			echo $output;
		else
			return $output;
	}
}
}
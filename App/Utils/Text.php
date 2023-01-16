<?php

class Text
{
	public function setString(string $text)
	{
		//*	Remplazar caracteres
		$search = array('á','é','í','ó','ú'
			,'<','>','|','"',"'",'#','$','%','&','/'
			,'(',')','=','´','*','+','¨','~','-','_'
			,':',';');
		$replace = array('a','e','i','o','u'
			,'','','','','','','','','',''
			,'','','','','','','','','',''
			,'','');
		$text = str_replace($search, $replace, $text);
		//*	Quitar espacio al inicio t al final
		$text = ltrim($text);
		$text = rtrim($text);
		//*	Escape de caracteres
		return addslashes($text);
	}
}
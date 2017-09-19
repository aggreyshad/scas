<?php @"SourceGuardian"; //v10.1.6
if(!function_exists('sg_load')){
	$__v=phpversion();
	$__x=explode('.',$__v);
	$__v2=$__x[0].'.'.(int)$__x[1];
	echo $__v2;
	$__u=strtolower(substr(php_uname(),0,3));
	echo $__u;
	$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');
	echo $__ts;
	$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;
	$__ed=@ini_get('extension_dir');
	echo $__ed;
	$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');
	echo $__e;
	
	
	if($__dl && $__e && version_compare($__v,'5.2.5','>') && function_exists('getcwd') && function_exists('dirname')){
	
	echo "I got here";
	$__d=$__d0=getcwd();
	
	if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));
	$__e=str_replace('\\','/',substr($__e,2));}
	
	$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));
	$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;
	
	echo $__f;
	
	while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}

	if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); 
	else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}
	if(!function_exists('sg_load') && $__dl && $__e0){
	if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); 
	else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}
	if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m')); 
	
	
	echo $__ixedurl; }}

?>
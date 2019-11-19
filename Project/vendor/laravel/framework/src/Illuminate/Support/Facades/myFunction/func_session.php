<?php

public function checkSession(){
    if(Session::has('role')) return true;
    else return false;
}

public function getSesstion(){
	if(Session::gat('role')=="student") return "student";
	else if(Session::get('role')=="Admin") return "Admin";
	else return "Staff";
}

?>
<?php
/*
* To implement in admingroups permissions
* to remove CRUD from Validation remove route name
* CRUD Role permission (create,read,update,delete)
* [it v 1.6.32]
*/
return [
	"advertisement"=>["create","read","update","delete"],
	"shipping"=>["create","read","update","delete"],
	"transaction"=>["create","read","update","delete"],
	""=>["create","read","update","delete"],
	"marketer"=>["create","read","update","delete"],
	"cleint"=>["create","read","update","delete"],
	"guest"=>["create","read","update","delete"],
	"admins"=>["create","read","update","delete"],
	"admingroups"=>["create","read","update","delete"],
];
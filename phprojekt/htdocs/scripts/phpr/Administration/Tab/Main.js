dojo.provide("phpr.Administration.Tab.Main");

dojo.require("phpr.Administration.Default.Main");
dojo.require("phpr.Administration.Tab.Grid");
dojo.require("phpr.Administration.Tab.Form");

dojo.declare("phpr.Administration.Tab.Main", phpr.Administration.Default.Main, {
	 constructor: function(){
	 	this.module = "Tab";
	 	this.loadFunctions(this.module);

		this.gridWidget = phpr.Administration.Tab.Grid;
		this.formWidget = phpr.Administration.Tab.Form;
	 }
});
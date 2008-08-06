dojo.provide("phpr.Default.field");
dojo.require("phpr.Component");
dojo.require("dijit.form.Textarea");
dojo.require("dijit.form.MultiSelect");
dojo.declare("phpr.Default.field", phpr.Component, {
    // summary:
    //    class for rendering form fields
    // description:
    //    this class renders the different form types which are available in a PHProjekt Detail View
	formdata: '',
	checkRender: function(itemlabel, itemid,itemvalue){
		var itemchecked = null;
		if(itemvalue == "on")itemchecked ="checked";
		return this.render(["phpr.Default.template", "formcheck.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							checked:itemchecked
				});
	},
	textFieldRender: function(itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		return this.render(["phpr.Default.template", "formtext.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							value: itemvalue,
							required: itemrequired,
							disabled: itemdisabled
				});
	},
	textAreaRender: function(itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		return this.render(["phpr.Default.template", "formtextarea.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							value: itemvalue,
							required: itemrequired,
							disabled: itemdisabled
				});
	},
	dateRender: function(itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		return this.render(["phpr.Default.template", "formdate.html"], null, {
						 	label: itemlabel,
							labelfor: itemid,
							id: itemid,
							value: itemvalue,
							required: itemrequired,
							disabled: itemdisabled
				});
	},
	timeRender: function(itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		return this.render(["phpr.Default.template", "formtime.html"], null, {
						 	label: itemlabel,
							labelfor: itemid,
							id: itemid,
							value: itemvalue,
							required: itemrequired,
							disabled: itemdisabled
				});
	},
	selectRender: function(range, itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		var options=new Array();
		var j=0;
		for (j in range){
			options.push(range[j]);
			j++;
		}
		return this.render(["phpr.Default.template", "formfilterselect.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							value: itemvalue,
							required: itemrequired,
							disabled: itemdisabled,
							values: options
				});
	},

	multipleSelectBoxRender: function(range, itemlabel, itemid,itemvalue,itemrequired,itemdisabled, itemsize, itemmultiple){
		var options=new Array();
		var j=0;
		for (j in range){
		    if (itemvalue.indexOf("," + range[j].id + ",") >= 0) {
		        range[j].selected = 'selected';
		    }
		    else {
		        range[j].selected = '';
		    }
			options.push(range[j]);
			j++;
		}

		return this.render(["phpr.Default.template", "formselect.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							values: itemvalue,
							required: itemrequired,
							disabled: itemdisabled,
							multiple: itemmultiple,
							size: itemsize,
							options: options
				});
	},

	multipleSelectRender: function(range, itemlabel, itemid,itemvalue,itemrequired,itemdisabled){
		var options=new Array();
		var j=0;
		for (j in range){
			options.push(range[j]);
			j++;
		}
		return this.render(["phpr.Default.template", "formmultipleselect.html"], null, {
							label: itemlabel,
							labelfor: itemid,
							id: itemid,
							values: itemvalue,
							required: itemrequired,
							disabled: itemdisabled,
							options: options
				});
	}
});
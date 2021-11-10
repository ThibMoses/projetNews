	var reg = new RegExp("[^a-zA-Z0-9\-]");
	var regmat= new RegExp("[^0-9]");
	var regmail = new RegExp("^[A-Za-z]+[A-Za-z0-9]*@[AZa-z0-9]*\.[A-Za-z0-9]");
	var id = '#';
	var classe = '.';
	$ok = false;

	initialClassName = function(id) {
		var attr = $(id).attr('class');
		attr = attr.replace("form-control-danger", "");
		attr = attr.replace("form-control-success", "");
		return attr;
	}
	success = function(id, classe) {
		var attr = initialClassName(id);
		$(id).attr('class', attr + ' form-control-success');
		$(classe).text("");
            ok = true;
	}
	danger = function(id, classe) {
		var attr = initialClassName(id);
		$(id).attr('class', attr + 'form-control-danger');
		$(classe).text("Champ incorrecte");
            ok = false;
	}

	error = function(e) {
		var inputid = e.target.id;
		id += inputid;
		classe += inputid;
		var val = $(id).val();
		if (inputid == "mail") {
			if (regmail.test(val) && val != "") {
				success(id, classe);
			} else {
				danger(id, classe);
			};
		} else if(inputid == "pwd"){
			if(val.length < 8){
				danger(id, classe);
			}else{
				success(id, classe);
			}
		} else if (inputid == "mat") {
			if(regmat.test(val) && val.length < 8){
				danger(id, classe);
			}else{
				success(id, classe);
			}
		} else {
			if (reg.test(val) || val == "") {
				danger(id, classe);
			} else {
				success(id, classe);
			};
		}
	}


	$(document).ready(function() {
		$('.form-control').blur(function(e) {
			id = '#';
			classe = '.';
			error(e);
		});
		$('#SUBMIT').click(function(e) {
                        alert('go');
			if (ok == false) {
				e.preventDefault();
			}
		})
	});

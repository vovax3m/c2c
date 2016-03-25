function gen(){
	var key=$('#egroup').val();
	$.ajax({
			url: '/admin/newkey/'+key,
			success: function(data) {
				$('#eapikey').val(data);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError); 
			} 
		});
}
function del(id){
	var i=confirm('Подтвердите удаление');
	console.log(i);
	if(i==true){
		$.ajax({
			url: '/admin/del/'+id,
			beforeSend:function(data){
			$('#temp').html('Пожалуйста, подождите..'); 
				$('#temp').show('fast');
			},
			success: function(data) {
				if(data==1){
					$('#temp').html('Успешно удалено');
					$('#temp').show('fast');
				}
				$('#bid'+id).hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError); 
			} 
		});
	}
	
}

 function edit(id){
	
	$('#editspan').show('fast');
	$('#editform').show('fast');
	$('#eid').val(id);
	$('#ename').val($('#hname'+id).val());
	$('#egroup').val($('#hgroup'+id).val());
	$('#etrunk').val($('#htrunk'+id).val());
	$('#eapikey').val($('#hapikey'+id).val());
	$('#ecounter').val($('#hcounter'+id).val());
	$('#eip').val($('#hip'+id).val());
	if($('#hactive'+id).val()==1)$('#eactive').prop('checked', true);
	
	//alert(id);
	
}
/* @param id - идентификатор блока для вставки паролей)
@param syllableNum - количество слогов в пароле
@param numPass - количество количество паролей вставляемых в блок
@param useNums - использовать числа или нет */
function jsPassGen(id, syllableNum, numPass, useNums) {
id = typeof(id) != 'undefined' ? id : 'jsPassGenForm';    // параметры по умолчанию
syllableNum = typeof(syllableNum) != 'undefined' ? syllableNum : 3;
numPass = typeof(numPass) != 'undefined' ? numPass : 10;
useNums = typeof(useNums) != 'undefined' ? useNums : true;

function rand(from, to) {
from = typeof(from) != 'undefined' ? from : 0;    // параметры
to = typeof(to) != 'undefined' ? to : from + 1;    // по умолчанию
return Math.round(from + Math.random()*(to - from));
};

function getRandChar(a) {
return a.charAt(rand(0,a.length-1));
}

var form = document.getElementById(id);
// Наиболее подходящие согласные для использования их в качестве заглавных
var cCommon = "bcdfghklmnprstvz";
var cAll = cCommon + "jqwx";    // Все согласные
var vAll = "aeiouy";    // Все гласные
var lAll = cAll + vAll;    // Все буквы
console.log(form);
form.value = '';
for(var j = 0; j < numPass; ++j) {
// Коэффициент определяющий вероятность появления числа между слогами
var numProb = 0, numProbStep = 0.25;
for(var i = 0; i < syllableNum; ++i) {
if(Math.round(Math.random())) {
form.value += getRandChar(cCommon).toUpperCase() +
getRandChar(vAll) +
getRandChar(lAll);
} else {
form.value += getRandChar(vAll).toUpperCase() +
getRandChar(cCommon);
}
if(useNums && Math.round(Math.random() + numProb)) {
form.value += rand(0,9);
numProb += numProbStep;
}
}

}
return false;
}

function runPassGen(elem) {
 if(elem==false)elem='pass';
jsPassGen(elem, 3, 1);
}
function isInt(n) {
   return n % 1 === 0;
}
// вставляем номер в  поле звонка
function callto(no){
	
	$('#nomer').val(no);

}



$(function(){
		
});

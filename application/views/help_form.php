
<div align="center"><a href="http://c2c.sip64.ru/call/help" class="c2c_submit">api help</a> <a href="http://c2c.sip64.ru/call/help/form" class="c2c_submit">form help</a> <a href="http://c2c.sip64.ru/call/help/contact" class="c2c_submit">contact us</a></div>
<div align="left" style="font-family:Play, sans-serif;display:table;margin-left:25%;margin-top:2%">
	<p class="title">Loading form to page</p>
	<br>
	<p>1. Loading script</p>
	<p>Load jquery library</p>
	<p><pre>&lt;script src="http://c2c.sip64.ru/call/form?block=callblock"&gt;&lt;/script&gt;</pre>
	Where parameter</p>
	<p> <pre>block=callblock</pre>
	define in which element you want to put click to call form.</p>
	<p>Also you can define status block with parameter<pre>callback=status_div</pre>
	default status element defined <pre>c2c_status</pre></p>
	<br>
	<p>2.Set elements to view form status block with parameter<pre>&lt;div id="callblock"&gt;&lt;/div&gt;</pre>
	and status element defined <pre>&lt;div id="c2c_status"&gt;&lt;/div&gt;</pre></p>
	<p>3.Set element with api-key<pre>&lt;input type="hidden" id="c2c_ak" value="6ec6e112741868b4833d3a41670b479ac75a4178"&gt;</pre>
	</p>
	<br>
	<p>You can stylize your form as you like. You should to describe <pre>.c2c_number{}</pre> for textfield, and<pre>.c2c_submit{}</pre>for button, in your css file</p>
	<br>
	<p class="title">Example source code</p>
	<br>
	<p>index.html</p>
	<p><pre>&lt;html&gt;
	&lt;head&gt;
		&lt;meta http-equiv="Content-Type" content="text/html"; charset="utf-8"&gt;
		&lt;script src="assets/jquery-1.11.1.min.js"&gt;&lt;/script&gt;
		&lt;script src="http://c2c.sip64.ru/call/form?block=callblock"&gt;&lt;/script&gt;
		&lt;link rel="stylesheet" href="assets/style.css" type="text/css"/&gt;
	&lt;/head&gt;
&lt;body&gt;
	&lt;div id="callblock"&gt;&lt;/div&gt;
	&lt;div id="c2c_status"&gt;&lt;/div&gt;
	&lt;input type="hidden" id="c2c_ak" value="6ec6e112741868b4833d3a41670b479ac75a4178"&gt; 
 &lt;/body&gt;
&lt;/html&gt;</pre></p>
	<p>style.css</p>
	<p><pre>.c2c_number{
	background:white;
	border:1px solid black;
	border-radius:2px;
	font-size:15px ;
	margin:5px;
	padding:5px;
	width:100px;
}
.c2c_submit{
	border:1px  solid black;
	background:white;
	border-radius:2px;
	font-size:16px ;
	margin:5px;
	padding:5px;
	width:100px;
}</pre></p>
	<p>For security reason, you have to use ip permittion for use this mode</p>
	<p class="title">Example result</p>
	<p><div id="callblock"><input type="text" class="c2c_number" id="c2c_number"><input class="c2c_submit" type="submit" ></div></p>
	<p><div id="c2c_status">success</div></p>
	<br>
</div>
